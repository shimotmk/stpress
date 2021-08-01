<?php
/**
 * get_uploaded_header_images
 * https://developer.wordpress.org/reference/functions/get_uploaded_header_images/
 */
$headers = get_uploaded_header_images();
do_action( 'stpress_parts_custom_header_before' );
ob_start();
?>
<?php if( count($headers) == 1 ): ?>
	<?php foreach ($headers as $key => $value): ?>
		<img class="img-fluid pt-3" src="<?php echo $value['url']; ?>" alt="<?php echo $value['alt_text']; ?>">
	<?php endforeach; ?>
<?php else: ?>
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<?php foreach ($headers as $key => $value): ?>
				<div class="carousel-item <?php if ($value !== end($headers)) { echo "active"; } ?>">
					<img src="<?php echo $value['url']; ?>" alt="<?php echo $value['alt_text']; ?>">
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
$template = ob_get_clean();
$template = apply_filters( 'stpress_parts_custom_header_template', $template );
echo $template;
do_action( 'stpress_parts_custom_header_after' );
