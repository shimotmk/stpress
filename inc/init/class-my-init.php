<?php
/**
 * 初期化処理
 * https://developer.wordpress.org/reference/functions/add_theme_support/
 */
add_action( 'after_setup_theme', 'my_after_setup_theme' );
function my_after_setup_theme() {
	/**
	 * 翻訳ファイル
	 * ナビゲーション
	 */
	load_theme_textdomain( 'stpress', get_template_directory() . '/languages' );

	/**
	 * タイトル出力
	 */
	add_theme_support( 'title-tag' );

	/**
	 * custom-logo
	 */
	add_theme_support( 'custom-logo' );

	/**
	 * サムネイル
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * 投稿とコメントのフィード出力
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * カスタム背景
	 */
	add_theme_support( 'custom-background' );

	/**
	 * カスタムヘッダー
	 * https://wpdocs.osdn.jp/%E3%82%AB%E3%82%B9%E3%82%BF%E3%83%A0%E3%83%98%E3%83%83%E3%83%80%E3%83%BC
	 */
	$custom_header_defaults = array(
		'random-default'     => false,
		'width'              => 1200,
		'height'             => 900,
		'flex-height'        => false,
		'flex-width'         => false,
		'default-text-color' => '',
		'header-text'        => false,
		'uploads'            => true,
	);
	add_theme_support( 'custom-header', $custom_header_defaults );

	/**
	 * iframeをレスポンシブ対応(16:9)にする
	 */
	add_theme_support( 'responsive-embeds' );

	/**
	 * HTML5
	 */
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

	/**
	 * ブロックエディタの全幅に合わせる
	 * https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#wide-alignment
	 */
	add_theme_support( 'align-wide' );

	/**
	 * ブロックスタイルを適応させる
	 * https://www.nxworld.net/wp-gutenberg-css-settings.html
	 */
	add_theme_support( 'wp-block-styles' );

	/**
	 * Add skip link
	 */
	function stpress_wp_body_open( $output ) {
		echo '<a class="skip-link screen-reader-text" href="#content">' . esc_html__( 'Skip to the content', 'stpress' ) . '</a>';
	}
	add_action( 'wp_body_open', 'stpress_wp_body_open', 5 );
}
