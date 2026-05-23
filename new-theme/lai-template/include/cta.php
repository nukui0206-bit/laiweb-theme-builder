<?php
$cta_layout = function_exists('lai_template_current_cta_layout') ? lai_template_current_cta_layout() : 'none';
$cta_layouts = function_exists('lai_template_cta_layouts') ? array_keys(lai_template_cta_layouts()) : array('none');

if (!in_array($cta_layout, $cta_layouts, true)) {
  $cta_layout = 'none';
}

get_template_part('include/ctas/' . $cta_layout);
