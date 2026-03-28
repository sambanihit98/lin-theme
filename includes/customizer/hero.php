<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// -------------------------------------------------------------------------
// HERO SECTION CUSTOMIZER 
// -------------------------------------------------------------------------

function lin_customizer_hero($wp_customize)
{
    // Add Hero Section
    $wp_customize->add_section('hero_section', [
        'title'    => 'Hero Section',
        'priority' => 30,
    ]);

    // --------------------------------------
    // General Settings
    // --------------------------------------
    $wp_customize->add_setting('hero_divider_general', [
        'sanitize_callback' => 'wp_kses_post',
    ]);
    $wp_customize->add_control(new Lin_Customize_Separator_Control($wp_customize, 'hero_divider_general', [
        'label'   => 'General Settings',
        'section' => 'hero_section',
    ]));

    // ------------------------
    // Hero Image
    // ------------------------
    $wp_customize->add_setting('hero_image', [
        'default'           => get_template_directory_uri() . '/images/main-hero-bg-default.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image', [
        'label'   => 'Hero Image',
        'section' => 'hero_section',
    ]));

    // ------------------------
    // Hero Headline
    // ------------------------
    $wp_customize->add_setting('hero_headline', [
        'default'           => 'Welcome to Lin Theme',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('hero_headline', [
        'label'   => 'Hero Headline',
        'type'    => 'text',
        'section' => 'hero_section',
    ]);

    // ------------------------
    // Hero Subheadline
    // ------------------------
    $wp_customize->add_setting('hero_subheadline', [
        'default'           => 'Explore and experience a modern WordPress theme designed for you, crafted with flexibility, speed, and style to bring your website to life effortlessly',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('hero_subheadline', [
        'label'   => 'Hero Subheadline',
        'type'    => 'textarea',
        'section' => 'hero_section',
    ]);

    // ------------------------
    // Heading Color
    // ------------------------
    $wp_customize->add_setting('hero_heading_color', [
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hero_heading_color', [
        'label'   => 'Heading Color',
        'section' => 'hero_section',
    ]));

    // ------------------------
    // Subheading Color
    // ------------------------
    $wp_customize->add_setting('hero_subheading_color', [
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hero_subheading_color', [
        'label'   => 'Subheading Color',
        'section' => 'hero_section',
    ]));

    // Heading Font Weight
    $wp_customize->add_setting('hero_heading_font_weight', [
        'default'           => 700,
        'sanitize_callback' => 'absint',
    ]);
    $wp_customize->add_control('hero_heading_font_weight', [
        'label'   => 'Heading Font Weight',
        'type'    => 'number',
        'section' => 'hero_section',
    ]);

    // Subheading Font Weight
    $wp_customize->add_setting('hero_subheading_font_weight', ['default' => 400, 'sanitize_callback' => 'absint']);
    $wp_customize->add_control('hero_subheading_font_weight', ['label' => 'Subheading Font Weight', 'type' => 'number', 'section' => 'hero_section']);

    $wp_customize->add_setting('hero_heading_margin_bottom', ['default' => 16, 'sanitize_callback' => 'absint']);
    $wp_customize->add_control('hero_heading_margin_bottom', ['label' => 'Heading Margin Bottom (px)', 'type' => 'number', 'section' => 'hero_section']);

    $wp_customize->add_setting('hero_subheading_margin_bottom', ['default' => 32, 'sanitize_callback' => 'absint']);
    $wp_customize->add_control('hero_subheading_margin_bottom', ['label' => 'Subheading Margin Bottom (px)', 'type' => 'number', 'section' => 'hero_section']);

    // --------------------------------------
    // Heading and Subheading Font Sizes (Desktop)
    // --------------------------------------
    $wp_customize->add_setting('hero_divider_fontsizes_desktop', [
        'sanitize_callback' => 'wp_kses_post',
    ]);
    $wp_customize->add_control(new Lin_Customize_Separator_Control($wp_customize, 'hero_divider_fontsizes_desktop', [
        'label'   => 'Font Sizes (Desktop)',
        'section' => 'hero_section',
    ]));

    $wp_customize->add_setting('hero_heading_font_size_desktop', ['default' => 64, 'sanitize_callback' => 'absint']);
    $wp_customize->add_control('hero_heading_font_size_desktop', ['label' => 'Heading Font Size (Desktop px)', 'type' => 'number', 'section' => 'hero_section']);

    $wp_customize->add_setting('hero_subheading_font_size_desktop', ['default' => 18, 'sanitize_callback' => 'absint']);
    $wp_customize->add_control('hero_subheading_font_size_desktop', ['label' => 'Subheading Font Size (Desktop px)', 'type' => 'number', 'section' => 'hero_section']);

    // --------------------------------------
    // Heading and Subheading Font Sizes (Tablet)
    // --------------------------------------
    $wp_customize->add_setting('hero_divider_fontsizes_tablet', [
        'sanitize_callback' => 'wp_kses_post',
    ]);
    $wp_customize->add_control(new Lin_Customize_Separator_Control($wp_customize, 'hero_divider_fontsizes_tablet', [
        'label'   => 'Font Sizes (Tablet)',
        'section' => 'hero_section',
    ]));

    $wp_customize->add_setting('hero_heading_font_size_tablet', ['default' => 48, 'sanitize_callback' => 'absint']);
    $wp_customize->add_control('hero_heading_font_size_tablet', ['label' => 'Heading Font Size (Tablet px)', 'type' => 'number', 'section' => 'hero_section']);

    $wp_customize->add_setting('hero_subheading_font_size_tablet', ['default' => 18, 'sanitize_callback' => 'absint']);
    $wp_customize->add_control('hero_subheading_font_size_tablet', ['label' => 'Subheading Font Size (Tablet px)', 'type' => 'number', 'section' => 'hero_section']);


    // --------------------------------------
    // Heading and Subheading Font Sizes (Mobile)
    // --------------------------------------
    $wp_customize->add_setting('hero_divider_fontsizes_mobile', [
        'sanitize_callback' => 'wp_kses_post',
    ]);
    $wp_customize->add_control(new Lin_Customize_Separator_Control($wp_customize, 'hero_divider_fontsizes_mobile', [
        'label'   => 'Font Sizes (Mobile)',
        'section' => 'hero_section',
    ]));

    $wp_customize->add_setting('hero_heading_font_size_mobile', ['default' => 48, 'sanitize_callback' => 'absint']);
    $wp_customize->add_control('hero_heading_font_size_mobile', ['label' => 'Heading Font Size (Mobile px)', 'type' => 'number', 'section' => 'hero_section']);

    $wp_customize->add_setting('hero_subheading_font_size_mobile', ['default' => 16, 'sanitize_callback' => 'absint']);
    $wp_customize->add_control('hero_subheading_font_size_mobile', ['label' => 'Subheading Font Size (Mobile px)', 'type' => 'number', 'section' => 'hero_section']);


    // --------------------------------------
    // Hero Buttons
    // --------------------------------------
    $wp_customize->add_setting('hero_divider_buttons', [
        'sanitize_callback' => 'wp_kses_post',
    ]);
    $wp_customize->add_control(new Lin_Customize_Separator_Control($wp_customize, 'hero_divider_buttons', [
        'label'   => 'Buttons',
        'section' => 'hero_section',
    ]));

    // Button Drop Shadow Toggle
    $wp_customize->add_setting('hero_button_shadow', [
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ]);

    $wp_customize->add_control('hero_button_shadow', [
        'type'        => 'checkbox',
        'label'       => 'Enable Button Drop Shadow',
        'description' => 'Toggle shadow effect on hero buttons',
        'section'     => 'hero_section',
    ]);

    // Button 1
    $wp_customize->add_setting('hero_button_1_enable', ['default' => true, 'sanitize_callback' => 'wp_validate_boolean']);
    $wp_customize->add_control('hero_button_1_enable', ['label' => 'Button 1 Enable', 'type' => 'checkbox', 'section' => 'hero_section']);

    $wp_customize->add_setting('hero_button_1_text', ['default' => 'Get Started', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('hero_button_1_text', ['label' => 'Button 1 Text', 'type' => 'text', 'section' => 'hero_section']);

    $wp_customize->add_setting('hero_button_1_url', ['default' => '#', 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control('hero_button_1_url', ['label' => 'Button 1 URL', 'type' => 'url', 'section' => 'hero_section']);

    $wp_customize->add_setting('hero_button_1_bg_color', ['default' => '#7c3aed', 'sanitize_callback' => 'sanitize_hex_color']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hero_button_1_bg_color', ['label' => 'Button 1 Background Color', 'section' => 'hero_section']));

    $wp_customize->add_setting('hero_button_1_hover_bg_color', ['default' => '#9259f3', 'sanitize_callback' => 'sanitize_hex_color']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hero_button_1_hover_bg_color', ['label' => 'Button 1 Hover Background', 'section' => 'hero_section']));

    $wp_customize->add_setting('hero_button_1_text_color', ['default' => '#ffffff', 'sanitize_callback' => 'sanitize_hex_color']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hero_button_1_text_color', ['label' => 'Button 1 Text Color', 'section' => 'hero_section']));

    // Button 2
    $wp_customize->add_setting('hero_button_2_enable', ['default' => true, 'sanitize_callback' => 'wp_validate_boolean']);
    $wp_customize->add_control('hero_button_2_enable', ['label' => 'Button 2 Enable', 'type' => 'checkbox', 'section' => 'hero_section']);

    $wp_customize->add_setting('hero_button_2_text', ['default' => 'Learn More', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('hero_button_2_text', ['label' => 'Button 2 Text', 'type' => 'text', 'section' => 'hero_section']);

    $wp_customize->add_setting('hero_button_2_url', ['default' => '#', 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control('hero_button_2_url', ['label' => 'Button 2 URL', 'type' => 'url', 'section' => 'hero_section']);

    $wp_customize->add_setting('hero_button_2_bg_color', ['default' => '#f45aaa', 'sanitize_callback' => 'sanitize_hex_color']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hero_button_2_bg_color', ['label' => 'Button 2 Background Color', 'section' => 'hero_section']));

    $wp_customize->add_setting('hero_button_2_hover_bg_color', ['default' => '#f978bb', 'sanitize_callback' => 'sanitize_hex_color']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hero_button_2_hover_bg_color', ['label' => 'Button 2 Hover Background', 'section' => 'hero_section']));

    $wp_customize->add_setting('hero_button_2_text_color', ['default' => '#ffffff', 'sanitize_callback' => 'sanitize_hex_color']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hero_button_2_text_color', ['label' => 'Button 2 Text Color', 'section' => 'hero_section']));
}
add_action('customize_register', 'lin_customizer_hero');
