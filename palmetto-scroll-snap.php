<?php
/**
 * Plugin Name: Palmetto Scroll Snap
 * Plugin URI: https://palmettowildlife.com
 * Description: Static template with magnetic scroll snap effect for Palmetto Wildlife Extractors
 * Version: 2.0.0
 * Author: Palmetto Wildlife
 * License: GPL v2 or later
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('PSS_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('PSS_PLUGIN_URL', plugin_dir_url(__FILE__));
define('PSS_VERSION', '2.0.0');

/**
 * Main plugin class
 */
class PalmettoScrollSnap {
    
    private static $instance = null;
    
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    private function __construct() {
        $this->load_dependencies();
        $this->init_hooks();
    }
    
    /**
     * Get plugin image URL
     * Helper function to get image URLs from the plugin's assets directory
     * 
     * @param string $image_path Path to image relative to assets/images/
     * @return string Full URL to the image
     */
    public static function get_image_url($image_path) {
        return plugin_dir_url(__FILE__) . 'assets/images/' . $image_path;
    }
    
    private function load_dependencies() {
        // Load admin files
        if (is_admin()) {
            require_once PSS_PLUGIN_DIR . 'admin/settings-handler.php';
            require_once PSS_PLUGIN_DIR . 'admin/settings-page.php';
            require_once PSS_PLUGIN_DIR . 'admin/diagnostic-page.php';
        }
        
        // Load shortcode functionality
        require_once PSS_PLUGIN_DIR . 'includes/shortcode.php';
    }
    
    private function init_hooks() {
        // Check if we should use template override or content injection
        $injection_mode = get_option('pss_injection_mode', 'content');
        
        if ($injection_mode === 'template') {
            // Override template for selected pages (old method)
            add_filter('template_include', array($this, 'load_custom_template'), 999999);
        }
        // Content injection is handled by shortcode.php
        
        // Add admin menu
        add_action('admin_menu', array($this, 'add_admin_menu'));
        
        // Add admin notice
        add_action('admin_notices', array($this, 'admin_notice'));
    }
    
    /**
     * Add admin menu
     */
    public function add_admin_menu() {
        // Main settings page
        add_options_page(
            'Palmetto Scroll Snap Settings',
            'Scroll Snap Pages',
            'manage_options',
            'palmetto-scroll-snap',
            'pss_render_settings_page'
        );
        
        // Diagnostic page
        add_submenu_page(
            'tools.php',
            'Scroll Snap Diagnostics',
            'Scroll Snap Diagnostics',
            'manage_options',
            'pss-diagnostics',
            'pss_render_diagnostic_page'
        );
    }
    
    /**
     * Load custom template for selected pages
     */
    public function load_custom_template($template) {
        // Load settings handler functions
        require_once PSS_PLUGIN_DIR . 'admin/settings-handler.php';
        
        // Check if plugin should be active on current page
        if (pss_is_active_on_current_page()) {
            // Choose template based on environment
            if (pss_is_breakdance_active()) {
                // Use Breakdance-specific template
                $custom_template = PSS_PLUGIN_DIR . 'templates/palmetto-home-breakdance.php';
            } else {
                // Use hybrid template for other environments
                $custom_template = PSS_PLUGIN_DIR . 'templates/palmetto-home-hybrid.php';
            }
            
            if (file_exists($custom_template)) {
                return $custom_template;
            }
        }
        return $template;
    }
    
    /**
     * Admin notice
     */
    public function admin_notice() {
        $screen = get_current_screen();
        if ($screen->id === 'plugins') {
            ?>
            <div class="notice notice-info">
                <p><strong>Palmetto Scroll Snap:</strong> This plugin replaces the home page with a static template featuring magnetic scroll snap sections.</p>
            </div>
            <?php
        }
    }
}

// Initialize plugin
add_action('plugins_loaded', function() {
    PalmettoScrollSnap::get_instance();
});