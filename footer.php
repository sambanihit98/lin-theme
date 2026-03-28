<?php
$footer_bg    = get_theme_mod('footer_bg_color', '#28104e');
$footer_color = get_theme_mod('footer_font_color', '#ffffff');
?>

<footer style="background: <?php echo esc_attr($footer_bg); ?>; color: <?php echo esc_attr($footer_color); ?>; padding:40px 0;">
    <div class="container">
        <div class="row text-center text-start text-md-center text-lg-start">

            <!-- About / Company Info -->
            <div class="col-lg-4 col-md-12 mb-4">
                <h5 style="font-weight:bold; color: <?php echo esc_attr($footer_color); ?>;">
                    <?php echo get_theme_mod('footer_company_name', get_bloginfo('name')); ?>
                </h5>
                <p><?php echo get_theme_mod('footer_company_desc', 'We create modern web solutions, social media strategies, and creative designs that help your business grow online.'); ?></p>
            </div>

            <!-- Important Links -->
            <div class="col-lg-4 col-md-12 mb-4">
                <h5 style="font-weight:bold; color: <?php echo esc_attr($footer_color); ?>;">Important Links</h5>
                <ul style="list-style:none; padding:0;">
                    <li>
                        <a href="" style="color: <?php echo esc_attr($footer_color) ?>; text-decoration:none;">
                            Privacy Policy
                        </a>
                    </li>
                    <li>
                        <a href="" style="color: <?php echo esc_attr($footer_color) ?>; text-decoration:none;">
                            Terms & Conditions
                        </a>
                    </li>
                    <li>
                        <a href="" style="color: <?php echo esc_attr($footer_color) ?>; text-decoration:none;">
                            Disclaimer
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-4 col-md-12 mb-4">
                <h5 style="font-weight:bold; color: <?php echo esc_attr($footer_color); ?>;">Contact Us</h5>
                <p>Email: <a href="mailto:<?php echo esc_attr(get_theme_mod('footer_email', 'sambanihit@gmail.com')); ?>" style="color: <?php echo esc_attr($footer_color); ?>;"><?php echo esc_html(get_theme_mod('footer_email', 'sambanihit@gmail.com')); ?></a></p>
                <p>Phone: <a href="tel:<?php echo esc_attr(get_theme_mod('footer_phone', '+639123456789')); ?>" style="color: <?php echo esc_attr($footer_color); ?>;"><?php echo esc_html(get_theme_mod('footer_phone', '+63 912 345 6789')); ?></a></p>
                <p>Address: <?php echo esc_html(get_theme_mod('footer_address', 'Bacolod City, Philippines')); ?></p>
            </div>

        </div>

        <!-- Copyright -->
        <div class="text-center pt-3 border-top" style="border-color: rgba(255,255,255,0.2);">
            <p style="margin:0; color: <?php echo esc_attr($footer_color); ?>;">&copy; <?php echo date('Y'); ?> <?php echo get_theme_mod('footer_company_name', get_bloginfo('name')); ?>. All rights reserved.</p>
            <p style="margin-top:6px; font-size:12px; color: <?php echo esc_attr($footer_color); ?>;">Developed By: <a href="https://sam-banihit.vercel.app/" target="_blank" style="color: <?php echo esc_attr($footer_color); ?>;">Sam Banihit</a></p>
        </div>

    </div>
</footer>

<!-- ------------------------------------------------------------------ -->
<!-- For sticky header menu -->
<!-- ------------------------------------------------------------------ -->

<script>
    (function($) {
        $(document).ready(function() {
            var header = $('.site-header');
            if (!header.length) return;

            var headerTransparent = header.hasClass('transparent-header'); // check if transparent enabled
            var offset = 0; // top offset

            function toggleHeaderBg() {
                if (headerTransparent) {
                    if ($(window).scrollTop() > offset) {
                        header.addClass('sticky colored');
                        header.removeClass('transparent-header'); // remove transparency
                    } else {
                        header.removeClass('colored sticky');
                        header.addClass('transparent-header'); // restore transparency
                    }
                } else {
                    // Not transparent: just sticky on scroll
                    if ($(window).scrollTop() > offset) {
                        header.addClass('sticky');
                    } else {
                        header.removeClass('sticky');
                    }
                }
            }

            // Run on scroll and on load
            $(window).on('scroll', toggleHeaderBg);
            toggleHeaderBg();
        });
    })(jQuery);
</script>

<!-- ------------------------------------------------------------------ -->
<!-- For responsive header menu -->
<!-- ------------------------------------------------------------------ -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggle = document.querySelector('.menu-toggle');
        const nav = document.querySelector('.main-nav');

        toggle.addEventListener('click', function() {
            nav.classList.toggle('active');
            const expanded = toggle.getAttribute('aria-expanded') === 'true' ? 'false' : 'true';
            toggle.setAttribute('aria-expanded', expanded);
        });
    });
</script>

<!-- ------------------------------------------------------------------ -->
<!-- For filtering in Portfolio -->
<!-- ------------------------------------------------------------------ -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const portfolioItems = document.querySelectorAll('.portfolio-item');

        filterButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                filterButtons.forEach(b => {
                    b.classList.remove('active', 'btn-primary');
                    b.classList.add('btn-outline-primary');
                });

                this.classList.add('active', 'btn-primary');
                this.classList.remove('btn-outline-primary');

                const filter = this.getAttribute('data-filter');

                portfolioItems.forEach(item => {
                    const itemCategories = item.getAttribute('data-category').split(' ');
                    if (filter === 'all' || itemCategories.includes(filter)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    });
</script>

<!-- ------------------------------------------------------------------ -->
<!-- ------------------------------------------------------------------ -->

<?php wp_footer(); ?>
</body>

</html>