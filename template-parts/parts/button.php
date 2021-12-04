<?php
/**
 * Button template.
 *
 * @package stpress
 */

/**
 * ボタン
 * ob_start,ob_get_cleanはバッファリング(出力)を制御します
 * https://www.php.net/manual/ja/function.ob-start.php
 * ob_startからの文字列はすぐに実行はされずにob_get_cleanなどが実行去れたタイミングで実行される
 */
do_action( 'stpress_parts_button_before' );
ob_start();
?>
<div class="text-center">
	<a class="text-reset" href="<?php the_permalink(); ?>">
		<div class="d-inline-block border p-3 text-secondary">
			READ MORE
		</div>
	</a>
</div>
<?php
$stpress_button_template = ob_get_clean();
$stpress_button_template = apply_filters( 'stpress_parts_button_template', $stpress_button_template );
echo wp_kses( $stpress_button_template, wp_kses_allowed_html( 'post' ) );
do_action( 'stpress_parts_button_after' );
