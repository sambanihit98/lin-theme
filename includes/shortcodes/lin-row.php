<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// ---------------------------------------------------------------------------
// Row shortcode with justify and align
// ---------------------------------------------------------------------------
function lin_row_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(
        array(
            'justify' => '',  // options: start, center, end, around, between, evenly
            'align'   => '',  // options: start, center, end, baseline, stretch
            'g'       => '4', // gutter size, default 4
        ),
        $atts,
        'lin_row'
    );

    // Build Bootstrap classes
    $classes = array('row');

    if (!empty($atts['justify'])) {
        $classes[] = 'justify-content-' . esc_attr($atts['justify']);
    }

    if (!empty($atts['align'])) {
        $classes[] = 'align-items-' . esc_attr($atts['align']);
    }

    if (!empty($atts['g'])) {
        $classes[] = 'g-' . esc_attr($atts['g']);
    }

    $class_string = implode(' ', $classes);

    return '<div class="' . $class_string . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('lin_row', 'lin_row_shortcode');
