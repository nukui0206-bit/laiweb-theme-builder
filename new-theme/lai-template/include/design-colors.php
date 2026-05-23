<?php
if (!function_exists('lai_template_current_design_colors')) {
  return;
}

$colors = lai_template_current_design_colors();
?>
<style id="lai-template-design-colors">
  :root {
    <?php foreach ($colors as $key => $color) : ?>
      --<?= esc_html($key); ?>: <?= esc_html($color); ?>;
      --<?= esc_html($key); ?>-rgb: <?= esc_html(lai_template_rgb_string($color)); ?>;
    <?php endforeach; ?>
    --link: <?= esc_html($colors['fc']); ?>;
    --link-rgb: <?= esc_html(lai_template_rgb_string($colors['fc'])); ?>;
  }
</style>
