<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// ---------------------------------------------------------------------------
// Divider
// ---------------------------------------------------------------------------
function lin_divider_shortcode($atts)
{
    $atts = shortcode_atts(array(
        'color'  => '#7c3aed',
        'width'  => '60px',
        'height' => '3px',
        'align'  => 'center',
        'marginbottom' => '0px',
    ), $atts, 'lin_divider');

    $color  = esc_attr($atts['color']);
    $width  = esc_attr($atts['width']);
    $height = esc_attr($atts['height']);
    $align  = esc_attr(strtolower($atts['align']));
    $marginbottom = esc_attr($atts['marginbottom']);

    // Determine margin based on alignment if not set
    switch ($align) {
        case 'left':
            $margin = '0 0 0 0'; // top right bottom left
            break;
        case 'right':
            $margin = '0 0 0 auto';
            break;
        case 'center':
        default:
            $margin = '0 auto';
            break;
    }

    return "<hr style='background-color:{$color}; width:{$width}; height:{$height}; border:none; margin:{$margin}; 
    margin-bottom:{$marginbottom}; opacity:1;'>";
}
add_shortcode('lin_divider', 'lin_divider_shortcode');
