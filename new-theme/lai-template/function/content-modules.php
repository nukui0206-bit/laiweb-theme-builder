<?php

/**
 * Content modules shared by the initial settings screen and admin menu control.
 *
 * Disabling a module only hides it from normal admin workflows. It does not
 * delete posts, unregister post types, or remove templates.
 */

if (!function_exists('lai_template_content_modules')) {
  function lai_template_content_modules()
  {
    return array(
      'news' => array(
        'label' => 'お知らせ',
        'post_type' => 'news',
        'admin_menu_labels' => array('お知らせ', 'NEWS'),
        'taxonomies' => array('newscat'),
        'archive_template' => 'archive-news.php',
        'single_template' => 'single-news.php',
        'default_enabled' => true,
      ),
      'voice' => array(
        'label' => 'お客様の声',
        'post_type' => 'voice',
        'admin_menu_labels' => array('お客様の声'),
        'taxonomies' => array(),
        'archive_template' => 'archive-voice.php',
        'single_template' => '',
        'default_enabled' => true,
      ),
      'faq' => array(
        'label' => 'よくある質問',
        'post_type' => 'faq',
        'admin_menu_labels' => array('よくある質問'),
        'taxonomies' => array(),
        'archive_template' => 'archive-faq.php',
        'single_template' => '',
        'default_enabled' => true,
      ),
      'case' => array(
        'label' => '制作実績/施工事例',
        'content_type_value' => '実績・事例',
        'content_type_aliases' => array('制作実績', '施工事例'),
        'post_type' => 'case',
        'admin_menu_labels' => array('制作実績', '施工事例', '実績・事例'),
        'taxonomies' => array('casecat'),
        'archive_template' => 'archive-case.php',
        'single_template' => 'single-case.php',
        'default_enabled' => false,
      ),
      'column' => array(
        'label' => 'コラム',
        'post_type' => 'column',
        'admin_menu_labels' => array('コラム'),
        'taxonomies' => array('columncat'),
        'archive_template' => 'archive-column.php',
        'single_template' => 'single-column.php',
        'default_enabled' => false,
      ),
      'gallery' => array(
        'label' => 'ギャラリー',
        'post_type' => 'gallery',
        'admin_menu_labels' => array('ギャラリー'),
        'taxonomies' => array('gallerycat'),
        'archive_template' => 'archive-gallery.php',
        'single_template' => 'single-gallery.php',
        'default_enabled' => false,
      ),
      'product' => array(
        'label' => '商品紹介',
        'post_type' => 'product',
        'admin_menu_labels' => array('商品紹介'),
        'taxonomies' => array('productcat'),
        'archive_template' => 'archive-product.php',
        'single_template' => 'single-product.php',
        'default_enabled' => false,
      ),
      'recruits' => array(
        'label' => '採用情報',
        'post_type' => 'recruits',
        'admin_menu_labels' => array('採用情報', '求人情報'),
        'taxonomies' => array('occupation'),
        'archive_template' => 'archive-recruits.php',
        'single_template' => 'single-recruits.php',
        'default_enabled' => false,
      ),
      'staff' => array(
        'label' => 'スタッフ',
        'post_type' => 'staff',
        'admin_menu_labels' => array('スタッフ'),
        'taxonomies' => array(),
        'archive_template' => 'archive-staff.php',
        'single_template' => 'single-staff.php',
        'default_enabled' => false,
      ),
      'project' => array(
        'label' => 'プロジェクト',
        'post_type' => 'project',
        'admin_menu_labels' => array('プロジェクト'),
        'taxonomies' => array(),
        'archive_template' => 'archive-project.php',
        'single_template' => 'single-project.php',
        'default_enabled' => false,
      ),
      'interview' => array(
        'label' => 'インタビュー',
        'post_type' => 'interview',
        'admin_menu_labels' => array('インタビュー'),
        'taxonomies' => array(),
        'archive_template' => 'archive-interview.php',
        'single_template' => 'single-interview.php',
        'default_enabled' => false,
      ),
      'catalog' => array(
        'label' => 'カタログ',
        'post_type' => 'catalog',
        'admin_menu_labels' => array('カタログ'),
        'taxonomies' => array(),
        'archive_template' => 'archive-catalog.php',
        'single_template' => 'single-catalog.php',
        'default_enabled' => false,
      ),
      'lineup' => array(
        'label' => 'ラインナップ',
        'post_type' => 'lineup',
        'admin_menu_labels' => array('ラインナップ'),
        'taxonomies' => array('lineupsize'),
        'archive_template' => 'archive-lineup.php',
        'single_template' => 'single-lineup.php',
        'default_enabled' => false,
      ),
    );
  }
}

