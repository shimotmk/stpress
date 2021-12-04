<?php
/**
 * WP Enqueue Scripts.
 *
 * スクリプトとスタイルを正しくエンキューする
 *
 * @package stpress
 */

function theme_name_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_style( 'stpress-css', get_stylesheet_uri() );
	wp_enqueue_style(
		'stpress-bootstrap-css',
		esc_url( get_template_directory_uri() ) . '/assets/css/bootstrap.min.css'
	);

	wp_enqueue_script(
		'stpress-bootstrap-js',
		esc_url( get_template_directory_uri() ) . '/assets/js/bootstrap.min.js',
		array(),
		'',
		true
	);

	/**
	 * コメントフォームのcss
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
