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
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
    
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        
        <div class="entry-meta">
            <?php
            idltm_posted_on();
            idltm_posted_by();
            ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->
    
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail( 'large' ); ?>
        </div><!-- .post-thumbnail -->
    <?php endif; ?>
    
    <div class="entry-content clearfix">
        <?php
        the_content(
            sprintf(
                wp_kses(
                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'new_theme' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post( get_the_title() )
            )
        );
        
        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'new_theme' ),
                'after'  => '</div>',
            )
        );
        ?>
    </div><!-- .entry-content -->
    
    <footer class="entry-footer clearfix">
        <?php idltm_entry_footer(); ?>
    </footer><!-- .entry-footer -->
    
</article><!-- #post-<?php the_ID(); ?> -->