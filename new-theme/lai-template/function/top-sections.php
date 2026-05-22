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
