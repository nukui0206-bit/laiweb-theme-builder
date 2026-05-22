<?php
/**
 * 外部リンク用のメニューを追加します
 */

/*
function admin_side_menu() {
	add_menu_page( '会社概要', '会社概要', 'moderate_comments', 'company', '', '', 6 );
}
add_action('admin_menu', 'admin_side_menu', 1000);
*/

/**
 * ※ add_menu_page()だけでは外部リンクの設定ができないため、JavaScriptで調整します。
 */

function admin_side_menu_link() {
	?><script>
		jQuery(function($){
			$('a.toplevel_page_company').prop({
				// 外部URL
				href: "/cms/wp-admin/post.php?post=73&action=edit",
			});
		});
	</script><?php
}
add_action('admin_print_footer_scripts', 'admin_side_menu_link');

/* イベント情報のカスタム投稿タイプ
* ---------------------------------------- */
/*
if ( !function_exists( 'wmp_event_custom_post_type' ) ):
  add_action('init', 'wmp_event_custom_post_type');
  function wmp_event_custom_post_type() {
    $labels = array(
      'name'                => 'イベント情報',
      'singular_name'       => 'イベント情報',
      'add_new_item'        => '新しいイベント情報を追加',
      'add_new'             => '新規追加',
      'new_item'            => '新しいイベント情報',
      'view_item'           => 'イベント情報を表示',
      'not_found'           => 'イベント情報はありません',
      'not_found_in_trash'  => 'ゴミ箱にイベント情報はありません。',
      'search_items'        => 'イベント情報を検索',
    );
    $args = array(
      'labels'              => $labels,
      'public'              => true,
      'show_ui'             => true,
      'query_var'           => true,
      'hierarchical'        => false,
      'menu_position'       => 5,
      'has_archive'         => true,
      'menu_icon'           => 'dashicons-megaphone',
      'supports'            => array(
        'title',
        'editor',
        'thumbnail'
        )
    ); 
    register_post_type('event', $args);
    flush_rewrite_rules( false );
  }
endif;
*/
