<?php
/**
 * Content template.
 *
 * コンテンツ
 *
 * @package stpress
 */

do_action( 'stpress_parts_content_before' );
?>
<div class="the_content">
	<?php
	/**
	 * 本文
	 */
	the_content();
	wp_link_pages();
	?>
</div>
<?php
do_action( 'stpress_parts_content_after' );
