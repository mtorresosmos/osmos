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

/**
 * Image Sizes.
 */
add_image_size('category-thumb', 355, 450, true);

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
