<?php
/* Template Name: Single*/ 
 
get_header(); ?>
 
    <div id="primary" class="content-area">
        <?php
            if ( in_category('blog') ) { ?>

                <main id="main" class="single blog" role="main">
                <?php
                    // Start the loop.
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/contents/content', 'blog');                 

                    // End the loop.
                    endwhile;   
                ?>
                    <!-- Related blogs -->
                    <div class="related-blogs-wrapper">
                        <h4 class="related-title">Blogs relacionados</h4>

                        <?php get_template_part( 'template-parts/carousels/carousel', 'single-blog-related'); ?>
                    </div>
                    <!-- /Related blogs -->

                    <!-- Banner buttons -->
                    <div class="block-wrapper">
                        <?php get_template_part( 'template-parts/blocks/block-columns-vertical-buttons' ); ?>
                    </div>
                    <!-- /Banner buttons -->

        <?php } else { ?>
            <main id="main" class="single" role="main">
        <?php } ?>


       
        </main><!-- .site-main -->
    </div><!-- .content-area -->
 
<?php get_footer(); ?>