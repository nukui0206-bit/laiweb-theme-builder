<?php

if (!function_exists('lai_template_cta_layouts')) {
  function lai_template_cta_layouts()
  {
    return array(
      'none' => '表示しない',
      'standard' => '標準CTA',
      'compact' => 'コンパクトCTA',
      'common' => '背景画像CTA',
    );
  }
}

if (!function_exists('lai_template_current_cta_layout')) {
  function lai_template_current_cta_layout()
  {
    if (function_exists('get_field')) {
      $layout = get_field('cta_layout', 'option');

      if (is_string($layout) && array_key_exists($layout, lai_template_cta_layouts())) {
        return $layout;
      }
    }

    return 'none';
  }
}

if (!function_exists('lai_template_register_cta_fields')) {
  function lai_template_register_cta_fields()
  {
    if (!function_exists('acf_add_local_field_group')) {
      return;
    }

    acf_add_local_field_group(array(
      'key' => 'group_lai_template_cta',
      'title' => 'CTA設定',
      'fields' => array(
        array(
          'key' => 'field_lai_template_cta_layout',
          'label' => '下部CTA 表示形式',
          'name' => 'cta_layout',
          'type' => 'select',
          'instructions' => 'include/cta.phpで表示するCTAパターンを選択します。トップページ途中のCTAなど、案件固有の配置はindex.phpで調整します。',
          'choices' => lai_template_cta_layouts(),
          'default_value' => 'none',
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
      'menu_order' => 13,
      'position' => 'normal',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'active' => true,
    ));
  }
}
add_action('acf/init', 'lai_template_register_cta_fields');
