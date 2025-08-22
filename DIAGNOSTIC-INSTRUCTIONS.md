# 🔍 Site Diagnostic Instructions

## How to Run the Diagnostic Tool

I've created two diagnostic tools to analyze how your Breakdance site loads templates. This will help me understand exactly how to make the scroll snap plugin work with your specific setup.

## Option 1: WordPress Admin Diagnostic (Recommended)

1. **Upload the Updated Plugin**
   - Upload the entire `palmetto-scroll-snap` folder to your site
   - Activate the plugin if not already active

2. **Access the Diagnostic Page**
   - Go to your WordPress admin
   - Navigate to **Tools > Scroll Snap Diagnostics**
   - You'll see a comprehensive diagnostic report

3. **Copy the Data**
   - Scroll to the bottom of the page
   - Find the "Export Diagnostic Data" section
   - Click "Copy to Clipboard"
   - Share this JSON data with me

## Option 2: Direct PHP Diagnostic

1. **Upload the Diagnostic File**
   - The file is located at: `palmetto-scroll-snap/diagnostic.php`
   - Make sure it's uploaded with the plugin

2. **Access the Diagnostic**
   - Visit: `yoursite.com/wp-content/plugins/palmetto-scroll-snap/diagnostic.php`
   - You must be logged in as an administrator

3. **Copy the Results**
   - Click the "Copy Diagnostic Data" button
   - Share the JSON output with me

## What the Diagnostic Checks

The diagnostic tool analyzes:

### 1. **WordPress Environment**
- Version, theme, active plugins
- Template directories and files

### 2. **Breakdance Detection**
- Is Breakdance active?
- What version?
- Available Breakdance functions and classes

### 3. **Template System**
- How templates are loaded
- What hooks are in use
- Template hierarchy

### 4. **Header/Footer Analysis**
- How headers and footers are rendered
- Available template functions
- File locations

### 5. **Plugin Compatibility**
- Current plugin settings
- Page template options
- Filter priorities

## What to Share

After running the diagnostic, please share:

1. **The JSON data** from either diagnostic tool
2. **Any error messages** you see in the browser console
3. **Screenshots** of the diagnostic results page
4. **Current issues** you're experiencing with the plugin

## Why This Helps

With this diagnostic data, I can:
- See exactly how Breakdance loads templates on your site
- Understand the template hierarchy
- Identify the correct hooks and functions to use
- Create a plugin that works perfectly with your setup

## Quick Checklist

- [ ] Plugin uploaded to Breakdance site
- [ ] Plugin activated
- [ ] Diagnostic page accessed
- [ ] JSON data copied
- [ ] Console errors checked
- [ ] Screenshots taken (optional)

## Next Steps

Once you share the diagnostic data, I'll:
1. Analyze how your Breakdance site works
2. Update the plugin to use the correct template loading method
3. Ensure the scroll snap effect works with your header/footer
4. Provide a fully working solution

## Troubleshooting

If you can't access the diagnostic:
- Make sure you're logged in as an administrator
- Check that the plugin is activated
- Try both diagnostic options
- Clear your browser cache

If the diagnostic page is blank:
- There might be a PHP error
- Check your error logs
- Try the direct PHP diagnostic instead

## Security Note

The diagnostic tool:
- Only works for logged-in administrators
- Doesn't modify any files
- Only reads configuration data
- Is safe to run on production sites

---

**Ready to proceed?** Run the diagnostic and share the results, and I'll create a perfectly tailored solution for your Breakdance site!