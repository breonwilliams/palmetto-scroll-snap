# Palmetto Scroll Snap Plugin

A WordPress plugin that implements a magnetic scroll snap effect for selected pages on the Palmetto Wildlife Extractors website while preserving the exact Breakdance design.

## Overview

This plugin provides a flexible scroll snap template system that can be applied to any WordPress page. Key features include:

- **Page Selection System** - Choose which pages should use the scroll snap template through the admin interface
- **Multiple Injection Modes** - Template override or content injection via shortcode
- **Environment Detection** - Automatically adapts to Breakdance, Elementor, or standard WordPress themes
- **Preserved Functionality** - Maintains all interactive elements (headers, navigation, forms)
- **Magnetic Scroll Snap** - Smooth snapping between designated content sections

## Features

✅ **Selective Page Application** - Apply scroll snap to specific pages, not just the home page
✅ **Multiple Template Modes** - Native (uses theme header/footer), Static (Breakdance templates), or Hybrid (auto-detect)
✅ **Exact Design Preservation** - Uses actual HTML, CSS, and assets from your Breakdance site
✅ **Conflict Resolution** - Automatically disables Lenis, GSAP ScrollTrigger, and other smooth scroll libraries
✅ **Progress Indicators** - Visual dots showing current section position with tooltips
✅ **Keyboard Navigation** - Arrow keys and spacebar for section navigation
✅ **Mobile Responsive** - Automatically disables snap effect on mobile devices (< 768px)
✅ **Diagnostic Tools** - Built-in diagnostic page for troubleshooting
✅ **Shortcode Support** - `[palmetto_scroll_snap]` for custom implementations

## Installation

1. Upload the `palmetto-scroll-snap` folder to `/wp-content/plugins/`
2. Activate the plugin through the WordPress admin
3. Navigate to **Settings → Scroll Snap Pages** to configure
4. Select which pages should use the scroll snap template
5. Choose your preferred template mode
6. Save settings and preview your pages

## Configuration

### Admin Settings

Access the settings page at **Settings → Scroll Snap Pages** where you can:

1. **Enable/Disable Plugin** - Toggle the plugin on/off without deactivating
2. **Select Pages** - Choose multiple pages to apply the scroll snap effect
3. **Template Mode** - Choose how headers/footers are handled:
   - **Native Mode**: Uses your current theme's header and footer (recommended for testing)
   - **Static Mode**: Uses the saved Breakdance header and footer (for production)
   - **Hybrid Mode**: Auto-detects environment and chooses the best option

### Shortcode Usage

You can also use the shortcode directly in any page or post:

```
[palmetto_scroll_snap template="final"]
```

Available template options:
- `final` - Optimized production template
- `full` - Complete template with all sections
- `working` - Development template
- `viewport` - Viewport-based template
- `seamless` - Seamless scrolling template
- `content` - Content-only template

## Sections with Scroll Snap

The following sections have the magnetic snap effect by default:
- **Why Choose** (`#snap-why-choose`)
- **Services** (`#snap-services`)
- **Wildlife Control** (`#snap-wildlife-control`)
- **Components** (`#snap-components`)
- **FAQs** (`#snap-faqs`)
- **Protect Property** (`#snap-protect-property`)

The hero section and footer sections scroll normally without snapping.

## How It Works

### Architecture

1. **Page Detection**: The plugin checks if the current page is selected in settings
2. **Mode Selection**: Based on configuration, it either:
   - Overrides the entire template (template mode)
   - Injects content via filter (content injection mode)
3. **Asset Management**: Loads all necessary CSS, JavaScript, and images
4. **Script Control**: Disables conflicting smooth scroll libraries
5. **Scroll Implementation**: Wraps content in a container with CSS scroll-snap properties
6. **Progressive Enhancement**: JavaScript adds keyboard navigation and progress indicators

### File Structure

```
palmetto-scroll-snap/
├── palmetto-scroll-snap.php       # Main plugin file
├── admin/
│   ├── settings-page.php         # Admin settings interface
│   ├── settings-handler.php      # Settings management & helpers
│   └── diagnostic-page.php       # Diagnostic tools
├── includes/
│   └── shortcode.php             # Shortcode implementation
├── templates/
│   ├── palmetto-home-breakdance.php  # Breakdance-specific template
│   ├── palmetto-home-hybrid.php      # Hybrid environment template
│   ├── palmetto-scroll-final.php     # Production-ready template
│   ├── palmetto-scroll-*.php         # Various template variations
│   └── partials/                     # Reusable template parts
├── assets/
│   ├── css/                         # Stylesheets including scroll-snap-override.css
│   ├── js/                          # JavaScript files (preserved from original)
│   └── images/                      # Image assets
├── static_template/                  # Reference static HTML export
│   ├── Home - Palmetto Wildlife Extractors.html
│   └── Home - Palmetto Wildlife Extractors_files/
└── README.md
```

