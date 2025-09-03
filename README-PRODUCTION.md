# Palmetto Scroll Snap Plugin - Production Version

## Overview
A lightweight WordPress plugin that adds magnetic scroll snap functionality to selected pages while preserving your site's existing design and functionality.

## Version 2.1.0 - Production Ready
This version has been cleaned and optimized for production use with:
- **90% reduction** in CSS files (from 30+ to 1)
- **80% reduction** in templates (from 10 to 3)
- **Removed** all hover animations and transitions for static experience
- **Added** green background to Services section as per design requirements
- **Improved** security with proper WordPress best practices
- **Optimized** performance by removing unnecessary code

## Features
- ✅ Magnetic scroll snapping between page sections
- ✅ Selective page application via admin settings
- ✅ Works with Breakdance and standard WordPress themes
- ✅ Preserves existing headers and footers
- ✅ Mobile responsive (auto-disables on small screens)
- ✅ Keyboard navigation support
- ✅ Clean, maintainable codebase

## Installation
1. Upload the `palmetto-scroll-snap` folder to `/wp-content/plugins/`
2. Activate the plugin through WordPress admin
3. Navigate to **Settings → Scroll Snap Pages**
4. Select which pages should use scroll snap
5. Save settings

## File Structure (Cleaned)
```
palmetto-scroll-snap/
├── palmetto-scroll-snap.php         # Main plugin file
├── admin/
│   ├── settings-page.php           # Admin interface
│   ├── settings-handler.php        # Settings management
│   └── diagnostic-page.php         # Diagnostic tools
├── includes/
│   └── shortcode.php               # Shortcode handler
├── templates/
│   ├── palmetto-home-breakdance.php   # Breakdance template
│   ├── palmetto-home-hybrid.php       # Hybrid template
│   └── palmetto-scroll-final.php      # Content template
├── assets/
│   ├── css/
│   │   └── scroll-snap-override.css   # Core styles only
│   ├── js/                            # JavaScript files
│   └── images/                        # Image assets
└── README-PRODUCTION.md
```

## Configuration

### Admin Settings
- **Enable/Disable**: Toggle plugin on/off
- **Page Selection**: Choose which pages get scroll snap
- **Template Mode**: Select template handling mode

### CSS Customization
All scroll snap styles are in `/assets/css/scroll-snap-override.css`:
- Green background on Services section (#203D0A)
- No hover effects or transitions (static experience)
- Mobile responsive breakpoints

## Shortcode Usage
```
[palmetto_scroll_snap]
```

## Sections with Scroll Snap
- Why Choose (`#snap-why-choose`)
- Services (`#snap-services`) - Green background
- Wildlife Control (`#snap-wildlife-control`)
- Components (`#snap-components`)
- FAQs (`#snap-faqs`)
- Protect Property (`#snap-protect-property`)

## Browser Support
- Chrome 69+
- Firefox 68+
- Safari 11+
- Edge 79+
- Mobile browsers (snap disabled < 768px)

## Security Features
- Proper nonce verification in admin forms
- Capability checks for admin operations
- Escaped output for all dynamic content
- Sanitized input handling

## Performance
- Single CSS file for all styles
- Minimal JavaScript footprint
- Browser-native scroll-snap (no libraries)
- Efficient template loading

## Changelog

### Version 2.1.0 (Production Release)
- Removed 30+ unnecessary CSS files
- Archived 7 unused template files
- Added green background to Services section
- Removed all hover animations and transitions
- Improved security with proper escaping
- Consolidated template structure
- Optimized for production use

### Version 2.0.0
- Added page selection functionality
- Implemented multiple template modes
- Added diagnostic tools

### Version 1.0.0
- Initial release

## Support
For issues or questions, contact the development team.

## License
GPL v2 or later