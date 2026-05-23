<?php
$image_url = !empty($args['image_url']) ? $args['image_url'] : '';
?>
<div class="preloader preloader--split">
  <div class="preloader-before"></div>
  <div class="preloader-after"></div>
  <div class="preloader-block">
    <div class="title">
      <?php if ($image_url) : ?>
        <img src="<?= esc_url($image_url); ?>" alt="<?= esc_attr(get_bloginfo('name')); ?>" class="--white">
      <?php else : ?>
        <?= esc_html(get_bloginfo('name')); ?>
      <?php endif; ?>
    </div>
    <div class="percent">0</div>
    <div class="loading">Loading</div>
  </div>
  <div class="preloader-bar">
    <div class="preloader-progress"></div>
  </div>
</div>
