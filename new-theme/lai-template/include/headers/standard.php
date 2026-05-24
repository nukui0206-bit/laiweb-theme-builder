<?php
// グローバル変数
require(SLIB_DIR . '/lib/wmp-global.php');
?>
<?php
$logo_wrap = (is_front_page() || is_home()) ? 'h1' : 'div';
?>

<style>
  .g-header--standard .g-nav__list {
    align-items: center;
  }

  .g-header--standard .g-nav__list .nav-link {
    color: #111;
    font-weight: 700;
  }

  .g-header--standard .g-nav__list .nav-link:hover,
  .g-header--standard .g-nav__list .nav-link.is-active {
    color: var(--kc);
  }

  .g-header--standard .g-header__actions {
    gap: 8px;
  }

  .g-header--standard .g-header__tel {
    align-items: center;
    background: rgba(var(--kc-rgb), 0.08);
    border: 1px solid rgba(var(--kc-rgb), 0.16);
    border-radius: 999px;
    color: var(--kc);
    display: flex;
    height: 44px;
    padding: 0 16px;
    text-decoration: none;
    white-space: nowrap;
  }

  .g-header--standard .g-header__tel-number {
    color: var(--kc);
    font-size: 17px;
    font-weight: 900;
    letter-spacing: 0;
  }

  .g-header--standard .g-header__tel-number i {
    font-size: 14px;
    margin-right: 6px;
  }

  .g-header--standard .g-header__action-btn {
    align-items: center;
    border-radius: 999px !important;
    display: flex;
    height: 44px;
    justify-content: center;
    min-width: 132px;
    padding-bottom: 0;
    padding-top: 0;
    white-space: nowrap;
  }

  .g-header--standard .lai-header-hamburger-btn {
    flex: 0 0 52px;
  }

  @media screen and (max-width: 1399px) {
    .g-header--standard .g-header__tel-number {
      font-size: 15px;
    }

    .g-header--standard .g-header__tel {
      padding: 0 12px;
    }

    .g-header--standard .g-header__action-btn {
      min-width: 118px;
    }
  }
</style>

<header id="g-header" class="g-header g-header--standard" style="--background-color: #fff;">
  <div class="container-fluid px-3 py-3">
    <div class="row g-0 justify-content-between align-items-center">
      <!-- ロゴ -->
      <div class="col-6 col-lg-2">
        <div class="g-header__inner">
          <<?= $logo_wrap; ?> class="g-header__logo">
            <a href="<?= home_url(); ?>" class="g-header__logo-link">
              <img src="<?= get_field('logo', 'option'); ?>" alt="<?= get_field('company', 'option'); ?>" class="g-header__logo-link-img" width="159" height="35">
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

      <div class="g-header__actions col-auto ms-auto d-flex align-items-center">
        <div class="d-none d-lg-block">
          <?php lai_template_render_header_tel(); ?>
        </div>
      <?php if (false && lai_template_should_show_header_cta()) : ?>
        <!-- 無料相談ボタン -->
        <div class="d-none d-lg-block">
          <div class="g-header__nav text-end">
            <a href="<?= wmp_get_link('contact', ''); ?>" class="c-btn-solid-border --white --small c-border u-font-pc-16 u-font-sp-16" style="--color: #fff; --bc: var(--line); --border: transparent; --border2: transparent; --radius: 5px">
              <span class="c-btn-solid-border__txt">
                <span class="c-btn-solid-border__txt-in"><i class="fas fa-envelope"></i> 無料相談はこちら</span>
              </span>
              <span class="c-btn-solid-border__l"></span>
              <span class="c-btn-solid-border__t"></span>
              <span class="c-btn-solid-border__r"></span>
              <span class="c-btn-solid-border__b"></span>
            </a>
          </div>
        </div>
      <?php endif; ?>
        <?php if (lai_template_should_show_header_cta_button(1)) : ?>
          <div class="d-none d-lg-block">
            <div class="g-header__nav text-end">
              <?php lai_template_render_header_cta_button(1, '', 'u-font-pc-16 u-font-sp-16'); ?>
            </div>
          </div>
        <?php endif; ?>
        <?php if (lai_template_should_show_header_cta_button(2)) : ?>
          <div class="d-none d-lg-block">
            <div class="g-header__nav text-end">
              <?php lai_template_render_header_cta_button(2, '', 'u-font-pc-16 u-font-sp-16'); ?>
            </div>
          </div>
        <?php endif; ?>

        <?php get_template_part('include/header-hamburger-button'); ?>
      </div>
    </div>

</header>
