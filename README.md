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
3. Configure your customizer settings and add shortcodes to your pages or posts using the WordPress block editor or classic editor.

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

## Starter Page Templates

Lin Theme includes ready-to-use shortcode templates that you can copy and paste into your WordPress pages.

### Available Templates
- [Homepage Template](./templates/homepage-template.txt)
- [About Page Template](./templates/about-page-template.txt)
- [Services Page Template](./templates/services-page-template.txt)
- [Contact Page Template](./templates/contact-page-template.txt)
- [Portfolio Page Template](./templates/portfolio-page-template.txt)

> **Tip:** Open the file, copy the shortcode layout, and paste it into your page editor.

---

## Customizer
Lin Theme comes with built-in customizer options so you can easily change the appearance of your website without touching code:
- to be added...
  
---

## Shortcodes
> **Note:** Some layout shortcodes rely on Bootstrap classes for proper responsive behavior.

Lin Theme includes several handy shortcodes for content layout and styling:

**────────────────────────────────────**

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
|`height`	 |<ul><li>Default spacer height.</li><li>Accepts any valid CSS height value, e.g., `20px`, `2rem`.</li><li>Used if no device-specific height is set.</li><li>**Default: `20px`**.</li></ul>|
|`sm`	       |<ul><li>Spacer height for mobile devices (`≤ 767px`).</li><li>Accepts any CSS height value, e.g., `10px`.</li></ul>|
|`md`	       |<ul><li>Spacer height for tablets (`≤ 991px`).</li><li>Accepts any CSS height value, e.g., `15px`.</li></ul>|
|`lg`	       |<ul><li>Spacer height for desktops (`> 991px`).</li><li>Accepts any CSS height value, e.g., `30px`.</li></ul>|

**────────────────────────────────────**

### Text

#### `[lin-heading]`
**Description:** Adds a styled heading (H1–H6) with customizable tag, alignment, font weight, color, size, and bottom margin.

| Attributes | Description |
|------------|-------------|
|`tag`	    |<ul><li>Sets the HTML heading tag.</li><li>Accepts `h1`–`h6`.</li><li>**Default: `h1`**.</li></ul>|
|`align`	    |<ul><li>Sets text alignment.</li><li>Accepts `left`, `center`, `right`.</li><li>**Default: `center`**.</li></ul>|
|`fontweight`|<ul><li>Sets the font weight.</li><li>Accepts CSS font-weight values like `normal`, `bold`, `600`, etc.</li><li>**Default: `bold`**.</li></ul>|
|`color`	       |<ul><li>Sets the text color.</li><li>Accepts any valid CSS color value, e.g., `#333333`, `red`, `rgba(0,0,0,0.7)`.</li><li>**Default: `#333333`**.</li></ul>|
|`marginbottom` |<ul><li>Sets bottom margin of the heading.</li><li>Accepts any CSS margin value, e.g., `10px`, `1rem`.</li><li>**Default: `10px`**.</li></ul>|
|`size`	       |<ul><li>Sets font size.</li><li>Accepts any CSS size value, e.g., `50px`, `3rem`.</li><li>**Default: `50px`**.</li></ul>|

<sub>────────────</sub>

#### `[lin-subheading]`
**Description:** Adds a styled subheading with customizable tag, alignment, font weight, color, size, and bottom margin.

| Attributes | Description |
|------------|-------------|
|`tag` |<ul><li>Sets the HTML heading tag.</li><li>Accepts `h1`–`h6`.</li><li>**Default: `h5`**.</li></ul>|
|`align` |<ul><li>Sets text alignment.</li><li>Accepts `left`, `center`, `right`.</li><li>**Default: `center`**.</li></ul>|
|`fontweight` |<ul><li>Sets the font weight.</li><li>Accepts CSS font-weight values like `normal`, `bold`, `600`, etc.</li><li>**Default: `semibold`**.</li></ul>|
|`color` |<ul><li>Sets the text color.</li><li>Accepts any valid CSS color value, e.g., `#6b6b6b`, `red`, `rgba(0,0,0,0.7)`.</li><li>**Default: `#6b6b6b`**.</li></ul>|
|`marginbottom` |<ul><li>Sets bottom margin of the subheading.</li><li>Accepts any CSS margin value, e.g., `10px`, `1rem`.</li><li>**Default: `10px`**.</li></ul>|
|`size` |<ul><li>Sets font size.</li><li>Accepts any CSS size value, e.g., `20px`, `1.25rem`.</li><li>**Default: `20px`**.</li></ul>|

<sub>────────────</sub>

#### `[lin-body-text]`
**Description:** Displays paragraph or body text with optional styling. Supports font size, color, and text alignment.

| Attributes | Description |
|------------|-------------|
| `size`     | <ul><li>Sets the font size in pixels.</li><li>Accepts numeric values only.</li><li>If empty, it uses the global/default size.</li></ul> |
| `color`    | <ul><li>Sets the text color.</li><li>Accepts any valid CSS color value, e.g., `#333333`, `red`, `rgba(0,0,0,0.5)`</li><li>**Default: `#333333`**.</li></ul> |
| `align`    | <ul><li>Sets text alignment.</li><li>Accepts `left`, `center`, `right`.</li><li>If empty, uses default alignment.</li></ul> ||

**────────────────────────────────────**


### Buttons & Call-to-Action

#### `[lin-button]`
**Description:** Adds a clickable button with customizable link, colors, alignment, and CSS class. Supports opening the link in a new tab safely and can be styled via custom classes or inline color attributes.

