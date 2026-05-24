<?php
// グローバル変数
require(SLIB_DIR . '/lib/wmp-global.php');
?>
<?php
$logo_wrap = (is_front_page() || is_home()) ? 'h1' : 'div';
?>

<style>
  .g-header--floating {
    --background-color: transparent;
    background: transparent;
    box-shadow: none;
    padding: 16px 18px 0;
    pointer-events: none;
  }

  .g-header--floating .g-header__shell {
    width: 100%;
    min-height: 76px;
    background: rgba(255, 255, 255, 0.9);
    border: 1px solid rgba(255, 255, 255, 0.72);
    border-radius: 22px;
    box-shadow: 0 16px 40px rgba(0, 0, 0, 0.14);
    backdrop-filter: blur(18px);
    padding: 0 20px 0 28px;
    pointer-events: auto;
  }

  .g-header--floating .g-header__inner {
    margin: 0;
  }

  .g-header--floating .g-header__logo-link-img {
    max-width: 170px;
  }

  .g-header--floating .g-nav {
    --bc: transparent !important;
  }

  .g-header--floating .g-nav__list {
    min-height: 76px;
    align-items: center;
    gap: 4px;
  }

  .g-header--floating .g-nav__list .nav-link {
    color: var(--fc);
    padding: 27px 13px 25px;
  }

  .g-header--floating .g-nav__list .nav-link:hover {
    color: var(--kc);
  }

  .g-header--floating .g-nav__list .nav-link:before {
    background: linear-gradient(var(--kc), var(--kc)) center bottom / 0 2px no-repeat;
    bottom: 18px;
  }

  .g-header--floating .g-header__actions {
    gap: 12px;
  }

  .g-header--floating .g-header__action-btn {
    min-width: 154px;
    height: 52px;
    border-radius: 999px !important;
    box-shadow: 0 10px 24px rgba(0, 0, 0, 0.12);
    display: flex;
    align-items: center;
    justify-content: center;
    padding-top: 0;
    padding-bottom: 0;
  }

  .g-header--floating .g-header__action-btn--line {
    min-width: 136px;
  }

  .g-header--floating .g-nav .lower {
    width: calc(100vw - 72px);
    max-width: 1120px;
    background: rgba(255, 255, 255, 0.96);
    border: 1px solid rgba(var(--kc-rgb), 0.12);
    border-radius: 18px;
    box-shadow: 0 20px 48px rgba(0, 0, 0, 0.16);
    left: 50%;
    right: auto;
    top: 86px;
    margin: 0;
    padding: 22px;
    transform: translateX(-50%);
    z-index: 140;
  }

  .g-header--floating .g-nav .lower .container {
    max-width: 100%;
    padding: 0;
  }

  .g-header--floating .g-nav .lower .nav-item {
    padding: 0 10px;
  }

  .g-header--floating .g-nav .lower .nav-link {
    background: rgba(var(--kc-rgb), 0.04);
    border-radius: 10px;
    color: var(--fc);
    height: 100%;
    padding: 12px;
  }

  .g-header--floating .g-nav .lower .nav-link:hover {
    background: rgba(var(--kc-rgb), 0.08);
    color: var(--kc);
  }

  @media screen and (max-width: 1199px) {
    .g-header--floating {
      padding: 10px 10px 0;
    }

    .g-header--floating .g-header__shell {
      min-height: 64px;
      border-radius: 18px;
      padding: 0 12px 0 18px;
    }

    .g-header--floating .g-header__logo-link-img {
      max-width: 154px;
    }
  }
</style>

<header id="g-header" class="g-header g-header--floating">
  <div class="g-header__shell container-fluid">
    <div class="row g-0 justify-content-between align-items-center">
      <div class="col-auto">
        <div class="g-header__inner">
          <<?= $logo_wrap; ?> class="g-header__logo">
            <a href="<?= home_url(); ?>" class="g-header__logo-link">
              <img src="<?= get_field('logo', 'option'); ?>" alt="<?= get_field('company', 'option'); ?>" class="g-header__logo-link-img" width="159" height="35">
            </a>
          </<?= $logo_wrap; ?>>
        </div>
      </div>

      <div class="col d-none d-xl-flex justify-content-center">
        <nav id="g-nav" class="g-nav navbar-expand-lg">
          <div class="navbar-collapse">
            <ul class="navbar-nav g-nav__list row">
              <?php get_template_part('include/nav'); ?>
            </ul>
          </div>
        </nav>
      </div>

      <div class="g-header__actions col-auto ms-auto d-flex align-items-center">
        <?php if (lai_template_should_show_header_cta()) : ?>
          <div class="d-none d-lg-block">
            <a href="<?= wmp_get_link('download', ''); ?>" class="g-header__action-btn c-btn-solid-border --white --small c-border u-font-pc-15 u-font-sp-15" style="--color: #fff; --bc: var(--kc); --border: transparent; --border2: transparent; --radius: 999px">
              <span class="c-btn-solid-border__txt">
                <span class="c-btn-solid-border__txt-in"><i class="fa-solid fa-file-arrow-down"></i> 資料ダウンロード</span>
              </span>
              <span class="c-btn-solid-border__l"></span>
              <span class="c-btn-solid-border__t"></span>
              <span class="c-btn-solid-border__r"></span>
              <span class="c-btn-solid-border__b"></span>
            </a>
          </div>
          <div class="d-none d-lg-block">
            <a href="<?= wmp_get_link('contact', ''); ?>" class="g-header__action-btn g-header__action-btn--line c-btn-solid-border --white --small c-border u-font-pc-15 u-font-sp-15" style="--color: #fff; --bc: var(--line); --border: transparent; --border2: transparent; --radius: 999px">
              <span class="c-btn-solid-border__txt">
                <span class="c-btn-solid-border__txt-in">お問い合わせ</span>
              </span>
              <span class="c-btn-solid-border__l"></span>
              <span class="c-btn-solid-border__t"></span>
              <span class="c-btn-solid-border__r"></span>
              <span class="c-btn-solid-border__b"></span>
            </a>
          </div>
        <?php endif; ?>

        <?php get_template_part('include/header-hamburger-button'); ?>
      </div>
    </div>
  </div>
</header>
