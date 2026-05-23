<?php

/**
 * Hamburger pattern: simple
 * - 白背景 + ナビリスト
 * - Bootstrap offcanvas（id="g-nav-panel"）
 */
?>
<div class="offcanvas offcanvas-end g-hamburger" tabindex="-1" id="g-nav-panel" aria-labelledby="g-nav-panel-label">
  <div class="offcanvas-header">
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body g-hamburger__body">
    <ul class="list">
      <?php get_template_part('include/nav', null, 'hamburger'); ?>
      <?php if (locate_template('include/snav.php')) : ?>
        <?php get_template_part('include/snav'); ?>
      <?php endif; ?>
    </ul>
  </div>
</div>
