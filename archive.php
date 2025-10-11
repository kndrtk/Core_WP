<?php
/**
 * 
 * Savana - Ecommerce WordPress Theme
 * Archive Template
 * 
 * @encoding     UTF-8
 * @copyright    Copyright (C) 2025 IDLayers (http://idlayers.com). All rights reserved.
 * @license      Envato Standard License http://themeforest.net/licenses/standard?ref=IDLayers
 * @author       Oleksandr Kondratiuk (alex.sledg@gmail.com)
 * @support      alex.sledg@gmail.com
 * 
 */

get_header();
?>

<div class="site-content">
    <main id="primary" class="content-area">
        
        <?php if ( have_posts() ) : ?>
            
            <header class="page-header">
                <?php
                the_archive_title( '<h1 class="page-title">', '</h1>' );
                the_archive_description( '<div class="archive-description">', '</div>' );
                ?>
            </header><!-- .page-header -->
            
            <?php
            /* Start the Loop */
            while ( have_posts() ) :
                the_post();
                
                get_template_part( 'template-parts/content', get_post_type() );
                
            endwhile;
            
            the_posts_navigation();
            
        else :
            
            get_template_part( 'template-parts/content', 'none' );
            
        endif;
        ?>
        
    </main><!-- #primary -->
    
    <?php get_sidebar(); ?>
    
</div><!-- .site-content -->

<?php
get_footer();