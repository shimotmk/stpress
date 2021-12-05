<?php
/**
 * Author template.
 *
 * @package stpress
 */

/**
 * 投稿者
 */
do_action( 'stpress_parts_author_before' );
ob_start();
?>
<p>
	<?php
	echo __( 'Author', 'stpress' );
	$stpress_author_posts_url    = get_author_posts_url( get_the_author_meta( 'ID' ) );
	$stpress_author_display_name = get_the_author_meta( 'display_name' );
	?>
	<a href="<?php echo esc_url( $stpress_author_posts_url ); ?>">
		<?php echo esc_html( $stpress_author_display_name ); ?>
	</a>
</p>
<?php
$stpress_author_template = ob_get_clean();
$stpress_author_template = apply_filters( 'stpress_parts_author_template', $stpress_author_template );
echo wp_kses( $stpress_author_template, wp_kses_allowed_html( 'post' ) );
do_action( 'stpress_parts_author_after' );
