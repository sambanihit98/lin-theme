<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// -------------------------------------------------------------------------
// Removes random <p> and <br> tag in the return content
// -------------------------------------------------------------------------
remove_filter('the_content', 'wpautop');
add_filter('the_content', 'wpautop', 99);
add_filter('the_content', 'shortcode_unautop', 100);

// -------------------------------------------------------------------------
// ENQUEUE SCRIPTS & STYLES
// -------------------------------------------------------------------------
function lin_enqueue_assets()
{
    // Styles
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css'); // Empty / will delete it
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');

    // Google Fonts
    // Poppins as default font (my favorite font hehe)
    wp_enqueue_style(
        'lin-google-fonts',
        'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap',
        false
    );

    // Scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), false, true);

    // Portfolio AJAX script
    wp_enqueue_script(
        'portfolio-js',
        get_template_directory_uri() . '/js/portfolio.js',
        array('jquery'),
        null,
        true
    );

    wp_localize_script('portfolio-js', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));

    // Enqueue your testimonial.js
    wp_enqueue_script(
        'lin-testimonial', // handle
        get_template_directory_uri() . '/js/testimonial.js', // path to your JS file
        array(), // dependencies (empty array if none)
        '1.0', // version
        true // load in footer
    );
}
add_action('wp_enqueue_scripts', 'lin_enqueue_assets');


// -------------------------------------------------------------------------
// THEME SUPPORT & MENUS
// -------------------------------------------------------------------------
function lin_theme_setup()
{
    // Support
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    add_theme_support('widgets');
    add_post_type_support('page', 'custom-fields');

    // Custom logo
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Menus
    register_nav_menus(array(
        'top-menu'    => 'Top Menu Location',
        'mobile-menu' => 'Mobile Menu Location',
        'footer-menu' => 'Footer Menu Location',
    ));
}
add_action('after_setup_theme', 'lin_theme_setup');

// -------------------------------------------------------------------------
// HEX RGBA HELPER FUNCTIONS
// -------------------------------------------------------------------------
function lin_hex2rgba($hex, $opacity = 1)
{
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));
    return "rgba($r,$g,$b,$opacity)";
}

// -------------------------------------------------------------------------
// Page Title
// -------------------------------------------------------------------------
add_filter('admin_title', function ($admin_title, $title) {
    global $post;
    if (isset($post->post_title) && !empty($post->post_title)) {
        $admin_title = $post->post_title . ' ‹ ' . get_bloginfo('name');
    }
    return $admin_title;
}, 10, 2);

// -------------------------------------------------------------------------
// CUSTOM POST TYPES & TAXONOMIES
// -------------------------------------------------------------------------
function lin_portfolio_cpt()
{
    $labels = array(
        'name' => 'Portfolio',
        'singular_name' => 'Portfolio Item',
        'add_new' => 'Add Portfolio Item',
        'add_new_item' => 'Add New Portfolio Item',
        'edit_item' => 'Edit Portfolio Item',
        'all_items' => 'All Portfolio Items',
        'menu_name' => 'Portfolio',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-portfolio',
        'rewrite' => array('slug' => 'portfolio'),
    );

    register_post_type('portfolio', $args);
}
add_action('init', 'lin_portfolio_cpt');

function lin_portfolio_taxonomies()
{
    register_taxonomy_for_object_type('category', 'portfolio');
    register_taxonomy_for_object_type('post_tag', 'portfolio');
}
add_action('init', 'lin_portfolio_taxonomies');


// ---------------------------------------------------------------------------
// Testimonial Custom Post Type
// ---------------------------------------------------------------------------
function lin_register_testimonial_cpt()
{
    $labels = array(
        'name'               => 'Testimonials',
        'singular_name'      => 'Testimonial',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Testimonial',
        'edit_item'          => 'Edit Testimonial',
        'new_item'           => 'New Testimonial',
        'view_item'          => 'View Testimonial',
        'search_items'       => 'Search Testimonials',
        'not_found'          => 'No testimonials found',
        'not_found_in_trash' => 'No testimonials found in Trash',
        'menu_name'          => 'Testimonials',
    );

    $args = array(
        'labels'        => $labels,
        'public'        => true,
        'menu_icon'     => 'dashicons-testimonial',
        'supports'      => array('title', 'editor', 'thumbnail'),
        'has_archive'   => false,
        'rewrite'       => array('slug' => 'testimonials'),
        'show_in_rest'  => true, // Gutenberg support
    );

    register_post_type('testimonial', $args);
}
add_action('init', 'lin_register_testimonial_cpt');

