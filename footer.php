	<?php
		/**
		 * パンくずリスト
		 */
		$my_breadcrumb = new MY_Breadcrumbs();
		echo $my_breadcrumb->my_breadcrumb();
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
			Copyright - <?php echo esc_html( get_option( 'blogname' )); ?>, <?php echo date("Y"); ?> All Rights Reserved.
		</div>
	</footer>
<?php wp_footer(); ?>
</body>
</html>
