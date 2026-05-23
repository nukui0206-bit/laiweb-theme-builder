<?php

if (!function_exists('lai_template_default_design_colors')) {
  function lai_template_default_design_colors()
  {
    return array(
      'fc' => '#1e1a1d',
      'kc' => '#82a8ce',
      'kcd' => '#5d86ae',
      'sc' => '#eaf7ff',
      'scd' => '#cfefff',
      'ac' => '#fec20d',
      'acd' => '#f0a800',
      'bc' => '#1e1a1d',
      'line' => '#00c306',
    );
  }
}

if (!function_exists('lai_template_normalize_hex_color')) {
  function lai_template_normalize_hex_color($color, $fallback)
  {
    if (!is_string($color) || $color === '') {
      return $fallback;
    }

    $color = sanitize_hex_color($color);

    return $color ? $color : $fallback;
  }
}

if (!function_exists('lai_template_hex_to_rgb')) {
  function lai_template_hex_to_rgb($color)
  {
    $color = ltrim($color, '#');

    if (strlen($color) === 3) {
      $color = $color[0] . $color[0] . $color[1] . $color[1] . $color[2] . $color[2];
    }

    return array(
      hexdec(substr($color, 0, 2)),
      hexdec(substr($color, 2, 2)),
      hexdec(substr($color, 4, 2)),
    );
  }
}

if (!function_exists('lai_template_rgb_string')) {
  function lai_template_rgb_string($color)
  {
    return implode(',', lai_template_hex_to_rgb($color));
  }
}

if (!function_exists('lai_template_adjust_hex_color')) {
  function lai_template_adjust_hex_color($color, $amount)
  {
    $rgb = lai_template_hex_to_rgb($color);
    $adjusted = array();

    foreach ($rgb as $channel) {
      $adjusted[] = max(0, min(255, $channel + $amount));
    }

    return sprintf('#%02x%02x%02x', $adjusted[0], $adjusted[1], $adjusted[2]);
  }
}

if (!function_exists('lai_template_design_color_field_map')) {
  function lai_template_design_color_field_map()
  {
    return array(
      'fc' => 'theme_text_color',
      'kc' => 'theme_primary_color',
      'kcd' => 'theme_primary_dark_color',
      'sc' => 'theme_secondary_color',
      'scd' => 'theme_secondary_dark_color',
      'ac' => 'theme_accent_color',
      'acd' => 'theme_accent_dark_color',
      'bc' => 'theme_base_color',
      'line' => 'theme_line_color',
    );
  }
}

if (!function_exists('lai_template_current_design_colors')) {
  function lai_template_current_design_colors()
  {
    $colors = lai_template_default_design_colors();

    if (function_exists('get_field')) {
      foreach (lai_template_design_color_field_map() as $key => $field_name) {
        $colors[$key] = lai_template_normalize_hex_color(get_field($field_name, 'option'), $colors[$key]);
      }
    }

    if ($colors['kcd'] === lai_template_default_design_colors()['kcd'] && $colors['kc'] !== lai_template_default_design_colors()['kc']) {
      $colors['kcd'] = lai_template_adjust_hex_color($colors['kc'], -35);
    }

    if ($colors['scd'] === lai_template_default_design_colors()['scd'] && $colors['sc'] !== lai_template_default_design_colors()['sc']) {
      $colors['scd'] = lai_template_adjust_hex_color($colors['sc'], -25);
    }

    if ($colors['acd'] === lai_template_default_design_colors()['acd'] && $colors['ac'] !== lai_template_default_design_colors()['ac']) {
      $colors['acd'] = lai_template_adjust_hex_color($colors['ac'], -35);
    }

    return $colors;
  }
}

