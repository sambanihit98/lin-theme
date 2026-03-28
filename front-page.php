<?php get_header(); ?>

<section class="hero-section">
    <div class="hero-overlay">
        <div class="hero-content">
            <h1 style="
                font-size: <?php echo get_theme_mod('hero_heading_font_size_desktop', 64); ?>px;
                font-weight: <?php echo get_theme_mod('hero_heading_font_weight', 700); ?>;
                margin-bottom: <?php echo get_theme_mod('hero_heading_margin_bottom', 16); ?>px;
                color: <?php echo get_theme_mod('hero_heading_color', '#ffffff'); ?>;
            ">
                <?php echo esc_html(get_theme_mod('hero_headline', 'Welcome to Lin Theme')); ?>
            </h1>

            <p style="
                font-size: <?php echo get_theme_mod('hero_subheading_font_size_desktop', 18); ?>px;
                font-weight: <?php echo get_theme_mod('hero_subheading_font_weight', 400); ?>;
                margin-bottom: <?php echo get_theme_mod('hero_subheading_margin_bottom', 32); ?>px;
                color: <?php echo get_theme_mod('hero_subheading_color', '#ffffff'); ?>;
            ">
                <?php echo esc_html(get_theme_mod('hero_subheadline', 'Explore and experience a modern WordPress theme designed for you, crafted with flexibility, speed, and style to bring your website to life effortlessly')); ?>
            </p>

            <?php if (get_theme_mod('hero_button_1_enable', true)) : ?>
                <a href="<?php echo esc_url(get_theme_mod('hero_button_1_url', '#')); ?>"
                    class="btn btn-hero-1 mb-3">
                    <?php echo esc_html(get_theme_mod('hero_button_1_text', 'Get Started')); ?>
                </a>
            <?php endif; ?>

            <?php if (get_theme_mod('hero_button_2_enable', true)) : ?>
                <a href="<?php echo esc_url(get_theme_mod('hero_button_2_url', '#')); ?>"
                    class="btn btn-hero-2 mb-3">
                    <?php echo esc_html(get_theme_mod('hero_button_2_text', 'Learn More')); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="section-wrap">
    <?php get_template_part('includes/section', 'content'); ?>
</section>


<?php get_footer(); ?>