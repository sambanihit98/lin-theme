<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// -------------------------------------------------------------------------
// HEADER CUSTOMIZER 
// -------------------------------------------------------------------------

// ----------------------------------
// ----------------------------------
// Site Identity Section
// Logo Width
function lin_customizer_logo_width($wp_customize)
{
    $wp_customize->add_setting('logo_width', array(
        'default'           => 150,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('logo_width', array(
        'label'       => 'Logo Width (px)',
        'description' => 'Adjust the width of your site logo.',
        'section'     => 'title_tagline',
        'type'        => 'range',
        'input_attrs' => array('min' => 50, 'max' => 500, 'step' => 1),
    ));
}
add_action('customize_register', 'lin_customizer_logo_width');

// ----------------------------------
// Site Title Font Size (Header)
function lin_customizer_site_title($wp_customize)
{
    // Add setting
    $wp_customize->add_setting('site_title_font_size', array(
        'default'           => 24,
        'sanitize_callback' => 'absint', // ensures an integer
    ));

    // Add control inside "Site Identity" section
    $wp_customize->add_control('site_title_font_size', array(
        'label'       => 'Site Title Font Size (px)',
        'section'     => 'title_tagline', // this is the Site Identity section
        'type'        => 'range',
        'input_attrs' => array(
            'min'  => 10,
            'max'  => 100,
            'step' => 1,
        ),
    ));
}
add_action('customize_register', 'lin_customizer_site_title');

// ----------------------------------
// ----------------------------------
//Customizer Section
function lin_customizer_header($wp_customize)
{
    // Add the section first
    $wp_customize->add_section('header_section', array(
        'title'    => 'Header Settings',
        'priority' => 20,
    ));

    // --------------------------------------
    // General Settings
    // --------------------------------------
    $wp_customize->add_setting('header_divider_general', [
        'sanitize_callback' => 'wp_kses_post',
    ]);
    $wp_customize->add_control(new Lin_Customize_Separator_Control($wp_customize, 'header_divider_general', [
        'label'   => 'General Settings',
        'section' => 'header_section',
    ]));

    // Header Height
    $wp_customize->add_setting('header_height', [
        'default'           => 80,
        'sanitize_callback' => 'absint',
    ]);

    $wp_customize->add_control('header_height', [
        'type'        => 'range',
        'label'       => 'Header Height (px)',
        'description' => 'Adjust the height of the header',
        'section'     => 'header_section',
        'input_attrs' => [
            'min'  => 50,
            'max'  => 200,
            'step' => 1,
        ],
    ]);

    // Header Background
    $wp_customize->add_setting('header_bg_color', ['default' => '#ffffff']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_bg_color', [
        'label'       => 'Header Background Color',
        'description' => 'Choose the background color of the header when not transparent',
        'section'     => 'header_section',
    ]));

    // Transparent Header
    $wp_customize->add_setting('header_transparent', [
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean'
    ]);
    $wp_customize->add_control('header_transparent', [
        'type'        => 'checkbox',
        'label'       => 'Transparent Header',
        'description' => 'Enable this option to make the header background transparent on all pages',
        'section'     => 'header_section',
    ]);

    // --------------------------------------
    // // Menu Colors
    // --------------------------------------
    $wp_customize->add_setting('header_divider_menu_colors', [
        'sanitize_callback' => 'wp_kses_post',
    ]);
    $wp_customize->add_control(new Lin_Customize_Separator_Control($wp_customize, 'header_divider_menu_colors', [
        'label'   => 'Menu Colors',
        'section' => 'header_section',
    ]));


    // Primary Menu Color
    $wp_customize->add_setting('menu_primary_color', ['default' => '#ffffff']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menu_primary_color', [
        'label'       => 'Primary Menu Font Color',
        'description' => 'Font color of menu links when the header is transparent (default state)',
        'section'     => 'header_section',
    ]));

    // Secondary Menu Color
    $wp_customize->add_setting('menu_secondary_color', ['default' => '#7c3aed']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menu_secondary_color', [
        'label'       => 'Secondary Menu Font Color',
        'description' => 'Font color of menu links when the header has a solid background (scrolled/sticky state)',
        'section'     => 'header_section',
    ]));

    // ---------------------------
    // Active and Hover States Divider
    // ---------------------------
    $wp_customize->add_setting('header_divider_active_hover', [
        'sanitize_callback' => 'wp_kses_post',
    ]);
    $wp_customize->add_control(new Lin_Customize_Separator_Control($wp_customize, 'header_divider_active_hover', [
        'label'   => 'Active & Hover States',
        'section' => 'header_section',
    ]));

    // Active Menu Primary Color
    $wp_customize->add_setting('active_menu_font_color_primary', ['default' => '#ffffff']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'active_menu_font_color_primary', [
        'label'       => 'Active Menu Font Color (Primary)',
        'description' => 'Color of active menu item when header is transparent',
        'section'     => 'header_section',
    ]));

    // Active Menu Secondary Color
    $wp_customize->add_setting('active_menu_font_color_secondary', ['default' => '#7c3aed']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'active_menu_font_color_secondary', [
        'label'       => 'Active Menu Font Color (Secondary)',
        'description' => 'Color of active menu item when header has a solid background',
        'section'     => 'header_section',
    ]));

    // Active Menu Background (Primary)
    $wp_customize->add_setting('active_menu_bg_primary', ['default' => '#ffffff']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'active_menu_bg_primary', [
        'label'       => 'Active Menu Background (Primary)',
        'description' => 'Background of active menu when header is transparent',
        'section'     => 'header_section',
    ]));

    // Active Menu Background (Secondary)
    $wp_customize->add_setting('active_menu_bg_secondary', ['default' => '#7c3aed']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'active_menu_bg_secondary', [
        'label'       => 'Active Menu Background (Secondary)',
        'description' => 'Background of active menu when header has a solid background',
        'section'     => 'header_section',
    ]));

    // Active Menu Opacity
    $wp_customize->add_setting('active_menu_opacity', ['default' => 0.2]);
    $wp_customize->add_control('active_menu_opacity', [
        'type'        => 'range',
        'label'       => 'Active Menu Opacity',
        'input_attrs' => ['min' => 0, 'max' => 1, 'step' => 0.05],
        'section'     => 'header_section',
        'description' => 'Controls the transparency of the active menu background',
    ]);

    // Menu Hover Color
    // Hover Text (Primary)
    $wp_customize->add_setting('menu_hover_color_primary', ['default' => '#ffffff']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menu_hover_color_primary', [
        'label'       => 'Menu Hover Text (Primary)',
        'description' => 'Text color on hover when header is transparent',
        'section'     => 'header_section',
    ]));

    // Hover Text (Secondary)
    $wp_customize->add_setting('menu_hover_color_secondary', ['default' => '#7c3aed']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menu_hover_color_secondary', [
        'label'       => 'Menu Hover Text (Secondary)',
        'description' => 'Text color on hover when header has a solid background',
        'section'     => 'header_section',
    ]));

    // Menu Hover Background
    // Hover Background (Primary)
    $wp_customize->add_setting('menu_hover_bg_primary', ['default' => '#ffffff']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menu_hover_bg_primary', [
        'label'       => 'Menu Hover Background (Primary)',
        'description' => 'Background on hover when header is transparent',
        'section'     => 'header_section',
    ]));

    // Hover Background (Secondary)
    $wp_customize->add_setting('menu_hover_bg_secondary', ['default' => '#7c3aed']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menu_hover_bg_secondary', [
        'label'       => 'Menu Hover Background (Secondary)',
        'description' => 'Background on hover when header has a solid background',
        'section'     => 'header_section',
    ]));

    // Menu Hover Opacity
    $wp_customize->add_setting('menu_hover_opacity', ['default' => 0.1]);
    $wp_customize->add_control('menu_hover_opacity', [
        'type'        => 'range',
        'label'       => 'Menu Hover Background Opacity',
        'input_attrs' => ['min' => 0, 'max' => 1, 'step' => 0.05],
        'section'     => 'header_section',
        'description' => 'Controls the transparency of the hover background color',
    ]);
}
add_action('customize_register', 'lin_customizer_header');
