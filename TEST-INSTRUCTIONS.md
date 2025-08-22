# Testing Instructions for Palmetto Scroll Snap Plugin

## Setup Complete! ✅

The plugin has been successfully set up with:
1. **Admin Settings Page** - Select pages and template modes
2. **Hybrid Template System** - Works with both Elementor and Breakdance
3. **Static Fallbacks** - Extracted header and footer from Breakdance site
4. **Scroll Snap Sections** - 6 content sections with magnetic scroll

## How to Test

### 1. Local Testing with Elementor
1. Activate the plugin in WordPress
2. Go to **Settings > Scroll Snap Pages** in admin
3. Enable the plugin with the checkbox
4. Select pages to apply the template to (e.g., Home page)
5. Choose **Native** mode (uses Elementor header/footer)
6. Save settings
7. Visit the selected page to see scroll snap in action

### 2. Testing Template Modes
- **Native Mode**: Uses your current theme's header/footer (Elementor locally)
- **Static Mode**: Uses the extracted Breakdance header/footer
- **Hybrid Mode**: Auto-detects (Elementor = native, Breakdance = static)

### 3. Verify Scroll Snap Works
- Scroll down on the page - it should snap to sections
- Click progress dots on the right to navigate
- Use arrow keys to move between sections
- Mobile: Regular scroll (no snap)

### 4. Deploying to Breakdance Site
1. Upload the entire `palmetto-scroll-snap` folder to production site
2. Activate plugin
3. Configure settings (select pages, use Hybrid or Static mode)
4. The plugin will use the static Breakdance templates automatically

## Files Created

### Core Plugin Files
- `palmetto-scroll-snap.php` - Main plugin file
- `admin/settings-page.php` - Admin interface
- `admin/settings-handler.php` - Settings logic
- `templates/palmetto-home-hybrid.php` - Hybrid template with scroll snap

### Static Fallbacks (for Breakdance)
- `templates/partials/header-fallback.php` - Breakdance header
- `templates/partials/footer-fallback.php` - Breakdance footer
- `templates/partials/header-extract.html` - Raw header HTML
- `templates/partials/footer-extract.html` - Raw footer HTML

### Assets
All CSS and JS files from Breakdance site are preserved in `/assets/`

## Scroll Snap Sections

The template includes 6 sections:
1. **Why Choose** - Company benefits
2. **Services** - Wildlife services grid
3. **Wildlife Control** - Professional services info
4. **Components** - Process steps
5. **FAQs** - Common questions
6. **Protect Property** - Call to action

## Troubleshooting

If scroll snap doesn't work:
- Check browser console for JavaScript errors
- Verify Lenis/smooth scroll libraries are disabled
- Ensure the page is using the correct template
- Check that CSS scroll-snap is supported in your browser

## Next Steps

1. Test thoroughly on local Elementor site
2. Deploy to staging Breakdance site
3. Fine-tune the extracted header/footer if needed
4. Add actual Palmetto Wildlife content to sections