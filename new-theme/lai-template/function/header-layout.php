<?php

/**
 * Header layout & hamburger registry, plus ACF option fields for the header section.
 *
 * - header_layout         : ヘッダーの大枠レイアウトを選択（laiweb / town / clinic）
 * - header_hamburger      : ハンバーガーメニュー（offcanvas）の表示パターン（none / simple / rich）
 * - header_subcatch       : ロゴ近くのサブキャッチコピー（town タイプで使用）
 * - header_line_url       : LINE 相談ボタンの URL
 * - header_reservation_url: 予約／外部 CTA ボタンの URL
 */

if (!function_exists('lai_template_header_layouts')) {
  function lai_template_header_layouts()
  {
    return array(
      'laiweb' => array(
        'label' => 'コーポレート/サービス向け（Laiwebタイプ）',
        'default_enabled' => true,
      ),
      'town' => array(
        'label' => 'CV重視/LP向け（タウン水道タイプ）',
      ),
      'clinic' => array(
        'label' => '店舗/医院向け（4foot4タイプ）',
      ),
    );
  }
}

if (!function_exists('lai_template_header_layout_choices')) {
  function lai_template_header_layout_choices()
  {
    $choices = array();
    foreach (lai_template_header_layouts() as $key => $layout) {
      $choices[$key] = $layout['label'];
    }
    return $choices;
  }
}

if (!function_exists('lai_template_default_header_layout')) {
  function lai_template_default_header_layout()
  {
    foreach (lai_template_header_layouts() as $key => $layout) {
      if (!empty($layout['default_enabled'])) {
        return $key;
      }
    }
    return 'laiweb';
  }
}

if (!function_exists('lai_template_current_header_layout')) {
  function lai_template_current_header_layout()
  {
    if (function_exists('get_field')) {
      $layout = get_field('header_layout', 'option');
      if (is_string($layout) && $layout !== '' && array_key_exists($layout, lai_template_header_layouts())) {
        return $layout;
      }
    }
    return lai_template_default_header_layout();
  }
}

if (!function_exists('lai_template_header_hamburgers')) {
  function lai_template_header_hamburgers()
  {
    return array(
      'none' => array(
        'label' => '表示しない',
        'default_enabled' => true,
      ),
      'simple' => array(
        'label' => 'シンプル（白背景＋ナビリスト）',
      ),
      'rich' => array(
        'label' => 'リッチ（左半分にイメージ画像＋ナビ）',
      ),
    );
  }
}

if (!function_exists('lai_template_header_hamburger_choices')) {
  function lai_template_header_hamburger_choices()
  {
    $choices = array();
    foreach (lai_template_header_hamburgers() as $key => $hamburger) {
      $choices[$key] = $hamburger['label'];
    }
    return $choices;
  }
}

if (!function_exists('lai_template_default_header_hamburger')) {
  function lai_template_default_header_hamburger()
  {
    foreach (lai_template_header_hamburgers() as $key => $hamburger) {
      if (!empty($hamburger['default_enabled'])) {
        return $key;
      }
    }
    return 'none';
  }
}

if (!function_exists('lai_template_current_header_hamburger')) {
  function lai_template_current_header_hamburger()
  {
    if (function_exists('get_field')) {
      $value = get_field('header_hamburger', 'option');
      if (is_string($value) && $value !== '' && array_key_exists($value, lai_template_header_hamburgers())) {
        return $value;
      }
    }
    return lai_template_default_header_hamburger();
  }
}

if (!function_exists('lai_template_header_subcatch')) {
  function lai_template_header_subcatch()
  {
    if (function_exists('get_field')) {
      $value = get_field('header_subcatch', 'option');
      if (is_string($value)) {
        return trim($value);
      }
    }
    return '';
  }
}

if (!function_exists('lai_template_header_line_url')) {
  function lai_template_header_line_url()
  {
    if (function_exists('get_field')) {
      $value = get_field('header_line_url', 'option');
      if (is_string($value)) {
        return trim($value);
      }
    }
    return '';
  }
}

