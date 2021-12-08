<?php
/**
 * The search.php template.
 *
 * 検索結果ページテンプレート
 *
 * @package stpress
 */

get_header(); ?>
<main id="content" class="bg-light">
	<div id="post-<?php the_ID(); ?>" <?php post_class( 'container' ); ?>>
		<div class="row pt-3">
			<div class="col-md-8 col-xs-12">
				<?php
				$stpress_search_title = apply_filters( 'stpress_search_title_template' ,'<div class="py-3"><h1 class="h2">' . get_search_query() . '</h1></div>' );
				echo wp_kses_post( $stpress_search_title );
				if ( have_posts() ) {
					/**
					 * アーカイブタイトル
					 */
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
					echo esc_html__( 'No article available.', 'stpress' );
				}

				?>
			</div>
			<!--サイドバー-->
			<?php get_sidebar(); ?>
		</div>
	</div>
</main>
<?php get_footer(); ?>
