<?php
/**
 * 
 * Savana - Ecommerce WordPress Theme. Exclusively on Envato Market: https://themeforest.net/user/idlayers/portfolio?ref=IDLayers
 
 * @encoding     UTF-8
 * @copyright    Copyright (C) 2025 IDLayers (http://idlayers.com). All rights reserved.
 * @license      Envato Standard License http://themeforest.net/licenses/standard?ref=IDLayers
 * @author       Oleksandr Kondratiuk (alex.sledg@gmail.com)
 * @support      alex.sledg@gmail.com
 * 
 */

get_header();
?>

<main id="primary" class="site-main">
    
    <div class="container">
        <div class="content-wrapper">
            
            <div class="content-area">
                <?php
                while ( have_posts() ) :
                    the_post();
                    
                    get_template_part( 'template-parts/content', 'single' );
                    
                    // Post navigation
                    the_post_navigation(
                        array(
                            'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'New_theme' ) . '</span> <span class="nav-title">%title</span>',
                            'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'New_theme' ) . '</span> <span class="nav-title">%title</span>',
                        )
                    );
                    
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                    
                endwhile;
                ?>
            </div><!-- .content-area -->
            
            <?php get_sidebar(); ?>
            
        </div><!-- .content-wrapper -->
    </div><!-- .container -->
    
</main><!-- #primary -->

<?php
get_footer();