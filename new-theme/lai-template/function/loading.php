<?php

if (!function_exists('lai_template_loading_layouts')) {
  function lai_template_loading_layouts()
  {
    return array(
      'none' => '表示しない',
      'logo' => 'ロゴ表示',
      'progress' => '進捗表示',
      'split' => '画面分割',
    );
  }
}

if (!function_exists('lai_template_loading_scopes')) {
  function lai_template_loading_scopes()
  {
    return array(
      'front' => 'トップページのみ',
      'all' => '全ページ',
    );
  }
}

if (!function_exists('lai_template_current_loading_layout')) {
  function lai_template_current_loading_layout()
  {
    if (function_exists('get_field')) {
      $layout = get_field('loading_type', 'option');

      if (is_string($layout) && array_key_exists($layout, lai_template_loading_layouts())) {
        return $layout;
      }
    }

    return 'none';
  }
}

if (!function_exists('lai_template_current_loading_scope')) {
  function lai_template_current_loading_scope()
  {
    if (function_exists('get_field')) {
      $scope = get_field('loading_scope', 'option');

      if (is_string($scope) && array_key_exists($scope, lai_template_loading_scopes())) {
        return $scope;
      }
    }

    return 'front';
  }
}

if (!function_exists('lai_template_should_show_loading')) {
  function lai_template_should_show_loading()
  {
    if (lai_template_current_loading_layout() === 'none') {
      return false;
    }

    if (lai_template_current_loading_scope() === 'all') {
      return true;
    }

    return is_front_page() || is_home();
  }
}

if (!function_exists('lai_template_loading_image_url')) {
  function lai_template_loading_image_url()
  {
    if (!function_exists('get_field')) {
      return '';
    }

    $image = get_field('loading_img', 'option');

    if (is_array($image) && !empty($image['url'])) {
      return $image['url'];
    }

    if (is_numeric($image)) {
      return (string) wp_get_attachment_image_url((int) $image, 'full');
    }

    if (is_string($image) && $image !== '') {
      return $image;
    }

    $logo = get_field('logo_2', 'option');

    return is_string($logo) ? $logo : '';
  }
}

if (!function_exists('lai_template_load_loading_type_field')) {
  function lai_template_load_loading_type_field($field)
  {
    $field['choices'] = lai_template_loading_layouts();
    $field['default_value'] = 'none';

    return $field;
  }
}
add_filter('acf/load_field/name=loading_type', 'lai_template_load_loading_type_field');

if (!function_exists('lai_template_register_loading_fields')) {
  function lai_template_register_loading_fields()
  {
    if (!function_exists('acf_add_local_field_group')) {
      return;
    }

    acf_add_local_field_group(array(
      'key' => 'group_lai_template_loading',
      'title' => 'ローディング詳細設定',
      'fields' => array(
        array(
          'key' => 'field_lai_template_loading_scope',
          'label' => 'ローディング 表示範囲',
          'name' => 'loading_scope',
          'type' => 'select',
          'instructions' => '既存のローディング設定に対して、表示するページ範囲を指定します。',
          'choices' => lai_template_loading_scopes(),
          'default_value' => 'front',
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
      'menu_order' => 14,
      'position' => 'normal',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'active' => true,
    ));
  }
}
add_action('acf/init', 'lai_template_register_loading_fields');
