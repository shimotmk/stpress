<?php
/**
 * Class nav menues.
 *
 * @package stpress
 */

register_nav_menus(
	array(
		'gloval-navigation' => __( 'Global', 'stpress' ),
		'footer-navigation' => __( 'Footer', 'stpress' ),
	)
);

/**
 * 翻訳ファイル
 * ナビゲーション
 */
function stpress_nav_setup() {
	require_once get_template_directory() . '/inc/nav_menus/WP_Bootstrap_Navwalker.php';
}
add_action( 'after_setup_theme', 'stpress_nav_setup' );

/**
 * ナビゲーション メニューのクラス名
 *
 * @param array            $classes class name.
 * @param WP_Nav_Menu_Item $item The current menu item.
 * @param WP_Nav_Menu_Args $args    An object of wp_nav_menu() arguments.
 */
function stpress_nav_menu_css_class( $classes, $item, $args ) {
	if ( 'gloval-navigation' === $args->theme_location ) {
			$classes[] = 'text-white';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'stpress_nav_menu_css_class', 10, 3 );
