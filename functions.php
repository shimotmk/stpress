<?php
/**
 * Functions and definitions
 *
 * @package stpress
 */

/**
 * WordPressコーディングスタンダード
 * https://ja.wordpress.org/team/handbook/coding-standards/wordpress-coding-standards/php/
 * フォルダ、ファイルの構成はなるべく１フォルダで機能がわかるようにしたいから細かく分ける
 *
 * 例えばパンくずリストを調整したいときにどこを直せばよいかわかるようにしたい
 */

/**
 * Get Plugin Version
 *
 * @return string
 */
function stpress_get_version() {
	$stpress_theme         = wp_get_theme();
	$stpress_theme_version = $stpress_theme->get( 'Version' );
	return $stpress_theme_version;
}

/**
 * After Setup Theme
 *
 * @return void
 */
function stpress_setup() {
	load_theme_textdomain( 'stpress', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'stpress_setup' );

/**
 * Init
 *
 * Require_once:一度だけ読み込む
 *
 * @link https://www.php.net/manual/ja/function.require-once.php
 */
require_once get_template_directory() . '/inc/init/class-stpress-init.php';

/**
 * Widgets
 */
require_once get_template_directory() . '/inc/widgets/widgets.php';

/**
 * パンくずリスト
 * breadcrumbs
 */
require_once get_template_directory() . '/inc/breadcrumbs/class-stpress-breadcrumbs.php';

/**
 * Nav_menus
 */
require_once get_template_directory() . '/inc/nav_menus/class-nav-menus.php';

/**
 * スクリプトとスタイルをエンキューする方法
 */
require_once get_template_directory() . '/inc/enqueue/stpress-scripts.php';

/**
 * エディタ内CSS
 */
add_editor_style( get_template_directory() . '/editor/editor.css' );

/**
 * コンテンツエリアの幅
 */
if ( ! isset( $content_width ) ) {
	$content_width = 900;
}

