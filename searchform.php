<?php
/**
 * 検索フォームテンプレート
 */
do_action( 'stpress_parts_searchform_before' );
ob_start();
?>
<form method="get" action="<?php esc_url( home_url( '/' ) ); ?>">
	<input class="form-control" type="text" name="s" placeholder="Search for">
</form>
<?php
$template = ob_get_clean();
$template = apply_filters( 'stpress_parts_searchform_template', $template );
echo $template;
do_action( 'stpress_parts_searchform_after' );
