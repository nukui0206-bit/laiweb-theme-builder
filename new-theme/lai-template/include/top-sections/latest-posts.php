<?php
$latest_posts_layout = function_exists('lai_template_current_latest_posts_layout') ? lai_template_current_latest_posts_layout() : 'split';
$latest_posts_layouts = function_exists('lai_template_latest_posts_layouts') ? array_keys(lai_template_latest_posts_layouts()) : array('split');

if (!in_array($latest_posts_layout, $latest_posts_layouts, true)) {
  $latest_posts_layout = 'split';
}

get_template_part('include/top-sections/latest-posts/' . $latest_posts_layout);
