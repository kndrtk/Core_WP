<?php
/**
 * 
 * Savana - Ecommerce WordPress Theme
 * Widget Registration
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
 * Register widget areas
 */
function idltm_widgets_init() {
    
    // Primary Sidebar
    register_sidebar(
        array(
            'name'          => esc_html__( 'Primary Sidebar', 'new_theme' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'new_theme' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
    
    // Footer Widget Area 1
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer 1', 'new_theme' ),
            'id'            => 'footer-1',
            'description'   => esc_html__( 'Add widgets here to appear in footer column 1.', 'new_theme' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
    
    // Footer Widget Area 2
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer 2', 'new_theme' ),
            'id'            => 'footer-2',
            'description'   => esc_html__( 'Add widgets here to appear in footer column 2.', 'new_theme' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
    
    // Footer Widget Area 3
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer 3', 'new_theme' ),
            'id'            => 'footer-3',
            'description'   => esc_html__( 'Add widgets here to appear in footer column 3.', 'new_theme' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
    
    // Footer Widget Area 4
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer 4', 'new_theme' ),
            'id'            => 'footer-4',
            'description'   => esc_html__( 'Add widgets here to appear in footer column 4.', 'new_theme' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
    
    // WooCommerce Shop Sidebar
    if ( class_exists( 'WooCommerce' ) ) {
        register_sidebar(
            array(
                'name'          => esc_html__( 'Shop Sidebar', 'new_theme' ),
                'id'            => 'sidebar-shop',
                'description'   => esc_html__( 'Add widgets here to appear in WooCommerce shop sidebar.', 'new_theme' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );
    }
}
add_action( 'widgets_init', 'idltm_widgets_init' );