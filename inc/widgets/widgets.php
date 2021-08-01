<?php
/**
 * クラス読み込み
 */
require_once dirname( __FILE__ ) . '/class-stpress-portfolio.php';

/**
 * 独自ウィジェットの設定
 */
function stpress_widgets_register_widget() {
	register_widget( 'stpress_portfolio_widget' );
}
add_action( 'widgets_init', 'stpress_widgets_register_widget' );

/**
 * ウィジェットの登録
 */
function my_widgets_init() {

	register_sidebar(
		array(
			'name'          => 'サイドバー',
			'id'            => 'sidebar_widget01',
			'before_widget' => '<div class="container bg-white mb-5 py-5">',
			'after_widget'  => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'フッター左',
			'id'            => 'footer_widget01',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="d-inline-block py-3 border-bottom border-info">',
			'after_title'   => '</h4>'
		)
	);

	register_sidebar(
		array(
			'name'          => 'フッター中',
			'id'            => 'footer_widget02',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="d-inline-block py-3 border-bottom border-info">',
			'after_title'   => '</h4>'
		)
	);

	register_sidebar(
		array(
			'name'          => 'フッター右',
			'id'            => 'footer_widget03',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="d-inline-block py-3 border-bottom border-info">',
			'after_title'   => '</h4>'
		)
	);

}
add_action( 'widgets_init', 'my_widgets_init' );
