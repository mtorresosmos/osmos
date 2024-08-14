<?php
/* Template Name: Single proyectos*/ 
 
get_header(); 
?>
 
    <div id="primary" class="content-area">
        <main id="main" class="single single-project" role="main">

            <?php
                while ( have_posts() ) : 
                    the_post();
                    /* Variables */
                    $post_id = get_the_id();
                    $year = get_field( "anio" );
                    $post_categories = wp_get_post_categories( $post_id, array( 'fields' => 'names' ) );
            ?>  

            <!-- Banner -->
            <?php get_template_part( 'template-parts/banners/banner-single-projects-main' );  ?>
            
            <!-- Project overview -->
            <div class="overview bg-black">
                <div class="content-wrapper">
                    <div class="top">
                        <h1 class="heading heading-1 title"><?php the_title(); ?></h1>
                        <div class="content-box">
                            <div class="content">
                                <p class="name">Year</p>
                                <p class="data"><?=$year; ?></p>
                            </div>
                            <div class="content">
                                <p class="name">Project Type</p>
                                <p class="data">
                                    <?php 
                                        if( have_rows('tipo_de_proyecto') ):
                                            $counter = 0;
                                            
                                            while( have_rows('tipo_de_proyecto') ) : the_row();
                                                $project_type = get_sub_field('tipo');
                                                
                                                echo ( $counter >= 1 ? ' / ' . $project_type : $project_type );
                                                $counter++;
                                            
                                            endwhile;

                                        else :
                                            echo 'No hay tipo de proyecto asignado.'; 
                                        endif;
                                    ?>
                                </p>
                            </div>
                        </div>
                        
                        <p class="scroll-txt">Scroll down!</p>
                    </div>
                    <div class="bottom">
                        <div class="row">
                            <div class="column left">
                                <p class="placement">(01)</p>
                                <p class="section-name">
                                    PROJECT <br> 
                                    OVERVIEW
                                </p>
                            </div>
                            <div class="column right">
                            <?php
                            $overview = get_field('seccion_overview');

                            if ( $overview ) : 
                                while( have_rows('seccion_overview') ) : 
                                    the_row(); ?>
                                    <h2 class="heading heading-2 phrase">
                                        <?=$overview['frase_inicial'] ?>
                                    </h2>
                                    
                                    <div class="row wrapper">
                                        <div class="column">
                                            <p class="subtitle">Reto</p>
                                            <?=$overview['reto'] ?>
                                        </div>
                                        <div class="column">
                                            <p class="subtitle">Resultados</p>
                                            <?=$overview['resultados'] ?>
                                        </div>
                                    </div>

                                    <div class="services">
                                        <p class="subtitle">Servicios proporcionados</p>

                                        <?php
                                        /**
                                         * Field Structure:
                                         *
                                         * - servicios_proporcionados (Repeater)
                                         *   - servicio (Repeater)
                                         *     - descripcion (Text)
                                         *     - categoria (Select)
                                        */
                                        if ( have_rows('servicios_proporcionados') ):

                                            while ( have_rows ('servicios_proporcionados') ) : 
                                                the_row();
                                            ?>
                                                <div class="group"> 
                                                    
                                                    <?php if ( have_rows ('servicio') ): ?>

                                                        <div class="col-desc">

                                                            <?php while( have_rows('servicio') ) : ?>
                                                                <?php
                                                                    the_row(); 
                                                                    $name = get_sub_field('descripcion'); 
                                                                ?>
                                                        
                                                                <p class="desc"><?=esc_html($name); ?></p>
                                                            <?php endwhile;  ?>

                                                        </div>

                                                        <?php 
                                                            $cat = get_sub_field('categoria'); 

                                                            switch ( $cat ) {
                                                                case 'Brand Strategy':
                                                                    $bg_color = 'bg-orange';
                                                                    break;
                                                                case 'Digital Marketing':
                                                                    $bg_color = 'bg-purple';
                                                                    break;
                                                                case 'Graphic Design':
                                                                    $bg_color = 'bg-orange';
                                                                    break;
                                                                case 'Web Development':
                                                                    $bg_color = 'bg-blue';
                                                                    break;
                                                                case 'Audiovisual':
                                                                    $bg_color = 'bg-green';
                                                                    break;
                                                                case 'Photography':
                                                                    $bg_color = 'bg-green';
                                                                    break;
                                                                default:
                                                                    $bg_color = '';
                                                                    break;
                                                            }
                                                        ?>
                                                        
                                                        <div class="circle <?=$bg_color; ?>"></div>

                                                    <?php endif; // repeater ?>

                                                </div>

                                            <?php endwhile; // servicios_proporcionados ?>
                                            
                                        <?php endif; // servicios_proporcionados ?>

                                    </div>

                                <?php endwhile; // seccion_overview ?>

                            <?php endif; // seccion_overview ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Project overview -->

            <!-- Sections -->
            <?php
                /**
                 * Field Structure:
                 *
                 * - secciones (Repeater)
                 *   - tipo_de_seccion (Select)
                 *   - contenido (WYSIWYG)
                */
                
                if ( have_rows('secciones') ): ?>
                    <div class="sections">
                        <?php while ( have_rows ('secciones') ) : 
                            the_row();
                           
                            $section_type = get_sub_field('tipo_de_seccion');
                            $content = get_sub_field('contenido'); 

                            switch($section_type) {
                                case 'Bloque de texto';
                                    $section_class = "text-column";
                                    break;
                                case 'Bloque de números';
                                    $section_class = "number-column";
                                    break;
                                case 'Galería imagen/video 1 columna';
                                    $section_class = "columns-1";
                                    break;
                                case 'Galería imagen/video 2 columnas';
                                    $section_class = "columns-2";
                                    break;
                                case 'Galería imagen/video 3 columnas';
                                    $section_class = "columns-3";
                                    break;
                            }

                            if ( $section_type === 'Bloque de texto' ) {
                                $lines = explode("\n", $content);

                                // Inicializa las variables para las dos columnas
                                $column1 = '';
                                $column2 = '';
                                $column_switch = false;

                                // Recorrer las líneas y asignar a columnas
                                foreach ($lines as $line) {
                                    // Limpia las líneas en blanco
                                    $line = trim($line);

                                    // Verifica si la línea está vacía
                                    if (empty($line)) continue;

                                    // Determina la columna según la etiqueta
                                    if (!$column_switch && (strpos($line, '<h4>') !== false || strpos($line, '<h3>') !== false)) {
                                        $column1 .= $line;
                                    } elseif ($column_switch || strpos($line, '<h2>') !== false) {
                                        $column2 .= $line;
                                        $column_switch = true;
                                    }
                                }
                            ?>
                                <div class="section block-columns <?=esc_html( $section_class ); ?> bg-gray-2">
                                    <div class="column left">
                                        <?php echo $column1; ?>
                                    </div>
                                    <div class="column right">
                                        <?php echo $column2; ?>
                                    </div>
                                </div>
                            <?php } else if ( $section_type === 'Bloque de números' ) {
                                // Divide el contenido en un array de líneas
                                $lines = explode("\n", $content);

                                // Inicializa las variables para las dos columnas
                                $column1 = '';
                                $column2 = '';
                                $column_switch = false;
                                $current_subcolumn = '';

                                // Recorrer las líneas y asignar a columnas
                                foreach ($lines as $line) {
                                    // Limpia las líneas en blanco
                                    $line = trim($line);

                                    // Verifica si la línea está vacía
                                    if (empty($line)) continue;

                                    // Determina la columna según la etiqueta
                                    if (!$column_switch && strpos($line, '<h2>') === false) {
                                        // Todo el contenido antes de la primera etiqueta <h2> va a la columna 1
                                        $column1 .= $line;
                                    } elseif (strpos($line, '<h2>') !== false) {
                                        // Inicia una nueva subcolumna para cada h2
                                        if (!empty($current_subcolumn)) {
                                            $column2 .= '<div class="subcolumn">' . $current_subcolumn . '</div>';
                                        }
                                        $current_subcolumn = $line;
                                        $column_switch = true;
                                    } elseif ($column_switch) {
                                        // Todo el contenido después de la primera etiqueta <h2> va a subcolumnas de la columna 2
                                        if (strpos($line, '<p>') !== false) {
                                            // Añade el párrafo a la subcolumna actual
                                            $current_subcolumn .= $line;
                                        } else {
                                            // Finaliza la subcolumna actual y comienza una nueva si no es un <p>
                                            if (!empty($current_subcolumn)) {
                                                $column2 .= '<div class="subcolumn">' . $current_subcolumn . '</div>';
                                            }
                                            $current_subcolumn = $line;
                                        }
                                    }
                                }

                                // Agrega la última subcolumna si existe
                                if (!empty($current_subcolumn)) {
                                    $column2 .= '<div class="subcolumn">' . $current_subcolumn . '</div>';
                                }
                                ?>

                                <div class="section block-columns <?=esc_html( $section_class ); ?> bg-gray-2">
                                    <div class="content-wrapper">
                                        <div class="column column-1">
                                            <?php echo $column1; ?>
                                        </div>
                                        <div class="column column-2">
                                            <?php echo $column2; ?>
                                        </div>
                                    </div>
                                </div>                            
                            <?php } else { ?>
                                <?php 
                                    // Remover etiquetas preinsertadas P
                                    $formatted_content = str_replace(['<p>', '</p>'], '',  $content);    
                                ?>

                                <div class="content-wrapper">
                                    <div class="section gallery <?=esc_html( $section_class ); ?>">
                                        <?=$formatted_content; ?>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php endwhile; // servicios_proporcionados ?>
                        </div>
                    </div>   
                <?php endif; // servicios_proporcionados ?>                                             
            <!-- /Sections -->

            <!-- Team -->
            <div class="team">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="column column-2">
                            <div class="logo-cirlce"></div>
                            <h2 class="heading heading-1 title">Humans behind the project</h2>
                        </div>

                        <div class="column column-2">

                        <?php if( have_rows('colaboradores') ): ?>
                            <?php while( have_rows('colaboradores') ): the_row(); ?>


                                <?php if( have_rows('graphic_design') ): ?>
                                    <?php while( have_rows('graphic_design') ): the_row(); ?>
                                    
                                    <?php
                                        // Check rows exists.
                                        if( have_rows('colaborador') ): 
                                            ?>
                                            <h4 class="department design">Graphic design</h4>

                                            <div class="content">

                                                <?php
                                                    while( have_rows('colaborador') ) : the_row();

                                                        // Load sub field value.
                                                        $name = get_sub_field('nombre');
                                                        $position = get_sub_field('posicion');
                                                ?>
                                                    <div class="row">
                                                        <p class="name"><?=$name; ?></p>
                                                        <p class="position"><?=$position; ?></p>
                                                    </div>
                                                <?php
                                                    endwhile;
                                                ?>
                                            </div>
                                        <?php
                                        
                                        else :
                                            
                                        endif;
                                        ?>
                                      
                                    <?php endwhile; ?>
                                <?php endif; ?>

                                <?php if( have_rows('marketing') ): ?>
                                    <?php while( have_rows('marketing') ): the_row(); ?>
                                    
                                    <?php
                                        // Check rows exists.
                                        if( have_rows('colaborador') ): 
                                            ?>
                                            <h4 class="department marketing">Marketing</h4>
                                            
                                            <div class="content">

                                                <?php
                                                    while( have_rows('colaborador') ) : the_row();

                                                        // Load sub field value.
                                                        $name = get_sub_field('nombre');
                                                        $position = get_sub_field('posicion');
                                                ?>
                                                    <div class="row">
                                                        <p class="name"><?=$name; ?></p>
                                                        <p class="position"><?=$position; ?></p>
                                                    </div>
                                                <?php
                                                    endwhile;
                                                ?>
                                            </div>
                                        <?php
                                        
                                        else :
                                            
                                        endif;
                                        ?>
                                      
                                    <?php endwhile; ?>
                                <?php endif; ?>

                                <?php if( have_rows('web_development') ): ?>
                                    <?php while( have_rows('web_development') ): the_row(); ?>
                                    
                                    <?php
                                        // Check rows exists.
                                        if( have_rows('colaborador') ): 
                                            ?>
                                            <h4 class="department web">Web Development</h4>

                                            <div class="content">

                                                <?php
                                                    while( have_rows('colaborador') ) : the_row();

                                                        // Load sub field value.
                                                        $name = get_sub_field('nombre');
                                                        $position = get_sub_field('posicion');
                                                ?>
                                                    <div class="row">
                                                        <p class="name"><?=$name; ?></p>
                                                        <p class="position"><?=$position; ?></p>
                                                    </div>
                                                <?php
                                                    endwhile;
                                                ?>
                                            </div>
                                        <?php
                                        
                                        else :
                                            
                                        endif;
                                        ?>
                                      
                                    <?php endwhile; ?>
                                <?php endif; ?>

                                <?php if( have_rows('management') ): ?>

                                    <?php while( have_rows('management') ): the_row(); ?>
                                        
                                        <?php if( have_rows('colaborador') ): ?>

                                            <h4 class="department management">Management</h4>
                                            
                                            <div class="content">

                                                <?php
                                                    while( have_rows('colaborador') ) : the_row();

                                                        // Load sub field value.
                                                        $name = get_sub_field('nombre');
                                                        $position = get_sub_field('posicion');
                                                ?>
                                                    <div class="row">
                                                        <p class="name"><?=$name; ?></p>
                                                        <p class="position"><?=$position; ?></p>
                                                    </div>
                                                
                                                    <?php endwhile; ?>
                                            </div>
                                        <?php
                                        
                                        else :
                                            
                                        endif;
                                        ?>
                                      
                                    <?php endwhile; ?>
                                <?php endif; ?>

                                
                            <?php endwhile; ?>
                        <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /Team -->                        

        <?php

        // End the post loop.
        endwhile;
        ?>
 
        </main><!-- .site-main -->
    </div><!-- .content-area -->
 
<?php get_footer(); ?>