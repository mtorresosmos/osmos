<?php 
	/*
	* Template Name: Categorías
	*/

	get_header(); 
?>

	<main role="main" aria-label="Content" class="page-category">
		<!-- Heading wrapper -->
		<div class="heading-wrapper">
			<div class="content-wrapper">
				<div class="row">
					<div class="column column-1">
						<h1 class="heading heading-1 title">We deliver strategic, thoughful solutions</h1>
					</div>
					<div class="column column-2">
						<p>
							Con nuestra <strong>experiencia</strong> y enfoque <strong>innovador</strong>, <strong>ayudamos a marcas</strong> como la tuya a <strong>alcanzar</strong> sus objetivos en un mercado competitivo.
						</p>
						<a href="https://somososmos.com/contacto/" class="btn btn-primary btn-slide btn-category">
							CONTÁCTANOS
							<i class="fas fa-arrow-right"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
		<!-- Heading wrapper -->

		<!-- Tabs -->
		<div class="tabs-wrapper">
			<div class="content-wrapper">
				<?php get_template_part( 'template-parts/tabs/tabs-categories' ); ?>
			</div>
		</div>
		<!-- Tabs -->
	</main>

<?php get_footer(); ?>