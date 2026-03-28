<?php get_header(); ?>

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

<section class="page-wrap" style="padding: 40px 0px 40px 0px;">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium', array('class' => 'card-img-top', 'style' => 'width:100%; height:auto;')); ?>
                    </a>
                <?php endif; ?>
            </div>
            <div class="col-lg-5">
                <?php
                //ACF fields
                $website = get_field('website');
                $location = get_field('location');
                $client = get_field('client');
                $project_date = get_field('project_date');
                ?>

                <?php if ($website) : ?>
                    <div class="card mb-3" style="border:1px solid #ddd; border-radius:15px; box-shadow:0 4px 10px rgba(0,0,0,0.05); padding:20px;">
                        <p class="mb-2"><strong>Website:</strong></p>
                        <p class="mb-0"><a href="<?php echo esc_url($website); ?>" target="_blank"><?php echo esc_html($website); ?></a></p>
                    </div>
                <?php endif; ?>

                <?php if ($location) : ?>
                    <div class="card mb-3" style="border:1px solid #ddd; border-radius:15px; box-shadow:0 4px 10px rgba(0,0,0,0.05); padding:20px;">
                        <p class="mb-2"><strong>Location:</strong></p>
                        <p class="mb-0"><?php echo esc_html($location); ?></p>
                    </div>
                <?php endif; ?>

                <?php if ($client) : ?>
                    <div class="card mb-3" style="border:1px solid #ddd; border-radius:15px; box-shadow:0 4px 10px rgba(0,0,0,0.05); padding:20px;">
                        <p class="mb-2"><strong>Client:</strong></p>
                        <p class="mb-0"><?php echo esc_html($client); ?></p>
                    </div>
                <?php endif; ?>

                <?php if ($project_date) :

                    $date_obj = DateTime::createFromFormat('d/m/Y', $project_date);
                    if (!$date_obj) {
                        $date_obj = new DateTime($project_date);
                    }
                ?>
                    <div class="card mb-3" style="border:1px solid #ddd; border-radius:15px; box-shadow:0 4px 10px rgba(0,0,0,0.05); padding:15px;">
                        <p class="mb-2"><strong>Date:</strong></p>
                        <p class="mb-0">
                            <?php echo $date_obj ? $date_obj->format('F j, Y') : esc_html($project_date); ?>
                        </p>
                    </div>
                <?php endif; ?>

                <?php
                $categories = get_the_terms(get_the_ID(), 'category');
                if ($categories && !is_wp_error($categories)) :
                ?>
                    <div class="card mb-3" style="border:1px solid #ddd; border-radius:15px; box-shadow:0 4px 10px rgba(0,0,0,0.05); padding:15px;">
                        <p class="mb-2"><strong>Categories:</strong></p>
                        <p class="mb-0">
                            <?php foreach ($categories as $cat) : ?>
                                <span style="background:#e0e0e0; color:#333; padding:3px 10px; border-radius:20px; margin-right:5px; font-size:12px;">
                                    <?php echo esc_html($cat->name); ?>
                                </span>
                            <?php endforeach; ?>
                        </p>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <div class="container mt-0 mt-lg-5">
        <div class="portfolio-content">
            <?php the_content(); ?>
        </div>
    </div>

</section>

<?php get_footer(); ?>