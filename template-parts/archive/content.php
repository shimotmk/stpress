<?php
/**
 * archive,indexで使うループ
 */
do_action( 'stpress_archive_content_before' );
?>
<div class="bg-white text-center mb-5 py-5 container">
	<?php
	/**
	 * 日付
	 */
	get_template_part( 'template-parts/parts/time' );

	/**
	 * 記事タイトル
	 */
	the_title( '<h2 class="pb-3 font-weight-bolder"><a class="text-reset" href="'.  esc_url( get_permalink() ) .'">', '</h2>' );

	/**
	 * カテゴリー
	 */
	get_template_part( 'template-parts/parts/category' );

	/**
	 * サムネイル
	 */
	get_template_part( 'template-parts/parts/thumbnail', null, array( "add_class" => "row" ) );

	/**
	 * ディスクリプション
	 */
	get_template_part( 'template-parts/parts/excerpt' );

	/**
	 * ボタン
	 */
	get_template_part('template-parts/parts/button' );
	?>

</div>
<?php
do_action( 'stpress_archive_content_after' );
