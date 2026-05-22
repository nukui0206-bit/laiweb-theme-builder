# WordPress Theme Builder Audit

## Sources

```text
sources/town-suido/theme-doc
sources/town-suido/core

sources/4foot4/theme-doc
sources/4foot4/core

sources/laiweb/theme-doc
sources/laiweb/core
```

## Source Servers

```text
town-suido.com  xs-laide10:/home/laide10/town-suido.com/public_html/cms/design/themes/doc
4foot4.com      xs-laide4:/home/laide4/4foot4.com/public_html/cms/design/themes/doc
laiweb.jp       xs-laide12:/home/laide12/laiweb.jp/public_html/cms/wp-content/themes/doc
```

## Initial Finding

All three sites use a related `doc` theme architecture.

The theme depends on a domain-level `core` directory:

```php
define('CORE_DIR', ABSOLUTE_PATH . '/core');
define('SLIB_DIR', CORE_DIR . '/wLib');  // town-suido, 4foot4
define('SLIB_DIR', CORE_DIR . '/lpLib'); // laiweb
require_once(SLIB_DIR . '/wmp-setting.php');
```

`core` handles shared WordPress behavior: admin customization, ACF option pages, common helper functions, SEO title generation, breadcrumbs, shortcodes, JSON-LD, media helpers, and common script/style loading helpers.

## Theme Shape

Important files:

```text
functions.php
index.php
include/doctype.php
include/header.php
include/footer.php
include/visual.php
include/script.php
include/nav.php
assets/css/style.css
assets/css/add.css
assets/scss/
function/site.php
page/
```

Current implementation pattern:

- `index.php` contains top-page sections directly.
- `include/header.php` and `include/footer.php` are customized per project.
- `include/visual.php` controls the first-view area.
- `assets/css/style.css` is compiled CSS, including Bootstrap and theme components.
- `assets/css/add.css` is the project-level override file loaded after `style.css`.
- ACF option pages already exist for initial settings, header settings, and footer settings, but layout selection is not yet implemented.

## File Counts

```text
town-suido: core 100 files, theme-doc 299 files
4foot4:     core 101 files, theme-doc 288 files
laiweb:     core 200 files, theme-doc 290 files
```

## add.css Usage

```text
town-suido add.css: minimal
4foot4 add.css: minimal
laiweb add.css: active override layer, pricing/cards/footer/CTA/nav/form adjustments
```

`add.css` should remain as the final manual adjustment layer in the new theme.

## Best Base

Use `laiweb` as the first working base because it is closest to the target product direction: service/LP style, active use of `add.css`, and more recent practical customization.

Then import:

- `town-suido`: strong CTA, phone/LINE/contact header, service card blocks, local-service conversion patterns.
- `4foot4`: clinic/store style header, reservation CTA, gallery, schedule/access/service menu patterns.

