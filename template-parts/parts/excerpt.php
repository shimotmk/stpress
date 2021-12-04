<?php
/**
 * Excerpt template.
 *
 * ディスクリプション
 *
 * @package stpress
 */

do_action( 'stpress_parts_excerpt_before' );
ob_start();
?>
<p><?php the_excerpt(); ?></p>
<?php
$stpress_excerpt_template = ob_get_clean();
$stpress_excerpt_template = apply_filters( 'stpress_parts_excerpt_template', $stpress_excerpt_template );
echo wp_kses( $stpress_excerpt_template, wp_kses_allowed_html( 'post' ) );
do_action( 'stpress_parts_excerpt_after' );
