<?php

/**
 * Header dispatcher
 * - ACF `header_layout` の値に応じて include/headers/header-{layout}.php を呼び出す
 * - 末尾でハンバーガー（offcanvas）を呼び出す（'none' なら何も出力されない）
 *
 * 既存サイト互換のため、ACF 未設定時はデフォルト 'laiweb' で従来のヘッダーが表示される。
 */

$layout = function_exists('lai_template_current_header_layout') ? lai_template_current_header_layout() : 'laiweb';

get_template_part('include/headers/header', $layout);

// ハンバーガー（offcanvas）
get_template_part('include/hamburger');
