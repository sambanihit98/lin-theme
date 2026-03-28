<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// ---------------------------------------------------------------------------
// Responsive Spacer Shortcode
// ---------------------------------------------------------------------------
function lin_spacer_shortcode($atts)
{
    static $counter = 0;
    $counter++;

    $atts = shortcode_atts([
        'height' => '20px',
        'sm'     => '',
        'md'     => '',
        'lg'     => '',
    ], $atts);

    $unique_class = 'lin-spacer-' . $counter;
    $desktop = esc_attr($atts['lg'] ?: $atts['height']);
    $tablet  = esc_attr($atts['md'] ?: $atts['height']);
    $mobile  = esc_attr($atts['sm'] ?: $atts['height']);

    $css = "<style>
        .{$unique_class} { height: {$desktop}; }
        @media (max-width: 991px) { .{$unique_class} { height: {$tablet}; } }
        @media (max-width: 767px) { .{$unique_class} { height: {$mobile}; } }
    </style>";

    return $css . "<div class='{$unique_class}'></div>";
}
add_shortcode('lin_spacer', 'lin_spacer_shortcode');