if (!function_exists('lai_template_content_module_choices')) {
  function lai_template_content_module_choices()
  {
    $choices = array();

    foreach (lai_template_content_modules() as $module) {
      $value = lai_template_content_module_setting_value($module);
      $choices[$value] = $module['label'];
    }

    return $choices;
  }
}

if (!function_exists('lai_template_get_content_module')) {
  function lai_template_get_content_module($key)
  {
    $modules = lai_template_content_modules();

    return !empty($modules[$key]) ? $modules[$key] : null;
  }
}

if (!function_exists('lai_template_enabled_content_labels')) {
  function lai_template_enabled_content_labels()
  {
    if (function_exists('get_field')) {
      $enabled = get_field('content_type', 'option');

      if (is_array($enabled)) {
        return $enabled;
      }
    }

    $enabled = array();

    foreach (lai_template_content_modules() as $module) {
      if (!empty($module['default_enabled'])) {
        $enabled[] = $module['label'];
      }
    }

    return $enabled;
  }
}

if (!function_exists('lai_template_content_module_setting_value')) {
  function lai_template_content_module_setting_value($module)
  {
    return !empty($module['content_type_value']) ? $module['content_type_value'] : $module['label'];
  }
}

if (!function_exists('lai_template_content_module_values')) {
  function lai_template_content_module_values($module)
  {
    $values = array($module['label']);

    if (!empty($module['content_type_value'])) {
      $values[] = $module['content_type_value'];
    }

    if (!empty($module['content_type_aliases']) && is_array($module['content_type_aliases'])) {
      $values = array_merge($values, $module['content_type_aliases']);
    }

    return array_values(array_unique($values));
  }
}

if (!function_exists('lai_template_enabled_content_modules')) {
  function lai_template_enabled_content_modules()
  {
    $enabled = array();

    foreach (lai_template_content_modules() as $key => $module) {
      if (lai_template_is_content_module_enabled($key)) {
        $enabled[$key] = $module;
      }
    }

    return $enabled;
  }
}

if (!function_exists('lai_template_is_content_module_enabled')) {
  function lai_template_is_content_module_enabled($key)
  {
    $module = lai_template_get_content_module($key);

    if (empty($module)) {
      return false;
    }

    return !empty(array_intersect(
      lai_template_content_module_values($module),
      lai_template_enabled_content_labels()
    ));
  }
}

if (!function_exists('lai_template_content_module_post_type')) {
  function lai_template_content_module_post_type($key)
  {
    $module = lai_template_get_content_module($key);

    return !empty($module['post_type']) ? $module['post_type'] : '';
  }
}

if (!function_exists('lai_template_can_show_content_module')) {
  function lai_template_can_show_content_module($key)
  {
    $post_type = lai_template_content_module_post_type($key);

    if (!$post_type) {
      return false;
    }

    return lai_template_is_content_module_enabled($key) && post_type_exists($post_type);
  }
}

if (!function_exists('lai_template_load_content_type_field')) {
  function lai_template_load_content_type_field($field)
  {
    $field['choices'] = lai_template_content_module_choices();

    return $field;
  }
}
add_filter('acf/load_field/name=content_type', 'lai_template_load_content_type_field');

if (!function_exists('lai_template_hide_disabled_content_menus')) {
  function lai_template_hide_disabled_content_menus()
  {
    global $menu;

    if (!is_array($menu)) {
      return;
    }

    $enabled_labels = lai_template_enabled_content_labels();
    $controlled_menu_labels = array();

    foreach (lai_template_content_modules() as $module_key => $module) {
      foreach ($module['admin_menu_labels'] as $menu_label) {
        $controlled_menu_labels[$menu_label] = $module_key;
      }
    }

    foreach ($menu as $key => $item) {
      if (empty($item[0]) || !isset($controlled_menu_labels[$item[0]])) {
        continue;
      }

      $module_key = $controlled_menu_labels[$item[0]];

      if (!lai_template_is_content_module_enabled($module_key)) {
        unset($menu[$key]);
      }
    }
  }
}
add_action('admin_menu', 'lai_template_hide_disabled_content_menus', 1001);
