<?php
    /*
    * Post data
    */
    $post_id = get_the_ID();
    $categories = wp_get_post_categories( $post_id );
    
    foreach($categories as $cat) {
        $cat_data = get_category( $cat );
        
        if ( $cat_data->name != 'Blog' ) {
            $cat_id = $cat_data->term_id;
            $cat_name = $cat_data->name;
        }
    }

    // Get related blogs
    $args = array (
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'post_status'    => 'publish',
        'cat'            => $cat_id,
        //'post__not_in'   => [$post_id],
    );

    $related_blogs_query = new WP_Query($args);
?>

<div class="carousel-custom carousel-blog-related home owl-carousel owl-theme">
    <?php
        if ($related_blogs_query->have_posts()) : 
            while ($related_blogs_query->have_posts()) : 
                $related_blogs_query->the_post(); 

                $reading_time = get_field('tiempo_de_lectura');

    ?>
                      
                <div class="item bg-gray-2">
                    <a href="<?php the_permalink() ?>" class="image">
                        <?php if ( the_post_thumbnail() ) { ?>
                            <?php the_post_thumbnail(); ?>
                        <?php } ?>
                    </a>

                    <p class="reading">Tiempo de lectura: <?=$reading_time; ?></p>
                    
                    <a href="<?php the_permalink() ?>" class="blog-name">
                        <h3 class="heading"><?php the_title(); ?></h3>
                    </a>

                    <a href="<?php the_permalink() ?>" class="description">
                        <?php the_excerpt(); ?>
                    </a>

                    <div class="author-wrapper">
                        <?php 
                            if( have_rows('autor') ):
                                $counter = 0;
                                while( have_rows('autor') ) : the_row();
                                    // Assign variables
                                    get_sub_field('fotografia') ? $photo = get_sub_field('fotografia') : '';
                                    get_sub_field('nombre') ? $name = get_sub_field('nombre') : '';
                                    get_sub_field('puesto') ? $position = get_sub_field('puesto') : '';
                        ?>
                        
                            <img class="photo" src="<?=$photo; ?>" alt="<?=$name;?>">
                            <div class="content">
                                <p class="name"><?=$name; ?></p>
                                <p class="position"><?=$position; ?></p>
                            </div>                            
                        <?php
                            $counter++;
                            // Only 1 author
                            if ( $counter > 0 ) {  
                                break;
                            }
                            // End loop.
                            endwhile;

                            // No value.
                            else :
                                // Do something...
                            endif;
                        ?>
                    </div>
                    
                    <p class="category-name"><?=$cat_name; ?></p>
                </div>
    <?php
            endwhile;
        endif; 
        
        wp_reset_postdata();
    ?>
</div>