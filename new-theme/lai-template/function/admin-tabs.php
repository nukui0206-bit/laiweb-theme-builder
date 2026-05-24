<?php

if (!function_exists('lai_template_admin_settings_tabs')) {
  function lai_template_admin_settings_tabs()
  {
    if (empty($_GET['page']) || $_GET['page'] !== 'theme-general-settings') {
      return;
    }
    ?>
    <style>
      .lai-settings-tabs {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin: 16px 0 18px;
      }

      .lai-settings-tabs__button {
        background: #fff;
        border: 1px solid #c3c4c7;
        border-radius: 999px;
        color: #1d2327;
        cursor: pointer;
        font-size: 13px;
        font-weight: 700;
        line-height: 1;
        padding: 11px 16px;
      }

      .lai-settings-tabs__button.is-active {
        background: #2271b1;
        border-color: #2271b1;
        color: #fff;
      }

      .acf-postbox.lai-settings-tabs__hidden {
        display: none !important;
      }
    </style>
    <script>
      (function($) {
        var tabs = [
          {
            key: 'basic',
            label: '基本設定',
            selectors: [
              '[data-name="loading_enabled"]',
              '[data-name="loading_type"]',
              '[data-name="loading_scope"]',
              '[data-name="loading_img"]',
              '[data-name="loading"]'
            ]
          },
          {
            key: 'header',
            label: 'ヘッダー設定',
            selectors: [
              '[data-name="header_layout"]',
              '[data-name="header_show_cta"]',
              '[data-name="header_show_tel"]',
              '[data-name="header_cta_count"]',
              '[data-name="header_hamburger_mode"]'
            ]
          },
          {
            key: 'footer',
            label: 'フッター設定',
            selectors: ['[data-name="footer_layout"]']
          },
          {
            key: 'top',
            label: 'トップページ部品',
            selectors: ['[data-name="top_sections"]', '[data-name="latest_posts"]', '[data-name="enabled_post_types"]']
          },
          {
            key: 'cta',
            label: 'CTA設定',
            selectors: ['[data-name="cta_layout"]', '[data-name="cta_style"]', '[data-name="cta"]']
          },
          {
            key: 'colors',
            label: 'カラー設定',
            selectors: ['[data-name="primary_color"]', '[data-name="key_color"]', '[data-name="design_colors"]', '#lai-template-reset-design-colors']
          },
          {
            key: 'other',
            label: 'その他',
            selectors: []
          }
        ];

        function postboxes() {
          return $('.acf-postbox').not('.lai-settings-tabs__removed');
        }

        function moveLoadingScopeField() {
          var $scope = $('.acf-field[data-name="loading_scope"]');
          var $type = $('.acf-field[data-name="loading_type"]');

          if (!$scope.length || !$type.length || $scope.data('laiMoved')) {
            return;
          }

          var $sourceBox = $scope.closest('.acf-postbox');
          $scope.insertAfter($type).data('laiMoved', true);

          if ($sourceBox.length && !$sourceBox.find('.acf-field').length) {
            $sourceBox.addClass('lai-settings-tabs__removed').hide();
          }
        }

        function detectTab($box) {
          for (var i = 0; i < tabs.length; i++) {
            for (var j = 0; j < tabs[i].selectors.length; j++) {
              if ($box.find(tabs[i].selectors[j]).length) {
                return tabs[i].key;
              }
            }
          }

          return 'other';
        }

        function activateTab(key) {
          $('.lai-settings-tabs__button').removeClass('is-active');
          $('.lai-settings-tabs__button[data-tab="' + key + '"]').addClass('is-active');

          postboxes().each(function() {
            var $box = $(this);
            var boxTab = $box.attr('data-lai-settings-tab') || 'other';
            $box.toggleClass('lai-settings-tabs__hidden', boxTab !== key);
          });

          try {
            window.localStorage.setItem('laiTemplateSettingsTab', key);
          } catch (e) {}
        }

        function initTabs() {
          var $boxes = postboxes();

          if (!$boxes.length || $('.lai-settings-tabs').length) {
            return;
          }

          moveLoadingScopeField();
          $boxes = postboxes();

          $boxes.each(function() {
            var $box = $(this);
            $box.attr('data-lai-settings-tab', detectTab($box));
          });

          var usedTabs = {};
          $boxes.each(function() {
            usedTabs[$(this).attr('data-lai-settings-tab')] = true;
          });

          var $tabs = $('<div class="lai-settings-tabs" role="tablist" aria-label="初期設定タブ"></div>');
          tabs.forEach(function(tab) {
            if (!usedTabs[tab.key]) {
              return;
            }

            $('<button type="button" class="lai-settings-tabs__button"></button>')
              .attr('data-tab', tab.key)
              .text(tab.label)
              .appendTo($tabs);
          });

          $('#poststuff').before($tabs);

          $tabs.on('click', '.lai-settings-tabs__button', function() {
            activateTab($(this).attr('data-tab'));
          });

          var initial = 'basic';
          try {
            var stored = window.localStorage.getItem('laiTemplateSettingsTab');
            initial = stored === 'loading' ? 'basic' : (stored || initial);
          } catch (e) {}

          if (!usedTabs[initial]) {
            initial = $('.lai-settings-tabs__button').first().attr('data-tab');
          }

          activateTab(initial);
        }

        $(document).ready(initTabs);
        if (window.acf) {
          window.acf.addAction('ready', initTabs);
          window.acf.addAction('append', initTabs);
        }
      })(jQuery);
    </script>
    <?php
  }
}
add_action('acf/input/admin_footer', 'lai_template_admin_settings_tabs', 20);
