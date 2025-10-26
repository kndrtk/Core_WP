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

if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">
    
    <?php if ( have_comments() ) : ?>
        
        <h2 class="comments-title">
            <?php
            $idltm_comment_count = get_comments_number();
                if ( '1' === $idltm_comment_count ) {
                printf(
                    esc_html__( 'One comment on &ldquo;%s&rdquo;', 'new_theme' ),
                    '<span>' . wp_kses_post( get_the_title() ) . '</span>'
                );
            } else {
                printf(
                    esc_html( _nx( '%1$s comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', $idltm_comment_count, 'comments title', 'new_theme' ) ),
                    number_format_i18n( $idltm_comment_count ),
                    '<span>' . wp_kses_post( get_the_title() ) . '</span>'
                );
            }
            ?>
        </h2><!-- .comments-title -->
        
        <ol class="comment-list">
            <?php
            wp_list_comments(
                array(
                    'style'       => 'ol',
                    'short_ping'  => true,
                    'avatar_size' => 60,
                )
            );
            ?>
        </ol><!-- .comment-list -->
        
        <?php
        the_comments_navigation();
        
        if ( ! comments_open() ) :
            ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'new_theme' ); ?></p>
            <?php
        endif;
        
    endif;
    
    comment_form();
    ?>
    
</div><!-- #comments -->