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
function stpress_widgets_init() {
	register_sidebar(
		array(
			'name'          => __('sidebar', 'stpress'),
			'id'            => 'sidebar_widget01',
			'before_widget' => '<div class="container bg-white mb-5 py-5">',
			'after_widget'  => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => __('Footer Left', 'stpress'),
			'id'            => 'footer_widget01',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="d-inline-block py-3 border-bottom border-info">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => __('Footer Center', 'stpress'),
			'id'            => 'footer_widget02',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="d-inline-block py-3 border-bottom border-info">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => __('Footer Right', 'stpress'),
			'id'            => 'footer_widget03',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="d-inline-block py-3 border-bottom border-info">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'stpress_widgets_init' );
