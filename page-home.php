<?php 
	/* Template Name: Home */

	get_header(); 
?>

	<main role="main" aria-label="Content" class="home">
		<div class="video-section">
			<video autoplay muted>
				<source src="<?php echo get_template_directory_uri();?>/video/video-home.mp4" type="video/mp4">
				El navegador no soporta la etiqueta de video.
			</video>
		</div>
	</main>

<?php get_footer(); ?>