if (!function_exists('lai_template_header_reservation_url')) {
  function lai_template_header_reservation_url()
  {
    if (function_exists('get_field')) {
      $value = get_field('header_reservation_url', 'option');
      if (is_string($value)) {
        return trim($value);
      }
    }
    return '';
  }
}

if (!function_exists('lai_template_header_hamburger_image_url')) {
  function lai_template_header_hamburger_image_url()
  {
    if (!function_exists('get_field')) {
      return '';
    }

    $image = get_field('header_hamburger_image', 'option');

    if (is_array($image) && !empty($image['url'])) {
      return (string) $image['url'];
    }

    if (is_string($image) && $image !== '') {
      return $image;
    }

    return '';
  }
}

if (!function_exists('lai_template_register_header_layout_fields')) {
  function lai_template_register_header_layout_fields()
  {
    if (!function_exists('acf_add_local_field_group')) {
      return;
    }

    acf_add_local_field_group(array(
      'key' => 'group_lai_template_header_layout',
      'title' => 'ヘッダー設定',
      'fields' => array(
        array(
          'key' => 'field_lai_template_header_layout',
          'label' => 'ヘッダーレイアウト',
          'name' => 'header_layout',
          'type' => 'select',
          'instructions' => 'サイトのヘッダー構成を選択します。未設定時は「コーポレート/サービス向け」が適用されます。',
          'choices' => lai_template_header_layout_choices(),
          'default_value' => lai_template_default_header_layout(),
          'allow_null' => 0,
          'multiple' => 0,
          'ui' => 1,
          'return_format' => 'value',
        ),
        array(
          'key' => 'field_lai_template_header_hamburger',
          'label' => 'ハンバーガーメニュー（offcanvas）',
          'name' => 'header_hamburger',
          'type' => 'select',
          'instructions' => 'スマホ用ハンバーガーメニューの表示パターンを選択します。',
          'choices' => lai_template_header_hamburger_choices(),
          'default_value' => lai_template_default_header_hamburger(),
          'allow_null' => 0,
          'multiple' => 0,
          'ui' => 1,
          'return_format' => 'value',
        ),
        array(
          'key' => 'field_lai_template_header_subcatch',
          'label' => 'ヘッダー説明文（サブキャッチ）',
          'name' => 'header_subcatch',
          'type' => 'text',
          'instructions' => 'ヘッダーのロゴ近くに表示する短い説明文。CV重視/LP向けレイアウトで主に使用します。空欄なら非表示。',
        ),
        array(
          'key' => 'field_lai_template_header_line_url',
          'label' => 'LINE 連絡 URL',
          'name' => 'header_line_url',
          'type' => 'url',
          'instructions' => 'ヘッダーの「LINEで無料相談」ボタンに使う URL。空欄ならボタン自体を非表示。',
        ),
        array(
          'key' => 'field_lai_template_header_reservation_url',
          'label' => '予約／外部 CTA URL',
          'name' => 'header_reservation_url',
          'type' => 'url',
          'instructions' => 'ヘッダーの「オンライン予約」「外部予約サイト」など固定 CTA に使う URL。空欄ならボタン自体を非表示。',
        ),
        array(
          'key' => 'field_lai_template_header_hamburger_image',
          'label' => 'ハンバーガーメニュー画像（リッチパターン用）',
          'name' => 'header_hamburger_image',
          'type' => 'image',
          'instructions' => 'ハンバーガーを「リッチ」に設定した場合に、左半分に表示する画像。未設定時はプレーン背景。',
          'return_format' => 'array',
          'preview_size' => 'medium',
          'library' => 'all',
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
      'menu_order' => 11,
      'position' => 'normal',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'active' => true,
    ));
  }
}
add_action('acf/init', 'lai_template_register_header_layout_fields');
