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
        <div class="error-404 not-found">
            
            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e( '404', 'New_theme' ); ?></h1>
                <p class="page-subtitle"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'New_theme' ); ?></p>
            </header><!-- .page-header -->
            
            <div class="page-content">
                <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'New_theme' ); ?></p>
                
                <?php get_search_form(); ?>
                
                <div class="error-404-widgets">
                    
                    <div class="widget widget_recent_entries">
                        <h3 class="widget-title"><?php esc_html_e( 'Recent Posts', 'New_theme' ); ?></h3>
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'primary',
                                'menu_class'     => 'menu',
                                'depth'          => 1,
                                'fallback_cb'    => false,
                            )
                        );
                        ?>
                    </div>
                    
                    <div class="widget widget_categories">
                        <h3 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'New_theme' ); ?></h3>
                        <ul>
                            <?php
                            wp_list_categories(
                                array(
                                    'orderby'    => 'count',
                                    'order'      => 'DESC',
                                    'show_count' => 1,
                                    'title_li'   => '',
                                    'number'     => 10,
                                )
                            );
                            ?>
                        </ul>
                    </div>
                    
                    <div class="widget widget_archive">
                        <h3 class="widget-title"><?php esc_html_e( 'Archives', 'New_theme' ); ?></h3>
                        <ul>
                            <?php
                            wp_get_archives(
                                array(
                                    'type'  => 'monthly',
                                    'limit' => 12,
                                )
                            );
                            ?>
                        </ul>
                    </div>
                    
                    <div class="widget widget_tag_cloud">
                        <h3 class="widget-title"><?php esc_html_e( 'Tags', 'New_theme' ); ?></h3>
                        <?php wp_tag_cloud(); ?>
                    </div>
                    
                </div><!-- .error-404-widgets -->
                
            </div><!-- .page-content -->
            
        </div><!-- .error-404 -->
    </div><!-- .container -->
    
</main><!-- #primary -->

<?php
get_footer();