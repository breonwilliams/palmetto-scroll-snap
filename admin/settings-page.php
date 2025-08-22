<?php
/**
 * Palmetto Scroll Snap - Admin Settings Page
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Render the settings page
 */
function pss_render_settings_page() {
    // Check user capabilities
    if (!current_user_can('manage_options')) {
        return;
    }
    
    // Get current settings
    $selected_pages = get_option('pss_selected_pages', array());
    $template_mode = get_option('pss_template_mode', 'hybrid');
    $enable_plugin = get_option('pss_enable_plugin', 'yes');
    
    // Get all pages for dropdown
    $pages = get_pages(array(
        'sort_order' => 'asc',
        'sort_column' => 'post_title',
        'post_type' => 'page',
        'post_status' => 'publish'
    ));
    
    // Add settings saved message
    if (isset($_GET['settings-updated'])) {
        add_settings_error('pss_messages', 'pss_message', __('Settings Saved', 'palmetto-scroll-snap'), 'updated');
    }
    
    // Show error/update messages
    settings_errors('pss_messages');
    ?>
    
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        
        <form action="options.php" method="post">
            <?php
            // Output security fields
            settings_fields('pss_settings');
            ?>
            
            <table class="form-table">
                <!-- Enable/Disable Plugin -->
                <tr>
                    <th scope="row">
                        <label for="pss_enable_plugin"><?php _e('Enable Plugin', 'palmetto-scroll-snap'); ?></label>
                    </th>
                    <td>
                        <label>
                            <input type="checkbox" 
                                   name="pss_enable_plugin" 
                                   id="pss_enable_plugin" 
                                   value="yes" 
                                   <?php checked($enable_plugin, 'yes'); ?> />
                            <?php _e('Enable scroll snap template on selected pages', 'palmetto-scroll-snap'); ?>
                        </label>
                    </td>
                </tr>
                
                <!-- Page Selector -->
                <tr>
                    <th scope="row">
                        <label for="pss_selected_pages"><?php _e('Select Pages', 'palmetto-scroll-snap'); ?></label>
                    </th>
                    <td>
                        <select name="pss_selected_pages[]" id="pss_selected_pages" multiple="multiple" style="width: 350px; height: 200px;">
                            <?php foreach ($pages as $page) : ?>
                                <option value="<?php echo esc_attr($page->ID); ?>" 
                                        <?php selected(in_array($page->ID, $selected_pages)); ?>>
                                    <?php echo esc_html($page->post_title); ?> (ID: <?php echo $page->ID; ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <p class="description">
                            <?php _e('Hold Ctrl (Cmd on Mac) to select multiple pages. The scroll snap template will be applied to these pages.', 'palmetto-scroll-snap'); ?>
                        </p>
                    </td>
                </tr>
                
                <!-- Template Mode -->
                <tr>
                    <th scope="row">
                        <label><?php _e('Template Mode', 'palmetto-scroll-snap'); ?></label>
                    </th>
                    <td>
                        <fieldset>
                            <label>
                                <input type="radio" 
                                       name="pss_template_mode" 
                                       value="native" 
                                       <?php checked($template_mode, 'native'); ?> />
                                <span><?php _e('Use theme header/footer (Recommended for testing)', 'palmetto-scroll-snap'); ?></span>
                            </label>
                            <br>
                            <label>
                                <input type="radio" 
                                       name="pss_template_mode" 
                                       value="static" 
                                       <?php checked($template_mode, 'static'); ?> />
                                <span><?php _e('Use static Breakdance templates (For production)', 'palmetto-scroll-snap'); ?></span>
                            </label>
                            <br>
                            <label>
                                <input type="radio" 
                                       name="pss_template_mode" 
                                       value="hybrid" 
                                       <?php checked($template_mode, 'hybrid'); ?> />
                                <span><?php _e('Hybrid mode (Auto-detect theme)', 'palmetto-scroll-snap'); ?></span>
                            </label>
                        </fieldset>
                        <p class="description">
                            <?php _e('Choose how the header and footer are loaded. Native mode works with any theme.', 'palmetto-scroll-snap'); ?>
                        </p>
                    </td>
                </tr>
                
                <!-- Preview Links -->
                <?php if (!empty($selected_pages)) : ?>
                <tr>
                    <th scope="row">
                        <?php _e('Preview Links', 'palmetto-scroll-snap'); ?>
                    </th>
                    <td>
                        <?php foreach ($selected_pages as $page_id) : 
                            $page_title = get_the_title($page_id);
                            $page_url = get_permalink($page_id);
                        ?>
                            <p>
                                <a href="<?php echo esc_url($page_url); ?>" target="_blank" class="button button-secondary">
                                    <?php echo sprintf(__('Preview: %s', 'palmetto-scroll-snap'), esc_html($page_title)); ?>
                                </a>
                            </p>
                        <?php endforeach; ?>
                    </td>
                </tr>
                <?php endif; ?>
            </table>
            
            <?php submit_button('Save Settings'); ?>
        </form>
        
        <!-- Instructions -->
        <div class="card">
            <h2><?php _e('How to Use', 'palmetto-scroll-snap'); ?></h2>
            <ol>
                <li><?php _e('Select the pages where you want to apply the scroll snap template', 'palmetto-scroll-snap'); ?></li>
                <li><?php _e('Choose a template mode:', 'palmetto-scroll-snap'); ?>
                    <ul>
                        <li><strong>Native:</strong> <?php _e('Uses your current theme\'s header and footer', 'palmetto-scroll-snap'); ?></li>
                        <li><strong>Static:</strong> <?php _e('Uses the saved Breakdance header and footer', 'palmetto-scroll-snap'); ?></li>
                        <li><strong>Hybrid:</strong> <?php _e('Automatically detects and uses the best option', 'palmetto-scroll-snap'); ?></li>
                    </ul>
                </li>
                <li><?php _e('Save your settings and preview the selected pages', 'palmetto-scroll-snap'); ?></li>
            </ol>
        </div>
        
        <!-- Debug Info -->
        <?php if (defined('WP_DEBUG') && WP_DEBUG) : ?>
        <div class="card">
            <h2><?php _e('Debug Information', 'palmetto-scroll-snap'); ?></h2>
            <p><strong>Active Theme:</strong> <?php echo wp_get_theme()->get('Name'); ?></p>
            <p><strong>Selected Pages:</strong> <?php echo implode(', ', $selected_pages); ?></p>
            <p><strong>Template Mode:</strong> <?php echo $template_mode; ?></p>
            <p><strong>Plugin Status:</strong> <?php echo $enable_plugin === 'yes' ? 'Enabled' : 'Disabled'; ?></p>
        </div>
        <?php endif; ?>
    </div>
    
    <style>
        .card {
            background: white;
            border: 1px solid #ccd0d4;
            border-radius: 4px;
            padding: 20px;
            margin-top: 20px;
            max-width: 800px;
        }
        .card h2 {
            margin-top: 0;
        }
        .card ul {
            margin-left: 20px;
        }
    </style>
    <?php
}