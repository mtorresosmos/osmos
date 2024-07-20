<?php
/**
 * The Search template file
 */

get_header();
?>
<div class="search-results-wrapper">
	<div class="content-wrapper">
		<h1 class="heading heading-2 title">Resultados de búsqueda para: <span><?php echo get_search_query(); ?></span></h1>

		<div class="container">
			<?php if ( have_posts() ): ?>
				<?php while( have_posts() ): ?>
					<?php the_post(); ?>
					<div class="search-result">
						<h3 class="item-title"><?php the_title(); ?></h3>
						
						<?php the_excerpt(); ?>

						<a href="<?php the_permalink(); ?>" class="read-more-link">
							Leer más...
						</a>
					</div>
				<?php endwhile; ?>
				<?php the_posts_pagination(); ?>
			<?php else: ?>
				<p>Lo sentimos, no se encontraton resultados</p>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>