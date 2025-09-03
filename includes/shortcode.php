<?php
/**
 * Palmetto Scroll Snap - Shortcode Implementation
 * Use [palmetto_scroll_snap] to insert the scroll snap content
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register the shortcode
 */
function pss_register_shortcode() {
    add_shortcode('palmetto_scroll_snap', 'pss_render_scroll_snap_shortcode');
}
add_action('init', 'pss_register_shortcode');

/**
 * Render the scroll snap content via shortcode
 */
function pss_render_scroll_snap_shortcode($atts) {
    // Parse attributes
    $atts = shortcode_atts(array(
        'sections' => 'all', // all, or comma-separated list
        'height' => '100vh',
        'mobile' => 'disabled', // disabled or enabled
        'template' => 'full', // full or content
    ), $atts);
    
    // Start output buffering
    ob_start();
    
    // Include the appropriate template
    // Only use existing templates after cleanup
    $template_file = PSS_PLUGIN_DIR . 'templates/palmetto-scroll-final.php';
    
    if (file_exists($template_file)) {
        include $template_file;
    } else {
        echo '<p>Error: Template file not found.</p>';
    }
    
    // Return the buffered content
    return ob_get_clean();
}

/**
 * Add a Breakdance-compatible filter to inject content
 */
function pss_inject_scroll_content($content) {
    // Check if we should inject on this page
    if (!function_exists('pss_is_active_on_current_page')) {
        require_once PSS_PLUGIN_DIR . 'admin/settings-handler.php';
    }
    
    if (!pss_is_active_on_current_page()) {
        return $content;
    }
    
    // Check if we're in the main content area
    if (!in_the_loop() || !is_main_query()) {
        return $content;
    }
    
    // Get the scroll snap content - use final template
    $scroll_content = pss_render_scroll_snap_shortcode(array(
        'template' => 'final'
    ));
    
    // Replace the content entirely or append based on settings
    $mode = get_option('pss_content_mode', 'replace');
    
    if ($mode === 'replace') {
        return $scroll_content;
    } else {
        return $content . $scroll_content;
    }
}

// Hook into the content with high priority
add_filter('the_content', 'pss_inject_scroll_content', 999999);