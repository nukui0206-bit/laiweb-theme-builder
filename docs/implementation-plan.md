# Implementation Plan

## Goal

Build a unified WordPress theme that reduces per-project PHP editing.

Current workflow:

```text
All-in-One WP Migration clone
ACF adjustment
index.php customization
add.css/style changes
page creation
```

Target workflow:

```text
Install unified theme
Choose site type/header/footer/visual/top sections in admin
Fill text, images, links, colors, CTA settings
Use add.css only for final project-specific polish
```

## Local Working Copy

Initial working theme:

```text
new-theme/lai-template
```

This is currently copied from:

```text
sources/laiweb/theme-doc
```

## Phase 1: Non-Destructive Refactor

1. Rename theme metadata from `WMP` to a new working name.
2. Create template directories:

```text
templates/headers/
templates/footers/
templates/visuals/
templates/sections/
templates/parts/
```

3. Move current `include/header.php` variants into header templates.
4. Move current `include/footer.php` variants into footer templates.
5. Keep existing `include/header.php` and `include/footer.php` as dispatchers.

Example:

```php
$layout = get_field('header_layout', 'option') ?: 'laiweb';
get_template_part('templates/headers/header', $layout);
```

## Phase 2: Admin Layout Selection

Add ACF option fields:

```text
header_layout
footer_layout
visual_layout
site_type
enabled_content_modules
content_module_labels
top_sections
primary_color
secondary_color
accent_color
cta_type
cta_tel
cta_line_url
cta_contact_page
custom_css
```

Possible header layouts:

```text
header-laiweb-simple
header-town-conversion
header-clinic-reservation
```

Possible footer layouts:

```text
footer-standard-nav
footer-laiweb-rich
footer-simple
```

Content module settings:

```text
news: お知らせ
faq: よくある質問
case: 施工事例/制作実績/実績・事例
voice: お客様の声
product: 商品紹介
recruit: 採用情報
staff: スタッフ
column: コラム
gallery: ギャラリー
```

Implementation policy:

```text
Use the existing content_type behavior as the base idea.
Selected modules should appear in the admin menu and section choices.
Unselected modules should be hidden from normal admin workflows.
Do not delete posts, fields, or templates when a module is disabled.
Avoid duplicate CPT registration when CPT UI or imported settings already define the post type.
Keep labels configurable because the three source themes use different names for similar content.
```

## Phase 3: Top Page Section Builder

Break `index.php` into selectable sections:

```text
hero
problem-list
service-cards
features
news
columns
gallery
access
pricing
faq
cta
area
```

Each section should be reusable and driven by ACF fields where practical.

Initial MVP should support:

```text
header selection
footer selection
visual selection
content module show/hide
top section show/hide and order
color variables
CTA settings
add.css override
```

## Phase 4: Core Strategy

Decision needed:

1. Keep current domain-level `/core` dependency.
2. Move `core` into the theme for portability.
3. Convert `core` into a small companion plugin.

Recommendation:

For the new sellable/reusable template, move theme-specific common functions into the theme or a companion plugin. Relying on domain-level `/core` makes All-in-One migration and reuse more fragile.

Short term: keep compatibility with existing `core`.

Long term: package `core` as:

```text
lai-template-core plugin
lai-template theme
```

## Phase 5: Migration Safety

Before applying to production sites:

1. Test on a staging WordPress install.
2. Verify ACF Pro is available.
3. Verify existing option fields still resolve.
4. Verify `style.css + add.css` load order.
5. Verify `wmp_get_link`, image helpers, post type archives, and nav rendering.
6. Compare top page screenshots before/after.
