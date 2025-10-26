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

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
    <span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'new_theme' ); ?></span>
        <input type="search" 
               class="search-field" 
               placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'new_theme' ); ?>" 
               value="<?php echo get_search_query(); ?>" 
               name="s" />
    </label>
    <button type="submit" class="search-submit">
        <span class="search-icon">🔍</span>
    <span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'new_theme' ); ?></span>
    </button>
</form>