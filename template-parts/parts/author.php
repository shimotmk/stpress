<?php
/**
 * 投稿者
 */
do_action( 'stpress_parts_author_before' );
ob_start();
?>
<p>投稿者
	<?php
	$url  = esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ));
	$name = get_the_author_meta( 'display_name' );
	?>
	<a href="<?php echo $url; ?>">
		<?php echo $name; ?>
	</a>
</p>
<?php
$template = ob_get_clean();
$template = apply_filters( 'stpress_parts_author_template', $template );
echo $template;
do_action( 'stpress_parts_author_after' );
