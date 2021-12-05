<?php
/**
 * The footer.php template.
 *
 * @package stpress
 */

	/**
	 * パンくずリスト
	 */
	$stpress_breadcrumb = new stpress_breadcrumbs();
	echo wp_kses( $stpress_breadcrumb->stpress_breadcrumb(), wp_kses_allowed_html( 'post' ) );
?>
	<footer class="bg-white">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-12">
					<?php
					if ( is_active_sidebar( 'footer_widget01' ) ) {
						dynamic_sidebar( 'footer_widget01' );
					}
					?>
				</div>
				<div class="col-md-4 col-xs-12">
					<?php
					if ( is_active_sidebar( 'footer_widget02' ) ) {
						dynamic_sidebar( 'footer_widget02' );
					}
					?>
				</div>
				<div class="col-md-4 col-xs-12">
					<?php
					if ( is_active_sidebar( 'footer_widget03' ) ) {
						dynamic_sidebar( 'footer_widget03' );
					}
					?>
				</div>
			</div>
		</div>
		<div class="bg-dark text-white text-center p-3">
			<?php
			echo printf( __( 'Copyright - %1$s, %2$s All Rights Reserved.', 'stpress' ), get_bloginfo( 'name' ), date( 'Y' ) );
			?>
		</div>
	</footer>
<?php wp_footer(); ?>
</body>
</html>
