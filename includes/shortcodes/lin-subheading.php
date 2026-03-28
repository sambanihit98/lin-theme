<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// ---------------------------------------------------------------------------
// Subheading 
// ---------------------------------------------------------------------------
function lin_subheading_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(array(
        'tag' => 'h5',
        'align' => 'center',
        'fontweight' => 'semibold',
        'color' => '#6b6b6b',
        'marginbottom' => '10px',
        'size' => "20px",
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
add_shortcode('lin_subheading', 'lin_subheading_shortcode');
