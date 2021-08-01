<?php
/*
	https://github.com/wp-bootstrap/wp-bootstrap-navwalker
*/
do_action( 'stpress_parts_nav_menus_before' );
ob_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-dark" role="navigation">
	<div class="container">
		<a class="navbar-brand text-white" href="#">HOME</a>
		<button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'stpress' ); ?>">
				<span class="navbar-toggler-icon"></span>
		</button>
				<?php
				wp_nav_menu( array(
						'theme_location'    => 'gloval-navigation',
						'menu'              => 'gnavi',
						'depth'             => 2,
						'container'         => 'div',
						'container_class'   => 'collapse navbar-collapse',
						'container_id'      => 'bs-example-navbar-collapse-1',
						'menu_class'        => 'nav navbar-nav',
						'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
						'walker'            => new WP_Bootstrap_Navwalker(),
				) );
				?>
		</div>
</nav>
<?php
$template = ob_get_clean();
$template = apply_filters( 'stpress_parts_nav_menus_template', $template );
echo $template;
do_action( 'stpress_parts_nav_menus_after' );
