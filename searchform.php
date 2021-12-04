<?php
/**
 * The searchform.php template.
 *
 * @package stpress
 */

/**
 * 検索フォームテンプレート
 */
do_action( 'stpress_parts_searchform_before' );
?>
<form method="get" action="<?php esc_url( home_url( '/' ) ); ?>">
	<input class="form-control" type="text" name="s" placeholder="<?php esc_attr_e( 'Search for', 'stpress' ); ?>">
</form>
<?php
do_action( 'stpress_parts_searchform_after' );
