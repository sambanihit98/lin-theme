# Lin - WordPress Theme (WIP)

**Lin Theme** is a modern, lightweight, and fully responsive WordPress theme designed for businesses, portfolios, and creative websites. It combines clean aesthetics with flexible functionality, offering a professional look while maintaining fast performance.  

---

## Key Features
- Fully responsive layout for desktop, tablet, and mobile.
- Customizable header and footer with dynamic color options.
- Smooth, animated dropdown menus for desktop and mobile.
- Integrated sections for hero banners, company information, and legal pages.
- Ready for easy integration with WordPress customizer for colors, fonts, and logo.
- SEO-friendly markup and accessible design principles.

---

## Installation
1. Upload the `lin` theme folder to `/wp-content/themes/`.
2. Activate the theme via the **Appearance → Themes** menu in WordPress.
3. Configure your customizer settings to adjust colors, fonts, and logo.
   
---

## Customizer
Lin Theme comes with built-in customizer options so you can easily change the appearance of your website without touching code:
- Header & footer colors
- Menu hover & active colors
- Logo upload & width
- Site title font size
- Header height and transparency
- Active menu background and opacity
- Hover effects for links and buttons

---

## Required Plugins
To use all features of Lin Theme, we recommend installing the following plugins:
- **Classic Editor** – restores the old WordPress editor for simpler editing.

---

## Shortcodes
Lin Theme includes several handy shortcodes for content layout and styling:

### Layout
#### `[lin-wrapper]`
**Description:** Wraps content into a container for structured layout.

| Attributes | Description |
|----------|-------------|
| `bg-color` | Sets the background color of the wrapper. Accepts any valid CSS color value (e.g. `#ffffff`, `red`, `rgb(255,255,255)`, `rgba(0,0,0,0.5)`). |

<sub>────────────</sub>

#### `[lin-row]`
**Description:** Creates a horizontal row for columns, useful for grid layouts. Supports Bootstrap alignment and gutter spacing.

| Attributes | Description |
|----------|-------------|
| `justify` | Sets horizontal alignment of columns. Accepts Bootstrap options: `start`, `center`, `end`, `around`, `between`, `evenly`. |
| `align` | Sets vertical alignment of columns. Accepts Bootstrap options: `start`, `center`, `end`, `baseline`, `stretch`. |
| `g` | Sets the gutter (spacing between columns). Accepts numeric values corresponding to Bootstrap gutter classes. **Default: `4`**. |

<sub>────────────</sub>

#### `[lin-column]`
**Description:** Defines a column inside a row; supports responsive sizing. 

| Attributes | Description |
|------------|-------------|
|`col`	    |Default column size (1–12). Equivalent to `col-*` in Bootstrap. **Default: `12`**.|
|`sm`	       |Column size for small screens (`col-sm-*`). Optional.|
|`md`	       |Column size for medium screens (`col-md-*`). Optional.|
|`lg`	       |Column size for large screens (`col-lg-*`). Optional.|
|`xl`	       |Column size for extra-large screens (`col-xl-*`). Optional.|
|`display`	 |Optional CSS display value (e.g., `block`, `flex`, `inline`).|

<sub>────────────</sub>

#### `[lin-divider]`
**Description:** Creates a horizontal divider line. Supports custom color, width, height, alignment, and bottom margin. 

| Attributes | Description |
|------------|-------------|
|`color`	       |Sets the divider color. Accepts any valid CSS color value, e.g., `#7c3aed`, `red`, `rgba(0,0,0,0.5)`. **Default: `#7c3aed`**.|
|`width`	       |Sets the divider width. Accepts any CSS width value, e.g., `60px`, `50%`. **Default: `60px`**.|
|`height`	    |Sets the divider thickness. Accepts any CSS height value, e.g., `3px`. **Default: `3px`**.|
|`align`	       |Sets horizontal alignment. Accepts `left`, `center`, `right`. **Default: `center`**.|
|`marginbottom` |Sets the bottom margin. Accepts any CSS margin value, e.g., `10px`, `1rem`. **Default: `0px`**.|

<sub>────────────</sub>

#### `[lin-spacer]`
**Description:** Adds vertical spacing between elements for better layout control. You can define different heights for desktop, tablet, and mobile devices.

| Attributes | Description |
|------------|-------------|
|`height`	 |Default spacer height. Accepts any valid CSS height value, e.g., `20px`, `2rem`. Used if no device-specific height is set. **Default: `20px`**.|
|`sm`	       |Spacer height for mobile devices (`≤ 767px`). Accepts any CSS height value, e.g., `10px`.|
|`md`	       |Spacer height for tablets (`≤ 991px`). Accepts any CSS height value, e.g., `15px`.|
|`lg`	       |Spacer height for desktops (`> 991px`). Accepts any CSS height value, e.g., `30px`.|



**────────────────────────────────────**

### Text

#### `[lin-heading]`
**Description:** Adds a styled heading (H1–H6) with customizable tag, alignment, font weight, color, size, and bottom margin.

| Attributes | Description |
|------------|-------------|
|`tag`	    |Sets the HTML heading tag. Accepts `h1`–`h6`. **Default: `h1`**.|
|`align`	    |Sets text alignment. Accepts `left`, `center`, `right`. **Default: `center`**.|
|`fontweight`|Sets the font weight. Accepts CSS font-weight values like `normal`, `bold`, `600`, etc. **Default: `bold`**.|
|`color`	       |Sets the text color. Accepts any valid CSS color value, e.g., `#333333`, `red`, `rgba(0,0,0,0.7)`. **Default: `#333333`**.|
|`marginbottom` |Sets bottom margin of the heading. Accepts any CSS margin value, e.g., `10px`, `1rem`. **Default: `10px`**.|
|`size`	       |Sets font size. Accepts any CSS size value, e.g., `50px`, `3rem`. **Default: `50px`**.|

<sub>────────────</sub>


 
- **[lin-subheading]** – Adds a smaller subheading with style options.  
- **[lin-body-text]** – Displays paragraph text with optional styling.  

### Buttons & Call-to-Action
- **[lin-button]** – Adds a clickable button with link, colors, and hover effects.  
- **[lin-cta]** – Adds a call-to-action section with heading, text, and button.  

### Media & Interactive
- **[lin-slider]** – Creates a slider/carousel for images, content, or cards.  

### Content Blocks
- **[lin-card]** – Displays a card layout for content blocks or services.  
- **[lin-testimonial]** – Adds a testimonial block with user image, name, and text.  
- **[lin-latest-portfolio]** – Shows latest portfolio items dynamically from your custom post type.
- More shortcodes will be added as the theme develops.

---

## Color Palettes
- **Primary:** #7c3aed
- **Secondary:** #f45aaa
- **Accent:** #22bad8
- **Neutral Light:** #efeaf7
- **Neutral Dark:** #28104e
- **Text:** #333333

---

## Author
**Sam Banihit** – Developer & Designer

---

Lin Theme is perfect for developers who want a solid base theme that’s easy to extend and customize for any type of website.
