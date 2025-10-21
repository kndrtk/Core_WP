<?php
/**
 * 
 * Savana - Ecommerce WordPress Theme
 * Theme Support and Setup
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
 * Sets up theme defaults and registers support for various WordPress features.
 */
function idltm_theme_setup() {
    
    // Make theme available for translation
    load_theme_textdomain( 'New_theme', get_template_directory() . '/languages' );
    
    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );
    
    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );
    
    // Enable support for Post Thumbnails on posts and pages
    add_theme_support( 'post-thumbnails' );
    
    // Set default thumbnail size
    set_post_thumbnail_size( 800, 450, true );
    
    // Add additional image sizes
    add_image_size( 'new-theme-featured', 1200, 600, true );
    add_image_size( 'new-theme-thumbnail', 400, 300, true );
    
    // Register navigation menus
    register_nav_menus(
        array(
            'primary' => esc_html__( 'Primary Menu', 'New_theme' ),
            'footer'  => esc_html__( 'Footer Menu', 'New_theme' ),
        )
    );
    
    // Switch default core markup to output valid HTML5
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );
    
    // Add theme support for selective refresh for widgets
    add_theme_support( 'customize-selective-refresh-widgets' );
    
    // Add support for custom logo
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
        )
    );
    
    // Add support for custom background
    add_theme_support(
        'custom-background',
        array(
            'default-color' => 'ffffff',
        )
    );
    
    // Add support for custom header
    add_theme_support(
        'custom-header',
        array(
            'default-image'      => '',
            'width'              => 1200,
            'height'             => 400,
            'flex-height'        => true,
            'flex-width'         => true,
        )
    );
    
    // Add support for Post Formats
    add_theme_support(
        'post-formats',
        array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'audio',
        )
    );
    
    // Add support for editor styles
    add_theme_support( 'editor-styles' );
    add_editor_style( 'styles/editor-style.css' );
    
    // Add support for responsive embeds
    add_theme_support( 'responsive-embeds' );
    
    // Add support for wide and full alignment
    add_theme_support( 'align-wide' );
    
    // Add support for editor color palette
    add_theme_support(
        'editor-color-palette',
        array(
            array(
                'name'  => esc_html__( 'Primary', 'New_theme' ),
                'slug'  => 'primary',
                'color' => '#19260a',
            ),
            array(
                'name'  => esc_html__( 'Hover', 'New_theme' ),
                'slug'  => 'hover',
                'color' => '#4992ff',
            ),
            array(
                'name'  => esc_html__( 'Accent', 'New_theme' ),
                'slug'  => 'accent',
                'color' => '#dd0055',
            ),
            array(
                'name'  => esc_html__( 'Black', 'New_theme' ),
                'slug'  => 'black',
                'color' => '#1f1f1f',
            ),
            array(
                'name'  => esc_html__( 'White', 'New_theme' ),
                'slug'  => 'white',
                'color' => '#ffffff',
            ),
        )
    );
    
    // WooCommerce support
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'idltm_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function idltm_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'idltm_content_width', 800 );
}
add_action( 'after_setup_theme', 'idltm_content_width', 0 );