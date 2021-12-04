<?php
/**
 * Custom header template.
 *
 * カスタムヘッダー
 * get_uploaded_header_images
 * https://developer.wordpress.org/reference/functions/get_uploaded_header_images/
 *
 * @package stpress
 */

$stpress_headers = get_uploaded_header_images();
do_action( 'stpress_parts_custom_header_before' );
ob_start();
?>
<?php if ( count( $stpress_headers ) === 1 ) : ?>
	<?php foreach ( $stpress_headers as $stpress_custom_header_key => $stpress_custom_header_value ) : ?>
		<img class="img-fluid pt-3" src="<?php echo esc_url( $stpress_custom_header_value['url'] ); ?>" alt="<?php echo esc_attr( $stpress_custom_header_value['alt_text'] ); ?>">
	<?php endforeach; ?>
<?php else : ?>
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<?php foreach ( $stpress_headers as $stpress_custom_header_key => $stpress_custom_header_value ) : ?>
				<div class="carousel-item
				<?php
				if ( end( $stpress_headers ) !== $stpress_custom_header_value ) {
					echo 'active';
				}
				?>
				">
					<img src="<?php echo esc_url( $stpress_custom_header_value['url'] ); ?>" alt="<?php echo esc_attr( $stpress_custom_header_value['alt_text'] ); ?>">
				</div>
			<?php endforeach; ?>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
<?php endif; ?>
<?php
$stpress_custom_header_template = ob_get_clean();
$stpress_custom_header_template = apply_filters( 'stpress_parts_custom_header_template', $stpress_custom_header_template );
echo wp_kses( $stpress_custom_header_template, wp_kses_allowed_html( 'post' ) );
do_action( 'stpress_parts_custom_header_after' );
