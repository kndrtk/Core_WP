<?php
/**
 * 
 * Savana - Ecommerce WordPress Theme
 * Enqueue Scripts and Styles
 * 
 * @encoding     UTF-8
 * @copyright    Copyright (C) 2025 IDLayers (http://idlayers.com). All rights reserved.
 * @license      Envato Standard License http://themeforest.net/licenses/standard?ref=IDLayers
 * @author       Oleksandr Kondratiuk (alex.sledg@gmail.com)
 * @support      alex.sledg@gmail.com
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue Google Fonts with performance optimization
 */
function idltm_enqueue_fonts() {
    // Preconnect to Google Fonts for faster loading
    add_action( 'wp_head', function() {
        echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
        echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
    }, 1 );
    
    // Load fonts with font-display:swap for better performance
    wp_enqueue_style( 
        'idltm-google-fonts',
        'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&family=Oswald:wght@400;700&display=swap',
        array(),
        null
    );
}
add_action( 'wp_enqueue_scripts', 'idltm_enqueue_fonts' );

/**
 * Enqueue scripts and styles
 */
function idltm_enqueue_scripts() {
    
    // Main stylesheet
    wp_enqueue_style( 
        'new-theme-style', 
        get_stylesheet_uri(),
        array(),
        NEW_THEME_VERSION
    );
    
    // Custom styles
    wp_enqueue_style(
        'new-theme-custom',
        get_theme_file_uri( '/styles/custom.css' ),
        array( 'new-theme-style' ),
        NEW_THEME_VERSION
    );
    
    // Responsive styles
    wp_enqueue_style(
        'new-theme-responsive',
        get_theme_file_uri( '/styles/responsive.css' ),
        array( 'new-theme-style' ),
        NEW_THEME_VERSION
    );
    
    // Main navigation script
    wp_enqueue_script(
        'new-theme-navigation',
        get_theme_file_uri( '/scripts/navigation.js' ),
        array( 'jquery' ),
        NEW_THEME_VERSION,
        true
    );
    
    // Main theme script
    wp_enqueue_script(
        'new-theme-script',
        get_theme_file_uri( '/scripts/main.js' ),
        array( 'jquery' ),
        NEW_THEME_VERSION,
        true
    );
    
    // Localize script for AJAX
    wp_localize_script(
        'new-theme-script',
        'idltmData',
        array(
            'ajaxUrl' => admin_url( 'admin-ajax.php' ),
            'nonce'   => wp_create_nonce( 'idltm-nonce' ),
        )
    );
    
    // Comment reply script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'idltm_enqueue_scripts' );

/**
 * Enqueue admin scripts and styles
 */
function idltm_admin_enqueue_scripts() {
    wp_enqueue_style(
        'new-theme-admin',
        get_theme_file_uri( '/styles/admin.css' ),
        array(),
        NEW_THEME_VERSION
    );
}
add_action( 'admin_enqueue_scripts', 'idltm_admin_enqueue_scripts' );