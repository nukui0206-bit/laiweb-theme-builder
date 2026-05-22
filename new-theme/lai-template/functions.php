<?php

$path = explode("/", __FILE__);
//define('ABSOLUTE_PATH'  ,'/'.$path[1].'/'.$path[2]);
define('ABSOLUTE_PATH', '/' . $path[1] . '/' . $path[2] . '/' . $path[3]);
define('CORE_DIR', ABSOLUTE_PATH . '/core');
define('SLIB_DIR', CORE_DIR . '/lpLib');
define('ACTIVATE_DOMAIN', 'laiweb.jp');

/* 共通ファンクション
* ---------------------------------------- */
require_once(SLIB_DIR . '/wmp-setting.php');

/* サイト特有のファンクション
* ---------------------------------------- */
require_once('function/site.php');

// リライトルール追加
function wmp_rewrite_rule()
{
  add_rewrite_rule(
    '^recruit/project/([^/]+)/?$',
    'index.php?post_type=project&p=$matches[1]',
    'top'
  );
  add_rewrite_rule(
    '^recruit/interview/([^/]+)/?$',
    'index.php?post_type=interview&p=$matches[1]',
    'top'
  );
}
add_action('init', 'wmp_rewrite_rule');

// リクルート検索
function wmp_recruit_search_url()
{
  if (is_search() && $_GET['post_type'] == 'recruits' && !empty($_GET['s'])) {
    wp_safe_redirect(home_url('/recruit/search/') . urlencode(get_query_var('s')));
    exit();
  }
}
add_action('template_redirect', 'wmp_recruit_search_url');

//wp-block-library読み込み停止
function remove_unuse_css()
{
  wp_dequeue_style('wp-block-library');
}
add_action('wp_enqueue_scripts', 'remove_unuse_css', 9999);

//ACFのユーザーを選択する時、ユーザー名じゃなくてニックネームを表示させる
function wmp_alter_specific_user_field($result, $user, $field, $post_id)
{
  $result = $user->display_name;
  return $result;
}
add_filter("acf/fields/user/result/name=user", 'wmp_alter_specific_user_field', 10, 4);

/*【ベーシック認証】特定ページにベーシック認証を設定する */
function basic_auth($auth_list, $realm = "Restricted Area", $failed_text = "認証に失敗しました")
{
  if (isset($_SERVER['PHP_AUTH_USER']) and isset($auth_list[$_SERVER['PHP_AUTH_USER']])) {
    if ($auth_list[$_SERVER['PHP_AUTH_USER']] == $_SERVER['PHP_AUTH_PW']) {
      return $_SERVER['PHP_AUTH_USER'];
    }
  }
  header('WWW-Authenticate: Basic realm="' . $realm . '"');
  header('HTTP/1.0 401 Unauthorized');
  header('Content-type: text/html; charset=' . mb_internal_encoding());
  die($failed_text);
}

//日付の英語表示（月）を返す
function wmp_date_month($date)
{
  $year = date_format(date_create($date), 'Y');
  $month = date_format(date_create($date), 'm');
  $day = date_format(date_create($date), 'd');
  $jd = cal_to_jd(CAL_GREGORIAN, $month, $day, $year);

  return jdmonthname($jd, 1);
}

// カスタム投稿タイプの登録
function create_custom_post_type() {
    register_post_type('column',
        array(
            'labels'      => array(
                'name'          => 'コラム',
                'singular_name' => 'コラム',
            ),
            'public'      => true,
            'has_archive' => true,
            'rewrite'     => array('slug' => 'column'),
        )
    );
}
add_action('init', 'create_custom_post_type');

// タクソノミーの登録
function create_custom_taxonomy() {
    register_taxonomy(
        'columncat',
        'column',
        array(
            'label'        => __('Column Categories'),
            'rewrite'      => array('slug' => 'columncat'),
            'hierarchical' => true,
        )
    );
}
add_action('init', 'create_custom_taxonomy');

// タクソノミーをラジオボタンで表示
function convert_taxonomy_to_radio_buttons() {
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        // columncatタクソノミーのメタボックスを対象にする
        $('#columncatdiv input[type="checkbox"]').each(function() {
            $(this).replaceWith($(this).clone().attr('type', 'radio'));
        });
    });
    </script>
    <?php
}
add_action('admin_footer', 'convert_taxonomy_to_radio_buttons');

