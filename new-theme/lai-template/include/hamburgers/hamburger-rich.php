<?php

/**
 * Hamburger pattern: rich
 * - 左半分にイメージ画像、右側にナビリスト
 * - 画像は ACF `header_hamburger_image` から取得（未設定時はプレーン背景）
 * - Bootstrap offcanvas（id="g-nav-panel"）
 */

$image_url = function_exists('lai_template_header_hamburger_image_url') ? lai_template_header_hamburger_image_url() : '';
?>
<div class="offcanvas offcanvas-end g-hamburger g-hamburger--rich" tabindex="-1" id="g-nav-panel" aria-labelledby="g-nav-panel-label">
  <div class="row align-items-center">
    <div class="col-12 col-lg-3">
      <?php if ($image_url !== '') : ?>
        <figure class="c-image d-none d-lg-block">
          <div class="c-image__src c-image__src --ratio c-hover__target" style="--ratio: 100px; --ratio-lg: 100vh;" data-lazy-background="<?= esc_url($image_url); ?>"></div>
        </figure>
        <figure class="c-image d-block d-lg-none">
          <div class="c-image__src c-image__src --ratio c-hover__target" style="--ratio: 100px; --ratio-lg: 100vh;" data-lazy-background="<?= esc_url($image_url); ?>"></div>
        </figure>
      <?php else : ?>
        <figure class="c-image d-none d-lg-block">
          <div class="c-image__src c-image__src --ratio" style="--ratio-lg: 100vh; background: linear-gradient(135deg, #f5f5f5, #cccccc);"></div>
        </figure>
      <?php endif; ?>
    </div>
    <div class="col-12 col-lg-9">
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
  </div>
</div>
