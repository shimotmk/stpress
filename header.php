<?php
/**
 * The header.php template.
 *
 * @package stpress
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'stpress_wp_body_open' );
	}
	?>
	<header>
		<div class="container">
			<a class="text-reset text-decoration-none" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php
				if ( has_custom_logo() ) {
					$stpress_get_bloginfo_name = the_custom_logo();
				} else {
					$stpress_get_bloginfo_name = get_bloginfo( 'name' );
				}
				$stpress_get_bloginfo_name = apply_filters( 'stpress_header_h1_content', $stpress_get_bloginfo_name );
				?>
				<?php if ( is_home() ) { ?>
					<h1 class="h1 py-3 d-inline-block"><?php echo wp_kses_post( $stpress_get_bloginfo_name ); ?></h1>
				<?php } else { ?>
					<div class="h1 py-3 d-inline-block"><?php echo wp_kses_post( $stpress_get_bloginfo_name ); ?></div>
				<?php } ?>
			</a>
			<?php
			$stpress_site_desc = get_bloginfo( 'description' );
			if ( $stpress_site_desc ) :
				?>
				<span class="d-none d-md-inline"><?php bloginfo( 'description' ); ?></span>
			<?php endif; ?>
		</div>
		</div>
	</header>

	<?php
	/**
	 * Nav_menus
	 */
	get_template_part( 'template-parts/parts/nav-menus' );
