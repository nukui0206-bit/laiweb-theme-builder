<?php
$header_layout = (isset($args['header_layout']) && is_string($args['header_layout'])) ? $args['header_layout'] : '';
$panel_style = function_exists('lai_template_current_header_hamburger_panel_style') ? lai_template_current_header_hamburger_panel_style() : 'drawer';
$hamburger_classes = array('offcanvas', 'offcanvas-end', 'g-hamburger');
$hamburger_classes[] = 'g-hamburger--layout-' . sanitize_html_class($panel_style);

if ($header_layout !== '') {
  $hamburger_classes[] = 'g-hamburger--' . sanitize_html_class($header_layout);
}
?>

<style>
  .lai-header-hamburger-btn {
    width: 52px;
    height: 52px;
    background: rgba(255, 255, 255, 0.94);
    border: 1px solid rgba(var(--kc-rgb), 0.24);
    border-radius: 0;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
    align-items: center;
    justify-content: center;
    padding: 0;
    position: relative;
    z-index: 130;
    overflow: hidden;
    transition: background-color 0.24s ease, border-color 0.24s ease, box-shadow 0.24s ease, transform 0.24s ease;
  }

  .lai-header-hamburger-btn--round {
    border-radius: 50%;
  }

  .lai-header-hamburger-btn--square {
    border-radius: 8px;
  }

  .lai-header-hamburger-btn--dots {
    border-radius: 50%;
  }

  .lai-header-hamburger-btn:hover {
    background: #fff;
    border-color: rgba(var(--kc-rgb), 0.46);
    box-shadow: 0 16px 38px rgba(var(--kc-rgb), 0.28);
    transform: translateY(-1px);
  }

  .lai-header-hamburger-btn:focus {
    box-shadow: 0 0 0 3px rgba(var(--kc-rgb), 0.2);
  }

  .lai-header-hamburger-btn__icon {
    width: 28px;
    height: 28px;
    display: block;
    position: relative;
    z-index: 1;
    transform: rotate(0deg);
    transition: transform 0.3s ease;
  }

  .lai-header-hamburger-btn__line {
    width: 28px;
    height: 2px;
    background: var(--kc);
    border-radius: 999px;
    display: block;
    position: absolute;
    left: 0;
    transition: background-color 0.24s ease, opacity 0.24s ease, transform 0.3s ease, top 0.3s ease, width 0.3s ease;
  }

  .lai-header-hamburger-btn__dot {
    display: none;
  }

  .lai-header-hamburger-btn__line:nth-child(1) {
    top: 6px;
  }

  .lai-header-hamburger-btn__line:nth-child(2) {
    top: 13px;
    width: 20px;
    left: 4px;
  }

  .lai-header-hamburger-btn__line:nth-child(3) {
    top: 20px;
  }

  .lai-header-hamburger-btn:hover .lai-header-hamburger-btn__icon {
    transform: rotate(0deg);
  }

  .lai-header-hamburger-btn:hover .lai-header-hamburger-btn__line:nth-child(1) {
    transform: translateX(3px);
  }

  .lai-header-hamburger-btn:hover .lai-header-hamburger-btn__line:nth-child(2) {
    width: 28px;
    left: 0;
  }

  .lai-header-hamburger-btn:hover .lai-header-hamburger-btn__line:nth-child(3) {
    transform: translateX(-3px);
  }

  .lai-header-hamburger-btn--dots .lai-header-hamburger-btn__icon {
    width: 25px;
    height: 25px;
    display: grid;
    grid-template-columns: repeat(3, 5px);
    grid-template-rows: repeat(3, 5px);
    gap: 5px;
  }

  .lai-header-hamburger-btn--dots .lai-header-hamburger-btn__line {
    display: none;
  }

  .lai-header-hamburger-btn--dots .lai-header-hamburger-btn__dot {
    width: 5px;
    height: 5px;
    background: var(--kc);
    border-radius: 50%;
    display: block;
    transition: background-color 0.24s ease, transform 0.24s ease;
  }

  .lai-header-hamburger-btn--dots:hover .lai-header-hamburger-btn__dot:nth-of-type(4),
  .lai-header-hamburger-btn--dots:hover .lai-header-hamburger-btn__dot:nth-of-type(8),
  .lai-header-hamburger-btn--dots:hover .lai-header-hamburger-btn__dot:nth-of-type(12) {
    transform: translateX(2px);
  }

  .lai-header-hamburger-btn--dots:hover .lai-header-hamburger-btn__dot:nth-of-type(6),
  .lai-header-hamburger-btn--dots:hover .lai-header-hamburger-btn__dot:nth-of-type(10) {
    transform: translateX(-2px);
  }

  body:has(#g-nav-panel.show) .lai-header-hamburger-btn__icon {
    transform: rotate(0deg);
  }

  body:has(#g-nav-panel.show) .lai-header-hamburger-btn__line:nth-child(1) {
    top: 13px;
    transform: rotate(45deg);
    width: 28px;
    left: 0;
  }

  body:has(#g-nav-panel.show) .lai-header-hamburger-btn__line:nth-child(2) {
    opacity: 0;
    transform: scaleX(0);
  }

  body:has(#g-nav-panel.show) .lai-header-hamburger-btn__line:nth-child(3) {
    top: 13px;
    transform: rotate(-45deg);
    width: 28px;
    left: 0;
  }

  body:has(#g-nav-panel.show) .lai-header-hamburger-btn--dots .lai-header-hamburger-btn__line {
    display: block;
    height: 2px;
    border-radius: 999px;
  }

  body:has(#g-nav-panel.show) .lai-header-hamburger-btn--dots .lai-header-hamburger-btn__dot {
    display: none;
  }

  .g-hamburger {
    --bs-offcanvas-width: min(520px, 92vw);
    width: min(520px, 92vw) !important;
    height: calc(100vh - 24px) !important;
    top: 12px !important;
    right: 12px !important;
    background:
      linear-gradient(135deg, rgba(var(--kc-rgb), 0.94), rgba(var(--sc-rgb), 0.94)),
      var(--kc);
    border: 1px solid rgba(255, 255, 255, 0.24);
    border-radius: 18px 0 0 18px;
    box-shadow: -24px 0 60px rgba(0, 0, 0, 0.22);
    color: #fff;
    overflow: hidden;
    z-index: 1200;
  }

  .g-hamburger--layout-full {
    --bs-offcanvas-width: 100vw;
    width: 100vw !important;
    height: 100vh !important;
    top: 0 !important;
    right: 0 !important;
    background:
      radial-gradient(circle at 12% 18%, rgba(255, 255, 255, 0.22), transparent 24%),
      radial-gradient(circle at 84% 78%, rgba(255, 255, 255, 0.16), transparent 26%),
      linear-gradient(135deg, rgba(var(--kc-rgb), 0.98), rgba(var(--sc-rgb), 0.96)),
      var(--kc);
    border: 0;
    border-radius: 0;
    box-shadow: none;
    color: #fff;
  }

  .g-hamburger.g-hamburger--nav-bottom {
    height: calc(100vh - 94px) !important;
    top: 82px !important;
  }

  .g-hamburger.g-hamburger--layout-full {
    height: 100vh !important;
    top: 0 !important;
  }

  @media screen and (max-width: 1199px) {
    .g-hamburger.g-hamburger--nav-bottom {
      height: calc(100vh - 82px) !important;
      top: 73px !important;
    }
  }

  .g-hamburger:before {
    content: '';
    width: 100%;
    height: 100%;
    background-image: linear-gradient(rgba(255, 255, 255, 0.08) 1px, transparent 1px), linear-gradient(90deg, rgba(255, 255, 255, 0.08) 1px, transparent 1px);
    background-size: 36px 36px;
    position: absolute;
    inset: 0;
    opacity: 0.45;
    pointer-events: none;
  }

  .g-hamburger--layout-full:before {
    background:
      linear-gradient(rgba(255, 255, 255, 0.08) 1px, transparent 1px),
      linear-gradient(90deg, rgba(255, 255, 255, 0.08) 1px, transparent 1px);
    background-size: 48px 48px;
    opacity: 0.72;
  }

  .g-hamburger .offcanvas-header,
  .g-hamburger .offcanvas-body {
    position: relative;
    z-index: 1;
  }

  .g-hamburger .offcanvas-header {
    align-items: center;
    border-bottom: 1px solid rgba(255, 255, 255, 0.18);
    padding: 26px 28px 22px;
  }

  .g-hamburger .g-header__logo-link-img {
    max-width: 170px;
    filter: brightness(0) invert(1);
  }

  .g-hamburger--layout-full .g-header__logo {
    display: none;
  }

  .g-hamburger .btn-close {
    width: 42px;
    height: 42px;
    background-color: rgba(255, 255, 255, 0.14);
    border-radius: 50%;
    opacity: 1;
    padding: 13px;
  }

  .g-hamburger--layout-full .btn-close {
    width: 54px;
    height: 54px;
    background-color: rgba(255, 255, 255, 0.18);
    border: 1px solid rgba(255, 255, 255, 0.32);
    filter: invert(1) grayscale(1);
    position: absolute;
    top: 32px;
    right: 34px;
    z-index: 3;
  }

  .g-hamburger .g-hamburger__body {
    height: calc(100vh - 120px);
    padding: 30px 28px 34px;
  }

  .g-hamburger .list {
    display: block;
    margin: 0;
  }

  .g-hamburger .list .nav-item {
    width: 100%;
    margin: 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.16);
  }

  .g-hamburger .list .nav-link {
    color: #fff;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    padding: 18px 0;
    font-size: 17px;
    font-weight: 800;
    line-height: 1.35;
    text-decoration: none;
  }

  .g-hamburger .list .nav-link:after {
    content: attr(data-title);
    color: rgba(255, 255, 255, 0.52);
    font-size: 11px;
    font-weight: 700;
    line-height: 1;
    min-width: 52px;
    text-align: right;
  }

  .g-hamburger .list .nav-link:hover {
    color: var(--ac);
  }

  .g-hamburger--layout-full .offcanvas-header {
    border: 0;
    min-height: 0;
    padding: 0;
  }

  .g-hamburger--layout-full .offcanvas-body {
    align-items: center;
    justify-content: center;
    display: flex;
    height: 100vh;
    overflow-y: auto;
    padding: 88px 8vw 72px;
  }

  .g-hamburger--layout-full .g-hamburger__nav {
    width: min(1080px, 100%);
  }

  .g-hamburger--layout-full .list {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    column-gap: clamp(42px, 7vw, 92px);
    row-gap: 8px;
  }

  .g-hamburger--layout-full .list .nav-item {
    border: 0;
    overflow: hidden;
  }

  .g-hamburger--layout-full .list .nav-link {
    border-bottom: 1px solid rgba(255, 255, 255, 0.18);
    color: #fff;
    font-size: 28px;
    font-weight: 900;
    min-height: 88px;
    padding: 20px 0 20px 40px;
    position: relative;
  }

  .g-hamburger--layout-full .list .nav-link:before {
    content: '';
    width: 12px;
    height: 12px;
    background: var(--ac);
    border-radius: 50%;
    left: 0;
    opacity: 0.85;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    transition: transform 0.24s ease, background-color 0.24s ease;
  }

  .g-hamburger--layout-full .list .nav-link:after {
    color: rgba(255, 255, 255, 0.56);
    font-size: 12px;
  }

  .g-hamburger--layout-full .list .nav-link:hover {
    color: #fff;
    border-bottom-color: rgba(255, 255, 255, 0.42);
    transform: translateX(6px);
  }

  .g-hamburger--layout-full .list .nav-link:hover:before {
    background: #fff;
    transform: translateY(-50%) scale(1.35);
  }

  .g-hamburger .lower,
  .g-hamburger .nav-link i {
    display: none;
  }

  @media screen and (max-width: 575px) {
    .lai-header-hamburger-btn {
      width: 48px;
      height: 48px;
    }

    .g-hamburger {
      width: calc(100vw - 18px) !important;
      height: calc(100vh - 18px) !important;
      top: 9px !important;
      right: 9px !important;
      border-radius: 14px 0 0 14px;
    }

    .g-hamburger.g-hamburger--nav-bottom {
      height: calc(100vh - 78px) !important;
      top: 69px !important;
    }

    .g-hamburger.g-hamburger--layout-full {
      height: 100vh !important;
      top: 0 !important;
    }

    .g-hamburger .offcanvas-header {
      padding: 22px 22px 18px;
    }

    .g-hamburger .g-hamburger__body {
      padding: 24px 22px 30px;
    }

    .g-hamburger .list .nav-link {
      font-size: 16px;
      padding: 16px 0;
    }

    .g-hamburger--layout-full {
      background:
        radial-gradient(circle at 12% 16%, rgba(255, 255, 255, 0.2), transparent 26%),
        linear-gradient(135deg, rgba(var(--kc-rgb), 0.98), rgba(var(--sc-rgb), 0.96)),
        var(--kc);
    }

    .g-hamburger--layout-full .offcanvas-header {
      min-height: 0;
      padding: 0;
    }

    .g-hamburger--layout-full .offcanvas-body {
      height: 100vh;
      padding: 82px 28px 48px;
    }

    .g-hamburger--layout-full .list {
      display: block;
    }

    .g-hamburger--layout-full .btn-close {
      top: 20px;
      right: 20px;
    }

    .g-hamburger--layout-full .list .nav-link {
      font-size: 22px;
      min-height: 0;
      padding: 18px 0 18px 28px;
    }
  }
</style>

<div class="<?= esc_attr(implode(' ', $hamburger_classes)); ?>" tabindex="-1" id="g-nav-panel" aria-labelledby="g-nav-panel-label">
  <div class="offcanvas-header">
    <div id="g-nav-panel-label" class="g-header__logo">
      <a href="<?= home_url(); ?>" class="g-header__logo-link">
        <img src="<?= esc_url(get_field('logo', 'option')); ?>" alt="<?= esc_attr(get_field('company', 'option')); ?>" class="g-header__logo-link-img" width="159" height="35">
      </a>
    </div>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="メニューを閉じる"></button>
  </div>
  <div class="offcanvas-body g-hamburger__body">
    <nav class="g-hamburger__nav" aria-label="ハンバーガーメニュー">
      <ul class="list navbar-nav row">
        <?php get_template_part('include/nav', null, 'hamburger'); ?>
      </ul>
    </nav>
  </div>
</div>
