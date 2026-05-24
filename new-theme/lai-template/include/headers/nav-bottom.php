<?php
// グローバル変数
require(SLIB_DIR . '/lib/wmp-global.php');
?>
<?php
$logo_wrap = (is_front_page() || is_home()) ? 'h1' : 'div';
$header_tel = function_exists('get_field') ? get_field('tel_contact', 'option') : '';
?>

<style>
  .g-header--nav-bottom {
    --background-color: rgba(255, 255, 255, 0.96);
    border-bottom: 1px solid rgba(var(--kc-rgb), 0.12);
    box-shadow: 0 14px 34px rgba(0, 0, 0, 0.06);
    backdrop-filter: blur(14px);
  }

  .g-header--nav-bottom .g-header__top {
    height: 70px;
    padding: 0 24px;
  }

  .g-header--nav-bottom .g-header__logo-link-img {
    max-width: 176px;
  }

  .g-header--nav-bottom .g-header__actions {
    height: 52px;
    gap: 10px;
  }

  .g-header--nav-bottom .g-header__actions > * {
    flex: 0 0 auto;
  }

  .g-header--nav-bottom .lai-header-hamburger-btn {
    align-self: center;
    flex: 0 0 52px;
    margin: 0 0 0 2px;
    transform: none;
  }

  .g-header--nav-bottom .lai-header-hamburger-btn:hover {
    transform: translateY(-1px);
  }

  .g-header--nav-bottom .g-header__action-btn {
    height: 44px;
    min-width: 142px;
    border-radius: 999px !important;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    display: flex;
    align-items: center;
    justify-content: center;
    padding-top: 0;
    padding-bottom: 0;
  }

  .g-header--nav-bottom .g-header__tel {
    background: rgba(var(--kc-rgb), 0.08);
    border: 1px solid rgba(var(--kc-rgb), 0.18);
    border-radius: 999px;
    color: var(--kc);
    display: flex;
    align-items: center;
    justify-content: center;
    height: 44px;
    min-height: 44px;
    line-height: 1;
    padding: 0 18px;
    text-decoration: none;
    white-space: nowrap;
    box-shadow: 0 8px 20px rgba(var(--kc-rgb), 0.08);
    transition: background-color 0.2s ease, border-color 0.2s ease, transform 0.2s ease;
  }

  .g-header--nav-bottom .g-header__tel:hover {
    background: rgba(var(--kc-rgb), 0.12);
    border-color: rgba(var(--kc-rgb), 0.28);
    transform: translateY(-1px);
  }

  .g-header--nav-bottom .g-header__tel-number {
    color: var(--kc);
    font-size: 24px;
    font-weight: 900;
    letter-spacing: 0;
  }

  .g-header--nav-bottom .g-header__tel-number i {
    font-size: 17px;
    margin-right: 7px;
    transform: translateY(-1px);
  }

  .g-header--nav-bottom .g-header__nav-row {
    border-top: 1px solid rgba(var(--kc-rgb), 0.1);
    background: rgba(255, 255, 255, 0.72);
    padding: 0 24px;
  }

  .g-header--nav-bottom .g-nav {
    --bc: transparent !important;
  }

  .g-header--nav-bottom .g-nav__list {
    min-height: 46px;
    align-items: center;
  }

  .g-header--nav-bottom .g-nav__list .nav-link {
    color: var(--fc);
    padding: 14px 14px 13px;
  }

  .g-header--nav-bottom .g-nav__list .nav-link:before {
    background: linear-gradient(var(--kc), var(--kc)) center bottom / 0 2px no-repeat;
  }

  .g-header--nav-bottom .g-nav__list .nav-link:hover {
    color: var(--kc);
  }

  .g-header--nav-bottom .g-nav .lower {
    width: calc(100vw - 48px);
    max-width: 1120px;
    background: rgba(255, 255, 255, 0.96);
    border: 1px solid rgba(var(--kc-rgb), 0.12);
    border-radius: 0 0 14px 14px;
    box-shadow: 0 18px 42px rgba(0, 0, 0, 0.14);
    left: 50%;
    right: auto;
    top: 68px;
    margin: 0;
    padding: 22px;
    transform: translateX(-50%);
    z-index: 140;
  }

  .g-header--nav-bottom .g-nav .lower .container {
    max-width: 100%;
    padding: 0;
  }

  .g-header--nav-bottom .g-nav .lower .nav-item {
    padding: 0 10px;
  }

  .g-header--nav-bottom .g-nav .lower .nav-link {
    background: rgba(var(--kc-rgb), 0.04);
    border-radius: 10px;
    color: var(--fc);
    height: 100%;
    padding: 12px;
  }

  .g-header--nav-bottom .g-nav .lower .nav-link:hover {
    background: rgba(var(--kc-rgb), 0.08);
    color: var(--kc);
  }

  .g-header--nav-bottom .g-nav .lower .js-close__btn {
    color: var(--kc);
    top: 8px;
    right: 10px;
  }

  @media screen and (max-width: 1199px) {
    .g-header--nav-bottom .g-header__top {
      height: 64px;
      padding: 0 16px;
    }

    .g-header--nav-bottom .g-header__nav-row {
      display: none;
    }

  }

  @media screen and (max-width: 1399px) {
    .g-header--nav-bottom .g-header__tel-number {
      font-size: 20px;
    }

    .g-header--nav-bottom .g-header__tel {
      padding: 0 14px;
    }

    .g-header--nav-bottom .g-header__action-btn {
      min-width: 126px;
    }
  }

  @media screen and (max-width: 575px) {
    .g-header--nav-bottom .g-header__logo-link-img {
      max-width: 150px;
    }

    .g-header--nav-bottom .g-header__actions {
      height: 48px;
      gap: 8px;
    }

    .g-header--nav-bottom .lai-header-hamburger-btn {
      flex-basis: 48px;
    }

  }
