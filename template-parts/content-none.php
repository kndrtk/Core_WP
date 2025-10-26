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

<section class="no-results not-found">
    
    <header class="page-header">
    <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'new_theme' ); ?></h1>
    </header><!-- .page-header -->
    
    <div class="page-content">
        <?php
        if ( is_home() && current_user_can( 'publish_posts' ) ) :
            
            printf(
                '<p>' . wp_kses(
                    __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'new_theme' ),
                    array(
                        'a' => array(
                            'href' => array(),
                        ),
                    )
                ) . '</p>',
                esc_url( admin_url( 'post-new.php' ) )
            );
            
        elseif ( is_search() ) :
            ?>
            
            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'new_theme' ); ?></p>
            <?php
            get_search_form();
            
        else :
            ?>
            
            <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'new_theme' ); ?></p>
            <?php
            get_search_form();
            
        endif;
        ?>
    </div><!-- .page-content -->
    
</section><!-- .no-results -->