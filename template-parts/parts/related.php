<?php
/**
 * Related post template.
 *
 * 関連記事
 *
 * @package stpress
 */

if ( has_category() ) {
	$stpress_categorys    = get_the_category();
	$stpress_category_ids = array();
	foreach ( $stpress_categorys as $stpress_category ) {
		$stpress_category_ids = $stpress_category->term_id;
	}
}
if ( empty( $stpress_category_ids ) ) {
	return;
}
$stpress_related_args  = array(
	'posts_per_page'      => 8,
	'post__not_in'        => array( $post->ID ),
	'category__in'        => $stpress_category_ids,
	'orderby'             => 'rand',
	'ignore_sticky_posts' => 1,
);
$stpress_related_query = new WP_Query( $stpress_related_args );
do_action( 'stpress_parts_related_before' );
?>
<h5><?php echo esc_html__( 'Related', 'stpress' ); ?></h5>
<div class="row">
	<?php
	if ( $stpress_related_query->have_posts() ) :
		while ( $stpress_related_query->have_posts() ) :
			$stpress_related_query->the_post();
			?>
			<div class="col-md-3">
			<?php
			/**
			 * サムネイル
			 */
			get_template_part( 'template-parts/parts/thumbnail' );
			?>
				<!--記事タイトル-->
				<p>
					<a class="text-reset" href="<?php the_permalink(); ?>">
					<?php
					$stpress_related_title = the_title();
					if ( mb_strlen( $stpress_related_title ) > 20 ) {
						$stpress_related_title = mb_substr( $stpress_related_title, 0, 20 );
						echo esc_html( $stpress_related_title . '...' );
					} else {
						echo esc_html( $stpress_related_title );
					}
					?>
					</a>
				</p>
			</div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	<?php endif; ?>
</div>
<?php
do_action( 'stpress_parts_related_after' );
