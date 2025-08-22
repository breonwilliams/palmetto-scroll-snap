# Breakdance Site Fix - Palmetto Scroll Snap

## Changes Made to Fix Breakdance Issues

### 1. Created Breakdance-Specific Template
- **New file**: `templates/palmetto-home-breakdance.php`
- This template works within Breakdance's structure using `get_header()` and `get_footer()`
- No duplicate HTML structure - works with existing Breakdance theme

### 2. Fixed JavaScript Errors
- **Lenis Constructor Error**: Added safe Lenis override that returns mock object
- **Header Builder Error**: Removed references to non-existent elements
- **Smooth Scroll Conflicts**: More robust disabling of Lenis/smooth scroll

### 3. Updated Plugin Logic
- Plugin now detects Breakdance and uses the appropriate template
- Breakdance sites use `palmetto-home-breakdance.php`
- Other sites (Elementor) use `palmetto-home-hybrid.php`

## How It Works Now

1. **Breakdance Detection**: Plugin checks if Breakdance is active
2. **Template Selection**: Automatically uses Breakdance-specific template
3. **Proper Integration**: Works with Breakdance's header/footer system
4. **No Conflicts**: Safely disables smooth scroll without breaking other features

## Testing Instructions

1. **Upload Updated Plugin**
   - Replace the entire `palmetto-scroll-snap` folder on your Breakdance site
   
2. **Configure Settings**
   - Go to Settings > Scroll Snap Pages
   - Enable the plugin
   - Select pages to apply scroll snap to
   - Save settings

3. **Test Functionality**
   - Visit selected page
   - Verify header and footer load correctly
   - Check that scroll snap works between sections
   - Test progress dots navigation
   - Check console for errors (should be clean now)

## What's Fixed

✅ **Header/Footer Loading**: Now uses Breakdance's native header/footer
✅ **Lenis Error**: Safe override prevents "not a constructor" error  
✅ **JavaScript Errors**: Removed problematic code, added error handling
✅ **Smooth Scroll Conflicts**: More robust disabling mechanism
✅ **Template Structure**: Works within Breakdance without duplication

## Key Features

- **6 Scroll Snap Sections**: Professional content sections
- **Progress Dots**: Visual navigation indicators
- **Keyboard Navigation**: Arrow keys to move between sections
- **Mobile Responsive**: Disables snap on mobile devices
- **Smooth Scroll Killer**: Safely disables conflicting libraries

## Files Changed

1. `palmetto-scroll-snap.php` - Updated to detect Breakdance
2. `templates/palmetto-home-breakdance.php` - New Breakdance-specific template

## No Longer Needed

The following approaches were abandoned as they don't work well with Breakdance:
- Static header/footer extraction
- Hybrid template with conditional loading
- Direct HTML manipulation

## Support

If you still see errors:
1. Clear browser cache
2. Clear Breakdance cache (if applicable)
3. Deactivate and reactivate the plugin
4. Check that the page is selected in plugin settings