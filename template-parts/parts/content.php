<?php
/**
 * コンテンツ
 */
do_action( 'stpress_parts_content_before' );
?>
<div id="the_content" class="the_content">
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
