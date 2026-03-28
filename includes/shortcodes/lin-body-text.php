<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// ---------------------------------------------------------------------------
//Body Text
// ---------------------------------------------------------------------------
function lin_body_text_shortcode($atts, $content = null)
{

    $atts = shortcode_atts(array(
        'size'  => '', // empty = use global
        'color' => '#333333',
        'align' => '', // left default / left-center-right
    ), $atts, 'lin_body_text');

    $size  = $atts['size'] !== '' ? intval($atts['size']) : '';
    $color = sanitize_hex_color($atts['color']) ?: '#333333';
    $align = $atts['align'] ?: '';

    // Build style dynamically
    $style = 'color:' . $color . '; line-height:1.6;';

    if ($size) {
        $style .= ' font-size:' . $size . 'px;';
    }

    return trim('<div style="text-align:' . $align . ';"> <span style="' . $style . '">' . do_shortcode($content) . '</span>' . "</div>");
}

add_shortcode('lin_body_text', 'lin_body_text_shortcode');
