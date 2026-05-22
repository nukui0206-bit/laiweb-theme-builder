# Design Parts Inventory

## Header Candidates

### town-suido

Best for conversion-heavy local service sites.

Features:

- Logo plus descriptive read text.
- LINE consultation button.
- Mail consultation button.
- Prominent phone number.
- Full navigation bar.
- Hamburger/offcanvas menu.

Source:

```text
sources/town-suido/theme-doc/include/header.php
```

### 4foot4

Best for clinic, salon, store, reservation-based businesses.

Features:

- Centered logo.
- Desktop nav.
- Floating/visible online reservation CTA.
- Hamburger/offcanvas menu.

Source:

```text
sources/4foot4/theme-doc/include/header.php
```

### laiweb

Best for corporate/service/LP sites.

Features:

- Compact logo/nav/CTA layout.
- Simple consultation button.
- Works well for service marketing pages.

Source:

```text
sources/laiweb/theme-doc/include/header.php
```

## Footer Candidates

### Standard nav footer

Used by town-suido and 4foot4.

Features:

- Navigation list.
- Secondary nav.
- Offcanvas menu support.
- Preloader block.

### Rich service footer

Used by laiweb.

Features:

- Logo/company block.
- Service links.
- Plan links.
- FAQ/news/column/download links.
- Policy links.
- Background image/overlay.

## Top Section Candidates

### town-suido

- Problem/service card grid.
- Strong conversion CTA.
- Benefit/reason blocks.
- Local-service trust indicators.
- Contact block with phone, LINE, email.

### 4foot4

- News list.
- Service menu grid.
- Gallery.
- Reservation block.
- Access/map section.
- Schedule table patterns.

### laiweb

- Problem list.
- Feature cards.
- Pricing cards.
- Area block.
- News/column split.
- Download/contact conversion sections.

## CSS Strategy

Keep:

```text
assets/css/style.css
assets/css/add.css
assets/scss/
```

Use `style.css` for compiled base design and reusable components.

Use `add.css` for:

- project-specific overrides,
- urgent fixes,
- one-off design tuning,
- post-delivery minor customization.

Avoid using `add.css` for core reusable section design once the new theme matures.

