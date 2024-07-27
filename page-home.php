<?php 
	/* Template Name: Home */

	get_header(); 
?>

	<main role="main" aria-label="Content" class="home">
<<<<<<< HEAD
		<div class="video-section">
=======
		<div class="video-section home-section">
>>>>>>> master
			<video autoplay muted>
				<source src="<?php echo get_template_directory_uri();?>/video/video-home.mp4" type="video/mp4">
				El navegador no soporta la etiqueta de video.
			</video>
		</div>
<<<<<<< HEAD
=======

		<div class="projects-home">
			<div class="content-wrapper home-section">
				<h1 class="bg-title">
					<span>Let's see some work</span>
				</h1>
			</div>
			<?php get_template_part( 'template-parts/carousels/carousel-home-projects' ); ?>
		</div>
>>>>>>> master
	</main>

<?php get_footer(); ?>