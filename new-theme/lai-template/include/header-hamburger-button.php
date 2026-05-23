<?php if (function_exists('lai_template_should_show_header_hamburger') && lai_template_should_show_header_hamburger()) : ?>
  <button class="<?= esc_attr(lai_template_header_hamburger_button_classes($args)); ?>" type="button" data-bs-toggle="offcanvas" data-bs-target="#g-nav-panel" aria-controls="g-nav-panel" aria-label="メニューを開く">
    <span class="lai-header-hamburger-btn__icon" aria-hidden="true">
      <span class="lai-header-hamburger-btn__line"></span>
      <span class="lai-header-hamburger-btn__line"></span>
      <span class="lai-header-hamburger-btn__line"></span>
    </span>
  </button>
<?php endif; ?>
