<?php

if (!function_exists('lai_template_top_sections')) {
  function lai_template_top_sections()
  {
    return array(
      'latest-posts' => array(
        'label' => '新着一覧',
        'template' => 'latest-posts',
        'default_enabled' => true,
      ),
      'voice' => array(
        'label' => 'お客様の声',
        'template' => 'voice',
        'default_enabled' => true,
        'content_module' => 'voice',
      ),
      'faq' => array(
        'label' => 'よくある質問',
        'template' => 'faq',
        'default_enabled' => true,
        'content_module' => 'faq',
      ),
    );
  }
}

if (!function_exists('lai_template_top_section_choices')) {
  function lai_template_top_section_choices()
  {
    $choices = array();

    foreach (lai_template_top_sections() as $key => $section) {
      $choices[$key] = $section['label'];
    }

    return $choices;
  }
}

if (!function_exists('lai_template_default_top_sections')) {
  function lai_template_default_top_sections()
  {
    $defaults = array();

    foreach (lai_template_top_sections() as $key => $section) {
      if (!empty($section['default_enabled'])) {
        $defaults[] = $key;
      }
    }

    return $defaults;
  }
}

if (!function_exists('lai_template_enabled_top_sections')) {
  function lai_template_enabled_top_sections()
  {
    if (function_exists('get_field')) {
      $enabled = get_field('top_sections', 'option');

      if (is_array($enabled)) {
        return array_values(array_intersect($enabled, array_keys(lai_template_top_sections())));
      }
    }

    return lai_template_default_top_sections();
  }
}

if (!function_exists('lai_template_latest_posts_layouts')) {
  function lai_template_latest_posts_layouts()
  {
    return array(
      'split' => '分割型（既存デザイン）',
      'list' => 'リスト型',
      'card' => 'カード型',
    );
  }
}

if (!function_exists('lai_template_current_latest_posts_layout')) {
  function lai_template_current_latest_posts_layout()
  {
    if (function_exists('get_field')) {
      $layout = get_field('latest_posts_layout', 'option');

      if (is_string($layout) && array_key_exists($layout, lai_template_latest_posts_layouts())) {
        return $layout;
      }
    }

    return 'split';
  }
}

if (!function_exists('lai_template_latest_posts_module_choices')) {
  function lai_template_latest_posts_module_choices()
  {
    return array(
      'news' => 'お知らせ',
      'column' => 'コラム',
      'case' => '制作実績/施工事例',
    );
  }
}

if (!function_exists('lai_template_enabled_latest_posts_modules')) {
  function lai_template_enabled_latest_posts_modules()
  {
    $default_modules = array_keys(lai_template_latest_posts_module_choices());

    if (function_exists('get_field')) {
      $modules = get_field('latest_posts_modules', 'option');

      if (is_array($modules)) {
        $modules = array_values(array_intersect($modules, $default_modules));
      } else {
        $modules = $default_modules;
      }
    } else {
      $modules = $default_modules;
    }

    return array_values(array_filter($modules, function ($module_key) {
      return function_exists('lai_template_can_show_content_module') && lai_template_can_show_content_module($module_key);
    }));
  }
}

if (!function_exists('lai_template_latest_posts_count')) {
  function lai_template_latest_posts_count()
  {
    if (function_exists('get_field')) {
      $count = (int) get_field('latest_posts_count', 'option');

      if ($count > 0) {
        return min($count, 12);
      }
    }

    return 3;
  }
}

if (!function_exists('lai_template_register_top_section_fields')) {
  function lai_template_register_top_section_fields()
  {
    if (!function_exists('acf_add_local_field_group')) {
      return;
    }

    acf_add_local_field_group(array(
      'key' => 'group_lai_template_top_sections',
      'title' => 'トップページセクション設定',
      'fields' => array(
        array(
          'key' => 'field_lai_template_top_sections',
          'label' => 'トップページ表示セクション',
          'name' => 'top_sections',
          'type' => 'checkbox',
          'instructions' => 'トップページに表示する共通セクションを選択します。案件固有のセクションはindex.phpで自由に調整できます。',
          'choices' => lai_template_top_section_choices(),
          'default_value' => lai_template_default_top_sections(),
          'return_format' => 'value',
          'layout' => 'vertical',
          'toggle' => 0,
          'allow_custom' => 0,
          'save_custom' => 0,
        ),
        array(
          'key' => 'field_lai_template_latest_posts_layout',
          'label' => '新着一覧 表示形式',
          'name' => 'latest_posts_layout',
          'type' => 'select',
          'instructions' => '新着一覧セクションの見た目を選択します。未設定時は既存デザインの分割型を使用します。',
          'choices' => lai_template_latest_posts_layouts(),
          'default_value' => 'split',
          'allow_null' => 0,
          'multiple' => 0,
          'ui' => 1,
          'return_format' => 'value',
        ),
        array(
          'key' => 'field_lai_template_latest_posts_modules',
          'label' => '新着一覧に表示するコンテンツ',
          'name' => 'latest_posts_modules',
          'type' => 'checkbox',
          'instructions' => '新着一覧に表示するコンテンツを選択します。コンテンツ機能自体がOFFの場合は表示されません。',
          'choices' => lai_template_latest_posts_module_choices(),
          'default_value' => array_keys(lai_template_latest_posts_module_choices()),
          'return_format' => 'value',
          'layout' => 'vertical',
          'toggle' => 0,
          'allow_custom' => 0,
          'save_custom' => 0,
        ),
        array(
          'key' => 'field_lai_template_latest_posts_count',
          'label' => '新着一覧 表示件数',
          'name' => 'latest_posts_count',
          'type' => 'number',
          'instructions' => '各コンテンツごとの表示件数。未設定時は3件、最大12件です。',
          'default_value' => 3,
          'min' => 1,
          'max' => 12,
          'step' => 1,
        ),
      ),
      'location' => array(
        array(
          array(
            'param' => 'options_page',
            'operator' => '==',
            'value' => 'theme-general-settings',
          ),
        ),
      ),
      'menu_order' => 12,
      'position' => 'normal',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'active' => true,
    ));
  }
}
add_action('acf/init', 'lai_template_register_top_section_fields');
