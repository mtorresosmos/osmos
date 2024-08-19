<?php
// Get all projects
$args = array(
    'post_type'      => 'proyectos',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'order'          => 'ASC',
    'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => 'fotografia',
        ),
    ),
);

$projects_query = new WP_Query($args);
?>

<div class="cards double-column">
    <?php if ($projects_query->have_posts()) : ?>
            <?php while ($projects_query->have_posts()) : ?>
                <?php 
                    $projects_query->the_post(); 
                    
                    // Variables
                    $post_id = get_the_id();
                    $permalink = get_permalink( $post_id );
                    $thumbnail_url = get_the_post_thumbnail_url( $post_id );
                    $title = get_the_title();
                    $overview = get_field('seccion_overview');
                    
                    $post_categories = wp_get_post_categories( $post_id, array( 'fields' => 'names' ) );
                ?>
        
                <div class="item">
                    <a class="thumb-wrapper" href="<?=$permalink; ?>">
                        <div class="thumb" style="background-image: url(<?=$thumbnail_url; ?>);"></div>
                    </a>
                    <a href="<?=$permalink; ?>" class="title">
                        <?=$title; ?>
                    </a>
                    <?php if( $post_categories ){ ?>
                        <div class="category-wrapper">
                            <?php foreach($post_categories as $name){ ?>
                                <p><?=$name; ?></p>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    
                </div>
            <?php endwhile; ?>
            
            <?php wp_reset_postdata(); ?>
        
    <?php else :
        
        echo '<p>No se encontraron proyectos.</p>';
    endif;
    ?>
</div>


    
