<?php 
	/**
	 * The template for displaying 404 pages (Not Found)
	 */
	get_header(); 
?>


	<div id="primary" class="content-area content-wrapper page-404">
		<div id="content" class="site-content" role="main">

			<header class="page-header">
				<h1 class="page-title"><?php _e( 'No se encontró la página', '' ); ?></h1>
			</header>

			<div class="page-wrapper">
				<div class="page-content">
					<h2><?php _e( 'Lo sentimos, no pudimos encontrar lo que busca', '' ); ?></h2>

					<div class="btn-wrapper">				
						<a href="<?php echo home_url(); ?>" class="btn btn-primary btn-see-more">Ir al inicio</a>
					</div>
				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>