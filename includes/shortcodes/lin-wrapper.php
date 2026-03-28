<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// ---------------------------------------------------------------------------
// Wrapper
// ---------------------------------------------------------------------------
function lin_wrapper_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(array(
        'bg-color' => '',
    ), $atts, 'lin_wrapper');

    $color = esc_attr($atts['bg-color']);

    return trim("<div class='lin-wrapper' style='background-color:{$color}'>
                <div class='container'>" . do_shortcode($content) . "</div>
            </div>");
}
add_shortcode('lin_wrapper', 'lin_wrapper_shortcode');
