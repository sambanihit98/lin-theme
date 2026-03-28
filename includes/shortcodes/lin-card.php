<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// ---------------------------------------------------------------------------
// Card Shortcode
// ---------------------------------------------------------------------------

// ------------------------------------
// Main lin-card shortcode with border
// ------------------------------------
function lin_card_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(
        array(
            'border' => '', // default: no border
        ),
        $atts,
        'lin_card'
    );

    // Apply border style if provided
    $style = $atts['border'] ? ' style="border:' . esc_attr($atts['border']) . ';"' : '';

    return '
        <div class="lin-card"' . $style . '>
            <div class="lin-card-body">' . do_shortcode($content) . '</div>
        </div>
    ';
}
add_shortcode('lin_card', 'lin_card_shortcode');

// ------------------------------------
// lin-card-img shortcode
function lin_card_img_shortcode($atts)
{
    $atts = shortcode_atts(array(
        'src' => '',
        'alt' => ''
    ), $atts, 'lin-card-img');

    if (empty($atts['src'])) return '';

    return '<img src="' . esc_url($atts['src']) . '" alt="' . esc_attr($atts['alt']) . '">';
}
add_shortcode('lin_card_img', 'lin_card_img_shortcode');

// ------------------------------------
// lin-card-title shortcode
function lin_card_title_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(
        array(
            'color' => '#333333', // default: no color
        ),
        $atts,
        'lin_card_title'
    );

    $style = $atts['color'] ? ' style="color:' . esc_attr($atts['color']) . ';"' : '';

    return '<h3 class="lin-card-title"' . $style . '>' . esc_html($content) . '</h3>';
}
add_shortcode('lin_card_title', 'lin_card_title_shortcode');

// ------------------------------------
// lin-card-subtitle shortcode
function lin_card_subtitle_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(
        array(
            'color' => '#666666', // default: no color
        ),
        $atts,
        'lin_card_subtitle'
    );

    $style = $atts['color'] ? ' style="color:' . esc_attr($atts['color']) . ';"' : '';

    return '<h4 class="lin-card-subtitle"' . $style . '>' . esc_html($content) . '</h4>';
}
add_shortcode('lin_card_subtitle', 'lin_card_subtitle_shortcode');

// ------------------------------------
// lin-card-desc shortcode
function lin_card_desc_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(
        array(
            'color' => '#333333', // default: no color
        ),
        $atts,
        'lin_card_desc'
    );

    $style = $atts['color'] ? ' style="color:' . esc_attr($atts['color']) . ';"' : '';

    return '<p class="lin-card-desc"' . $style . '>' . esc_html($content) . '</p>';
}
add_shortcode('lin_card_desc', 'lin_card_desc_shortcode');

// ------------------------------------
// lin-card-btn shortcode
function lin_card_btn_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(array(
        'url' => '#'
    ), $atts, 'lin_card-btn');

    return '<a href="' . esc_url($atts['url']) . '" class="lin-card-btn">' . esc_html($content) . '</a>';
}
add_shortcode('lin_card-btn', 'lin_card_btn_shortcode');