// ---------------------------------------------------------------------------
// Testimonial Meta Box
// ---------------------------------------------------------------------------
function lin_testimonial_meta_box()
{
    add_meta_box(
        'lin_testimonial_details',
        'Testimonial Details',
        'lin_testimonial_meta_callback',
        'testimonial',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'lin_testimonial_meta_box');

function lin_testimonial_meta_callback($post)
{
    $client = get_post_meta($post->ID, '_lin_client_name', true);
    $position = get_post_meta($post->ID, '_lin_client_position', true);
    $rating = get_post_meta($post->ID, '_lin_client_rating', true);
?>

    <p>
        <label>Client Name</label><br>
        <input type="text" name="lin_client_name" value="<?php echo esc_attr($client); ?>" style="width:100%;">
    </p>

    <p>
        <label>Position / Company</label><br>
        <input type="text" name="lin_client_position" value="<?php echo esc_attr($position); ?>" style="width:100%;">
    </p>

    <p>
        <label>Rating (1–5)</label><br>
        <input type="number" name="lin_client_rating" min="1" max="5" value="<?php echo esc_attr($rating); ?>">
    </p>

    <?php
}

// Save meta
function lin_save_testimonial_meta($post_id)
{
    if (array_key_exists('lin_client_name', $_POST)) {
        update_post_meta($post_id, '_lin_client_name', sanitize_text_field($_POST['lin_client_name']));
    }

    if (array_key_exists('lin_client_position', $_POST)) {
        update_post_meta($post_id, '_lin_client_position', sanitize_text_field($_POST['lin_client_position']));
    }

    if (array_key_exists('lin_client_rating', $_POST)) {
        update_post_meta($post_id, '_lin_client_rating', intval($_POST['lin_client_rating']));
    }
}
add_action('save_post', 'lin_save_testimonial_meta');


// -------------------------------------------------------------------------
// CUSTOMIZER DIVIDER CONTROL
// -------------------------------------------------------------------------
// Horizontal line divider with visible label
if (class_exists('WP_Customize_Control')) {
    class Lin_Customize_Separator_Control extends WP_Customize_Control
    {
        public $type = 'hr';

        public function render_content()
        {
    ?>
            <div style="padding: 5px 0;">
                <!-- Horizontal line -->
                <hr style="border:0; border-top:1px solid #ddd; margin:10px 0;">
                <!-- Section label -->
                <?php if (!empty($this->label)) : ?>
                    <span style="display:block; font-weight:600; font-size:13px; margin-bottom:5px;">
                        <?php echo esc_html($this->label); ?>
                    </span>
                <?php endif; ?>
            </div>
        <?php
        }
    }
}

// -------------------------------------------------------------------------
// CUSTOMIZERS--------------------------------------------------------------
// -------------------------------------------------------------------------
require get_template_directory() . '/includes/customizer.php';

// -------------------------------------------------------------------------
// DYNAMIC CSS--------------------------------------------------------------
// -------------------------------------------------------------------------
require get_template_directory() . '/includes/dynamic-css.php';

// -------------------------------------------------------------------------
// LOAD SHORTCODES----------------------------------------------------------
// -------------------------------------------------------------------------
require get_template_directory() . '/includes/shortcodes.php';



// -------------------------------------------------------------------------
// CUSTOMIZER HELPER FUNCTION
// -------------------------------------------------------------------------
function lin_add_customizer_controls($wp_customize, $section, $controls)
{
    foreach ($controls as $id => $args) {
        $sanitize = $args['sanitize'] ?? 'sanitize_text_field';
        $wp_customize->add_setting($id, array(
            'default'           => $args['default'] ?? '',
            'transport'         => $args['transport'] ?? 'refresh',
            'sanitize_callback' => $sanitize,
        ));

        if ($args['type'] === 'color') {
            $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $id, array(
                'label'   => $args['label'],
                'section' => $section,
                'description' => $args['description'] ?? '',
            )));
        } else {
            $control_args = array(
                'label'       => $args['label'],
                'section'     => $section,
                'type'        => $args['type'] ?? 'text',
                'description' => $args['description'] ?? '',
            );
            if (isset($args['input_attrs'])) $control_args['input_attrs'] = $args['input_attrs'];
            $wp_customize->add_control($id, $control_args);
        }
    }
}





