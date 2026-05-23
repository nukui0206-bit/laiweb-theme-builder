<?php
if (!function_exists('lai_template_should_show_loading') || !lai_template_should_show_loading()) {
  return;
}

$loading_layout = lai_template_current_loading_layout();
$loading_image_url = lai_template_loading_image_url();

get_template_part('include/loadings/' . $loading_layout, null, array(
  'image_url' => $loading_image_url,
));
