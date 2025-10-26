<?php
/**
 * 
 * Savana - Ecommerce WordPress Theme
 * Search Results Template
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
                <h1 class="page-title">
                    <?php
                    /* translators: %s: search query. */
                    printf( esc_html__( 'Search Results for: %s', 'new_theme' ), '<span>' . get_search_query() . '</span>' );
                    ?>
                </h1>
            </header><!-- .page-header -->
            
            <?php
            /* Start the Loop */
            while ( have_posts() ) :
                the_post();
                
                get_template_part( 'template-parts/content', 'search' );
                
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