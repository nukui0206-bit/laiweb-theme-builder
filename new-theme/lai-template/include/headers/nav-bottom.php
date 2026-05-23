<?php
// グローバル変数
require(SLIB_DIR . '/lib/wmp-global.php');
?>
<?php
$logo_wrap = (is_front_page() || is_home()) ? 'h1' : 'div';
?>

<header id="g-header" class="g-header" style="--background-color: #fff;">
  <div class="container-fluid px-3 py-3">
    <!-- Logo and Consultation Row -->
    <div class="row g-0 justify-content-between align-items-center">
      <!-- Logo -->
      <div class="col-5 col-lg-4">
        <div class="g-header__inner">
          <<?= $logo_wrap; ?> class="g-header__logo">
            <a href="<?= home_url(); ?>" class="g-header__logo-link">
              <img src="<?= get_field('logo', 'option'); ?>" alt="<?= get_field('company', 'option'); ?>" class="g-header__logo-link-img" width="159" height="35">
            </a>
          </<?= $logo_wrap; ?>>
        </div>
      </div>

      <?php if (lai_template_should_show_header_cta()) : ?>
        <!-- Email Consultation Button -->
        <div class="col-6 col-lg-2 ms-auto me-3 d-none d-lg-block">
          <a href="#contact" class="c-btn-solid-border --white --small c-border u-font-pc-16 u-font-sp-16" style="--color: #fff; --bc: var(--sc); --border: transparent; --border2: transparent; --radius: 5px">
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

        <!-- LINE Consultation Button -->
        <div class="col-6 col-lg-2 d-none d-lg-block">
          <a href="https://line.me/R/ti/p/@883wioop/" target="_blank" class="c-btn-solid-border --white --small c-border u-font-pc-16 u-font-sp-16" style="--color: #fff; --bc: var(--line); --border: transparent; --border2: transparent; --radius: 5px">
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

      <div class="col-auto">
        <?php get_template_part('include/header-hamburger-button'); ?>
      </div>
    </div>

    <!-- Navigation Row -->
    <div class="row g-0 justify-content-center align-items-center">
      <div class="col-12">
        <nav id="g-nav" class="g-nav navbar-expand-lg"style="--bc: #fff;">
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
