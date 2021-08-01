<?php
/**
 * wp-queryで呼び出した時のテンプレート
 * index.phpで使われる
 */
do_action( 'stpress_wp_query_content_before' );
?>
<div class="col-md-4 col-12 mb-md-0 mb-5">
	<div class="bg-white py-3">
		<?php
		/**
		 * サムネイル
		 */
		get_template_part( 'template-parts/parts/thumbnail' );

		/**
		 * 記事タイトル
		 */
		the_title( '<h2 class="h5 px-3 pb-3"><a class="text-reset" href="'.  esc_url( get_permalink() ) .'">', '</h2>' );

		/**
		 * ボタン
		 */
		get_template_part('template-parts/parts/button' );
		?>
	</div>
</div>
<?php
do_action( 'stpress_wp_query_content_after' );
