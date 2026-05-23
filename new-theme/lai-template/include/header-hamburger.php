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

  .lai-header-hamburger-btn:before {
    content: '';
    width: 72px;
    height: 72px;
    background: linear-gradient(90deg, rgba(var(--kc-rgb), 0.16), rgba(var(--sc-rgb), 0.32));
    position: absolute;
    inset: -8px;
    transform: translateX(66%);
    transition: transform 0.36s ease;
  }

  .lai-header-hamburger-btn:hover {
    background: #fff;
    border-color: rgba(var(--kc-rgb), 0.46);
    box-shadow: 0 16px 38px rgba(var(--kc-rgb), 0.28);
    transform: translateY(-1px);
  }

  .lai-header-hamburger-btn:hover:before {
    transform: translateX(-18%);
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
    width: 26px;
    height: 26px;
  }

  .lai-header-hamburger-btn--dots .lai-header-hamburger-btn__line {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    left: 9px;
  }

  .lai-header-hamburger-btn--dots .lai-header-hamburger-btn__line:nth-child(1) {
    top: 2px;
  }

  .lai-header-hamburger-btn--dots .lai-header-hamburger-btn__line:nth-child(2) {
    top: 10px;
    width: 7px;
    left: 9px;
  }

  .lai-header-hamburger-btn--dots .lai-header-hamburger-btn__line:nth-child(3) {
    top: 18px;
  }

  .lai-header-hamburger-btn--dots:hover .lai-header-hamburger-btn__line:nth-child(1),
  .lai-header-hamburger-btn--dots:hover .lai-header-hamburger-btn__line:nth-child(3) {
    transform: none;
  }

  .lai-header-hamburger-btn--dots:hover .lai-header-hamburger-btn__line:nth-child(2) {
    width: 7px;
    left: 9px;
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
    height: 2px;
    border-radius: 999px;
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

  .g-hamburger .btn-close {
    width: 42px;
    height: 42px;
    background-color: rgba(255, 255, 255, 0.14);
    border-radius: 50%;
    opacity: 1;
    padding: 13px;
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
  }
</style>

<div class="offcanvas offcanvas-end g-hamburger" tabindex="-1" id="g-nav-panel" aria-labelledby="g-nav-panel-label">
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
