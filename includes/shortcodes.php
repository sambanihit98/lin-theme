<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// -------------------------------------------------------------------------
// SHORTCODES
// -------------------------------------------------------------------------

require_once get_template_directory() . '/includes/shortcodes/lin-wrapper.php';
require_once get_template_directory() . '/includes/shortcodes/lin-row.php';
require_once get_template_directory() . '/includes/shortcodes/lin-column.php';

require_once get_template_directory() . '/includes/shortcodes/lin-heading.php';
require_once get_template_directory() . '/includes/shortcodes/lin-subheading.php';

require_once get_template_directory() . '/includes/shortcodes/lin-divider.php';
require_once get_template_directory() . '/includes/shortcodes/lin-spacer.php';

require_once get_template_directory() . '/includes/shortcodes/lin-body-text.php';
require_once get_template_directory() . '/includes/shortcodes/lin-button.php';

require_once get_template_directory() . '/includes/shortcodes/lin-slider.php';
require_once get_template_directory() . '/includes/shortcodes/lin-cta.php';

require_once get_template_directory() . '/includes/shortcodes/lin-card.php';
require_once get_template_directory() . '/includes/shortcodes/lin-testimonial.php';
require_once get_template_directory() . '/includes/shortcodes/lin-latest-portfolio.php';
