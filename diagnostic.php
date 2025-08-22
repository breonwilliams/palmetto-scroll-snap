<?php
/**
 * Palmetto Scroll Snap - Site Diagnostic Tool
 * 
 * This script analyzes your WordPress/Breakdance site to understand:
 * - How headers and footers are loaded
 * - Template structure and hooks
 * - Active theme and plugins
 * - Breakdance configuration
 * 
 * Usage: Access this file through your browser after uploading to the plugin folder
 * URL: yoursite.com/wp-content/plugins/palmetto-scroll-snap/diagnostic.php
 */

// Load WordPress
require_once('../../../wp-load.php');

// Ensure user is logged in and is admin
if (!current_user_can('manage_options')) {
    die('Access denied. Please log in as an administrator.');
}

// Start output
?>
<!DOCTYPE html>
<html>
<head>
    <title>Palmetto Scroll Snap - Site Diagnostic</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            line-height: 1.6;
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
            background: #f5f5f5;
        }
        .diagnostic-container {
            background: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        h1 {
            color: #333;
            border-bottom: 3px solid #1a7efb;
            padding-bottom: 10px;
        }
        h2 {
            color: #1a7efb;
            margin-top: 30px;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 10px;
        }
        .info-block {
            background: #f8f9fa;
            border-left: 4px solid #1a7efb;
            padding: 15px;
            margin: 15px 0;
        }
        .code-block {
            background: #282c34;
            color: #abb2bf;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
            font-family: 'Courier New', monospace;
            font-size: 14px;
        }
        .success {
            color: #28a745;
            font-weight: bold;
        }
        .warning {
            color: #ffc107;
            font-weight: bold;
        }
        .error {
            color: #dc3545;
            font-weight: bold;
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        .data-table th,
        .data-table td {
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd;
        }
        .data-table th {
            background: #f8f9fa;
            font-weight: 600;
        }
        .copy-button {
            background: #1a7efb;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }
        .copy-button:hover {
            background: #0056b3;
        }
        #json-output {
            display: none;
        }
    </style>
</head>
<body>
    <div class="diagnostic-container">
        <h1>🔍 Palmetto Scroll Snap - Site Diagnostic Report</h1>
        <p>Generated: <?php echo current_time('Y-m-d H:i:s'); ?></p>
        
        <?php
        // Collect diagnostic data
        $diagnostic_data = array();
        
        // 1. WordPress Environment
        $diagnostic_data['wordpress'] = array(
            'version' => get_bloginfo('version'),
            'site_url' => get_site_url(),
            'home_url' => get_home_url(),
            'is_multisite' => is_multisite(),
            'active_theme' => wp_get_theme()->get('Name'),
            'theme_version' => wp_get_theme()->get('Version'),
            'theme_template' => get_template(),
            'theme_stylesheet' => get_stylesheet(),
            'template_directory' => get_template_directory(),
            'stylesheet_directory' => get_stylesheet_directory(),
        );
        ?>
        
        <h2>1. WordPress Environment</h2>
        <table class="data-table">
            <tr><th>Property</th><th>Value</th></tr>
            <?php foreach($diagnostic_data['wordpress'] as $key => $value): ?>
            <tr>
                <td><?php echo ucwords(str_replace('_', ' ', $key)); ?></td>
                <td><?php echo is_bool($value) ? ($value ? 'Yes' : 'No') : esc_html($value); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        
        <?php
        // 2. Active Plugins
        $active_plugins = get_option('active_plugins');
        $plugin_info = array();
        foreach($active_plugins as $plugin) {
            $plugin_data = get_plugin_data(WP_PLUGIN_DIR . '/' . $plugin);
            $plugin_info[] = array(
                'name' => $plugin_data['Name'],
                'version' => $plugin_data['Version'],
                'file' => $plugin,
            );
        }
        $diagnostic_data['plugins'] = $plugin_info;
        ?>
        
        <h2>2. Active Plugins</h2>
        <table class="data-table">
            <tr><th>Plugin Name</th><th>Version</th><th>File</th></tr>
            <?php foreach($plugin_info as $plugin): ?>
            <tr>
                <td><?php echo esc_html($plugin['name']); ?></td>
                <td><?php echo esc_html($plugin['version']); ?></td>
                <td><?php echo esc_html($plugin['file']); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        
        <?php
        // 3. Breakdance Detection
        $breakdance_info = array(
            'is_active' => defined('BREAKDANCE_VERSION') || class_exists('Breakdance'),
            'version' => defined('BREAKDANCE_VERSION') ? BREAKDANCE_VERSION : 'Not detected',
            'has_breakdance_class' => class_exists('Breakdance'),
            'has_breakdance_functions' => function_exists('breakdance_get_header'),
            'breakdance_constants' => array(),
        );
        
        // Check for Breakdance constants
        $constants = get_defined_constants(true);
        if (isset($constants['user'])) {
            foreach($constants['user'] as $name => $value) {
                if (strpos($name, 'BREAKDANCE') !== false) {
                    $breakdance_info['breakdance_constants'][$name] = $value;
                }
            }
        }
        
        $diagnostic_data['breakdance'] = $breakdance_info;
        ?>
        
        <h2>3. Breakdance Detection</h2>
        <div class="info-block">
            <p>Breakdance Active: <span class="<?php echo $breakdance_info['is_active'] ? 'success' : 'error'; ?>">
                <?php echo $breakdance_info['is_active'] ? 'YES' : 'NO'; ?>
            </span></p>
            <p>Version: <?php echo esc_html($breakdance_info['version']); ?></p>
            <p>Breakdance Class Exists: <?php echo $breakdance_info['has_breakdance_class'] ? 'Yes' : 'No'; ?></p>
            <p>Breakdance Functions Exist: <?php echo $breakdance_info['has_breakdance_functions'] ? 'Yes' : 'No'; ?></p>
        </div>
        
        <?php if (!empty($breakdance_info['breakdance_constants'])): ?>
        <h3>Breakdance Constants:</h3>
        <div class="code-block">
            <?php foreach($breakdance_info['breakdance_constants'] as $name => $value): ?>
            <?php echo esc_html($name); ?> = <?php echo esc_html(print_r($value, true)); ?><br>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        
        <?php
        // 4. Template Hierarchy
        global $wp_filter;
        $template_hooks = array(
            'template_redirect' => array(),
            'template_include' => array(),
            'get_header' => array(),
            'get_footer' => array(),
            'wp_head' => array(),
            'wp_footer' => array(),
        );
        
        foreach($template_hooks as $hook => $data) {
            if (isset($wp_filter[$hook])) {
                foreach($wp_filter[$hook] as $priority => $callbacks) {
                    foreach($callbacks as $callback) {
                        $callback_name = 'Unknown';
                        if (is_array($callback['function'])) {
                            if (is_object($callback['function'][0])) {
                                $callback_name = get_class($callback['function'][0]) . '::' . $callback['function'][1];
                            } else {
                                $callback_name = $callback['function'][0] . '::' . $callback['function'][1];
                            }
                        } elseif (is_string($callback['function'])) {
                            $callback_name = $callback['function'];
                        }
                        $template_hooks[$hook][] = array(
                            'priority' => $priority,
                            'callback' => $callback_name,
                        );
                    }
                }
            }
        }
        $diagnostic_data['hooks'] = $template_hooks;
        ?>
        
        <h2>4. Template Hooks</h2>
        <?php foreach($template_hooks as $hook => $callbacks): ?>
        <h3><?php echo esc_html($hook); ?> (<?php echo count($callbacks); ?> callbacks)</h3>
        <?php if (!empty($callbacks)): ?>
        <div class="code-block">
            <?php foreach($callbacks as $cb): ?>
            Priority <?php echo $cb['priority']; ?>: <?php echo esc_html($cb['callback']); ?><br>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>
        
        <?php
        // 5. Current Page Template Info
        $page_info = array(
            'is_front_page' => is_front_page(),
            'is_home' => is_home(),
            'is_page' => is_page(),
            'page_template' => get_page_template_slug(),
            'current_template' => '',
            'body_classes' => get_body_class(),
        );
        
        // Try to get current template
        if (is_page()) {
            $page_info['page_id'] = get_the_ID();
            $page_info['page_title'] = get_the_title();
        }
        
        $diagnostic_data['current_page'] = $page_info;
        ?>
        
        <h2>5. Current Page Information</h2>
        <div class="info-block">
            <p>Is Front Page: <?php echo $page_info['is_front_page'] ? 'Yes' : 'No'; ?></p>
            <p>Is Home: <?php echo $page_info['is_home'] ? 'Yes' : 'No'; ?></p>
            <p>Is Page: <?php echo $page_info['is_page'] ? 'Yes' : 'No'; ?></p>
            <?php if (isset($page_info['page_id'])): ?>
            <p>Page ID: <?php echo $page_info['page_id']; ?></p>
            <p>Page Title: <?php echo esc_html($page_info['page_title']); ?></p>
            <?php endif; ?>
            <p>Page Template: <?php echo $page_info['page_template'] ?: 'Default'; ?></p>
        </div>
        
        <?php
        // 6. Header/Footer Analysis
        $header_footer_info = array(
            'header_file' => '',
            'footer_file' => '',
            'uses_get_header' => false,
            'uses_get_footer' => false,
            'header_functions' => array(),
            'footer_functions' => array(),
        );
        
        // Check for header/footer files
        $header_files = array(
            get_stylesheet_directory() . '/header.php',
            get_template_directory() . '/header.php',
            get_stylesheet_directory() . '/header-breakdance.php',
            get_template_directory() . '/header-breakdance.php',
        );
        
        $footer_files = array(
            get_stylesheet_directory() . '/footer.php',
            get_template_directory() . '/footer.php',
            get_stylesheet_directory() . '/footer-breakdance.php',
            get_template_directory() . '/footer-breakdance.php',
        );
        
        foreach($header_files as $file) {
            if (file_exists($file)) {
                $header_footer_info['header_file'] = $file;
                break;
            }
        }
        
        foreach($footer_files as $file) {
            if (file_exists($file)) {
                $header_footer_info['footer_file'] = $file;
                break;
            }
        }
        
        // Check for Breakdance-specific functions
        $breakdance_functions = array(
            'breakdance_get_header',
            'breakdance_get_footer',
            'breakdance_header',
            'breakdance_footer',
            'Breakdance\\Render\\render_header',
            'Breakdance\\Render\\render_footer',
        );
        
        foreach($breakdance_functions as $func) {
            if (function_exists($func)) {
                $header_footer_info['header_functions'][] = $func;
            }
        }
        
        $diagnostic_data['header_footer'] = $header_footer_info;
        ?>
        
        <h2>6. Header/Footer Analysis</h2>
        <div class="info-block">
            <p><strong>Header File:</strong> <?php echo $header_footer_info['header_file'] ?: 'Not found'; ?></p>
            <p><strong>Footer File:</strong> <?php echo $header_footer_info['footer_file'] ?: 'Not found'; ?></p>
            <?php if (!empty($header_footer_info['header_functions'])): ?>
            <p><strong>Available Functions:</strong></p>
            <div class="code-block">
                <?php foreach($header_footer_info['header_functions'] as $func): ?>
                <?php echo esc_html($func); ?><br>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
        
        <?php
        // 7. Breakdance Template Detection
        if ($breakdance_info['is_active']) {
            $bd_template_info = array(
                'breakdance_mode' => '',
                'template_type' => '',
                'global_settings' => array(),
            );
            
            // Try to get Breakdance mode
            if (class_exists('Breakdance\\Config')) {
                $bd_template_info['breakdance_mode'] = method_exists('Breakdance\\Config', 'get_mode') ? 
                    \Breakdance\Config::get_mode() : 'Unknown';
            }
            
            // Check for Breakdance templates
            if (function_exists('breakdance_get_template')) {
                $bd_template_info['template_function_exists'] = true;
            }
            
            // Get Breakdance global settings if available
            $bd_settings = get_option('breakdance_global_settings');
            if ($bd_settings) {
                $bd_template_info['global_settings'] = array(
                    'has_settings' => true,
                    'settings_count' => count($bd_settings),
                );
            }
            
            $diagnostic_data['breakdance_templates'] = $bd_template_info;
        ?>
        
        <h2>7. Breakdance Template System</h2>
        <div class="info-block">
            <p><strong>Breakdance Mode:</strong> <?php echo esc_html($bd_template_info['breakdance_mode']); ?></p>
            <p><strong>Template Function Exists:</strong> <?php echo isset($bd_template_info['template_function_exists']) ? 'Yes' : 'No'; ?></p>
            <p><strong>Has Global Settings:</strong> <?php echo $bd_template_info['global_settings']['has_settings'] ?? false ? 'Yes' : 'No'; ?></p>
        </div>
        <?php } ?>
        
        <?php
        // 8. Recommendations based on findings
        $recommendations = array();
        
        if ($breakdance_info['is_active']) {
            $recommendations[] = "Breakdance is active. Use Breakdance-specific template loading methods.";
            
            if (!empty($header_footer_info['header_functions'])) {
                $recommendations[] = "Breakdance template functions found. Consider using: " . implode(', ', $header_footer_info['header_functions']);
            }
            
            if (!$header_footer_info['header_file']) {
                $recommendations[] = "No traditional header.php file found. Breakdance likely uses its own template system.";
            }
        } else {
            $recommendations[] = "Breakdance not detected. Use standard WordPress template functions.";
        }
        
        $diagnostic_data['recommendations'] = $recommendations;
        ?>
        
        <h2>8. Recommendations</h2>
        <div class="info-block">
            <?php foreach($recommendations as $rec): ?>
            <p>✓ <?php echo esc_html($rec); ?></p>
            <?php endforeach; ?>
        </div>
        
        <!-- JSON Output for copying -->
        <h2>9. Complete Diagnostic Data (JSON)</h2>
        <p>Copy this data and share it for analysis:</p>
        <button class="copy-button" onclick="copyToClipboard()">Copy Diagnostic Data</button>
        <textarea id="json-output"><?php echo json_encode($diagnostic_data, JSON_PRETTY_PRINT); ?></textarea>
        <div class="code-block" style="max-height: 400px; overflow-y: auto;">
            <pre><?php echo esc_html(json_encode($diagnostic_data, JSON_PRETTY_PRINT)); ?></pre>
        </div>
    </div>
    
    <script>
    function copyToClipboard() {
        var textarea = document.getElementById('json-output');
        textarea.style.display = 'block';
        textarea.select();
        document.execCommand('copy');
        textarea.style.display = 'none';
        
        var button = document.querySelector('.copy-button');
        button.textContent = 'Copied!';
        setTimeout(function() {
            button.textContent = 'Copy Diagnostic Data';
        }, 2000);
    }
    </script>
</body>
</html>