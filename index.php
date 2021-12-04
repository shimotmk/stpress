<?php
/**
 * The index.php template.
 *
 * @package stpress
 */

get_header(); ?>
<main id="content" class="bg-light">
	<div <?php post_class( 'container' ); ?>>
		<?php
		/**
		 * カスタムヘッダー
		 */
		get_template_part( 'template-parts/parts/custom-header' );
		?>
		<!--ピックアップ記事-->
		<div class="row py-3">
			<?php
			$stpress_top_query = new WP_Query( 'tag=toppickup' );
			$stpress_top_query = apply_filters( 'stpress_toppickup', $stpress_top_query );
			if ( $stpress_top_query->have_posts() ) {
				while ( $stpress_top_query->have_posts() ) {
					$stpress_top_query->the_post();
					get_template_part( 'template-parts/wp_query/content' );
				}
				$stpress_top_query->reset_postdata();
			}
			?>
		</div>

		<div class="row pt-3">
			<!-- メインコンテンツ -->
			<div class="col-md-8 col-xs-12">
				<?php
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						get_template_part( 'template-parts/archive/content' );
					}
					/**
					 * ページネーション
					 */
					the_posts_pagination(
						array(
							'mid_size' => 1,
						)
					);
				} else {
					echo __('No article available.', 'stpress');
				}
				?>
			</div>
			<!--サイドバー-->
			<?php get_sidebar(); ?>
		</div>

	</div>
</main>
<?php get_footer(); ?>
