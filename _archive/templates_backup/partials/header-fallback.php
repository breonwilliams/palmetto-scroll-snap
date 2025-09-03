<?php
/**
 * Palmetto Scroll Snap - Static Breakdance Header Fallback
 * This file contains the extracted header from the Breakdance site
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Get plugin URL for assets
$plugin_url = plugin_dir_url(dirname(dirname(__FILE__)));
$assets_url = $plugin_url . 'assets/';
?>

<!-- Breakdance Header Assets -->
<link rel="stylesheet" href="<?php echo $assets_url; ?>css/awesome-menu.css">
<link rel="stylesheet" href="<?php echo $assets_url; ?>css/post-322-defaults.css">
<link rel="stylesheet" href="<?php echo $assets_url; ?>css/post-322.css">
<link rel="stylesheet" href="<?php echo $assets_url; ?>css/global-settings.css">
<link rel="stylesheet" href="<?php echo $assets_url; ?>css/presets.css">
<link rel="stylesheet" href="<?php echo $assets_url; ?>css/selectors.css">

<!-- Header HTML (extracted from Breakdance) -->
<?php
// Include the extracted header HTML
include PSS_PLUGIN_DIR . 'templates/partials/header-extract.html';
?>

<!-- Header Scripts -->
<script src="<?php echo $assets_url; ?>js/header-builder.js"></script>
<script src="<?php echo $assets_url; ?>js/awesome-menu.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize header builder
    if (typeof BreakdanceHeaderBuilder !== 'undefined') {
        new BreakdanceHeaderBuilder(".breakdance .bde-header-builder-322-100", "100", false);
    }
    
    // Initialize awesome menu
    if (typeof AwesomeMenu !== 'undefined') {
        new AwesomeMenu(".breakdance .bde-menu-322-115 .breakdance-menu", {
            desktop: {
                layout: {
                    name: "horizontal",
                    type: "auto"
                },
                animation: {
                    duration: 0.3,
                    easingOpen: "ease",
                    easingClose: "ease"
                }
            },
            mobile: {
                openOn: "click",
                closeOn: "outside_click",
                animation: {
                    duration: 0.3,
                    easingOpen: "ease",
                    easingClose: "ease"
                }
            },
            dropdown: {
                animation: {
                    easingOpen: "ease",
                    easingClose: "ease",
                    duration: 0.3
                }
            }
        });
    }
});
</script>