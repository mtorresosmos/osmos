<?php 
    /*
    * Post data
    */
    $post_id = get_the_ID();
    $reading_time = get_field('tiempo_de_lectura');
    $categories = wp_get_post_categories( $post_id );
    $blog_category = '';
    $bg_cat = '';

    foreach($categories as $cat) {
        $cat_data = get_category( $cat );
        if ( $cat_data->name != 'Blog' ) {
            $blog_category = $cat_data->name;
        }
    }

    switch ( $blog_category ) {
        case 'Marketing Digital':
            $bg_cat = 'bg-purple-transparent';
            break;
        
        case 'Audiovisual':
            $bg_cat = 'bg-green-transparent';
            break;

        case 'Desarrollo Web':
            $bg_cat = 'bg-blue-transparent';
            break;
        
        case 'Diseño Gráfico':
            $bg_cat = 'bg-orange-transparent';
            break;

        case 'Estrategia de marca':
            $bg_cat = 'bg-purple-transparent';
            break;

        case 'Fotografía':
            $bg_cat = 'bg-green-transparent';
            break;
    }
    
?>


<div class="content-wrapper big">
    <div class="heading-wrapper">
        <div class="top-content">
            <h3 class="heading blog-category <?=$bg_cat; ?>"><?=$blog_category; ?></h3>
            <h3 class="heading reading-time">Tiempo de lectura: <?=$reading_time; ?></h3>
        </div>

        <h1 class="heading heading-1 title text-center"><?php the_title(); ?></h1>
    </div>

    <div class="content-container">
        <?php  
            if ( the_post_thumbnail() ) {
                the_post_thumbnail();
            }
        ?>

        <div class="row">
            <div class="column col-1">
                <h4 class="heading author-title">Autores</h4>
                <?php 
                    if( have_rows('autor') ):
                        while( have_rows('autor') ) : the_row();
                            // Assign variables
                            get_sub_field('fotografia') ? $photo = get_sub_field('fotografia') : '';
                            get_sub_field('nombre') ? $name = get_sub_field('nombre') : '';
                            get_sub_field('puesto') ? $position = get_sub_field('puesto') : '';
                ?>
                            <div class="info">
                                <img class="photo" src="<?=$photo; ?>" alt="<?=$name;?>">
                                <div class="content">
                                    <p class="name"><?=$name; ?></p>
                                    <p class="position"><?=$position; ?></p>
                                </div>
                            </div>
                <?php
                        // End loop.
                        endwhile;

                    // No value.
                    else :
                        // Do something...
                    endif;
                ?>

                <div class="newsletter-container">
                    <p class="newsletter-title text-center">Suscríbete a nuestro newsletter</p>
                    <?=do_shortcode('[contact-form-7 id="8d1cb9c" title="Newsletter" html_class="form form-newsletter"]'); ?>
                    <p class="newsletter-text text-center">Al hacer clic en Suscribirse, confirmas tu acuerdo con nuestros Términos y Condiciones.</p>
                </div>

                <div class="social-container">
                    <p class="social-title">Share this post</p>
                    <ul class="list">
                        <li>
                            <a href="javascript:void:(0);" class="icon link" title="Share Link"></a>
                        </li>
                        <li>
                            <a href="javascript:void:(0);" class="icon linkedin" title="Share Linkedin"></a>
                        </li>
                        <li>
                            <a href="javascript:void:(0);" class="icon x" title="Share X"></a>
                        </li>
                        <li>
                            <a href="javascript:void:(0);" class="icon fb" title="Share Facebook"></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="column col-2">
                <div class="article-wrapper">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</div>