<?php get_header(); ?>
<main class="bg-light">
	<div id="post-<?php the_ID(); ?>" <?php post_class( 'container' ); ?>>
		<div class="row pt-3">
			<!-- メインコンテンツ -->
			<div class="col-md-10 col-12 mx-auto">
				<?php
					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post();
							get_template_part( 'template-parts/singular/content' );
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
		</div>
	</div>
</main>
<?php get_footer(); ?>
