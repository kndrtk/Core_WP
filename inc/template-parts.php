<?php
/**
 * 
 * Savana - Ecommerce WordPress Theme
 * Template part for displaying posts
 * 
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
        <?php
        if ( is_singular() ) :
            the_title( '<h1 class="entry-title">', '</h1>' );
        else :
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        endif;
        
        if ( 'post' === get_post_type() ) :
            ?>
            <div class="entry-meta">
                <?php
                idltm_posted_on();
                idltm_posted_by();
                ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->
    
    <?php if ( has_post_thumbnail() && ! is_singular() ) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'large' ); ?>
            </a>
        </div><!-- .post-thumbnail -->
    <?php endif; ?>
    
    <div class="entry-content clearfix">
        <?php
        if ( is_singular() ) :
            the_content();
            
            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'New_theme' ),
                    'after'  => '</div>',
                )
            );
        else :
            the_excerpt();
            ?>
            <a href="<?php echo esc_url( get_permalink() ); ?>" class="read-more">
                <?php esc_html_e( 'Read More', 'New_theme' ); ?> &rarr;
            </a>
            <?php
        endif;
        ?>
    </div><!-- .entry-content -->
    
    <footer class="entry-footer clearfix">
        <?php idltm_entry_footer(); ?>
    </footer><!-- .entry-footer -->
    
</article><!-- #post-<?php the_ID(); ?> -->