## Diagnostic Tools

Access diagnostic information at **Tools → Scroll Snap Diagnostics** to view:
- WordPress environment details
- Breakdance/Elementor detection status
- Active theme information
- Template filter priorities
- Current plugin settings
- Template loading tests

## Keyboard Shortcuts

- **↓ Arrow Down / Space**: Next section
- **↑ Arrow Up**: Previous section
- **Home**: First section
- **End**: Last section
- **Page Down**: Next section
- **Page Up**: Previous section

## CSS Classes & IDs

### Core Classes
- `.pss-wrapper` - Main plugin wrapper
- `.pss-scroll-wrapper` - Scroll container
- `.pss-snap-section` - Generic snap section
- `.pss-progress` - Progress indicator container
- `.pss-progress-dot` - Individual progress dot

### Body Classes
- `pss-active` - Added when plugin is active on page
- `pss-loading` - Loading state
- `pss-loaded` - Loaded state

## Browser Compatibility

- Chrome 69+
- Firefox 68+
- Safari 11+
- Edge 79+
- Mobile browsers (with automatic snap disable)

The plugin uses CSS scroll-snap with JavaScript enhancements for maximum compatibility.

## Troubleshooting

### Scroll snap not working?
1. Check if the plugin is enabled in settings
2. Verify the current page is selected in settings
3. Clear browser cache
4. Check browser console for JavaScript errors
5. Ensure no other smooth scroll plugins are active
6. Use the diagnostic page to check for conflicts

### Styles look different?
1. Check template mode settings (Native vs Static vs Hybrid)
2. Verify all asset files are loading (check Network tab)
3. Ensure CSS files in `/assets/css/` are intact
4. Check for theme conflicts using diagnostic tools

### Mobile menu not working?
1. Check JavaScript console for errors
2. Ensure `awesome-menu.js` is loading
3. Verify Breakdance header functionality
4. Try switching template modes

### Page selection not saving?
1. Ensure you have admin privileges
2. Check for JavaScript errors when saving
3. Verify WordPress database permissions
4. Try deactivating and reactivating the plugin

## Disabled Scripts

The plugin automatically disables these conflicting libraries when active:
- Lenis smooth scroll (`window.EhGlobalLenisInstance`)
- GSAP ScrollTrigger (for snap sections only)
- LocomotiveScroll
- Other smooth scroll libraries detected via diagnostic

## Performance Considerations

- The plugin adds minimal overhead (< 50KB of CSS/JS)
- Scroll snap is handled natively by the browser
- Progress indicators use efficient event listeners
- Mobile devices automatically use standard scrolling
- Assets are loaded conditionally based on page selection

## Developer Notes

### Hooks and Filters

The plugin provides several hooks for customization:
- `template_include` filter (priority 999999) for template override
- `the_content` filter (priority 999999) for content injection
- Standard WordPress settings API for configuration

### Helper Functions

Available helper functions in `settings-handler.php`:
- `pss_is_active_on_current_page()` - Check if plugin should be active
- `pss_get_template_mode()` - Get current template mode
- `pss_is_breakdance_active()` - Detect Breakdance
- `pss_is_elementor_active()` - Detect Elementor
- `pss_should_use_native_header_footer()` - Determine header/footer source

## Important Notes

- This plugin creates a **static snapshot** of your scroll snap design
- Changes made in Breakdance won't automatically reflect in the scroll snap template
- To update content, you'll need to update the template files directly
- The plugin only affects selected pages; other pages remain unchanged
- The static_template folder is for reference and not actively used by the plugin

## Support

This plugin was specifically created for Palmetto Wildlife Extractors to achieve the magnetic scroll snap effect requested by the client while maintaining compatibility with multiple WordPress environments.

## Changelog

### Version 2.0.0
- Added page selection functionality (no longer limited to home page)
- Implemented multiple template modes (Native, Static, Hybrid)
- Added content injection mode via shortcode
- Improved Breakdance/Elementor detection
- Added comprehensive diagnostic tools
- Enhanced mobile responsiveness
- Added progress indicators with tooltips
- Improved keyboard navigation
- Fixed Breakdance container constraint issues

### Version 1.0.0
- Initial release with home page template override
- Basic scroll snap functionality
- Breakdance design preservation

## License

GPL v2 or later