if (!function_exists('lai_template_register_design_color_fields')) {
  function lai_template_register_design_color_fields()
  {
    if (!function_exists('acf_add_local_field_group')) {
      return;
    }

    $defaults = lai_template_default_design_colors();

    acf_add_local_field_group(array(
      'key' => 'group_lai_template_design_colors',
      'title' => '基本カラー設定',
      'fields' => array(
        array(
          'key' => 'field_lai_template_theme_color_reset',
          'label' => 'カラー初期化',
          'name' => '',
          'type' => 'message',
          'message' => '<button type="button" class="button" id="lai-template-reset-design-colors">基本カラーを初期値に戻す</button><p class="description">ボタンを押すと、この「基本カラー設定」内のカラーをテーマ初期値に戻します。保存するまでは反映されません。</p>',
          'new_lines' => '',
          'esc_html' => 0,
        ),
        array(
          'key' => 'field_lai_template_theme_primary_color',
          'label' => 'メインカラー',
          'name' => 'theme_primary_color',
          'type' => 'color_picker',
          'instructions' => 'CSS変数: --kc / --kc-rgb。見出し、ボタン、背景、装飾などの主軸カラーです。',
          'default_value' => $defaults['kc'],
          'return_format' => 'string',
        ),
        array(
          'key' => 'field_lai_template_theme_primary_dark_color',
          'label' => 'メインカラー 濃色',
          'name' => 'theme_primary_dark_color',
          'type' => 'color_picker',
          'instructions' => 'CSS変数: --kcd / --kcd-rgb。メインカラーの濃い版です。未設定時はメインカラーから自動補完します。',
          'default_value' => $defaults['kcd'],
          'return_format' => 'string',
        ),
        array(
          'key' => 'field_lai_template_theme_secondary_color',
          'label' => 'サブカラー',
          'name' => 'theme_secondary_color',
          'type' => 'color_picker',
          'instructions' => 'CSS変数: --sc / --sc-rgb。淡い背景、サブ装飾、グラデーションなどに使います。',
          'default_value' => $defaults['sc'],
          'return_format' => 'string',
        ),
        array(
          'key' => 'field_lai_template_theme_secondary_dark_color',
          'label' => 'サブカラー 濃色',
          'name' => 'theme_secondary_dark_color',
          'type' => 'color_picker',
          'instructions' => 'CSS変数: --scd / --scd-rgb。サブカラーの濃い版です。未設定時はサブカラーから自動補完します。',
          'default_value' => $defaults['scd'],
          'return_format' => 'string',
        ),
        array(
          'key' => 'field_lai_template_theme_accent_color',
          'label' => 'アクセントカラー',
          'name' => 'theme_accent_color',
          'type' => 'color_picker',
          'instructions' => 'CSS変数: --ac / --ac-rgb。強調文字、CTA、マーカー、注目ボタンなどに使います。',
          'default_value' => $defaults['ac'],
          'return_format' => 'string',
        ),
        array(
          'key' => 'field_lai_template_theme_accent_dark_color',
          'label' => 'アクセントカラー 濃色',
          'name' => 'theme_accent_dark_color',
          'type' => 'color_picker',
          'instructions' => 'CSS変数: --acd / --acd-rgb。アクセントカラーの濃い版です。未設定時はアクセントカラーから自動補完します。',
          'default_value' => $defaults['acd'],
          'return_format' => 'string',
        ),
        array(
          'key' => 'field_lai_template_theme_text_color',
          'label' => '基本文字色',
          'name' => 'theme_text_color',
          'type' => 'color_picker',
          'instructions' => 'CSS変数: --fc / --fc-rgb。本文、見出し、罫線などの基本色です。',
          'default_value' => $defaults['fc'],
          'return_format' => 'string',
        ),
        array(
          'key' => 'field_lai_template_theme_base_color',
          'label' => 'ベース濃色',
          'name' => 'theme_base_color',
          'type' => 'color_picker',
          'instructions' => 'CSS変数: --bc / --bc-rgb。暗い背景やフッター系のベース色です。',
          'default_value' => $defaults['bc'],
          'return_format' => 'string',
        ),
        array(
          'key' => 'field_lai_template_theme_line_color',
          'label' => 'LINEカラー',
          'name' => 'theme_line_color',
          'type' => 'color_picker',
          'instructions' => 'CSS変数: --line / --line-rgb。LINEボタンやLINE導線用の色です。',
          'default_value' => $defaults['line'],
          'return_format' => 'string',
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
      'menu_order' => 16,
      'position' => 'normal',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'active' => true,
    ));
  }
}
add_action('acf/init', 'lai_template_register_design_color_fields');

if (!function_exists('lai_template_design_color_reset_admin_script')) {
  function lai_template_design_color_reset_admin_script()
  {
    if (empty($_GET['page']) || $_GET['page'] !== 'theme-general-settings') {
      return;
    }

    $field_defaults = array(
      'theme_primary_color' => lai_template_default_design_colors()['kc'],
      'theme_primary_dark_color' => lai_template_default_design_colors()['kcd'],
      'theme_secondary_color' => lai_template_default_design_colors()['sc'],
      'theme_secondary_dark_color' => lai_template_default_design_colors()['scd'],
      'theme_accent_color' => lai_template_default_design_colors()['ac'],
      'theme_accent_dark_color' => lai_template_default_design_colors()['acd'],
      'theme_text_color' => lai_template_default_design_colors()['fc'],
      'theme_base_color' => lai_template_default_design_colors()['bc'],
      'theme_line_color' => lai_template_default_design_colors()['line'],
    );
    ?>
    <script>
      jQuery(function($) {
        const defaults = <?= wp_json_encode($field_defaults); ?>;

        $('#lai-template-reset-design-colors').on('click', function() {
          Object.keys(defaults).forEach(function(fieldName) {
            const $field = $('.acf-field[data-name="' + fieldName + '"]');
            const $input = $field.find('input.wp-color-picker').first();

            if ($input.length && typeof $input.wpColorPicker === 'function') {
              $input.wpColorPicker('color', defaults[fieldName]);
              $input.trigger('change');
              return;
            }

            $field.find('input[type="text"], input[type="hidden"]').first().val(defaults[fieldName]).trigger('change');
          });
        });
      });
    </script>
    <?php
  }
}
add_action('acf/input/admin_footer', 'lai_template_design_color_reset_admin_script');
