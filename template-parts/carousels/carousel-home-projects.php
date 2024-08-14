<?php
// Get all projects
$args = array(
    'post_type'      => 'proyectos',
    'posts_per_page' => -1,
    'post_status'    => 'publish'
);

$projects_query = new WP_Query($args);
?>

<div class="carousel-custom carousel-home-projects home owl-carousel owl-theme">
    <?php
        if( have_rows('proyecto') ):

            while( have_rows('proyecto') ) : the_row();

                $img = get_sub_field('imagen');
                $title = get_sub_field('titulo');
                $cats = get_sub_field('categorias');
                $url = get_sub_field('link');
    ?>
                <div class="item">
                    <a class="thumb-wrapper" href="<?=$url; ?>">
                        <div class="thumb" style="background-image: url(<?=$img; ?>);"></div>
                    </a>
                    <a href="<?=$url; ?>" class="title">
                        <?=$title; ?>
                    </a>
                    <p><?=$cats; ?></p>
                    
                </div>
    <?php
            // End loop.
            endwhile;

        // No value.
        else :
            // Do something...
        endif;
    ?>
</div>


    