// -------------------------------------------------------------------------
// PAGE SETTINGS CUSTOMIZER
// -------------------------------------------------------------------------
function lin_customizer_page($wp_customize)
{
    $wp_customize->add_section('page_settings', array(
        'title'    => "Page Settings",
        'priority' => 40,
    ));

    $page_controls = [
        'page_hero_bg' => ['label' => 'Page Hero Background Image', 'type' => 'image', 'default' => get_template_directory_uri() . '/images/main-hero-bg-default.jpg', 'description' => 'Select the background image for the hero section on pages.'],
        'page_title_font_size' => ['label' => 'Page Title Font Size', 'type' => 'number', 'default' => 60],
        'page_title_font_weight' => ['label' => 'Page Title Font Weight', 'type' => 'number', 'default' => 600]
    ];

    $wp_customize->add_setting('page_hero_bg', ['default' => $page_controls['page_hero_bg']['default'], 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'page_hero_bg', ['label' => $page_controls['page_hero_bg']['label'], 'description' => $page_controls['page_hero_bg']['description'], 'section' => 'page_settings', 'settings' => 'page_hero_bg']));

    lin_add_customizer_controls($wp_customize, 'page_settings', [
        'page_title_font_size' => $page_controls['page_title_font_size'],
        'page_title_font_weight' => $page_controls['page_title_font_weight']
    ]);
}
add_action('customize_register', 'lin_customizer_page');

// -------------------------------------------------------------------------
// PORTFOLIO SETTINGS CUSTOMIZER
// -------------------------------------------------------------------------
function lin_customizer_portfolio($wp_customize)
{
    $wp_customize->add_section('portfolio_settings', array('title' => 'Portfolio Settings', 'priority' => 50));

    $portfolio_controls = [
        'portfolio_filter_active_color' => ['label' => 'Filter Button Active Color', 'default' => '#7c3aed', 'sanitize' => 'sanitize_hex_color'],
        'portfolio_filter_inactive_color' => ['label' => 'Filter Button Inactive Border Color', 'default' => '#7c3aed', 'sanitize' => 'sanitize_hex_color'],
        'portfolio_filter_text_color' => ['label' => 'Filter Button Text Color', 'default' => '#7c3aed', 'sanitize' => 'sanitize_hex_color'],
    ];

    foreach ($portfolio_controls as $id => $args) {
        $wp_customize->add_setting($id, ['default' => $args['default'], 'sanitize_callback' => $args['sanitize']]);
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $id, ['label' => $args['label'], 'section' => 'portfolio_settings', 'settings' => $id]));
    }
}
add_action('customize_register', 'lin_customizer_portfolio');


