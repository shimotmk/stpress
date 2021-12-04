<?php
/**
 * Category template.
 *
 * カテゴリー
 *
 * @package stpress
 */

do_action( 'stpress_parts_category_before' );
ob_start();
?>
<p class="text-center"><?php the_category( ' ' ); ?></p>
<?php
$stpress_category_template = ob_get_clean();
$stpress_category_template = apply_filters( 'stpress_parts_category_template', $stpress_category_template );
echo wp_kses( $stpress_category_template, wp_kses_allowed_html( 'post' ) );
do_action( 'stpress_parts_category_after' );
