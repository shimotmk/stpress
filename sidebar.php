<?php
/**
 * The sidebar.php template.
 *
 * @package stpress
 */

do_action( 'stpress_sidebar_before' );
?>
<div class="col-md-4 col-12">
	<?php dynamic_sidebar( 'sidebar_widget01' ); ?>
	<!--読んで欲しい記事-->
	<div class="container bg-white mb-5 py-5">
		<div class="text-center pb-5">
			<h4 class="d-inline-block py-3 border-bottom border-info"><?php echo __( 'Articles you should read', 'stpress' ); ?></h4>
		</div>
		<?php $stpress_side_query = new WP_Query( 'tag=sidepickup' ); ?>
		<?php if ( $stpress_side_query->have_posts() ) : ?>
			<?php
			while ( $stpress_side_query->have_posts() ) :
				$stpress_side_query->the_post();
				?>
				<div class="pb-5">
					<!--サムネイル-->
					<div class="pb-3">
						<a href="<?php the_permalink(); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( '', array( 'class' => 'img-fluid' ) ); ?>
							<?php else : ?>
								<img class="img-fluid" width="100%" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/no-image.png" alt="">
							<?php endif; ?>
						</a>
					</div>
					<!--記事タイトル-->
					<h5 class="h5"><a class="text-reset" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
				</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
	</div>
</div>
<?php
do_action( 'stpress_sidebar_after' );
