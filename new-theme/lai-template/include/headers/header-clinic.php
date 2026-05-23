<?php

/**
 * Header pattern: clinic
 * - 中央集約レイアウト（中央ロゴ + 下段ナビ + 固定 CTA）
 * - クリニック / 店舗 / 予約導線重視向け
 */

$logo_wrap = (is_front_page() || is_home()) ? 'h1' : 'div';
$hamburger_pattern = function_exists('lai_template_current_header_hamburger') ? lai_template_current_header_hamburger() : 'none';
$show_hamburger = ($hamburger_pattern !== 'none');

$reservation_url = function_exists('lai_template_header_reservation_url') ? lai_template_header_reservation_url() : '';
?>

<header id="g-header" class="g-header" style="--background-color: #fff">
  <div class="container-fluid p-0">
    <div class="row g-0 justify-content-center align-items-center">
      <!-- 中央ロゴ -->
      <div class="g-header__inner">
        <<?= $logo_wrap; ?> class="g-header__logo">
          <a href="<?= esc_url(home_url()); ?>" class="g-header__logo-link">
            <img src="<?= esc_url(get_field('logo', 'option')); ?>" alt="<?= esc_attr(get_field('company', 'option')); ?>" class="g-header__logo-link-img">
          </a>
        </<?= $logo_wrap; ?>>
      </div>

      <!-- PC: ナビ -->
      <div class="col-12 d-none d-lg-block">
        <nav id="g-nav" class="g-nav navbar-expand-lg">
          <div class="navbar-collapse">
            <ul class="navbar-nav g-nav__list row">
              <?php get_template_part('include/nav'); ?>
            </ul>
          </div>
        </nav>
      </div>

      <!-- ハンバーガー -->
      <?php if ($show_hamburger) : ?>
        <div class="g-header__nav">
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
        </div>
      <?php endif; ?>

      <!-- 予約 CTA（固定）-->
      <?php if ($reservation_url !== '') : ?>
        <a href="<?= esc_url($reservation_url); ?>" class="g-header__resv" target="_blank" rel="noopener">
          <span class="ttl"><i class="far fa-calendar-alt"></i> オンライン予約</span>
        </a>
      <?php endif; ?>
    </div>
  </div>
</header>