// -------------------------------------------------------------------------
// GLOBAL SETTINGS CUSTOMIZER
// -------------------------------------------------------------------------
function lin_customizer_global_settings($wp_customize)
{
    $wp_customize->add_section('global_settings', ['title' => 'Global Settings', 'priority' => 70]);

    // --------------------------------------
    // Typography
    // --------------------------------------
    $wp_customize->add_setting('global_settings_divider_typography', [
        'sanitize_callback' => 'wp_kses_post',
    ]);
    $wp_customize->add_control(new Lin_Customize_Separator_Control($wp_customize, 'global_settings_divider_typography', [
        'label'   => 'Typography',
        'section' => 'global_settings',
    ]));

    $fonts = ['desktop' => 'body_font_size_desktop', 'tablet' => 'body_font_size_tablet', 'mobile' => 'body_font_size_mobile'];
    $defaults = ['desktop' => 16, 'tablet' => 16, 'mobile' => 14];

    foreach ($fonts as $key => $id) {
        $wp_customize->add_setting($id, ['default' => $defaults[$key], 'sanitize_callback' => 'absint']);
        $wp_customize->add_control($id, ['label' => "Body Font Size (" . ucfirst($key) . ")", 'section' => 'global_settings', 'type' => 'number']);
    }

    // --------------------------------------
    // Color Palettes
    // --------------------------------------
    $wp_customize->add_setting('global_settings_divider_color', [
        'sanitize_callback' => 'wp_kses_post',
    ]);
    $wp_customize->add_control(new Lin_Customize_Separator_Control($wp_customize, 'global_settings_divider_color', [
        'label'   => 'Color Palettes (not yet working)',
        'section' => 'global_settings',
    ]));

    // --------------------------------------
    // Global Colors
    // --------------------------------------
    $colors = [
        'primary'       => '#7c3aed',
        'secondary'     => '#22d3ee',
        'accent'        => '#f472b6',
        'neutral_light' => '#efeaf7',
        'neutral_dark'  => '#28104e',
        'text'          => '#333333',
    ];

    foreach ($colors as $id => $default) {
        $wp_customize->add_setting("global_color_{$id}", [
            'default'           => $default,
            'sanitize_callback' => 'sanitize_hex_color',
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "global_color_{$id}", [
            'label'   => ucfirst(str_replace('_', ' ', $id)),
            'section' => 'global_settings',
        ]));
    }
}
add_action('customize_register', 'lin_customizer_global_settings');


// -------------------------------------------------------------------------
// FOOTER CUSTOMIZER
// -------------------------------------------------------------------------
function lin_customizer_footer($wp_customize)
{

    $wp_customize->add_section('footer_section', array(
        'title'    => 'Footer Settings',
        'priority' => 80,
    ));

    // Company Name
    $wp_customize->add_setting('footer_company_name', array(
        'default'           => get_bloginfo('name'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_company_name', array(
        'label'    => 'Company Name',
        'section'  => 'footer_section',
        'type'     => 'text',
    ));

    // Company Description / Quote
    $wp_customize->add_setting('footer_company_desc', array(
        'default'           => 'We create modern web solutions, social media strategies, and creative designs that help your business grow online.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('footer_company_desc', array(
        'label'    => 'Company Description / Quote',
        'section'  => 'footer_section',
        'type'     => 'textarea',
    ));

    // Email
    $wp_customize->add_setting('footer_email', array(
        'default'           => 'sambanihit@gmail.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('footer_email', array(
        'label'   => 'Email Address',
        'section' => 'footer_section',
        'type'    => 'email',
    ));

    // Phone
    $wp_customize->add_setting('footer_phone', array(
        'default'           => '+63 912 345 6789',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_phone', array(
        'label'   => 'Phone Number',
        'section' => 'footer_section',
        'type'    => 'text',
    ));

    // Address
    $wp_customize->add_setting('footer_address', array(
        'default'           => 'Cebu City, Philippines',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_address', array(
        'label'   => 'Address',
        'section' => 'footer_section',
        'type'    => 'text',
    ));

    // Background Color
    $wp_customize->add_setting('footer_bg_color', array(
        'default'           => '#28104e',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_bg_color', array(
        'label'   => 'Footer Background Color',
        'section' => 'footer_section',
    )));

    // ------------------------
    // Footer Font Color
    // ------------------------
    $wp_customize->add_setting('footer_font_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_font_color', array(
        'label'   => 'Footer Font Color',
        'section' => 'footer_section',
    )));
}
add_action('customize_register', 'lin_customizer_footer');




























