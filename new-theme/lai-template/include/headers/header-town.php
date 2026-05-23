<?php

/**
 * Header pattern: town
 * - 2段構成（上段：ロゴ＋説明文 / CTAブロック、下段：ナビ）
 * - CV重視 / LP / 地域サービス向け
 * - LINE / メール / 電話番号を強く打ち出す
 */

// グローバル変数
if (defined('SLIB_DIR') && file_exists(SLIB_DIR . '/lib/wmp-global.php')) {
  require_once(SLIB_DIR . '/lib/wmp-global.php');
}

$logo_wrap = (is_front_page() || is_home()) ? 'h1' : 'div';
$hamburger_pattern = function_exists('lai_template_current_header_hamburger') ? lai_template_current_header_hamburger() : 'none';
$show_hamburger = ($hamburger_pattern !== 'none');

$subcatch = function_exists('lai_template_header_subcatch') ? lai_template_header_subcatch() : '';
$line_url = function_exists('lai_template_header_line_url') ? lai_template_header_line_url() : '';
$tel_contact = function_exists('get_field') ? (string) get_field('tel_contact', 'option') : '';
?>

<header id="g-header" class="g-header g-header--town" style="--background-color: #fff;">
  <div class="container-fluid p-0">
    <div class="row g-0 justify-content-between align-items-stretch">
      <!-- ロゴ + サブキャッチ -->
      <div class="col-6 col-lg-3">
        <div class="g-header__inner">
          <?php if ($subcatch !== '') : ?>
            <p class="g-header__read"><?= esc_html($subcatch); ?></p>
          <?php endif; ?>
          <<?= $logo_wrap; ?> class="g-header__logo">
            <a href="<?= esc_url(home_url()); ?>" class="g-header__logo-link">
              <img src="<?= esc_url(get_field('logo', 'option')); ?>" alt="<?= esc_attr(get_field('company', 'option')); ?>" class="g-header__logo-link-img" width="159" height="35">
            </a>
          </<?= $logo_wrap; ?>>
        </div>
      </div>

      <!-- PC: CTAブロック（LINE / メール / 電話） -->
      <div class="col-6 col-lg-8 d-none d-lg-block">
        <div class="row g-0 justify-content-end align-items-center">
          <?php if ($line_url !== '') : ?>
            <div class="col col-lg-6 px-5">
              <div class="row">
                <div class="col-12">
                  <p class="fw-bold">Webでのご相談はこちら!!</p>
                </div>
                <div class="col-6">
                  <a href="<?= esc_url($line_url); ?>" class="c-btn-solid-border --white --small c-border u-font-pc-16 u-font-sp-16" style="--color: #fff; --bc: var(--line); --border: transparent; --border2: transparent; --radius: 5px">
                    <span class="c-btn-solid-border__txt">
                      <span class="c-btn-solid-border__txt-in">LINEで無料相談</span>
                    </span>
                    <span class="c-btn-solid-border__l"></span>
                    <span class="c-btn-solid-border__t"></span>
                    <span class="c-btn-solid-border__r"></span>
                    <span class="c-btn-solid-border__b"></span>
                    <span class="c-btn-solid-border__icon">
                      <i class="fas fa-angle-double-right"></i>
                    </span>
                  </a>
                </div>
                <div class="col-6">
                  <a href="<?= esc_url(wmp_get_link('contact', '')); ?>" class="c-btn-solid-border --white --small c-border u-font-pc-16 u-font-sp-16" style="--color: #fff; --bc: var(--ac); --border: transparent; --border2: transparent; --radius: 5px">
                    <span class="c-btn-solid-border__txt">
                      <span class="c-btn-solid-border__txt-in">メールで無料相談</span>
                    </span>
                    <span class="c-btn-solid-border__l"></span>
                    <span class="c-btn-solid-border__t"></span>
                    <span class="c-btn-solid-border__r"></span>
                    <span class="c-btn-solid-border__b"></span>
                    <span class="c-btn-solid-border__icon">
                      <i class="fas fa-angle-double-right"></i>
                    </span>
                  </a>
                </div>
              </div>
            </div>
          <?php else : ?>
            <div class="col col-lg-6 px-5">
              <div class="row">
                <div class="col-12">
                  <p class="fw-bold">Webでのご相談はこちら!!</p>
                </div>
                <div class="col-12">
                  <a href="<?= esc_url(wmp_get_link('contact', '')); ?>" class="c-btn-solid-border --white --small c-border u-font-pc-16 u-font-sp-16" style="--color: #fff; --bc: var(--ac); --border: transparent; --border2: transparent; --radius: 5px">
                    <span class="c-btn-solid-border__txt">
                      <span class="c-btn-solid-border__txt-in"><i class="fas fa-envelope"></i> メールで無料相談</span>
                    </span>
                    <span class="c-btn-solid-border__l"></span>
                    <span class="c-btn-solid-border__t"></span>
                    <span class="c-btn-solid-border__r"></span>
                    <span class="c-btn-solid-border__b"></span>
                    <span class="c-btn-solid-border__icon">
                      <i class="fas fa-angle-double-right"></i>
                    </span>
                  </a>
                </div>
              </div>
            </div>
          <?php endif; ?>

          <?php if ($tel_contact !== '') : ?>
            <div class="col col-lg-4 py-3 u-bg-ori" style="--bg: #f5f5f5">
              <div class="row g-0">
                <div class="col-12">
                  <p class="fw-bold text-nowrap">お急ぎの方は電話で相談<small class="fw-normal u-font-pc-12"> (24時間受付中)</small></p>
                </div>
                <div class="col-12">
                  <span class="number fw-bold u-font-pc-24 u-font-sp-18 u-font-ac" data-action="call" data-tel="<?= esc_attr($tel_contact); ?>">
                    <i class="fa-solid fa-square-phone"></i>
                    <span><?= esc_html($tel_contact); ?></span><br>
                  </span>
                </div>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <!-- SP: メール相談ボタン -->
      <div class="col-2 d-block d-lg-none">
        <a href="<?= esc_url(wmp_get_link('contact', '')); ?>" class="g-header__nav-sp-btn text-white"><i class="fa-solid fa-envelope"></i> 無料相談をする</a>
      </div>

      <!-- ハンバーガー -->
      <?php if ($show_hamburger) : ?>
        <div class="col-2 col-lg-1">
          <div class="g-header__nav-btn --linedeg" style="--border: #fff; --bc: var(--kc)">
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
    </div>

    <!-- 下段：ナビ -->
    <div class="row g-0 justify-content-between align-items-center">
      <div class="col-12">
        <nav id="g-nav" class="g-nav navbar-expand-lg" style="--bc:var(--sc)">
          <div class="navbar-collapse">
            <ul class="navbar-nav g-nav__list row">
              <?php get_template_part('include/nav'); ?>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</header>
