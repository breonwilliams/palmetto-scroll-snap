# Palmetto Wildlife Extractors - Scroll Snap Plugin

A WordPress plugin that implements a magnetic scroll snap effect for the Palmetto Wildlife Extractors website while preserving the exact Breakdance design.

## Overview

This plugin replaces the home page with a static template that:
- Preserves the **exact visual design** from the Breakdance site
- Implements **magnetic scroll snap** between content sections
- Removes conflicting smooth scroll libraries (Lenis, GSAP ScrollTrigger)
- Maintains all interactive elements (header, navigation, forms)

## Features

✅ **Exact Design Preservation** - Uses the actual HTML, CSS, and assets from your Breakdance site
✅ **Magnetic Scroll Snap** - Smooth snapping between sections as requested by client
✅ **Conflict Resolution** - Automatically disables Lenis and other smooth scroll libraries
✅ **Full Functionality** - Header, mobile menu, forms, and all interactive elements work
✅ **Progress Indicators** - Visual dots showing current section position
✅ **Keyboard Navigation** - Arrow keys and spacebar for section navigation
✅ **Mobile Responsive** - Automatically disables snap effect on mobile devices

## Installation

1. Upload the `palmetto-scroll-snap` folder to `/wp-content/plugins/`
2. Activate the plugin through the WordPress admin
3. The home page will automatically use the scroll snap template

## Sections with Scroll Snap

The following sections have the magnetic snap effect:
- **Why Choose** (`#snap-why-choose`)
- **Services** (`#snap-services`)
- **Wildlife Control** (`#snap-wildlife-control`)
- **Components** (`#snap-components`)
- **FAQs** (`#snap-faqs`)
- **Protect Property** (`#snap-protect-property`)

The hero section and footer sections scroll normally without snapping.

## How It Works

1. **Template Override**: The plugin overrides the home page template with a static version
2. **Asset Loading**: All CSS, JavaScript, and images from the original Breakdance site are included
3. **Script Management**: Conflicting smooth scroll libraries are disabled
4. **Scroll Container**: Content is wrapped in a container with CSS scroll-snap properties
5. **Progressive Enhancement**: JavaScript adds keyboard navigation and progress indicators

## Technical Details

### File Structure
```
palmetto-scroll-snap/
├── palmetto-scroll-snap.php       # Main plugin file
├── templates/
│   ├── palmetto-home.php         # Main template file
│   └── palmetto-home-original.html # Original HTML reference
├── assets/
│   ├── css/                      # All original CSS files
│   ├── js/                       # All original JavaScript
│   └── images/                   # All original images
└── README.md
```

### Disabled Scripts
- Lenis smooth scroll (`window.EhGlobalLenisInstance`)
- GSAP ScrollTrigger (for snap sections only)
- LocomotiveScroll
- Any other smooth scroll libraries

### Preserved Functionality
- Breakdance Header Builder (sticky behavior)
- AwesomeMenu (navigation dropdowns)
- Mobile hamburger menu
- Fluent Forms
- Google Maps
- All animations and interactions

## Browser Compatibility

- Chrome 69+
- Firefox 68+
- Safari 11+
- Edge 79+

The plugin uses CSS scroll-snap with JavaScript enhancements for maximum compatibility.

## Keyboard Shortcuts

- **↓ Arrow Down / Space**: Next section
- **↑ Arrow Up**: Previous section
- **Home**: First section
- **End**: Last section

## Troubleshooting

### Scroll snap not working?
1. Clear browser cache
2. Check browser console for errors
3. Ensure no other smooth scroll plugins are active
4. Verify the plugin is activated

### Styles look different?
1. Ensure all assets copied correctly
2. Check that image paths are correct
3. Verify CSS files are loading

### Mobile menu not working?
The plugin preserves all Breakdance menu functionality. If issues occur:
1. Check JavaScript console for errors
2. Ensure header-builder.js is loading
3. Verify awesome-menu.js is present

## Important Notes

- This plugin creates a **static snapshot** of your home page
- Any changes made in Breakdance won't automatically reflect
- To update content, you'll need to update the template file
- The plugin only affects the home page; other pages remain unchanged

## Support

This plugin was specifically created for Palmetto Wildlife Extractors to achieve the magnetic scroll snap effect requested by the client while maintaining the exact Breakdance design.

## Version

2.0.0 - Using actual Palmetto Wildlife Extractors content and design