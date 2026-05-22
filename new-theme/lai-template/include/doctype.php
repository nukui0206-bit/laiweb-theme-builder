<?php
// グローバル変数
require_once(SLIB_DIR . '/lib/wmp-global.php');
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <title><?= wmp_title(); ?></title>
  <?php if (get_field('ga', 'option')) : ?><?= get_field('ga', 'option'); ?><?php endif; ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=yes">
  <meta http-equiv="x-dns-prefetch-control" content="on">
  <meta name="format-detection" content="telephone=no">
  <link rel="preconnect dns-prefetch" href="//fontawesome.com/">
  <link rel="preconnect dns-prefetch" href="//marketingplatform.google.com/about/tag-manager/">
  <link rel="preconnect dns-prefetch" href="//developers.google.com/speed/libraries/">
  <link rel="preconnect dns-prefetch" href="//cdnjs.com/">
  <link rel="preconnect dns-prefetch" href="//www.facebook.com/">
  <link rel="preconnect dns-prefetch" href="//fonts.adobe.com/">
  <link rel="preconnect dns-prefetch" href="//www.google.com/analytics/analytics/">
  <?php wp_head(); ?>
  <link rel="shortcut icon" href="<?= get_field('favicon', 'option'); ?>">
  <link rel="apple-touch-icon" href="<?= get_field('favicon_iphone', 'option'); ?>" sizes="180x180">
  <?php if (get_option('visual_animation')) : ?>
    <link rel="stylesheet" href="<?= home_url(); ?>/scripts.php?css=js/vegas/vegas.min.css">
  <?php endif; ?>
  <?= get_css('/assets/css/style.css'); ?>
  <?php  get_css('/assets/css/add.css'); 
  ?>
  <?= get_js('/assets/js/slick.min.js', false); ?>



</head>

<body <?php body_class('p-' . $gPages['slug']); ?> <?php (is_home() || is_front_page()) ? '' : 'id="lower"'; ?>>