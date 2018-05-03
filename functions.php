<?php /* WordPress CMS Theme WSC Project. */

function wsc_scripts_method() {
	wp_enqueue_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'wsc_scripts_method' );


/*ウィジェットスペースの登録*/
if ( function_exists('register_sidebar') )
register_sidebar(array(
    'name' => 'サイドウィジェット',
	'id' => 'side-widget-area',
    'before_widget' => '<div id="%1$s" class="sideWidget">',
    'after_widget' => '</div>',
    'before_title' => '<p class="widgetTitle">',
    'after_title' => '</p>',
));
register_sidebar(array(
    'name' => 'ホームウィジェット左',
	'id' => 'home-widget-left',
    'before_widget' => '<div id="%1$s" class="homeWidget">',
    'after_widget' => '</div>',
    'before_title' => '<p class="widgetTitle">',
    'after_title' => '</p>',
));
register_sidebar(array(
    'name' => 'ホームウィジェット右',
	'id' => 'home-widget-right',
    'before_widget' => '<div id="%1$s" class="homeWidget">',
    'after_widget' => '</div>',
    'before_title' => '<p class="widgetTitle">',
    'after_title' => '</p>',
));
register_sidebar(array(
    'name' => 'タクソノミーウィジェット',
	'id' => 'side-taxonomy-widget-area',
    'before_widget' => '<div id="%1$s" class="sideWidget">',
    'after_widget' => '</div>',
    'before_title' => '<p class="widgetTitle">',
    'after_title' => '</p>',
));
register_sidebar(array(
    'name' => 'フッターウィジェット',
	'id' => 'footer-widget-area',
    'before_widget' => '<div id="%1$s" class="footerWidget">',
    'after_widget' => '</div>',
    'before_title' => '<p class="widgetTitle">',
    'after_title' => '</p>',
));


/*アイキャッチ画像を有効化*/
add_theme_support( 'post-thumbnails' );


/*RSSフィードを有効化*/
add_theme_support( 'automatic-feed-links' );


/*カスタムメニューの登録*/
register_nav_menus( array(
	'main-menu' => 'グローバルメニュー',
	'sub-menu' => 'ヘッダーメニュー',
	'footer-menu' => 'フッターメニュー',
) );

if ( ! isset( $content_width ) ) $content_width = 660;

/*ビジュアルエディタ用スタイルシートを有効化*/
add_editor_style();


/*カスタムメニューのショートコードを登録*/
function custom_menu($atts, $content = null) {
	extract(shortcode_atts( array(
		'menu' => '',
		'container' => 'div',
		'menu_class' => 'menu',
		'echo' => true,
		'fallback_cb' => 'wp_page_menu',
		'depth' => 0),
		$atts));

	return wp_nav_menu( array(
		'menu' => $menu,
		'container' => $container,
		'menu_class' => $menu_class,
		'echo' => false,
		'fallback_cb' => $fallback_cb,
		'depth' => $depth));
}

add_shortcode("menu", "custom_menu");




/*事例集 (work) の設定*/
register_post_type('work', array(
'label' => '事例集',
'public' => true,
'has_archive' => true,
'supports' => array('title','editor','revisions','thumbnail',),
'labels' => array (
	'name' => '事例集',
	'singular_name' => '事例',
	'menu_name' => '事例集',
	'add_new' => '新規追加',
	'add_new_item' => '新規追加',
	'edit' => '編集',
	'edit_item' => '事例の編集',
	'new_item' => '新規追加',
	'view' => '事例を表示',
	'view_item' => '事例を表示',
	'search_items' => '事例集を検索',
	'not_found' => '事例はありません',
	'not_found_in_trash' => '事例はありません',
	'parent' => '親ページ',
),) );

/*事例分類 (worktype) の設定*/
register_taxonomy('worktype',array (
0 => 'work',
),array(
	'hierarchical' => true,
	'label' => '事例分類',
	'rewrite' => array('slug' => 'worktype'),
	'singular_label' => '事例分類'
) );

/*プラグインのスタイルシートを無効化*/
add_action( 'wp_print_styles', 'my_deregister_styles', 100 );
function my_deregister_styles() {
	wp_deregister_style( 'wp-pagenavi' );
	wp_deregister_style( 'contact-form-7' );
}

/*タクソノミーのページの表示件数*/
function change_posts_per_page($query) {
	if ( is_admin() || ! $query->is_main_query() )
		return;
	if ( $query->is_tax() ) {
		$query->set( 'posts_per_page', '-1' );
	}
}
add_action( 'pre_get_posts', 'change_posts_per_page' );

/*Custom Field Suite プラグインが有効か判定*/
function is_plugin_activated($file) {
	$is_active = false;
	foreach ((array) get_option('active_plugins') as $val) {
		if (preg_match('/'.preg_quote($file, '/').'/i', $val)) {
			$is_active = true;
			break;
		}
	}
	return $is_active;
}

