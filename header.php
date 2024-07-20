<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<title><?php wp_title( '' ); ?><?php if ( wp_title( '', false ) ) { echo ' : '; } ?><?php bloginfo( 'name' ); ?></title>

        <link rel="icon" type="image/png" sizes="128x128" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon-128x128.png">
        <link rel="icon" type="image/png" sizes="64x64" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon-64x64.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon-16x16.png">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
		<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
        <!-- header -->
        <header class="header clear" role="banner">
            <a href="<?php echo home_url(); ?>" class="logo">
                <img class="logo-static" src="<?php echo get_template_directory_uri();?>/img/logo.png" alt="<?php bloginfo( 'name' ); ?>">
                <img class="logo-scroll" src="<?php echo get_template_directory_uri();?>/img/logo-black.png" alt="<?php bloginfo( 'name' ); ?>">
            </a>
            
            <a class="btn btn-mobile-menu" href="javascript:void(0);"></a>

            <?php
                wp_nav_menu( 
                    array( 
                        'theme_location'=>'main-menu', 
                        'container_class'=>'menu main-menu',
                        'menu_class' => 'menu-wrapper',
                    ) 
                );
            ?>            	
        </header>
        <!-- /header -->
