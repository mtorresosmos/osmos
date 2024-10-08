<?php 
	/* Template Name: Contacto */

	get_header(); 
?>

	<main role="main" aria-label="Content" class="contact">
		<div class="content-wrapper big">
			<div class="heading-wrapper">
				<h1 class="title">Contact Us</h1>
				<div class="text-container">
					<p>To get a quote // To start a project // To ask any question you have</p>
				</div>
			</div>

			<div class="row content">
				<div class="column column-1">
					<div class="fig-logo"></div>
					<a class="link" href="mailto:hello@somososmos.com">hello@somososmos.com</a>
					<a class="link" href="tel:+526143782051">+52 (614) 378 2051</a>

					<div class="btn-wrapper">
						<a class="btn btn-simple btn-link-contact" href="https://www.instagram.com/somos_osmos" target="_blank">Instagram <i class="fas fa-arrow-right"></i></a>
						<a class="btn btn-simple btn-link-contact" href="https://www.linkedin.com/company/somososmos/" target="_blank">Linkedin <i class="fas fa-arrow-right"></i></a>
						<a class="btn btn-simple btn-link-contact" href="https://www.behance.net/somososmos" target="_blank">Behance <i class="fas fa-arrow-right"></i></a>
						<a class="btn btn-simple btn-link-contact" href="https://www.facebook.com/somososmos" target="_blank">Facebook <i class="fas fa-arrow-right"></i></a>
					</div>
				</div>
				<div class="column column-2">
					<div class="form-wrapper">
						<?=do_shortcode( '[contact-form-7 id="b6464db" title="Contacto" html_class="form form-contact"]' ) ?>
					</div>
				</div>
			</div>
		</div>

	</main>

<?php get_footer(); ?>