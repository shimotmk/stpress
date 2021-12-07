<?php
/**
 * Comment template.
 *
 * @package stpress
 */

/**
 * コメント
 */
do_action( 'stpress_parts_comments_before' );
ob_start();
comments_template();
$stpress_comments_template = ob_get_clean();
$stpress_comments_template = apply_filters( 'stpress_parts_comments_template', $stpress_comments_template );
echo wp_kses_post( $stpress_comments_template );
do_action( 'stpress_parts_comments_after' );
