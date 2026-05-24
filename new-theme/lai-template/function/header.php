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

if (!function_exists('lai_template_header_hamburger_panel_styles')) {
  function lai_template_header_hamburger_panel_styles()
  {
    return array(
      'drawer' => 'サイドリスト',
      'full' => '全体表示',
      'full-info' => '全体表示＋会社情報',
    );
  }
}

if (!function_exists('lai_template_normalize_header_hamburger_panel_style')) {
  function lai_template_normalize_header_hamburger_panel_style($style)
  {
    $legacy_styles = array(
      'gradient' => 'drawer',
      'light' => 'drawer',
      'minimal' => 'drawer',
      'cards' => 'drawer',
      'large' => 'drawer',
    );

    if (is_string($style) && array_key_exists($style, $legacy_styles)) {
      return $legacy_styles[$style];
    }

    if (is_string($style) && array_key_exists($style, lai_template_header_hamburger_panel_styles())) {
      return $style;
    }

    return 'drawer';
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

if (!function_exists('lai_template_current_header_hamburger_panel_style')) {
  function lai_template_current_header_hamburger_panel_style()
  {
    if (function_exists('get_field')) {
      $style = get_field('header_hamburger_panel_style', 'option');

      if (is_string($style) && $style !== '') {
        return lai_template_normalize_header_hamburger_panel_style($style);
      }
    }

    return 'drawer';
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
    return lai_template_header_cta_count() > 0;
  }
}

if (!function_exists('lai_template_header_cta_count')) {
  function lai_template_header_cta_count()
  {
    if (!function_exists('get_field')) {
      return 2;
    }

    $show_cta = get_field('header_show_cta', 'option');

    if ($show_cta === '0' || $show_cta === 0 || $show_cta === false) {
      return 0;
    }

    $count = get_field('header_cta_count', 'option');

    if ($count === '0' || $count === 0) {
      return 0;
    }

    if ($count === '1' || $count === 1) {
      return 1;
    }

    return 2;
  }
}

if (!function_exists('lai_template_should_show_header_cta_button')) {
  function lai_template_should_show_header_cta_button($index)
  {
    return lai_template_header_cta_count() >= (int) $index;
  }
}

if (!function_exists('lai_template_should_show_header_tel')) {
  function lai_template_should_show_header_tel()
  {
    if (!function_exists('get_field')) {
      return true;
    }

    $show_tel = get_field('header_show_tel', 'option');

    return $show_tel !== '0' && $show_tel !== 0 && $show_tel !== false;
  }
}

if (!function_exists('lai_template_header_cta_button')) {
  function lai_template_header_cta_button($index)
  {
    $buttons = array(
      1 => array(
        'url' => function_exists('wmp_get_link') ? wmp_get_link('contact', '') : '#contact',
        'label' => 'メール相談',
        'icon' => '<i class="fa-solid fa-envelope"></i>',
        'bc' => 'var(--kc)',
        'target' => '',
      ),
      2 => array(
        'url' => 'https://line.me/R/ti/p/@883wioop/',
        'label' => 'LINE相談',
        'icon' => '',
        'bc' => 'var(--line)',
        'target' => '_blank',
      ),
    );

    return isset($buttons[$index]) ? $buttons[$index] : $buttons[1];
  }
}

if (!function_exists('lai_template_render_header_cta_button')) {
  function lai_template_render_header_cta_button($index, $extra_class = '', $font_class = 'u-font-pc-15 u-font-sp-15')
  {
    if (!lai_template_should_show_header_cta_button($index)) {
      return;
    }

    $button = lai_template_header_cta_button($index);
    $classes = trim('g-header__action-btn c-btn-solid-border --white --small c-border ' . $font_class . ' ' . $extra_class);
    $target = $button['target'] ? ' target="' . esc_attr($button['target']) . '" rel="noopener"' : '';
    ?>
    <a href="<?= esc_url($button['url']); ?>" class="<?= esc_attr($classes); ?>" style="--color: #fff; --bc: <?= esc_attr($button['bc']); ?>; --border: transparent; --border2: transparent; --radius: 999px"<?= $target; ?>>
      <span class="c-btn-solid-border__txt">
        <span class="c-btn-solid-border__txt-in"><?= $button['icon']; ?> <?= esc_html($button['label']); ?></span>
      </span>
      <span class="c-btn-solid-border__l"></span>
      <span class="c-btn-solid-border__t"></span>
      <span class="c-btn-solid-border__r"></span>
      <span class="c-btn-solid-border__b"></span>
    </a>
    <?php
  }
}

if (!function_exists('lai_template_render_header_tel')) {
  function lai_template_render_header_tel($extra_class = '')
  {
    if (!lai_template_should_show_header_tel() || !function_exists('get_field')) {
      return;
    }

    $header_tel = get_field('tel_contact', 'option');

    if (!is_string($header_tel) || $header_tel === '') {
      return;
    }

    $classes = trim('g-header__tel ' . $extra_class);
    ?>
    <a href="tel:<?= esc_attr($header_tel); ?>" class="<?= esc_attr($classes); ?>">
      <span class="g-header__tel-number"><i class="fa-solid fa-phone-volume"></i><?= esc_html($header_tel); ?></span>
    </a>
    <?php
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
          'key' => 'field_lai_template_header_show_tel',
          'label' => 'ヘッダー電話番号',
          'name' => 'header_show_tel',
          'type' => 'true_false',
          'instructions' => 'ヘッダー内に電話番号を表示するかを選択します。電話番号自体は会社情報のtel_contactを使用します。',
          'default_value' => 1,
          'ui' => 1,
          'ui_on_text' => '表示',
          'ui_off_text' => '非表示',
        ),
        array(
          'key' => 'field_lai_template_header_cta_count',
          'label' => 'ヘッダーCTAボタン数',
          'name' => 'header_cta_count',
          'type' => 'select',
          'instructions' => 'ヘッダーに表示するCTAボタン数を選択します。まずは共通のメール相談・LINE相談を出し分けます。',
          'choices' => array(
            '0' => 'なし',
            '1' => '1つ',
            '2' => '2つ',
          ),
          'default_value' => '2',
          'allow_null' => 0,
          'multiple' => 0,
          'ui' => 1,
          'return_format' => 'value',
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
        array(
          'key' => 'field_lai_template_header_hamburger_panel_style',
          'label' => 'ハンバーガー展開デザイン',
          'name' => 'header_hamburger_panel_style',
          'type' => 'select',
          'instructions' => 'ハンバーガーメニューを開いた時のパネルデザインを選択します。',
          'choices' => lai_template_header_hamburger_panel_styles(),
          'default_value' => 'drawer',
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
