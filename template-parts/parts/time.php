<?php
/**
 * 日付
 */
do_action( 'stpress_parts_time_before' );
ob_start();
?>
<p class="text-center">
	<?php
	the_time('Y/n/j');
	if( get_the_modified_date("Y/n/j") ) {
		the_modified_date("Y/n/j", "(更新日:" , ")");
	}
	?>
</p>
<?php
$template = ob_get_clean();
$template = apply_filters( 'stpress_parts_time_template', $template );
echo $template;
do_action( 'stpress_parts_time_after' );
