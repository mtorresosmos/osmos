			<!-- footer -->
			<footer class="footer" role="contentinfo">
				<div class="footer-wrapper">	
					<div class="row">
						<div class="column top-left">
							<a href="<?php echo home_url(); ?>" class="logo-footer">
								<img src="<?php echo get_template_directory_uri();?>/img/logo-footer.png" class="logo-footer" alt="<?php bloginfo( 'name' ); ?>">
							</a>
							<a href="<?php echo home_url(); ?>/categorias/" class="btn btn-primary btn-slide btn-footer">
								All projects
								<i class="fas fa-arrow-right"></i>
							</a>
							<div class="drop-logo"></div>
						</div>
						<div class="column bottom-left">
							<p class="subtitle">General contact</p>
							<div class="list-wrapper">
								<ul class="list-bottom">
									<li>
										<a href="mailto:hello@somososmos.com">hello@somososmos.com</a>
									</li>
								</ul>
								<ul class="list-bottom">
									<li>
										<a href="tel:+526145669149">+52 614-566-91-49 </a>
									</li>
									<li>
										<a href="tel:+526143945297">+52 614-394-5297</a>
									</li>
								</ul>
								<ul class="list-bottom">
									<li>
										<a href="https://maps.app.goo.gl/nBC8xs2U83j6ujaB9" target="_blank">C. Blas Cano de los Rios, 410. Chihuahua, Chih, México</a>
									</li>
								</ul>
							</div>
							<p class="copy">COPYRIGHT © 2023 OSMOS™ PARTE DEL TODO</p>
						</div>
					</div>
			</footer>
			<!-- /footer -->

		
		<?php wp_footer(); ?>
		
	</body>
</html>
