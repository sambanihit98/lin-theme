<?php
$header_classes = 'site-header';
if (get_theme_mod('header_transparent', false)) $header_classes .= ' transparent-header';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <header class="<?php echo esc_attr($header_classes); ?>">
        <div class="container d-flex align-items-center justify-content-between">

            <!-- Logo -->
            <div class="logo">
                <?php if (has_custom_logo()) : ?>
                    <?php
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                    $logo_width = get_theme_mod('logo_width', 150); // from Customizer
                    ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo esc_url($logo[0]); ?>" alt="<?php bloginfo('name'); ?>" style="max-width: <?php echo esc_attr($logo_width); ?>px; height: auto;">
                    </a>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php bloginfo('name'); ?>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Navigation Menu -->
            <?php
            wp_nav_menu(array(
                'theme_location' => 'top-menu',
                'menu_class'     => 'top-bar',
            ));
            ?>

        </div>
    </header>