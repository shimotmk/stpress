<?php
/**
 * WP Enqueue Scripts.
 *
 * スクリプトとスタイルを正しくエンキューする
 *
 * @package stpress
 */

/**
 * Stpress_theme_name_scripts
 */
function stpress_theme_name_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_style(
		'stpress-css',
		get_stylesheet_uri(),
		array(),
		stpress_get_version()
	);
	wp_enqueue_style(
		'stpress-bootstrap-css',
		esc_url( get_template_directory_uri() ) . '/assets/css/bootstrap.min.css',
		array(),
		stpress_get_version()
	);

	wp_enqueue_script(
		'stpress-bootstrap-js',
		esc_url( get_template_directory_uri() ) . '/assets/js/bootstrap.min.js',
		array(),
		stpress_get_version(),
		true
	);

	/**
	 * コメントフォームのcss
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'stpress_theme_name_scripts' );
