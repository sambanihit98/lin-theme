<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// ---------------------------------------------------------------------------
// Display latest 3 portfolio items
// ---------------------------------------------------------------------------
function lin_latest_portfolio_shortcode($atts)
{
    $atts = shortcode_atts(array(
        'posts' => 3,
    ), $atts, 'lin_latest_portfolio');

    $query = new WP_Query(array(
        'post_type' => 'portfolio',
        'posts_per_page' => $atts['posts'],
        'orderby' => 'date',
        'order' => 'DESC',
    ));

    $output = '<div class="row justify-content-center align-items-center g-4">';

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $terms = get_the_terms(get_the_ID(), 'category');

            $output .= '<div class="col-lg-4 col-md-6">';

            // SAME STRUCTURE AS lin-card
            $output .= '<div>';
            $output .= '<div class="lin-card">';

            // Body
            $output .= '<div class="lin-card-body">';

            // Image
            if (has_post_thumbnail()) {
                $output .= '<a href="' . get_permalink() . '">';
                $output .= get_the_post_thumbnail(get_the_ID(), 'medium');
                $output .= '</a>';
            }

            // Categories
            if ($terms && !is_wp_error($terms)) {
                $output .= '<div style="margin:8px 0;">';

                foreach ($terms as $term) {
                    $output .= '<span style="display:inline-block; background:#e0e0e0; color:#333; padding:3px 10px; border-radius:20px; font-size:12px; margin:5px 5px 0 0;">';
                    $output .= esc_html($term->name);
                    $output .= '</span>';
                }

                $output .= '</div>';
            }

            // Title
            $output .= '<h3 class="lin-card-title">' . get_the_title() . '</h3>';

            // Description
            $output .= '<p class="lin-card-desc">' . wp_trim_words(get_the_content(), 20) . '</p>';

            $output .= '</div>'; // lin-card-body
            $output .= '</div>'; // lin-card
            $output .= '</div>'; // wrapper
            $output .= '</div>'; // col
        }

        wp_reset_postdata();
    } else {
        $output .= '<div class="col-12 text-center"><p>No portfolio items found.</p></div>';
    }

    $output .= '</div>';

    return $output;
}
add_shortcode('lin_latest_portfolio', 'lin_latest_portfolio_shortcode');
