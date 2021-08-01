<?php
/**
 * コメント
 */
do_action( 'stpress_parts_comments_before' );
ob_start();
comments_template();
$template = ob_get_clean();
$template = apply_filters( 'stpress_parts_comments_template', $template );
echo $template;
do_action( 'stpress_parts_comments_after' );
