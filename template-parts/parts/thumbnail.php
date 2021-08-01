<?php
/**
 * サムネイル パーツ
 */
do_action( 'stpress_parts_thumbnail_before' );
ob_start();
/**
 *
 */
?>
<a href="<?php the_permalink(); ?>">
	<div class="pb-3 <?php if( !empty($args["add_class"]) ) { echo esc_html( $args["add_class"] ); }; ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail('', array( 'class' => 'img-fluid' ) ); ?>
		<?php else : ?>
			<img class="img-fluid" width="100%" src="<?php echo esc_url ( get_template_directory_uri() ); ?>/img/no-image.png" alt="">
		<?php endif; ?>
	</div>
</a>
<?php
$template = ob_get_clean();
$template = apply_filters( 'stpress_parts_thumbnail_template', $template );
echo $template;
do_action( 'stpress_parts_thumbnail_after' );
