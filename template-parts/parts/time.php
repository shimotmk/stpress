<?php
/**
 * Time template.
 *
 * 日付
 *
 * @package stpress
 */

do_action( 'stpress_parts_time_before' );
ob_start();
?>
<p class="text-center">
	<?php
	the_time( 'Y/n/j' );
	if ( get_the_modified_date( 'Y/n/j' ) ) {
		the_modified_date( 'Y/n/j', '(' . __( 'Update Date:', 'stpress' ), ')' );
	}
	?>
</p>
<?php
$stpress_time_template = ob_get_clean();
$stpress_time_template = apply_filters( 'stpress_parts_time_template', $stpress_time_template );
echo wp_kses( $stpress_time_template, wp_kses_allowed_html( 'post' ) );
do_action( 'stpress_parts_time_after' );
