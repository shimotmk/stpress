<?php get_header(); ?>
	<main class="bg-light">
		<div <?php post_class( 'container' ); ?>>
			<?php
			/**
			 * カスタムヘッダー
			 */
			get_template_part( 'template-parts/parts/custom-header' ); ?>
			<!--ピックアップ記事-->
			<div class="row py-3">
				<?php
				$top_query = new WP_Query( 'tag=toppickup' );
				$top_query = apply_filters( 'stpress_toppickup', $top_query );
				if ( $top_query->have_posts() ) {
					while ( $top_query->have_posts() ) {
						$top_query->the_post();
						get_template_part( 'template-parts/wp_query/content' );
					}
					$top_query->reset_postdata();
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
						echo "記事がありません。";
					}
					?>
				</div>
				<!--サイドバー-->
				<?php get_sidebar(); ?>
			</div>

		</div>
	</main>
<?php get_footer(); ?>
