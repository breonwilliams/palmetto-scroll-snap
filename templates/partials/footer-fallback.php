<?php
/**
 * Palmetto Scroll Snap - Static Breakdance Footer Fallback
 * This file contains the extracted footer from the Breakdance site
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Get plugin URL for assets
$plugin_url = plugin_dir_url(dirname(dirname(__FILE__)));
$assets_url = $plugin_url . 'assets/';
?>

<!-- Breakdance Footer Assets -->
<link rel="stylesheet" href="<?php echo $assets_url; ?>css/post-3572-defaults.css">
<link rel="stylesheet" href="<?php echo $assets_url; ?>css/post-3572.css">

<!-- Footer HTML (extracted from Breakdance) -->
<?php
// Include the extracted footer HTML
include PSS_PLUGIN_DIR . 'templates/partials/footer-extract.html';
?>

<!-- WordPress Footer Scripts -->
<?php wp_footer(); ?>