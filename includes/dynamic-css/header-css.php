<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// -------------------------------------------------------------------------
// DYNAMIC CSS for HEADER 
// -------------------------------------------------------------------------

function lin_dynamic_header_css()
{

    $header_height = get_theme_mod('header_height', 80);

    $header_bg = get_theme_mod('header_bg_color', '#ffffff');
    $header_transparent = get_theme_mod('header_transparent', true);

    $menu_primary = get_theme_mod('menu_primary_color', '#ffffff');
    $menu_secondary = get_theme_mod('menu_secondary_color', '#7c3aed');

    $active_bg_primary = get_theme_mod('active_menu_bg_primary', '#ffffff');
    $active_bg_secondary = get_theme_mod('active_menu_bg_secondary', '#7c3aed');

    $active_color_primary = get_theme_mod('active_menu_font_color_primary', '#ffffff');
    $active_color_secondary = get_theme_mod('active_menu_font_color_secondary', '#7c3aed');

    $active_opacity = get_theme_mod('active_menu_opacity', 0.2);

    $hover_color_primary = get_theme_mod('menu_hover_color_primary', '#ffffff');
    $hover_color_secondary = get_theme_mod('menu_hover_color_secondary', '#7c3aed');

    $hover_bg_primary = get_theme_mod('menu_hover_bg_primary', '#ffffff');
    $hover_bg_secondary = get_theme_mod('menu_hover_bg_secondary', '#7c3aed');

    $hover_opacity = get_theme_mod('menu_hover_opacity', 0.1);

    $logo_width = get_theme_mod('logo_width', 150);
    $site_title_font_size = get_theme_mod('site_title_font_size', 24);

    // Base header styles
    $css = "
        header {
            background: " . ($header_transparent ? 'transparent' : $header_bg) . ";
            height: {$header_height}px;
        }

        header .top-bar li a {
            color: " . ($header_transparent ? $menu_primary : $menu_secondary) . " !important;
        }

        /* Active menu items */
        header .top-bar li.current-menu-item > a,
        header .top-bar li.current-menu-ancestor > a,
        header .top-bar li.current_page_item > a {
            background: " . lin_hex2rgba(
        ($header_transparent ? $active_bg_primary : $active_bg_secondary),
        $active_opacity
    ) . ";
            color: " . ($header_transparent ? $active_color_primary : $active_color_secondary) . " !important;
            font-weight: 600;
        }

        header .top-bar li a:hover {
            color: " . ($header_transparent ? $hover_color_primary : $hover_color_secondary) . ";
            background: " . lin_hex2rgba(
        ($header_transparent ? $hover_bg_primary : $hover_bg_secondary),
        $hover_opacity
    ) . ";
            transform: translateY(-2px);
        }

        header .logo img {
            max-width: {$logo_width}px;
            height: auto;
        }

        header .logo a {
            font-size: {$site_title_font_size}px;
            font-weight: bold;
            text-decoration: none;
            color: " . ($header_transparent ? $menu_primary : $menu_secondary) . " !important;
        }
    ";

    // Header menu text styles
    $css .= "

        /* Desktop submenu text color */
        header .main-nav .top-bar li.menu-item-has-children .sub-menu li a {
            color: {$menu_secondary} !important;
        }
        @media (max-width: 767px) {
            header .main-nav .top-bar {
                background: #fff;
            }

            header .main-nav .top-bar li a {
                color: {$menu_secondary} !important;
            }

            header .main-nav .top-bar li.menu-item-has-children .sub-menu li a {
                color: {$menu_secondary} !important;
            }

            header .main-nav .top-bar li.current-menu-item > a,
            header .main-nav .top-bar li.current-menu-ancestor > a,
            header .main-nav .top-bar li.current_page_item > a {
                color: {$active_color_secondary} !important;
                background: " . lin_hex2rgba($active_bg_secondary, $active_opacity) . " !important;
            }

            header .main-nav .top-bar li a:hover {
                color: {$hover_color_secondary} !important;
                background: " . lin_hex2rgba($hover_bg_secondary, $hover_opacity) . " !important;
            }
        }
    ";

    // Sticky header / scrolled state
    if ($header_transparent) {
        $css .= "
        header.sticky.colored {
            background: {$header_bg} !important;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 999;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        /* Change menu color to secondary when scrolled */
        header.sticky.colored .top-bar li a {
            color: {$menu_secondary} !important;
        }

        /* Change hamburger menu color when scrolled */
        header.sticky.colored .menu-toggle {
            color: {$menu_secondary} !important;
            border-color: {$menu_secondary} !important; /* if it has border */
        }

        /* Change site title color when scrolled */
        header.sticky.colored .logo a {
            color: {$menu_secondary} !important;
        }

        header.sticky.colored .top-bar li.current-menu-item > a,
        header.sticky.colored .top-bar li.current-menu-ancestor > a,
        header.sticky.colored .top-bar li.current_page_item > a {
            background: " . lin_hex2rgba($active_bg_secondary, $active_opacity) . " !important;
            color: {$active_color_secondary} !important;
        }

        header.sticky.colored .top-bar li a:hover {
            color: {$hover_color_secondary} !important;
            background: " . lin_hex2rgba($hover_bg_secondary, $hover_opacity) . " !important;
        }
        ";
    }

    wp_add_inline_style('main', $css);
}
add_action('wp_enqueue_scripts', 'lin_dynamic_header_css');