// -------------------------------------------------------------------------
// DYNAMIC HERO CSS
// -------------------------------------------------------------------------
function lin_dynamic_hero_css()
{
    $hero_image = get_theme_mod('hero_image', get_template_directory_uri() . '/images/main-hero-bg-default.jpg');

    $hero_heading_size = get_theme_mod('hero_heading_font_size_desktop', 64);
    $hero_subheading_size = get_theme_mod('hero_subheading_font_size_desktop', 24);

    $button_shadow = get_theme_mod('hero_button_shadow', true);
    $shadow_css = $button_shadow ? 'box-shadow: 0 8px 20px rgba(0,0,0,0.3);' : 'box-shadow: none;';

    $css = "
        .hero-section {
            background: url('{$hero_image}') center center / cover no-repeat;
        }
        .hero-content h1 {
            font-size: {$hero_heading_size}px;
        }
        .hero-content p {
            font-size: {$hero_subheading_size}px;
        }
    ";

    // Loop through hero buttons
    for ($i = 1; $i <= 2; $i++) {
        $btn_bg = get_theme_mod("hero_button_{$i}_bg_color", $i === 1 ? '#7c3aed' : '#f45aaa');
        $btn_hover = get_theme_mod("hero_button_{$i}_hover_bg_color", $i === 1 ? '#9259f3' : '#f978bb');
        $btn_text = get_theme_mod("hero_button_{$i}_text_color", '#ffffff');

        $css .= "
        .btn-hero-{$i} {
            background-color: {$btn_bg};
            color: {$btn_text};
            {$shadow_css}
        }
        .btn-hero-{$i}:hover {
            background-color: {$btn_hover};
        }
        ";
    }

    wp_add_inline_style('main', $css);
}
add_action('wp_enqueue_scripts', 'lin_dynamic_hero_css');

