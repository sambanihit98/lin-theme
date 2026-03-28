<?php
/* Template Name: Portfolio*/
get_header();
?>

<section class="page-hero" style="
    background: url('<?php echo esc_url(get_theme_mod('page_hero_bg', get_template_directory_uri() . '/images/main-hero-bg-default.jpg')); ?>') center center / cover no-repeat;
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

<section class="portfolio-items" style="padding: 80px 0;">

    <!-- Filters -->
    <div class="portfolio-filters mb-4 text-center">
        <button class="btn btn-sm btn-primary filter-btn active" data-category="all" style="margin:5px;">All</button>

        <?php
        $categories = get_terms(array(
            'taxonomy' => 'category',
            'hide_empty' => true
        ));

        foreach ($categories as $cat) :
        ?>
            <button class="btn btn-sm btn-outline-primary filter-btn"
                data-category="<?php echo esc_attr($cat->slug); ?>" style="margin:5px;">
                <?php echo esc_html($cat->name); ?>
            </button>
        <?php endforeach; ?>
    </div>

    <div class="container">
        <div id="portfolio-container" class="row justify-content-center align-items-center g-4">
            <?php
            // Latest 6 items
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;

            $args = array(
                'post_type' => 'portfolio',
                'posts_per_page' => 6,
                'paged' => $paged
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $terms = get_the_terms(get_the_ID(), 'category'); ?>
                    <div class="col-lg-4 col-md-6">
                        <div>
                            <div class="lin-card">
                                <div class="lin-card-body">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('medium', ['style' => 'width:100%; height:auto;']); ?>
                                        </a>
                                    <?php endif; ?>

                                    <?php if ($terms) : ?>
                                        <div style="margin:8px 0;">
                                            <?php foreach ($terms as $term) : ?>
                                                <span style="display:inline-block; background:#e0e0e0; color:#333; padding:3px 10px; border-radius:20px; font-size:12px; margin:5px 5px 0 0;">
                                                    <?php echo esc_html($term->name); ?>
                                                </span>
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

                // Initial Pagination
                $total_pages = $query->max_num_pages;
                if ($total_pages > 1) :
                    echo '<div id="portfolio-pagination" class="col-12 text-center mt-4">';

                    $current_color = get_theme_mod('portfolio_filter_active_color', '#021b54');
                    $inactive_color = get_theme_mod('portfolio_filter_inactive_color', '#021b54');
                    $text_color = get_theme_mod('portfolio_filter_text_color', '#ffffff');

                    // Previous button
                    if ($paged > 1) {
                        $prev_page = $paged - 1;
                        echo '<button class="btn filter-btn" data-page="' . $prev_page . '" style="margin:3px; background:' . $inactive_color . '; color:' . $text_color . '; border:1px solid ' . $inactive_color . ';">«</button>';
                    }

                    // Number buttons
                    for ($i = 1; $i <= $total_pages; $i++) {
                        $active = ($i == $paged) ? 'active' : '';
                        $bg = ($active) ? $current_color : 'transparent';
                        $color = ($active) ? '#fff' : $text_color;
                        $border = ($active) ? "1px solid $current_color" : "1px solid $inactive_color";

                        echo '<button class="btn filter-btn ' . $active . '" data-page="' . $i . '" style="margin:3px; background:' . $bg . '; color:' . $color . '; border:' . $border . ';">' . $i . '</button>';
                    }

                    // Next button
                    if ($paged < $total_pages) {
                        $next_page = $paged + 1;
                        echo '<button class="btn filter-btn" data-page="' . $next_page . '" style="margin:3px; background:' . $inactive_color . '; color:' . $text_color . '; border:1px solid ' . $inactive_color . ';">»</button>';
                    }

                    echo '</div>';
                endif;

            else :
                echo '<p class="text-center">No items found.</p>';
            endif;

            wp_reset_postdata();
            ?>
        </div>
    </div>

</section>

<section class="page-wrap">
    <?php get_template_part('includes/section', 'content'); ?>
</section>

<?php get_footer(); ?>