<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// ---------------------------------------------------------------------------
// CTA SECTION CUSTOMIZER
// ---------------------------------------------------------------------------
function lin_customize_cta_section($wp_customize)
{
    // Section
    $wp_customize->add_section('cta_section', array(
        'title'    => __('CTA Section', 'lin'),
        'priority' => 60,
    ));

    // Heading
    $wp_customize->add_setting('cta_heading', array(
        'default' => 'Boost Your Online Presence',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cta_heading', array(
        'label'   => __('CTA Heading', 'lin'),
        'section' => 'cta_section',
        'type'    => 'text',
    ));

    // Heading font color
    $wp_customize->add_setting('cta_heading_color', array(
        'default' => '#f45aaa',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cta_heading_color', array(
        'label' => __('Heading Color', 'lin'),
        'section' => 'cta_section',
    )));

    // Heading font sizes
    $wp_customize->add_setting('cta_heading_size_desktop', array('default' => 36, 'sanitize_callback' => 'absint'));
    $wp_customize->add_setting('cta_heading_size_tablet', array('default' => 28, 'sanitize_callback' => 'absint'));
    $wp_customize->add_setting('cta_heading_size_mobile', array('default' => 20, 'sanitize_callback' => 'absint'));

    $wp_customize->add_control('cta_heading_size_desktop', array(
        'label' => 'Heading Font Size (Desktop px)',
        'section' => 'cta_section',
        'type' => 'number',
    ));
    $wp_customize->add_control('cta_heading_size_tablet', array(
        'label' => 'Heading Font Size (Tablet px)',
        'section' => 'cta_section',
        'type' => 'number',
    ));
    $wp_customize->add_control('cta_heading_size_mobile', array(
        'label' => 'Heading Font Size (Mobile px)',
        'section' => 'cta_section',
        'type' => 'number',
    ));

    // Subheading
    $wp_customize->add_setting('cta_subheading', array(
        'default' => 'We craft websites, marketing strategies, and designs that convert.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cta_subheading', array(
        'label'   => __('CTA Subheading', 'lin'),
        'section' => 'cta_section',
        'type'    => 'text',
    ));

    // Subheading font color
    $wp_customize->add_setting('cta_subheading_color', array(
        'default' => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cta_subheading_color', array(
        'label' => __('Subheading Color', 'lin'),
        'section' => 'cta_section',
    )));

    // Subheading font sizes
    $wp_customize->add_setting('cta_subheading_size_desktop', array('default' => 18, 'sanitize_callback' => 'absint'));
    $wp_customize->add_setting('cta_subheading_size_tablet', array('default' => 16, 'sanitize_callback' => 'absint'));
    $wp_customize->add_setting('cta_subheading_size_mobile', array('default' => 14, 'sanitize_callback' => 'absint'));

    $wp_customize->add_control('cta_subheading_size_desktop', array(
        'label' => 'Subheading Font Size (Desktop px)',
        'section' => 'cta_section',
        'type' => 'number',
    ));
    $wp_customize->add_control('cta_subheading_size_tablet', array(
        'label' => 'Subheading Font Size (Tablet px)',
        'section' => 'cta_section',
        'type' => 'number',
    ));
    $wp_customize->add_control('cta_subheading_size_mobile', array(
        'label' => 'Subheading Font Size (Mobile px)',
        'section' => 'cta_section',
        'type' => 'number',
    ));

    // Button Text
    $wp_customize->add_setting('cta_button_text', array(
        'default' => 'Your Button Text',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cta_button_text', array(
        'label'   => __('Button Text', 'lin'),
        'section' => 'cta_section',
        'type'    => 'text',
    ));

    // Button URL
    $wp_customize->add_setting('cta_button_url', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('cta_button_url', array(
        'label'   => __('Button URL', 'lin'),
        'section' => 'cta_section',
        'type'    => 'url',
    ));

    // Button Color
    $wp_customize->add_setting('cta_button_color', array(
        'default' => '#7c3aed',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cta_button_color', array(
        'label' => 'Button Color',
        'section' => 'cta_section',
    )));

    // Button Text Color
    $wp_customize->add_setting('cta_button_text_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cta_button_text_color', array(
        'label' => 'Button Text Color',
        'section' => 'cta_section',
    )));

    // Background Color
    $wp_customize->add_setting('cta_bg_color', array(
        'default' => '#efeaf7',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cta_bg_color', array(
        'label' => 'CTA Background Color',
        'section' => 'cta_section',
    )));
}
add_action('customize_register', 'lin_customize_cta_section');
