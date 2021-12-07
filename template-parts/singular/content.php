<?php
/**
 * Single.php,page.phpのコンテンツで表示される
 *
 * @package stpress
 */

do_action( 'stpress_singular_content_before' );
?>
<div class="bg-white mb-5 py-5 container">
	<?php
	/**
	 * 日付
	 */
	get_template_part( 'template-parts/parts/time' );

	/**
	 * 記事タイトル
	 */
	the_title( '<h1 class="h2 pb-3 font-weight-bolder text-center">', '</h1>' );

	/**
	 * カテゴリー
	 */
	get_template_part( 'template-parts/parts/category' );

	/**
	 * サムネイル
	 */
	get_template_part( 'template-parts/parts/thumbnail', null, array( 'add_class' => 'row' ) );

	/**
	 * 本文
	 */
	get_template_part( 'template-parts/parts/content' );

	/**
	 * コメント
	 */
	get_template_part( 'template-parts/parts/comment' );

	/**
	 * 投稿者
	 */
	get_template_part( 'template-parts/parts/author' );

	/**
	 * 関連記事
	 */
	get_template_part( 'template-parts/parts/related' );

	/**
	 * タグ
	 */
	the_tags( __( 'Tag', 'stpress' ), ', ', '<br />' );
	?>
</div>
<?php
do_action( 'stpress_singular_content_after' );