</style>

<header id="g-header" class="g-header g-header--nav-bottom">
  <div class="container-fluid p-0">
    <div class="g-header__top row g-0 justify-content-between align-items-center">
      <div class="col-auto">
        <div class="g-header__inner">
          <<?= $logo_wrap; ?> class="g-header__logo">
            <a href="<?= home_url(); ?>" class="g-header__logo-link">
              <img src="<?= get_field('logo', 'option'); ?>" alt="<?= get_field('company', 'option'); ?>" class="g-header__logo-link-img" width="159" height="35">
            </a>
          </<?= $logo_wrap; ?>>
        </div>
      </div>

      <div class="g-header__actions col-auto ms-auto d-flex align-items-center">
      <?php if (lai_template_should_show_header_cta()) : ?>
        <?php if (is_string($header_tel) && $header_tel !== '') : ?>
          <div class="d-none d-xl-block">
            <a href="tel:<?= esc_attr($header_tel); ?>" class="g-header__tel">
              <span class="g-header__tel-number"><i class="fa-solid fa-phone-volume"></i><?= esc_html($header_tel); ?></span>
            </a>
          </div>
        <?php endif; ?>

        <!-- Email Consultation Button -->
        <div class="d-none d-xl-block">
          <a href="#contact" class="g-header__action-btn c-btn-solid-border --white --small c-border u-font-pc-15 u-font-sp-15" style="--color: #fff; --bc: var(--kc); --border: transparent; --border2: transparent; --radius: 999px">
            <span class="c-btn-solid-border__txt">
              <span class="c-btn-solid-border__txt-in"><i class="fa-solid fa-envelope"></i> メール相談</span>
            </span>
            <span class="c-btn-solid-border__l"></span>
            <span class="c-btn-solid-border__t"></span>
            <span class="c-btn-solid-border__r"></span>
            <span class="c-btn-solid-border__b"></span>
          </a>
        </div>

        <!-- LINE Consultation Button -->
        <div class="d-none d-xl-block">
          <a href="https://line.me/R/ti/p/@883wioop/" target="_blank" class="g-header__action-btn c-btn-solid-border --white --small c-border u-font-pc-15 u-font-sp-15" style="--color: #fff; --bc: var(--line); --border: transparent; --border2: transparent; --radius: 999px">
            <span class="c-btn-solid-border__txt">
              <span class="c-btn-solid-border__txt-in">LINE相談</span>
            </span>
            <span class="c-btn-solid-border__l"></span>
            <span class="c-btn-solid-border__t"></span>
            <span class="c-btn-solid-border__r"></span>
            <span class="c-btn-solid-border__b"></span>
          </a>
        </div>

        <!-- Mobile Consultation Buttons -->
        <div class="col-2 d-block d-lg-none">
          <a href="#contact" class="g-header__nav-sp-mail"><i class="fa-solid fa-envelope"></i> メールで相談</a>
        </div>
        <div class="col-2 d-block d-lg-none">
          <a href="https://line.me/R/ti/p/@883wioop/" target="_blank" class="g-header__nav-sp-line">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 314 300.01">
              <defs>
                <style>
                  .cls-1 {
                    fill: #fff;
                  }
                </style>
              </defs>
              <title>line2</title>
              <path class="cls-1" d="M314,127.75C314,57.31,243.58,0,157,0S0,57.31,0,127.75C0,190.9,55.86,243.8,131.31,253.8c5.11,1.1,12.06,3.4,13.83,7.77,1.59,4,1,10.2.51,14.22,0,0-1.84,11.12-2.24,13.5-.69,4-3.16,15.55,13.6,8.47s90.41-53.38,123.34-91.41h0C303.11,181.34,314,156,314,127.75ZM95.51,169.66H64.34a8.25,8.25,0,0,1-8.21-8.26V98.84a8.22,8.22,0,1,1,16.43,0v54.31h23a8.26,8.26,0,0,1,0,16.51Zm32.23-8.26a8.22,8.22,0,1,1-16.44,0V98.84a8.22,8.22,0,1,1,16.44,0Zm75,0a8.25,8.25,0,0,1-5.62,7.84,8.34,8.34,0,0,1-2.61.42,8.21,8.21,0,0,1-6.57-3.31l-32-43.64V161.4a8.22,8.22,0,1,1-16.44,0V98.84a8.21,8.21,0,0,1,14.8-5l31.94,43.67V98.84a8.23,8.23,0,1,1,16.45,0Zm50.42-39.53a8.26,8.26,0,0,1,0,16.51H230.25v14.77h22.93a8.26,8.26,0,0,1,0,16.51H222a8.26,8.26,0,0,1-8.23-8.26V98.84A8.27,8.27,0,0,1,222,90.58h31.16a8.26,8.26,0,0,1,0,16.52H230.25v14.77Z" transform="translate(0 0.01)" />
            </svg> LINEで相談
          </a>
        </div>
      <?php endif; ?>

        <?php get_template_part('include/header-hamburger-button'); ?>
      </div>
    </div>

    <div class="g-header__nav-row row g-0 justify-content-center align-items-center">
      <div class="col-12">
        <nav id="g-nav" class="g-nav navbar-expand-lg">
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
