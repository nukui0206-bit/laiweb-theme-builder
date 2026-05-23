<?php
$header_layout = function_exists('lai_template_current_header_layout') ? lai_template_current_header_layout() : 'standard';
$header_layouts = function_exists('lai_template_header_layouts') ? array_keys(lai_template_header_layouts()) : array('standard');

if (!in_array($header_layout, $header_layouts, true)) {
  $header_layout = 'standard';
}

get_template_part('include/headers/' . $header_layout);

if (function_exists('lai_template_should_show_header_hamburger') && lai_template_should_show_header_hamburger()) {
  get_template_part('include/header-hamburger');
}
?>
