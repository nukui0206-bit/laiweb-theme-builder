<?php

/**
 * Hamburger dispatcher
 * - ACF `header_hamburger` の値に応じて include/hamburgers/hamburger-{pattern}.php を呼び出す
 * - 'none' の場合は何も出力しない
 */

$pattern = function_exists('lai_template_current_header_hamburger') ? lai_template_current_header_hamburger() : 'none';

if ($pattern === 'none') {
  return;
}

$available = function_exists('lai_template_header_hamburgers') ? lai_template_header_hamburgers() : array();

if (!array_key_exists($pattern, $available)) {
  return;
}

get_template_part('include/hamburgers/hamburger', $pattern);
