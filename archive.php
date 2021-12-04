<?php
/**
 * The archive.php template.
 *
 * フッターポートフォリオメニュー
 *
 * @package stpress
 */

get_header(); ?>
<main id="content" class="bg-light">
	<div id="post-<?php the_ID(); ?>" <?php post_class( 'container' ); ?>>
		<div class="row pt-3">
			<div class="col-md-8 col-xs-12">
				<?php
				if ( have_posts() ) {
					/**
					 * アーカイブタイトル
					 */
					the_archive_title( '<div class="py-3"><h1 class="h2">', '</h1></div>' );
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
