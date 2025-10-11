<?php
/**
 * 
 * Savana - Ecommerce WordPress Theme
 * Page Template
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
        
        <?php
        while ( have_posts() ) :
            the_post();
            
            get_template_part( 'template-parts/content', 'page' );
            
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            
        endwhile; // End of the loop.
        ?>
        
    </main><!-- #primary -->
    
    <?php get_sidebar(); ?>
    
</div><!-- .site-content -->

<?php
get_footer();