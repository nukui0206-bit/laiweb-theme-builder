<?php
$footer_layout = function_exists('lai_template_current_footer_layout') ? lai_template_current_footer_layout() : 'standard';
$footer_layouts = function_exists('lai_template_footer_layouts') ? array_keys(lai_template_footer_layouts()) : array('standard');

if (!in_array($footer_layout, $footer_layouts, true)) {
  $footer_layout = 'standard';
}

get_template_part('include/footers/' . $footer_layout);
?>

<?php wp_footer(); ?>
