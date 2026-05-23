<?php
// グローバル変数
require(SLIB_DIR . '/lib/wmp-global.php');
?>
<?php
$logo_wrap = (is_front_page() || is_home()) ? 'h1' : 'div';
?>

<header id="g-header" class="g-header" style="--background-color: #fff;">
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

      <?php if (lai_template_should_show_header_cta()) : ?>
        <!-- 無料相談ボタン -->
        <div class="col-6 col-lg-2">
          <div class="g-header__nav text-end">
            <a href="<?= wmp_get_link('contact', ''); ?>" class="c-btn-solid-border --white --small c-border u-font-pc-16 u-font-sp-16" style="--color: #fff; --bc: var(--line); --border: transparent; --border2: transparent; --radius: 5px">
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
          </div>
        </div>
      <?php endif; ?>

      <div class="col-auto">
        <?php get_template_part('include/header-hamburger-button'); ?>
      </div>
    </div>

</header>
