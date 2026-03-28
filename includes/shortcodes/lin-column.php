<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// ---------------------------------------------------------------------------
// Column Shortcode
// ---------------------------------------------------------------------------
function lin_column_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(array(
        'col'     => '12',
        'sm'      => '',
        'md'      => '',
        'lg'      => '',
        'xl'      => '',
        'display' => '', // optional
    ), $atts, 'lin_column');

    // Build class string dynamically
    $classes = array();
    if (!empty($atts['col'])) $classes[] = 'col-' . esc_attr($atts['col']);
    if (!empty($atts['sm']))  $classes[] = 'col-sm-' . esc_attr($atts['sm']);
    if (!empty($atts['md']))  $classes[] = 'col-md-' . esc_attr($atts['md']);
    if (!empty($atts['lg']))  $classes[] = 'col-lg-' . esc_attr($atts['lg']);
    if (!empty($atts['xl']))  $classes[] = 'col-xl-' . esc_attr($atts['xl']);

    // Build style string
    $style = '';
    if (!empty($atts['display'])) {
        $style = 'style="display:' . esc_attr($atts['display']) . ';"';
    }

    // Output the column
    return '<div class="' . implode(' ', $classes) . '" ' . $style . '>'
        . do_shortcode(shortcode_unautop($content))
        . '</div>';
}

add_shortcode('lin_column', 'lin_column_shortcode');
