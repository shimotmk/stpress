<?php
/**
 * 関連記事
 */
if(has_category()) {
	$category = get_the_category();
	$categoryids = array();
	foreach($category as $cat) {
		$categoryids = $cat->term_id;
	}
}
if ( empty( $categoryids ) ) {
	return;
}
$args = array (
	'posts_per_page' => 8,
	'post__not_in'   => array($post->ID),
	'category__in'   => $categoryids,
	'orderby'        => 'rand',
	'ignore_sticky_posts' => 1
);
$related_query = new WP_Query($args);
do_action( 'stpress_parts_related_before' );
?>
<h5>関連記事</h5>
<div class="row">
	<?php
		if ( $related_query->have_posts() ) :
			while ( $related_query->have_posts() ) :
				$related_query->the_post();
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
						$title = the_title();
						if( mb_strlen( $title ) > 20 ) {
						$title= mb_substr( $title,0,20 ) ;
							echo $title . '...';
						} else {
							echo $title;
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
