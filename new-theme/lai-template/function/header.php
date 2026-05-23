<?php

if (!function_exists('lai_template_header_layouts')) {
  function lai_template_header_layouts()
  {
    return array(
      'standard' => '標準ヘッダー',
      'nav-bottom' => '2段ヘッダー',
      'logo-only' => 'ロゴのみ',
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
