<?php get_header(); ?>
<main id="content" class="bg-light">
	<div id="post-<?php the_ID(); ?>" <?php post_class( 'container' ); ?>>
		<div class="row pt-3">
			<!-- メインコンテンツ -->
			<div class="col-md-8 col-xs-12">
				<div class="bg-white mb-5 p-5">
					<h1 class="h2 px-3 pb-3 font-weight-bolder"><?php echo __( 'The page was not found.', 'stpress' ); ?></h1>
					<p><?php echo __( 'Keyword', 'stpress' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</div>
			<!--サイドバー-->
			<?php get_sidebar(); ?>
		</div>
	</div>
</main>
<?php get_footer(); ?>
