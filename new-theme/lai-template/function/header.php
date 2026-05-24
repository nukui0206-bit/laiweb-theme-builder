<?php

if (!function_exists('lai_template_header_layouts')) {
  function lai_template_header_layouts()
  {
    return array(
      'standard' => '標準ヘッダー',
      'nav-bottom' => '2段ヘッダー',
      'floating' => 'フローティングヘッダー',
      'logo-only' => 'ロゴのみ',
    );
  }
}

if (!function_exists('lai_template_header_hamburger_modes')) {
  function lai_template_header_hamburger_modes()
  {
    return array(
      'mobile' => 'スマホのみ表示',
      'all' => 'PC・スマホ両方に表示',
      'none' => '表示しない',
    );
  }
}

if (!function_exists('lai_template_header_hamburger_button_styles')) {
  function lai_template_header_hamburger_button_styles()
  {
    return array(
      'round' => '丸型',
      'square' => '四角型',
      'dots' => 'ドット型',
    );
  }
}

if (!function_exists('lai_template_current_header_layout')) {
  function lai_template_current_header_layout()
  {
    if (function_exists('get_field')) {
      $layout = get_field('header_layout', 'option');

      if (is_string($layout) && array_key_exists($layout, lai_template_header_layouts())) {
        return $layout;
      }
    }

    return 'standard';
  }
}

if (!function_exists('lai_template_current_header_hamburger_button_style')) {
  function lai_template_current_header_hamburger_button_style()
  {
    if (function_exists('get_field')) {
      $style = get_field('header_hamburger_button_style', 'option');

      if (is_string($style) && array_key_exists($style, lai_template_header_hamburger_button_styles())) {
        return $style;
      }
    }

    return 'square';
  }
}

if (!function_exists('lai_template_current_header_hamburger_mode')) {
  function lai_template_current_header_hamburger_mode()
  {
    if (function_exists('get_field')) {
      $mode = get_field('header_hamburger_mode', 'option');

      if (is_string($mode) && array_key_exists($mode, lai_template_header_hamburger_modes())) {
        return $mode;
      }
    }

    return 'mobile';
  }
}

if (!function_exists('lai_template_should_show_header_hamburger')) {
  function lai_template_should_show_header_hamburger()
  {
    return lai_template_current_header_hamburger_mode() !== 'none';
  }
}

if (!function_exists('lai_template_header_hamburger_button_classes')) {
  function lai_template_header_hamburger_button_classes($extra_class = '')
  {
    $classes = array('navbar-toggler', 'lai-header-hamburger-btn');
    $classes[] = 'lai-header-hamburger-btn--' . lai_template_current_header_hamburger_button_style();
    $mode = lai_template_current_header_hamburger_mode();

    if ($mode === 'mobile') {
      $classes[] = 'd-flex';
      $classes[] = 'd-lg-none';
    } elseif ($mode === 'all') {
      $classes[] = 'd-flex';
    }

    if (is_string($extra_class) && $extra_class !== '') {
      $classes[] = $extra_class;
    }

    return implode(' ', $classes);
  }
}

if (!function_exists('lai_template_should_show_header_cta')) {
  function lai_template_should_show_header_cta()
  {
    if (!function_exists('get_field')) {
      return true;
    }

    $show_cta = get_field('header_show_cta', 'option');

    return $show_cta !== '0' && $show_cta !== 0 && $show_cta !== false;
  }
}

if (!function_exists('lai_template_register_header_fields')) {
  function lai_template_register_header_fields()
  {
    if (!function_exists('acf_add_local_field_group')) {
      return;
    }

    acf_add_local_field_group(array(
      'key' => 'group_lai_template_header',
      'title' => 'ヘッダー設定',
      'fields' => array(
        array(
          'key' => 'field_lai_template_header_layout',
          'label' => 'ヘッダー 表示形式',
          'name' => 'header_layout',
          'type' => 'select',
          'instructions' => 'サイト全体で使うヘッダーの基本パターンを選択します。メインビジュアルは別パーツとして管理します。細かい調整はinclude/headers/内のテンプレートやadd.cssで行います。',
          'choices' => lai_template_header_layouts(),
          'default_value' => 'standard',
          'allow_null' => 0,
          'multiple' => 0,
          'ui' => 1,
          'return_format' => 'value',
        ),
        array(
          'key' => 'field_lai_template_header_show_cta',
          'label' => 'ヘッダーCTA',
          'name' => 'header_show_cta',
          'type' => 'true_false',
          'instructions' => 'ヘッダー内の相談ボタンを表示するか選択します。案件ごとの文言やリンク変更はテンプレート側で調整します。',
          'default_value' => 1,
          'ui' => 1,
          'ui_on_text' => '表示',
          'ui_off_text' => '非表示',
        ),
        array(
          'key' => 'field_lai_template_header_hamburger_mode',
          'label' => 'ハンバーガーメニュー',
          'name' => 'header_hamburger_mode',
          'type' => 'select',
          'instructions' => 'ヘッダーにハンバーガーボタンを表示する範囲を選択します。中身はinclude/nav.phpをhamburger用として読み込みます。',
          'choices' => lai_template_header_hamburger_modes(),
          'default_value' => 'mobile',
          'allow_null' => 0,
          'multiple' => 0,
          'ui' => 1,
          'return_format' => 'value',
        ),
        array(
          'key' => 'field_lai_template_header_hamburger_button_style',
          'label' => 'ハンバーガーボタン形状',
          'name' => 'header_hamburger_button_style',
          'type' => 'select',
          'instructions' => 'ハンバーガーボタンの見た目を選択します。細かい動きや余白はinclude/header-hamburger.php側で調整します。',
          'choices' => lai_template_header_hamburger_button_styles(),
          'default_value' => 'square',
          'allow_null' => 0,
          'multiple' => 0,
          'ui' => 1,
          'return_format' => 'value',
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
add_action('acf/init', 'lai_template_register_header_fields');
