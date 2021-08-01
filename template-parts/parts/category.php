<?php
/**
 * カテゴリー
 */
do_action( 'stpress_parts_category_before' );
ob_start();
?>
<p class="text-center"><?php the_category( ' ' ); ?></p>
<?php
$template = ob_get_clean();
$template = apply_filters( 'stpress_parts_category_template', $template );
echo $template;
do_action( 'stpress_parts_category_after' );
