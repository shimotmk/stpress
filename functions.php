<?php
/**
 * WordPressコーディングスタンダード
 * https://ja.wordpress.org/team/handbook/coding-standards/wordpress-coding-standards/php/
 * フォルダ、ファイルの構成はなるべく１フォルダで機能がわかるようにしたいから細かく分ける
 *
 * 例えばパンくずリストを調整したいときにどこを直せばよいかわかるようにしたい
 */

add_action('after_setup_theme', 'stpress_setup');
function stpress_setup(){
  load_theme_textdomain('stpress', get_template_directory() . '/languages');
}

 /**
 * inc内 読み込み
 * includesの略：システム全般に関するファイル群WordPressエンジニアの慣習
 * WordPressのコアもwp-includeを使っている
 */
/**
 * init
 * require_once:一度だけ読み込む
 * https://www.php.net/manual/ja/function.require-once.php
 */
require_once get_template_directory() . '/inc/init/class-my-init.php';

/**
 * widgets
 */
require_once get_template_directory() . '/inc/widgets/widgets.php';

/**
 * パンくずリスト
 * breadcrumbs
 */
require_once get_template_directory() . '/inc/breadcrumbs/class-breadcrumb.php';

/**
 * nav_menus
 */
require_once get_template_directory() . '/inc/nav_menus/class-nav_menus.php';

/**
 * スクリプトとスタイルをエンキューする方法
 */
require_once get_template_directory() . '/inc/enqueue/class-my-scripts.php';

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

