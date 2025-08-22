<?php
/**
 * Palmetto Scroll Snap - Settings Handler
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register settings
 */
function pss_register_settings() {
    // Register settings
    register_setting('pss_settings', 'pss_selected_pages', array(
        'type' => 'array',
        'sanitize_callback' => 'pss_sanitize_page_ids',
        'default' => array()
    ));
    
    register_setting('pss_settings', 'pss_template_mode', array(
        'type' => 'string',
        'sanitize_callback' => 'pss_sanitize_template_mode',
        'default' => 'hybrid'
    ));
    
    register_setting('pss_settings', 'pss_enable_plugin', array(
        'type' => 'string',
        'sanitize_callback' => 'pss_sanitize_checkbox',
        'default' => 'yes'
    ));
}
add_action('admin_init', 'pss_register_settings');

/**
 * Sanitize page IDs
 */
function pss_sanitize_page_ids($input) {
    if (!is_array($input)) {
        return array();
    }
    
    $sanitized = array();
    foreach ($input as $page_id) {
        $page_id = absint($page_id);
        if ($page_id > 0 && get_post($page_id)) {
            $sanitized[] = $page_id;
        }
    }
    
    return $sanitized;
}

/**
 * Sanitize template mode
 */
function pss_sanitize_template_mode($input) {
    $valid_modes = array('native', 'static', 'hybrid');
    return in_array($input, $valid_modes) ? $input : 'hybrid';
}

/**
 * Sanitize checkbox
 */
function pss_sanitize_checkbox($input) {
    return $input === 'yes' ? 'yes' : 'no';
}

/**
 * Helper function to check if plugin should be active on current page
 */
function pss_is_active_on_current_page() {
    // Check if plugin is enabled
    if (get_option('pss_enable_plugin', 'yes') !== 'yes') {
        return false;
    }
    
    // Check if we're on a singular page
    if (!is_singular('page')) {
        return false;
    }
    
    // Get selected pages
    $selected_pages = get_option('pss_selected_pages', array());
    if (empty($selected_pages)) {
        return false;
    }
    
    // Check if current page is selected
    $current_page_id = get_the_ID();
    return in_array($current_page_id, $selected_pages);
}

/**
 * Get the current template mode
 */
function pss_get_template_mode() {
    return get_option('pss_template_mode', 'hybrid');
}

/**
 * Detect if Breakdance is active
 */
function pss_is_breakdance_active() {
    // Check multiple indicators of Breakdance
    if (defined('BREAKDANCE_VERSION') || class_exists('Breakdance')) {
        return true;
    }
    
    // Check if Breakdance Zero Theme is active
    $theme = wp_get_theme();
    if ($theme->get('Name') === 'Breakdance Zero Theme' || 
        $theme->get_template() === 'breakdance-zero') {
        return true;
    }
    
    // Check for Breakdance in active plugins
    $active_plugins = get_option('active_plugins', array());
    foreach ($active_plugins as $plugin) {
        if (strpos($plugin, 'breakdance') !== false) {
            return true;
        }
    }
    
    // Check for Breakdance classes that might exist
    if (class_exists('Breakdance\\ActionsFilters') || 
        class_exists('Breakdance\\Render\\ScriptAndStyleHolder')) {
        return true;
    }
    
    return false;
}

/**
 * Detect if Elementor is active
 */
function pss_is_elementor_active() {
    return defined('ELEMENTOR_VERSION') || did_action('elementor/loaded');
}

/**
 * Determine which header/footer to use based on mode and environment
 */
function pss_should_use_native_header_footer() {
    $mode = pss_get_template_mode();
    
    switch ($mode) {
        case 'native':
            return true;
            
        case 'static':
            return false;
            
        case 'hybrid':
            // Use native if Elementor is active (testing)
            // Use static if Breakdance is active (production)
            if (pss_is_elementor_active()) {
                return true; // Use native Elementor header/footer
            }
            if (pss_is_breakdance_active()) {
                return false; // Use our static Breakdance header/footer
            }
            // Default to native if neither is detected
            return true;
            
        default:
            return true;
    }
}