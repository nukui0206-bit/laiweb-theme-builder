<?php

if (!function_exists('lai_template_footer_layouts')) {
  function lai_template_footer_layouts()
  {
    return array(
      'standard' => '標準フッター',
      'simple' => 'シンプルフッター',
      'rich' => 'リッチフッター',
    );
  }
}

if (!function_exists('lai_template_current_footer_layout')) {
  function lai_template_current_footer_layout()
  {
    if (function_exists('get_field')) {
      $layout = get_field('footer_layout', 'option');

      if (is_string($layout) && array_key_exists($layout, lai_template_footer_layouts())) {
        return $layout;
      }
    }

    return 'standard';
  }
}

if (!function_exists('lai_template_register_footer_fields')) {
  function lai_template_register_footer_fields()
  {
    if (!function_exists('acf_add_local_field_group')) {
      return;
    }

    acf_add_local_field_group(array(
      'key' => 'group_lai_template_footer',
      'title' => 'フッター設定',
      'fields' => array(
        array(
          'key' => 'field_lai_template_footer_tab',
          'label' => 'フッター設定',
          'name' => '',
          'type' => 'tab',
          'placement' => 'top',
        ),
        array(
          'key' => 'field_lai_template_footer_layout',
          'label' => 'フッター 表示形式',
          'name' => 'footer_layout',
          'type' => 'select',
          'instructions' => 'サイト種別に応じてフッターの基本パターンを選択します。細かい調整はinclude/footers/内のテンプレートやadd.cssで行います。',
          'choices' => lai_template_footer_layouts(),
          'default_value' => 'standard',
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
      'menu_order' => 15,
      'position' => 'normal',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'active' => true,
    ));
  }
}
add_action('acf/init', 'lai_template_register_footer_fields');
