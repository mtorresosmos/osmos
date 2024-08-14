<?php 
	/* Template Name: Home */

	get_header(); 
?>

	<main role="main" aria-label="Content" class="home">
		<div class="video-section home-section">
			<video autoplay muted loop>
				<source src="<?php echo get_template_directory_uri();?>/video/video-home.mp4" type="video/mp4">
				El navegador no soporta la etiqueta de video.
			</video>

			<div class="buttons-grid">
				<div class="content-wrapper big">
					<a class="btn btn-simple btn-slide btn-rounded orange" href="#">Brand Strategy <span class="bg-orange"></span></a>
					<a class="btn btn-simple btn-slide btn-rounded purple" href="#">Digital Marketing <span class="bg-purple"></span></a>
					<a class="btn btn-simple btn-slide btn-rounded orange" href="#">Graphic Design <span class="bg-orange"></span></a>
					<a class="btn btn-simple btn-slide btn-rounded blue" href="#">Web Development <span class="bg-blue"></span></a>
					<a class="btn btn-simple btn-slide btn-rounded green" href="#">Audiovisual <span class="bg-green"></span></a>
					<a class="btn btn-simple btn-slide btn-rounded green" href="#">Photography <span class="bg-green"></span></a>
				</div>
			</div>
		</div>

		<div class="block-horizonal-home">
			<?php get_template_part( 'template-parts/blocks/block-columns-horizontal' ); ?>
		</div>

		<div class="projects-home">
			<div class="content-wrapper home-section">
				<h1 class="bg-title">
					<span>Let's see some work</span>
				</h1>
			</div>
			<?php get_template_part( 'template-parts/carousels/carousel-home-projects' ); ?>
			<div class="content-wrapper big btn-wrapper">
				<a href="<?php echo home_url(); ?>/categorias/" class="btn btn-primary btn-slide btn-projects-home">
                    All Projects
                    <i class="fas fa-arrow-right"></i>
                </a>
			</div>
		</div>
	
		<div class="our-services-home">
			<?php get_template_part( 'template-parts/blocks/block-columns-horizontal-simple' ); ?>

			<div class="content-wrapper big">
				<?php get_template_part( 'template-parts/tables/table-figure-home' ); ?>
			</div>
		</div>
	</main>

<?php get_footer(); ?>