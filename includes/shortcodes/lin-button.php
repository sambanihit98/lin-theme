<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// ---------------------------------------------------------------------------
//Buttons
// ---------------------------------------------------------------------------
function lin_button_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(
        array(
            'url'       => '#',
            'color'     => '#7c3aed',
            'textcolor' => '#ffffff',
            'class'     => '',
            'target'    => '_self',
            'align'     => 'left', // left-center-right
        ),
        $atts,
        'lin_button'
    );

    // Always keep 'btn' as default, append any extra class
    $classes = 'btn';
    if (!empty($atts['class'])) {
        $classes .= ' ' . esc_attr($atts['class']);
    }

    return '<div style="text-align: ' . esc_attr($atts['align']) . '"><a href="' . esc_url($atts['url']) . '" class="' . $classes . '" style="background-color:' . esc_attr($atts['color']) . '; color:' . esc_attr($atts['textcolor']) . '; " target="' . esc_attr($atts['target']) . '" rel="' . ($atts['target'] === '_blank' ? 'noopener noreferrer' : '') . '">' . do_shortcode($content) . '</a></div>';
}

add_shortcode('lin_button', 'lin_button_shortcode');
