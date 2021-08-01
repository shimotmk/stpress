<?php
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
$template = ob_get_clean();
$template = apply_filters( 'stpress_parts_button_template', $template );
echo $template;
do_action( 'stpress_parts_button_after' );