| Attributes | Description |
|------------|-------------|
| `url`       | <ul><li>Specifies the button link URL.</li><li>Accepts any valid URL.</li><li>**Default: `#`**.</li></ul> |
| `color`     | <ul><li>Sets the button background color.</li><li>Accepts any valid HEX or CSS color value.</li><li>**Default: `#7c3aed`**.</li></ul> |
| `textcolor` | <ul><li>Sets the button text color.</li><li>Accepts any valid HEX or CSS color value.</li><li>**Default: `#ffffff`**.</li></ul> |
| `class`     | <ul><li>Optional CSS class for additional styling.</li><li>Can be used to apply custom styles from your theme or stylesheet.</li></ul> |
| `target`    | <ul><li>Specifies how the link opens.</li><li>Accepts `_self` (same tab) or `_blank` (new tab).</li><li>**Default: `_self`**.</li></ul> |
| `align`     | <ul><li>Sets horizontal alignment of the button.</li><li>Accepts `left`, `center`, `right`.</li><li>**Default: `left`**.</li></ul> |

<sub>────────────</sub>

#### `[lin-cta]`
**Description:** Adds a Call-to-Action section with heading, subheading, button, and background.  

| Attributes | Description |
|------------|-------------|
| *(none)*   | All settings are controlled via the Customizer. |

**────────────────────────────────────**

### Sliders

#### `[lin_slider]`
**Description:** Creates a responsive slider container that holds multiple slider items. The number of visible items can be set for desktop, tablet, and mobile. Each item is added via the `[lin_slider_item]` shortcode.

| Attributes | Description |
|------------|-------------|
| `max-d`   | <ul><li>Maximum number of visible items on desktop.</li> <li>**Default:** `6`</li></ul> |
| `max-t`   | <ul><li>Maximum number of visible items on tablet.</li> <li>**Default:** `4` </li></ul> |
| `max-m`   | <ul><li>Maximum number of visible items on mobile.</li> <li>**Default:** `2` </li></ul> |
| `height`  | <ul><li>Slider height.</li> <li>Accepts any CSS height value, e.g.,`150px`.</li>  <li>**Default:** `150px` </li></ul> |
| `shadow`  | <ul><li>Adds shadow to items if set to `true`.</li> <li>**Default:** `false` </li></ul> |

---

#### `[lin_slider_item]`
**Description:** Represents an individual item within a `[lin_slider]` container. Can include an image, background color, and padding.

| Attributes | Description |
|------------|-------------|
| `src`      | <ul><li>URL of the image to display.</li><li> **Required.**</li> </ul>|
| `bg-color` | <ul><li>Background color of the slider item.</li> <li>Accepts any CSS color value.</li> <li>**Optional.** </li></ul>|
| `padding`  | <ul><li>Inner spacing of the item.</li> <li>Accepts any CSS padding value.</li> <li>**Default:** `20px`</li> </ul>| 

**────────────────────────────────────**

### Card

#### `[lin-card]`
**Description:** A flexible card container that can hold nested card elements. Supports optional border styling.

| Attributes | Description |
|------------|-------------|
| `border` | <ul><li>Sets the card border style.</li><li>Accepts any valid CSS border value, e.g., `1px solid #fff`.</li><li>**Default:** none.</li></ul> |

<sub>────────────</sub>

#### `[lin-card-img]`
**Description:** Adds an image inside the card.

| Attributes | Description |
|------------|-------------|
| `src` | <ul><li>Image source URL.</li><li>Required for the image to display.</li></ul> |
| `alt` | <ul><li>Alternative text for accessibility and SEO.</li></ul> |

<sub>────────────</sub>

#### `[lin-card-title]`
**Description:** Adds the main title of the card.

| Attributes | Description |
|------------|-------------|
| `color` | <ul><li>Text color of the title.</li><li>Accepts any valid CSS color value.</li><li>**Default:** `#333333`.</li></ul> |

<sub>────────────</sub>

#### `[lin-card-subtitle]`
**Description:** Adds a subtitle or secondary heading inside the card.

| Attributes | Description |
|------------|-------------|
| `color` | <ul><li>Text color of the subtitle.</li><li>Accepts any valid CSS color value.</li><li>**Default:** `#666666`.</li></ul> |

<sub>────────────</sub>

#### `[lin-card-desc]`
**Description:** Adds descriptive paragraph text inside the card.

| Attributes | Description |
|------------|-------------|
| `color` | <ul><li>Text color of the description.</li><li>Accepts any valid CSS color value.</li><li>**Default:** `#333333`.</li></ul> |

<sub>────────────</sub>

#### `[lin-card-btn]`
**Description:** Adds a clickable button inside the card.

| Attributes | Description |
|------------|-------------|
| `url` | <ul><li>Button link URL.</li><li>Accepts any valid URL.</li><li>**Default:** `#`.</li></ul> |

**────────────────────────────────────**

### Dynamic Content Blocks

#### `[lin_testimonial]`
**Description:** Displays a dynamic testimonial carousel from the `testimonial` custom post type.

**Recommended:** Use at least 3 testimonials for proper carousel functionality.

**Attributes:** None

<sub>────────────</sub>

#### `[lin_latest_portfolio]`
**Description:** Displays the latest portfolio items dynamically from the `portfolio` custom post type in a responsive grid layout.

| Attributes | Description |
|------------|-------------|
| `posts`    | <ul><li>Number of portfolio items to display.</li> <li>**Default:** `3` </li></ul>|

---

## Author
**Sam Banihit** – Developer & Designer

---

Lin Theme is perfect for developers who want a solid base theme that’s easy to extend and customize for any type of website.
