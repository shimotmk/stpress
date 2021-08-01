<?php
/**
 * メニュー機能
 *
 */
register_nav_menus(
	array(
		'gloval-navigation' => 'グローバル',
		'footer-navigation' => 'フッター',
	)
);

/**
 * 翻訳ファイル
 * ナビゲーション
 */
function stpress_Nav_setup(){
	require_once get_template_directory() . '/inc/nav_menus/WP_Bootstrap_Navwalker.php';
}
add_action('after_setup_theme', 'stpress_Nav_setup');

function my_nav_menu_css_class($classes , $item, $args) {
	if ( 'gloval-navigation' === $args->theme_location ) {
			$classes[] = 'text-white';
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'my_nav_menu_css_class', 10, 3);
