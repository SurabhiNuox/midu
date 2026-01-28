# Sass Compiler Setup

Sass compiler has been successfully installed and configured for this WordPress theme.

## Available Commands

### Compile Sass Once
```bash
npm run sass
```
Compiles `assets/scss/main.scss` to `assets/scss/main.css` with expanded style and source map.

### Watch Mode (Auto-compile on save)
```bash
npm run sass:watch
```
Automatically compiles Sass files whenever you save changes. Press `Ctrl+C` to stop watching.

### Compile for Production (Compressed)
```bash
npm run sass:compressed
```
Compiles Sass with compressed output (minified CSS) for production use.

## File Structure

- **Source:** `assets/scss/main.scss` - Main Sass file that imports all partials
- **Output:** `assets/scss/main.css` - Compiled CSS file
- **Source Map:** `assets/scss/main.css.map` - Helps with debugging

## How to Use

1. **For Development:**
   - Open terminal in the theme directory
   - Run `npm run sass:watch` to start auto-compilation
   - Edit your `.scss` files and save
   - CSS will automatically update

2. **For One-time Compilation:**
   - Run `npm run sass` whenever you make changes

3. **Before Deploying:**
   - Run `npm run sass:compressed` for optimized CSS

## Notes

- The `inner_banner` styles have been added to `main.scss`
- All partial files (like `_inner_banner.scss`, `_banner.scss`, etc.) are imported in `main.scss`
- Source maps are generated for easier debugging in browser DevTools

## VS Code/Cursor Extension Alternative

If you prefer using a VS Code extension instead:
1. Install "Live Sass Compiler" by Glenn Marks
2. Click "Watch Sass" in the status bar
3. It will automatically compile on save
