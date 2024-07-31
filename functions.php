<?php
/**
 * Register theme JS.
 */
function site_jquery_scripts() {
    wp_enqueue_script( 'jQuery', 'https://code.jquery.com/jquery-3.7.0.min.js', array(),'3.7.0',true );
}
add_action( 'wp_enqueue_scripts', 'site_jquery_scripts' );

function site_owl_carousel_scripts() {
    wp_enqueue_script( 'owl-carousel', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', array(),'2.3.4',true );
}
add_action( 'wp_enqueue_scripts', 'site_owl_carousel_scripts' );

function site_scripts() {
    wp_enqueue_script( 'site-js', get_stylesheet_directory_uri() . '/js/main.js', array(),'1.0',true );
}
add_action( 'wp_enqueue_scripts', 'site_scripts' );

/**
 * Register theme stylesheet.
 */
function site_font_awesome() {  
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/fontawesome.min.css' );
    wp_enqueue_style( 'font-awesome-all', get_template_directory_uri() . '/css/all.min.css' );
    wp_enqueue_style( 'font-awesome-regular', get_template_directory_uri() . '/css/regular.min.css' );
    wp_enqueue_style( 'font-awesome-solid', get_template_directory_uri() . '/css/solid.min.css' );
}
add_action( 'wp_enqueue_scripts', 'site_font_awesome', 11 );

function site_owl_carousel_styles() {  
    wp_enqueue_style( 'owl-carousel-styles', get_template_directory_uri() . '/css/owl.carousel.min.css' );
}
add_action( 'wp_enqueue_scripts', 'site_owl_carousel_styles', 11 );


function site_styles() {  
    wp_enqueue_style( 'site-styles', get_template_directory_uri() . '/css/main.min.css' );
}
add_action( 'wp_enqueue_scripts', 'site_styles', 11 );

/**
 * Register Main menu.
 */
function site_menus() {
    register_nav_menus(
        array(
          'main-menu' => __( 'Main Menu' ),
          'footer-menu' => __( 'Footer Menu' ),
        )
    );
}
  
add_action( 'init', 'site_menus' );

/*
* Deactivate Gutenberg editor
*/
add_filter('use_block_editor_for_post', '__return_false', 10);

/* 
* Thumbnail theme support
*/
function site_theme_setup(){
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'site_theme_setup');

/**
 * Image Sizes.
 */
add_image_size('category-thumb', 355, 450, true);

add_image_size( 'main-banner-project', 1728, 645 ); // Project Thumbnail

add_image_size( 'gallery-1536x3709', 1536, 3709 ); // Full website - 1 column

add_image_size( 'gallery-1536x864', 1536, 864 ); // Big image - 1 column

add_image_size( 'gallery-758x980', 758, 980 ); // Medium image - 2 column

add_image_size( 'gallery-758x505', 758, 505 ); // Small image - 2 column

add_image_size( 'gallery-500x888', 500, 888 ); // Big image - 3 column

add_image_size( 'gallery-500x500', 500, 500 ); // Big image - 3 column

/*
*  Login panel logo
*/
function wpb_login_logo() { ?>
    <style type="text/css">
        #login h1 a, 
        .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/logo-black.png);
            background-repeat: no-repeat;
            background-size: contain;
            height: 30px;
            padding-bottom: 10px;
            width: 180px;
        }
    </style>
<?php }

add_action( 'login_enqueue_scripts', 'wpb_login_logo' );

/*
* Register custom post type 'Proyectos'
*/
function os_projects_post_type() {
    // Etiquetas para el Custom Post Type
    $labels = array(
        'name'                => _x( 'Proyectos', 'Post Type General Name', 'osmos' ),
        'singular_name'       => _x( 'Proyecto', 'Post Type Singular Name', 'osmos' ),
        'menu_name'           => __( 'Proyectos', 'osmos' ),
        'parent_item_colon'   => __( 'Proyecto superior', 'osmos' ),
        'all_items'           => __( 'Todos los Proyectos', 'osmos' ),
        'view_item'           => __( 'Ver Proyecto', 'osmos' ),
        'add_new_item'        => __( 'Agregar Proyecto', 'osmos' ),
        'add_new'             => __( 'Agregar Nuevo', 'osmos' ),
        'edit_item'           => __( 'Editar Proyecto', 'osmos' ),
        'update_item'         => __( 'Actualizar Proyecto', 'osmos' ),
        'search_items'        => __( 'Buscar Proyecto', 'osmos' ),
        'not_found'           => __( 'No se encontró', 'osmos' ),
        'not_found_in_trash'  => __( 'No se encontró en la Papelera', 'osmos' ),
    );

    // Otras opciones para el Custom Post Type
    $args = array(
        'label'               => __( 'Proyectos', 'osmos' ),
        'description'         => __( 'Nuestros Proyectos', 'osmos' ),
        'labels'              => $labels,
        'supports'            => array( 'thumbnail', 'title', 'editor', 'excerpt', 'author', 'custom-fields' ),
        'taxonomies'          => array( 'category' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest'        => true,
    );

    // Registrar el Custom Post Type
    register_post_type( 'proyectos', $args );
}

// Hook en el 'init' para que la función no se ejecute innecesariamente
add_action( 'init', 'os_projects_post_type', 0 );
