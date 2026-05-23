<?php
$logo_wrap = (is_front_page() || is_home()) ? 'h1' : 'div';
?>

<header id="g-header" class="g-header">
  <div class="container">
    <div class="g-header__inner">
      <<?= $logo_wrap; ?> class="g-header__logo">
        <a href="<?= home_url(); ?>" class="g-header__logo-link">
          <img src="<?= get_field('logo', 'option'); ?>" alt="<?= get_field('company', 'option'); ?>" class="g-header__logo-link-img">
        </a>
      </<?= $logo_wrap; ?>>
    </div>
  </div>
</header>