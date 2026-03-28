<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// ---------------------------------------------------------------------------
// Heading 
// ---------------------------------------------------------------------------
function lin_heading_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(array(
        'tag' => 'h1',
        'align' => 'center',
        'fontweight' => 'bold',
        'color' => '#333333',
        'marginbottom' => '10px',
        'size' => "50px",
    ), $atts);

    $tag = esc_attr($atts['tag']);
    $align = esc_attr($atts['align']);
    $fontweight = esc_attr($atts['fontweight']);
    $color = esc_attr($atts['color']);
    $marginbottom = esc_attr($atts['marginbottom']);
    $size = esc_attr($atts['size']);

    return trim("<{$tag} style='color:{$color}; text-align:{$align}; font-size:{$size}; font-weight:{$fontweight}; margin-bottom:{$marginbottom};'>
                " . do_shortcode($content) . "
            </{$tag}>");
}
add_shortcode('lin_heading', 'lin_heading_shortcode');
