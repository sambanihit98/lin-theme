<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// ---------------------------------------------------------------------------
// CTA (Call to Action)
// ---------------------------------------------------------------------------
function lin_cta_shortcode($atts, $content = null)
{
    // Get values from Customizer
    $heading = get_theme_mod('cta_heading', 'Boost Your Online Presence');
    $subheading = get_theme_mod('cta_subheading', 'We craft websites, marketing strategies, and designs that convert.');

    $heading_size_desktop = get_theme_mod('cta_heading_size_desktop', 36);
    $heading_size_tablet = get_theme_mod('cta_heading_size_tablet', 28);
    $heading_size_mobile = get_theme_mod('cta_heading_size_mobile', 20);

    $subheading_size_desktop = get_theme_mod('cta_subheading_size_desktop', 18);
    $subheading_size_tablet = get_theme_mod('cta_subheading_size_tablet', 16);
    $subheading_size_mobile = get_theme_mod('cta_subheading_size_mobile', 14);

    $heading_color = get_theme_mod('cta_heading_color', '#f45aaa');
    $subheading_color = get_theme_mod('cta_subheading_color', '#333333');

    $button_text = get_theme_mod('cta_button_text', 'Your Button Text');
    $button_url = get_theme_mod('cta_button_url', '#');

    $button_color = get_theme_mod('cta_button_color', '#7c3aed');
    $button_text_color = get_theme_mod('cta_button_text_color', '#ffffff');
    $bg_color = get_theme_mod('cta_bg_color', '#efeaf7');

    // Generate CSS for responsive font sizes
    $css = "
    <style>
        .lin-cta h2 { font-size: {$heading_size_desktop}px; }
        .lin-cta p { font-size: {$subheading_size_desktop}px; }
        @media (max-width: 991px) {
            .lin-cta h2 { font-size: {$heading_size_tablet}px; }
            .lin-cta p { font-size: {$subheading_size_tablet}px; }
        }
        @media (max-width: 767px) {
            .lin-cta h2 { font-size: {$heading_size_mobile}px; }
            .lin-cta p { font-size: {$subheading_size_mobile}px; }
        }
        .lin-cta .btn { background-color: {$button_color}; color: {$button_text_color}; }
        .lin-cta { background-color: {$bg_color}; }
    </style>
    ";

    // Build HTML output
    $output = $css;
    $output .= '<div class="lin-cta"><div class="container">';
    $output .= '<h2 style="color:' . $heading_color . ';">' . esc_html($heading) . '</h2>';
    $output .= '<p style="color:' . $subheading_color . ';">' . esc_html($subheading) . '</p>';
    $output .= '<a href="' . esc_url($button_url) . '" class="btn">' . esc_html($button_text) . '</a>';
    $output .= '</div></div>';

    // Remove automatic <p> tags
    return shortcode_unautop($output);
}
add_shortcode('lin_cta', 'lin_cta_shortcode');
