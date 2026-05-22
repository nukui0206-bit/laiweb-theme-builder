<?php

/**
 * Header pattern: laiweb
 * - シンプルな1段構成（左ロゴ / 中央ナビ / 右 CTA）
 * - コーポレート / サービス / LP 向け
 */

// グローバル変数
if (defined('SLIB_DIR') && file_exists(SLIB_DIR . '/lib/wmp-global.php')) {
  require_once(SLIB_DIR . '/lib/wmp-global.php');
}

$logo_wrap = (is_front_page() || is_home()) ? 'h1' : 'div';
$hamburger_pattern = function_exists('lai_template_current_header_hamburger') ? lai_template_current_header_hamburger() : 'none';
$show_hamburger = ($hamburger_pattern !== 'none');
?>

<header id="g-header" class="g-header" style="--background-color: #fff;">
  <div class="container-fluid px-3 py-3">
    <div class="row g-0 justify-content-between align-items-center">
      <!-- ロゴ -->
      <div class="col-6 col-lg-2">
        <div class="g-header__inner">
          <<?= $logo_wrap; ?> class="g-header__logo">
            <a href="<?= esc_url(home_url()); ?>" class="g-header__logo-link">
              <img src="<?= esc_url(get_field('logo', 'option')); ?>" alt="<?= esc_attr(get_field('company', 'option')); ?>" class="g-header__logo-link-img" width="159" height="35">
            </a>
          </<?= $logo_wrap; ?>>
        </div>
      </div>

      <!-- ナビゲーション -->
      <div class="col d-none d-lg-flex justify-content-center">
        <nav id="g-nav" class="g-nav navbar-expand-lg" style="--bc: #fff;">
          <div class="navbar-collapse">
            <ul class="navbar-nav g-nav__list row">
              <?php get_template_part('include/nav'); ?>
            </ul>
          </div>
        </nav>
      </div>

      <!-- 右側 CTA + ハンバーガー -->
      <div class="col-6 col-lg-<?= $show_hamburger ? '3' : '2'; ?>">
        <div class="g-header__nav text-end d-flex justify-content-end align-items-center gap-2">
          <a href="<?= esc_url(wmp_get_link('contact', '')); ?>" class="c-btn-solid-border --white --small c-border u-font-pc-16 u-font-sp-16" style="--color: #fff; --bc: var(--line); --border: transparent; --border2: transparent; --radius: 5px">
            <span class="c-btn-solid-border__txt">
              <span class="c-btn-solid-border__txt-in"><i class="fas fa-envelope"></i> 無料相談はこちら</span>
            </span>
            <span class="c-btn-solid-border__l"></span>
            <span class="c-btn-solid-border__t"></span>
            <span class="c-btn-solid-border__r"></span>
            <span class="c-btn-solid-border__b"></span>
            <span class="c-btn-solid-border__icon">
              <i class="fas fa-angle-double-right"></i>
            </span>
          </a>

          <?php if ($show_hamburger) : ?>
            <div class="g-header__nav-btn">
              <div class="popup enabled" data-target="menu" data-bs-toggle="offcanvas" data-bs-target="#g-nav-panel" aria-controls="g-nav-panel" aria-label="menu">
                <button class="open" type="button" aria-label="メニューオープン">
                  <div></div>
                  <div></div>
                  <div></div>
                </button>
                <button class="close" aria-label="メニュークローズ">
                  <div><div></div></div>
                  <div><div></div></div>
                </button>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</header>
