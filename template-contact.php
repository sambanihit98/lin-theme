<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>

<section class="page-hero" style="
    background: url('<?php echo esc_url(get_theme_mod('page_hero_bg', get_template_directory_uri() . '/images/page-hero-default.jpg')); ?>') center top / cover no-repeat;
">
    <div>
        <div>
            <h1 style="
                font-size: <?php echo get_theme_mod('page_title_font_size', 60) ?>px; 
                font-weight: <?php echo get_theme_mod('page_title_font_weight', 600); ?>;
            ">
                <?php the_title(); ?>
            </h1>
        </div>
    </div>
</section>

<section class="page-wrap">
    <?php get_template_part('includes/section', 'content'); ?>
</section>

<?php get_footer(); ?>