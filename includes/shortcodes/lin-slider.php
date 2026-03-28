<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// ---------------------------------------------------------------------------
// Slider Shortcode with Nested Items: [lin_slider] + [lin_slider_item]
// ---------------------------------------------------------------------------

// Enqueue CSS and JS
function lin_slider_assets_nested()
{
    // CSS styles are in style.css (2.2. Lin Slider)
    // JS
    wp_register_script('lin-slider-script', false);
    wp_add_inline_script('lin-slider-script', '
        window.addEventListener("load", () => {

            function getMaxVisible(container) {
                const width = window.innerWidth;

                const maxD = parseInt(container.dataset.maxD) || 6;
                const maxT = parseInt(container.dataset.maxT) || 4;
                const maxM = parseInt(container.dataset.maxM) || 2;

                if (width <= 768) return maxM;      // mobile
                if (width <= 1024) return maxT;     // tablet
                return maxD;                        // desktop
            }

            function initSlider(track) {
                const container = track.parentElement;
                const gap = 10;

                // Remove clones (important on resize)
                track.querySelectorAll(".clone").forEach(el => el.remove());

                const items = Array.from(track.querySelectorAll(".lin-slider-item:not(.clone)"));
                const maxVisible = getMaxVisible(container);
                const containerWidth = container.offsetWidth;

                // Reset transform
                track.style.transform = "translateX(0px)";
                track.style.transition = "none";

                // Get shadow attribute
                const shadow = container.dataset.shadow === "true";

                items.forEach(item => {
                    item.style.height = track.style.height; // keep height
                    // Apply shadow conditionally
                    if(shadow){
                        item.style.boxShadow = "0 4px 8px rgba(0,0,0,0.2)";
                    } else {
                        item.style.boxShadow = "none";
                    }
                });

                // No scroll case
                if (items.length <= maxVisible) {
                    const totalGap = gap * (items.length - 1);
                    const itemWidth = (containerWidth - totalGap) / items.length;

                    items.forEach((item, i) => {
                        item.style.width = `${itemWidth}px`;
                        item.style.marginRight = (i === items.length - 1 ? 0 : gap) + "px";
                    });

                    if (track.sliderInterval) {
                        clearInterval(track.sliderInterval);
                    }

                    return;
                }

                // Scroll case
                const totalGap = gap * (maxVisible - 1);
                const itemWidth = (containerWidth - totalGap) / maxVisible;

                items.forEach(item => {
                    item.style.width = `${itemWidth}px`;
                    item.style.marginRight = gap + "px";
                });

                // Clone first maxVisible items
                for (let i = 0; i < maxVisible; i++) {
                    const clone = items[i].cloneNode(true);
                    clone.classList.add("clone");
                    clone.style.width = `${itemWidth}px`;
                    clone.style.marginRight = gap + "px";
                    track.appendChild(clone);
                }

                let index = 0;

                function slideNext() {
                    index++;
                    const offset = index * (itemWidth + gap);

                    track.style.transition = "transform 0.5s linear";
                    track.style.transform = `translateX(-${offset}px)`;

                    if (index >= items.length) {
                        setTimeout(() => {
                            track.style.transition = "none";
                            track.style.transform = "translateX(0px)";
                            index = 0;
                            track.offsetHeight;
                            track.style.transition = "transform 0.5s linear";
                        }, 500);
                    }
                }

                if (track.sliderInterval) {
                    clearInterval(track.sliderInterval);
                }

                track.sliderInterval = setInterval(slideNext, 3000);
            }

            function initAll() {
                document.querySelectorAll(".lin-slider-track").forEach(track => {
                    initSlider(track);
                });
            }

            // Initial run
            initAll();

            // Re-run on resize
            window.addEventListener("resize", () => {
                initAll();
            });

        });
    ');
    wp_enqueue_script('lin-slider-script');
}
add_action('wp_enqueue_scripts', 'lin_slider_assets_nested');


// ---------------------------------------------------------------------------
// Parent Shortcode
// ---------------------------------------------------------------------------
function lin_slider_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(array(
        'max-d' => 6,
        'max-t' => 4,
        'max-m' => 2,
        'height' => '150px',
        'shadow' => 'false',
    ), $atts, 'lin_slider');

    $content = do_shortcode(shortcode_unautop($content));

    ob_start();
?>
    <section class="section-wrap">
        <div class="lin-slider-container"
            data-max-d="<?php echo esc_attr($atts['max-d']); ?>"
            data-max-t="<?php echo esc_attr($atts['max-t']); ?>"
            data-max-m="<?php echo esc_attr($atts['max-m']); ?>"
            data-shadow="<?php echo esc_attr($atts['shadow']); ?>">
            <div class="lin-slider-track" style="height: <?php echo esc_attr($atts['height']); ?>; ">
                <?php echo $content; ?>
            </div>
        </div>
    </section>
<?php
    return ob_get_clean();
}
add_shortcode('lin_slider', 'lin_slider_shortcode');


// ---------------------------------------------------------------------------
// Child Shortcode
// ---------------------------------------------------------------------------
function lin_slider_item_shortcode($atts)
{
    $atts = shortcode_atts(array(
        'src' => '',
        'bg-color' => '',
        'padding' => '20px',
    ), $atts, 'lin_slider_item');

    if (empty($atts['src'])) return '';

    $style = '';
    if ($atts['bg-color'])       $style .= 'background:' . esc_attr($atts['bg-color']) . ';';
    if ($atts['padding'])        $style .= 'padding:' . esc_attr($atts['padding']) . ';';

    ob_start();
?>
    <div class="lin-slider-item" style="<?php echo $style; ?>">
        <img src="<?php echo esc_url($atts['src']); ?>" alt="Slider Item">
    </div>
<?php
    return ob_get_clean();
}
add_shortcode('lin_slider_item', 'lin_slider_item_shortcode');
