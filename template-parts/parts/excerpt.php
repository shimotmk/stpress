<?php
/**
 * ディスクリプション
 */
do_action( 'stpress_parts_excerpt_before' );
ob_start();
?>
<p><?php the_excerpt(); ?></p>
<?php
$template = ob_get_clean();
$template = apply_filters( 'stpress_parts_excerpt_template', $template );
echo $template;
do_action( 'stpress_parts_excerpt_after' );