// Portfolio items single page should have active state in Portfolio header menu
function lin_portfolio_menu_active($classes, $item)
{
    // Check if current page is a single portfolio item
    if (is_singular('portfolio')) {

        // If menu item URL matches your portfolio page slug
        if (strpos($item->url, 'portfolio') !== false) {
            $classes[] = 'current-menu-item';
            $classes[] = 'current-menu-ancestor';
        }
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'lin_portfolio_menu_active', 10, 2);

// -------------------------------------------------------------------------
// RESPONSIVE HERO FONT CSS
// -------------------------------------------------------------------------
function lin_dynamic_hero_responsive_styles()
{
    $h_tablet = get_theme_mod('hero_heading_font_size_tablet', 48);
    $h_mobile = get_theme_mod('hero_heading_font_size_mobile', 48);
    $p_tablet = get_theme_mod('hero_subheading_font_size_tablet', 20);
    $p_mobile = get_theme_mod('hero_subheading_font_size_mobile', 16);

    $css = "
    @media(max-width:991px){.hero-content h1{font-size:{$h_tablet}px!important;}.hero-content p{font-size:{$p_tablet}px!important;}}
    @media(max-width:767px){.hero-content h1{font-size:{$h_mobile}px!important;}.hero-content p{font-size:{$p_mobile}px!important;}}
    ";
    wp_add_inline_style('main', $css);
}
add_action('wp_enqueue_scripts', 'lin_dynamic_hero_responsive_styles');

// -------------------------------------------------------------------------
// GLOBAL TYPOGRAPHY
// -------------------------------------------------------------------------
function lin_global_typography_css()
{
    $desktop = get_theme_mod('body_font_size_desktop', 16);
    $tablet  = get_theme_mod('body_font_size_tablet', 15);
    $mobile  = get_theme_mod('body_font_size_mobile', 14);
    echo "<style>
        body{font-size:{$desktop}px;}
        @media(max-width:991px){body{font-size:{$tablet}px;}}
        @media(max-width:576px){body{font-size:{$mobile}px;}}
    </style>";
}
add_action('wp_head', 'lin_global_typography_css');

// -------------------------------------------------------------------------
// PORTFOLIO AJAX FILTER & PAGINATION
// -------------------------------------------------------------------------
function lin_filter_portfolio()
{
    $category = $_POST['category'] ?? 'all';
    $paged = $_POST['page'] ?? 1;

    $args = ['post_type' => 'portfolio', 'posts_per_page' => 6, 'paged' => $paged];

    if ($category !== 'all') {
        $args['tax_query'] = [['taxonomy' => 'category', 'field' => 'slug', 'terms' => $category,]];
    }

    $query = new WP_Query($args);

    if ($query->have_posts()):
        while ($query->have_posts()): $query->the_post();
            $terms = get_the_terms(get_the_ID(), 'category'); ?>
            <div class="col-lg-4 col-md-6">
                <div>
                    <div class="lin-card">
                        <div class="lin-card-body">
                            <?php if (has_post_thumbnail()): ?>
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium', ['style' => 'width:100%;height:auto;']); ?></a>
                            <?php endif; ?>
                            <?php if ($terms): ?>
                                <div style="margin:8px 0;">
                                    <?php foreach ($terms as $term): ?>
                                        <span style="display:inline-block;background:#e0e0e0;color:#333;padding:3px 10px;border-radius:20px;font-size:12px;margin:5px 5px 0 0;"><?php echo esc_html($term->name); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <h3 class="lin-card-title">
                                <?php the_title(); ?>
                            </h3>
                            <p class="lin-card-desc">
                                <?php echo wp_trim_words(get_the_content(), 20); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    <?php endwhile;

        $total_pages = $query->max_num_pages;
        if ($total_pages > 1):
            echo '<div id="portfolio-pagination" class="col-12 text-center mt-4">';
            $current_color = get_theme_mod('portfolio_filter_active_color', '#7c3aed');
            $inactive_color = get_theme_mod('portfolio_filter_inactive_color', '#7c3aed');
            $text_color = get_theme_mod('portfolio_filter_text_color', '#7c3aed');

            if ($paged > 1) {
                $prev = $paged - 1;
                echo '<button class="btn filter-btn portfolio-arrow" data-page="' . $prev . '" style="margin:3px;background:transparent;color:' . $text_color . ';border:1px solid ' . $inactive_color . ';transition:all 0.3s;">«</button>';
            }
            for ($i = 1; $i <= $total_pages; $i++) {
                $active = ($i == $paged) ? 'active' : '';
                $bg = ($active) ? $current_color : 'transparent';
                $color = ($active) ? '#fff' : $text_color;
                $border = ($active) ? "1px solid $current_color" : "1px solid $inactive_color";
                echo '<button class="btn filter-btn ' . $active . '" data-page="' . $i . '" style="margin:3px;background:' . $bg . ';color:' . $color . ';border:' . $border . ';transition:all 0.3s;">' . $i . '</button>';
            }
            if ($paged < $total_pages) {
                $next = $paged + 1;
                echo '<button class="btn filter-btn portfolio-arrow" data-page="' . $next . '" style="margin:3px;background:transparent;color:' . $text_color . ';border:1px solid ' . $inactive_color . ';transition:all 0.3s;">»</button>';
            }
            echo '</div>';
        endif;

    else: echo '<p class="text-center">No items found.</p>';
    endif;

    wp_reset_postdata();
    wp_die();
}
add_action('wp_ajax_lin_filter_portfolio', 'lin_filter_portfolio');
add_action('wp_ajax_nopriv_lin_filter_portfolio', 'lin_filter_portfolio');

// -------------------------------------------------------------------------
// PORTFOLIO CSS
// -------------------------------------------------------------------------
function lin_portfolio_custom_css()
{ ?>
    <style>
        .portfolio-filters .filter-btn.active {
            background-color: <?php echo get_theme_mod('portfolio_filter_active_color', '#7c3aed'); ?> !important;
            color: #fff !important;
            border: 1px solid <?php echo get_theme_mod('portfolio_filter_active_color', '#7c3aed'); ?> !important;
        }

        .portfolio-filters .filter-btn:not(.active) {
            background-color: transparent !important;
            color: <?php echo get_theme_mod('portfolio_filter_text_color', '#7c3aed'); ?> !important;
            border: 1px solid <?php echo get_theme_mod('portfolio_filter_inactive_color', '#7c3aed'); ?> !important;
        }

        .portfolio-filters .filter-btn:not(.active):hover {
            background-color: <?php echo get_theme_mod('portfolio_filter_inactive_color', '#7c3aed'); ?> !important;
            color: #fff !important;
        }

        #portfolio-pagination .filter-btn:not(.active):hover {
            background-color: <?php echo get_theme_mod('portfolio_filter_inactive_color', '#7c3aed'); ?> !important;
            color: #fff !important;
            border-color: <?php echo get_theme_mod('portfolio_filter_inactive_color', '#7c3aed'); ?> !important;
        }
    </style>
<?php }
add_action('wp_head', 'lin_portfolio_custom_css');
