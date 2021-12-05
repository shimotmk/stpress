<?php
/**
 * The single.php template.
 *
 * @package stpress
 */

get_header(); ?>
<main id="content" class="bg-light">
	<div id="post-<?php the_ID(); ?>" <?php post_class( 'container' ); ?>>
		<div class="row pt-3">
			<!-- メインコンテンツ -->
			<div class="col-md-8 col-xs-12">
				<?php
				// 記事の概要を表示
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						get_template_part( 'template-parts/singular/content' );
					}
				} else {
					echo __( 'No article available.', 'stpress' );
				}
				?>
			</div>
			<!--サイドバー-->
			<?php get_sidebar(); ?>
		</div>
	</div>
</main>
<?php get_footer(); ?>
