<?php
/**
 * Palmetto Scroll Snap - Diagnostic Page
 * This page provides detailed diagnostic information about the site
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Render the diagnostic page
 */
function pss_render_diagnostic_page() {
    // Check user capabilities
    if (!current_user_can('manage_options')) {
        return;
    }
    
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
    );
    
    // 2. Breakdance Detection
    $diagnostic_data['breakdance'] = array(
        'is_active' => defined('BREAKDANCE_VERSION') || class_exists('Breakdance'),
        'version' => defined('BREAKDANCE_VERSION') ? BREAKDANCE_VERSION : 'Not detected',
        'plugin_file' => '',
        'template_mode' => '',
    );
    
    // Find Breakdance plugin file
    $active_plugins = get_option('active_plugins');
    foreach($active_plugins as $plugin) {
        if (strpos($plugin, 'breakdance') !== false) {
            $diagnostic_data['breakdance']['plugin_file'] = $plugin;
            break;
        }
    }
    
    // 3. Template Information
    global $wp_filter;
    $template_filters = array();
    
    if (isset($wp_filter['template_include'])) {
        foreach($wp_filter['template_include'] as $priority => $callbacks) {
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
                } elseif (is_object($callback['function']) && is_callable($callback['function'])) {
                    $callback_name = 'Closure';
                }
                $template_filters[] = array(
                    'priority' => $priority,
                    'callback' => $callback_name,
                );
            }
        }
    }
    $diagnostic_data['template_filters'] = $template_filters;
    
    // 4. Page Templates
    $page_templates = wp_get_theme()->get_page_templates();
    $diagnostic_data['page_templates'] = $page_templates;
    
    // 5. Current Plugin Settings
    $diagnostic_data['plugin_settings'] = array(
        'selected_pages' => get_option('pss_selected_pages', array()),
        'template_mode' => get_option('pss_template_mode', 'hybrid'),
        'plugin_enabled' => get_option('pss_enable_plugin', 'yes'),
    );
    
    // 6. Test Template Loading
    $test_results = array();
    
    // Test if get_header works
    ob_start();
    $header_exists = false;
    if (function_exists('get_header')) {
        $test_results['get_header_exists'] = true;
        // Don't actually call it here as it would break the page
    }
    ob_end_clean();
    
    // Test Breakdance functions
    $breakdance_functions = array(
        'breakdance' => function_exists('breakdance'),
        'breakdance_render' => function_exists('breakdance_render'),
        'breakdance_get_header' => function_exists('breakdance_get_header'),
        'breakdance_get_footer' => function_exists('breakdance_get_footer'),
    );
    
    // Check for Breakdance render classes
    $breakdance_classes = array(
        'Breakdance\\Render\\Renderer' => class_exists('Breakdance\\Render\\Renderer'),
        'Breakdance\\Templates\\Templates' => class_exists('Breakdance\\Templates\\Templates'),
        'Breakdance\\Render\\ScriptAndStyleHolder' => class_exists('Breakdance\\Render\\ScriptAndStyleHolder'),
    );
    
    $diagnostic_data['breakdance_functions'] = $breakdance_functions;
    $diagnostic_data['breakdance_classes'] = $breakdance_classes;
    
    ?>
    
    <div class="wrap">
        <h1>🔍 Palmetto Scroll Snap - Site Diagnostics</h1>
        
        <div class="card" style="max-width: none; margin-top: 20px;">
            <h2>WordPress Environment</h2>
            <table class="widefat striped">
                <tbody>
                    <?php foreach($diagnostic_data['wordpress'] as $key => $value): ?>
                    <tr>
                        <th><?php echo ucwords(str_replace('_', ' ', $key)); ?></th>
                        <td><?php echo is_bool($value) ? ($value ? 'Yes' : 'No') : esc_html($value); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <div class="card" style="max-width: none; margin-top: 20px;">
            <h2>Breakdance Detection</h2>
            <table class="widefat striped">
                <tbody>
                    <tr>
                        <th>Breakdance Active</th>
                        <td style="color: <?php echo $diagnostic_data['breakdance']['is_active'] ? 'green' : 'red'; ?>; font-weight: bold;">
                            <?php echo $diagnostic_data['breakdance']['is_active'] ? 'YES' : 'NO'; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Version</th>
                        <td><?php echo esc_html($diagnostic_data['breakdance']['version']); ?></td>
                    </tr>
                    <tr>
                        <th>Plugin File</th>
                        <td><?php echo esc_html($diagnostic_data['breakdance']['plugin_file'] ?: 'Not found'); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="card" style="max-width: none; margin-top: 20px;">
            <h2>Breakdance Functions Available</h2>
            <table class="widefat striped">
                <tbody>
                    <?php foreach($breakdance_functions as $func => $exists): ?>
                    <tr>
                        <th><?php echo esc_html($func); ?>()</th>
                        <td style="color: <?php echo $exists ? 'green' : 'red'; ?>;">
                            <?php echo $exists ? '✓ Available' : '✗ Not Found'; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <div class="card" style="max-width: none; margin-top: 20px;">
            <h2>Breakdance Classes Available</h2>
            <table class="widefat striped">
                <tbody>
                    <?php foreach($breakdance_classes as $class => $exists): ?>
                    <tr>
                        <th><?php echo esc_html($class); ?></th>
                        <td style="color: <?php echo $exists ? 'green' : 'red'; ?>;">
                            <?php echo $exists ? '✓ Available' : '✗ Not Found'; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <div class="card" style="max-width: none; margin-top: 20px;">
            <h2>Template Include Filters</h2>
            <p>These filters control template loading (Priority order):</p>
            <table class="widefat striped">
                <thead>
                    <tr>
                        <th>Priority</th>
                        <th>Callback</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($template_filters as $filter): ?>
                    <tr>
                        <td><?php echo esc_html($filter['priority']); ?></td>
                        <td><code><?php echo esc_html($filter['callback']); ?></code></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <div class="card" style="max-width: none; margin-top: 20px;">
            <h2>Available Page Templates</h2>
            <?php if (!empty($page_templates)): ?>
            <table class="widefat striped">
                <thead>
                    <tr>
                        <th>Template Name</th>
                        <th>Template File</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($page_templates as $file => $name): ?>
                    <tr>
                        <td><?php echo esc_html($name); ?></td>
                        <td><code><?php echo esc_html($file); ?></code></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            <p>No custom page templates found.</p>
            <?php endif; ?>
        </div>
        
        <div class="card" style="max-width: none; margin-top: 20px;">
            <h2>Current Plugin Settings</h2>
            <table class="widefat striped">
                <tbody>
                    <tr>
                        <th>Plugin Enabled</th>
                        <td><?php echo $diagnostic_data['plugin_settings']['plugin_enabled']; ?></td>
                    </tr>
                    <tr>
                        <th>Template Mode</th>
                        <td><?php echo esc_html($diagnostic_data['plugin_settings']['template_mode']); ?></td>
                    </tr>
                    <tr>
                        <th>Selected Pages</th>
                        <td>
                            <?php 
                            if (!empty($diagnostic_data['plugin_settings']['selected_pages'])) {
                                $page_titles = array();
                                foreach($diagnostic_data['plugin_settings']['selected_pages'] as $page_id) {
                                    $page_titles[] = get_the_title($page_id) . ' (ID: ' . $page_id . ')';
                                }
                                echo implode(', ', $page_titles);
                            } else {
                                echo 'None selected';
                            }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="card" style="max-width: none; margin-top: 20px; background: #f0f8ff; border-left: 4px solid #0073aa;">
            <h2>📋 Diagnostic Summary</h2>
            <div style="padding: 10px;">
                <h3>Key Findings:</h3>
                <ul style="list-style: disc; margin-left: 20px;">
                    <?php if ($diagnostic_data['breakdance']['is_active']): ?>
                    <li><strong style="color: green;">✓ Breakdance is active</strong> (Version: <?php echo esc_html($diagnostic_data['breakdance']['version']); ?>)</li>
                    <?php else: ?>
                    <li><strong style="color: red;">✗ Breakdance is not active</strong></li>
                    <?php endif; ?>
                    
                    <?php if (!empty($template_filters)): ?>
                    <li>Found <?php echo count($template_filters); ?> template filters that may affect template loading</li>
                    <?php endif; ?>
                    
                    <?php 
                    $bd_func_count = count(array_filter($breakdance_functions));
                    if ($bd_func_count > 0): ?>
                    <li>Found <?php echo $bd_func_count; ?> Breakdance functions available</li>
                    <?php endif; ?>
                    
                    <?php 
                    $bd_class_count = count(array_filter($breakdance_classes));
                    if ($bd_class_count > 0): ?>
                    <li>Found <?php echo $bd_class_count; ?> Breakdance classes available</li>
                    <?php endif; ?>
                </ul>
                
                <h3>Recommended Template Strategy:</h3>
                <div style="background: white; padding: 15px; border-radius: 5px; margin-top: 10px;">
                    <?php if ($diagnostic_data['breakdance']['is_active']): ?>
                        <?php if (count(array_filter($breakdance_functions)) > 0): ?>
                        <p><strong>✓ Use Breakdance-specific template functions</strong></p>
                        <p>Breakdance provides its own template system. The plugin should:</p>
                        <ul style="list-style: disc; margin-left: 20px;">
                            <li>Use <code>get_header()</code> and <code>get_footer()</code> for compatibility</li>
                            <li>Work within Breakdance's template structure</li>
                            <li>Avoid overriding the entire template</li>
                        </ul>
                        <?php else: ?>
                        <p><strong>⚠ Breakdance detected but functions not available</strong></p>
                        <p>This might indicate a non-standard Breakdance setup. Consider:</p>
                        <ul style="list-style: disc; margin-left: 20px;">
                            <li>Using standard WordPress template functions</li>
                            <li>Testing with different template modes</li>
                        </ul>
                        <?php endif; ?>
                    <?php else: ?>
                        <p><strong>Use standard WordPress template system</strong></p>
                        <p>No page builder detected. Use normal template hierarchy.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="card" style="max-width: none; margin-top: 20px;">
            <h2>Export Diagnostic Data</h2>
            <p>Copy this JSON data to share for technical support:</p>
            <textarea style="width: 100%; height: 200px; font-family: monospace; font-size: 12px;" readonly><?php 
                echo json_encode($diagnostic_data, JSON_PRETTY_PRINT); 
            ?></textarea>
            <button class="button button-primary" onclick="copyDiagnosticData(this)">Copy to Clipboard</button>
        </div>
    </div>
    
    <script>
    function copyDiagnosticData(button) {
        var textarea = button.previousElementSibling;
        textarea.select();
        document.execCommand('copy');
        button.textContent = 'Copied!';
        setTimeout(function() {
            button.textContent = 'Copy to Clipboard';
        }, 2000);
    }
    </script>
    
    <style>
    .card h3 {
        margin-top: 20px;
        color: #23282d;
    }
    .widefat th {
        width: 30%;
    }
    </style>
    <?php
}