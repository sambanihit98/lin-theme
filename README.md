# Lin - WordPress Theme (WIP)

**Lin Theme** is a modern, lightweight, and fully responsive WordPress theme designed for businesses, portfolios, and creative websites. It combines clean aesthetics with flexible functionality, offering a professional look while maintaining fast performance.  

---

## Key Features
- Fully responsive layout for desktop, tablet, and mobile.
- SEO-friendly markup and accessible design principles.

---

## Installation
1. Upload the `lin` theme folder to `/wp-content/themes/`.
2. Activate the theme via the **Appearance → Themes** menu in WordPress.
3. Configure your customizer settings to adjust colors, fonts, and logo.
   
---

## Customizer
Lin Theme comes with built-in customizer options so you can easily change the appearance of your website without touching code:
- to be added... 

---

## Required Plugins
To use all features of Lin Theme, we recommend installing the following plugins:
- **Classic Editor** – restores the old WordPress editor for simpler editing.
- **Advanced Custom Fields (ACF)** – required for the **Portfolio** and **Testimonial** post types to manage custom fields, images, and meta data for content display.

---

## Dependencies
Lin Theme uses the following front-end framework:

- **Bootstrap 5** – required for the theme’s grid system, responsive layout, spacing utilities, and component styling used by several shortcodes.

---

## Color Palettes

| Name | Hex | Preview |
|------|-----|--------|
| Primary | `#7c3aed` | ![Primary](https://singlecolorimage.com/get/7c3aed/40x20) |
| Secondary | `#f45aaa` | ![Secondary](https://singlecolorimage.com/get/f45aaa/40x20) |
| Accent | `#22bad8` | ![Accent](https://singlecolorimage.com/get/22bad8/40x20) |
| Neutral Light | `#efeaf7` | ![Neutral Light](https://singlecolorimage.com/get/efeaf7/40x20) |
| Neutral Dark | `#28104e` | ![Neutral Dark](https://singlecolorimage.com/get/28104e/40x20) |
| Text | `#333333` | ![Text](https://singlecolorimage.com/get/333333/40x20) |
  
---

## Shortcodes
Lin Theme includes several handy shortcodes for content layout and styling:
> **Note:** Some layout shortcodes rely on Bootstrap classes for proper responsive behavior.

### Layout
#### `[lin-wrapper]`
**Description:** Wraps content into a container for structured layout.

| Attributes | Description |
|----------|-------------|
| `bg-color` |<ul><li>Sets the background color of the wrapper.</li> <li>Accepts any valid CSS color value (e.g. `#ffffff`, `red`, `rgb(255,255,255)`, `rgba(0,0,0,0.5)`).</li></ul>|

<sub>────────────</sub>

#### `[lin-row]`
**Description:** Creates a horizontal row for columns, useful for grid layouts. Supports Bootstrap alignment and gutter spacing.

| Attributes | Description |
|----------|-------------|
| `justify` | <ul><li>Sets horizontal alignment of columns.</li> <li>Accepts Bootstrap options: `start`, `center`, `end`, `around`, `between`, `evenly`.</li></ul> |
| `align` | <ul><li>Sets vertical alignment of columns.</li> <li>Accepts Bootstrap options: `start`, `center`, `end`, `baseline`, `stretch`.</li></ul> |
| `g` | <ul><li>Sets the gutter (spacing between columns).</li> <li>Accepts numeric values corresponding to Bootstrap gutter classes.</li> <li>**Default: `4`**.</li></ul> |

<sub>────────────</sub>

#### `[lin-column]`
**Description:** Defines a column inside a row; supports responsive sizing. 

| Attributes | Description |
|------------|-------------|
|`col`	    |<ul><li>Default column size (1–12).</li> <li>Equivalent to `col-*` in Bootstrap.</li> <li>**Default: `12`**.</li></ul>|
|`sm`	       |<ul><li>Column size for small screens (`col-sm-*`).</li> </ul>|
|`md`	       |<ul><li>Column size for medium screens (`col-md-*`).</li> </ul>|
|`lg`	       |<ul><li>Column size for large screens (`col-lg-*`).</li> </ul>|
|`xl`	       |<ul><li>Column size for extra-large screens (`col-xl-*`).</li> </ul>|
|`display`	 |<ul><li>Optional CSS display value (e.g., `block`, `flex`, `inline`).</li></ul>|

<sub>────────────</sub>

#### `[lin-divider]`
**Description:** Creates a horizontal divider line. Supports custom color, width, height, alignment, and bottom margin. 

| Attributes | Description |
|------------|-------------|
|`color`	       |<ul><li>Sets the divider color.</li> <li>Accepts any valid CSS color value, e.g., `#7c3aed`, `red`, `rgba(0,0,0,0.5)`.</li> <li>**Default: `#7c3aed`**.</li></ul>|
|`width`	       |<ul><li>Sets the divider width.</li> <li>Accepts any CSS width value, e.g., `60px`, `50%`.</li> <li>**Default: `60px`**.</li></ul>|
|`height`	    |<ul><li>Sets the divider thickness.</li> <li>Accepts any CSS height value, e.g., `3px`.</li> <li>**Default: `3px`**.</li></ul>|
|`align`	       |<ul><li>Sets horizontal alignment.</li> <li>Accepts `left`, `center`, `right`.</li> <li>**Default: `center`**.</li></ul>|
|`marginbottom` |<ul><li>Sets the bottom margin.</li> <li>Accepts any CSS margin value, e.g., `10px`, `1rem`.</li> <li>**Default: `0px`**.</li></ul>|

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

## Author
**Sam Banihit** – Developer & Designer

---

Lin Theme is perfect for developers who want a solid base theme that’s easy to extend and customize for any type of website.
