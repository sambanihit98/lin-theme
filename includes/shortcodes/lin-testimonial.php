<?php

function lin_testimonial_shortcode($atts)
{
    // $atts = shortcode_atts(array(
    //     'posts_per_page' => 6,
    // ), $atts, 'lin_testimonial');

    ob_start();
?>

    <div class="lin-carousel-wrapper">
        <button class="lin-carousel-btn prev-btn" type="button" aria-label="Previous testimonial">&#10094;</button>

        <div class="lin-carousel-container">
            <div class="lin-carousel-track">
                <?php
                $testimonial_query = new WP_Query(array(
                    'post_type'      => 'testimonial',
                    // 'posts_per_page' => intval($atts['posts_per_page']),
                    'post_status'    => 'publish',
                ));

                if ($testimonial_query->have_posts()) :
                    while ($testimonial_query->have_posts()) : $testimonial_query->the_post();
                        $client_name = get_post_meta(get_the_ID(), '_lin_client_name', true);
                        $position = get_post_meta(get_the_ID(), '_lin_client_position', true);
                        $rating = get_post_meta(get_the_ID(), '_lin_client_rating', true);
                        $image_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail') ?: 'https://placehold.co/100x100';
                        $testimonial_text = get_the_content();
                ?>
                        <div class="lin-carousel-slide">
                            <div class="testimonial-card">
                                <div class="testimonial-top">
                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($client_name ?: 'Client Photo'); ?>" class="testimonial-img">
                                    <p class="testimonial-text"><?php echo esc_html($testimonial_text); ?></p>
                                </div>
                                <div class="testimonial-bottom">
                                    <h4 class="testimonial-client-name"><?php echo esc_html($client_name); ?></h4>
                                    <p class="testimonial-client-position"><?php echo esc_html($position); ?></p>
                                    <div class="testimonial-client-rating">
                                        <?php
                                        for ($i = 0; $i < intval($rating); $i++) {
                                            echo '&#9733; ';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>No testimonials found.</p>';
                endif;
                ?>
            </div>
        </div>

        <button class="lin-carousel-btn next-btn" type="button" aria-label="Next testimonial">&#10095;</button>
    </div>

<?php
    return ob_get_clean();
}
add_shortcode('lin_testimonial', 'lin_testimonial_shortcode');
