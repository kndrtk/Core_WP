<?php
/**
 * 
 * Savana - Ecommerce WordPress Theme
 * Theme Customizer
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
 * Add postMessage support for site title and description
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function idltm_customize_register( $wp_customize ) {
    
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    
    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector'        => '.site-title a',
                'render_callback' => 'idltm_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector'        => '.site-description',
                'render_callback' => 'idltm_customize_partial_blogdescription',
            )
        );
    }
    
    // Brand Colors Section
    $wp_customize->add_section(
        'idltm_brand_colors',
        array(
            'title'    => __( 'Brand Colors', 'new_theme' ),
            'priority' => 30,
        )
    );
    
    // Primary Color
    $wp_customize->add_setting(
        'primary_color',
        array(
            'default'           => '#19260a',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'primary_color',
                array(
                'label'    => __( 'Primary Brand Color', 'new_theme' ),
                'section'  => 'idltm_brand_colors',
                'settings' => 'primary_color',
            )
        )
    );
    
    // Hover Color
    $wp_customize->add_setting(
        'hover_color',
        array(
            'default'           => '#4992ff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'hover_color',
                array(
                'label'    => __( 'Hover Color', 'new_theme' ),
                'section'  => 'idltm_brand_colors',
                'settings' => 'hover_color',
            )
        )
    );
}
add_action( 'customize_register', 'idltm_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function idltm_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function idltm_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function idltm_customize_preview_js() {
    wp_enqueue_script(
        'new-theme-customizer',
        get_theme_file_uri( '/scripts/customizer.js' ),
        array( 'customize-preview' ),
        NEW_THEME_VERSION,
        true
    );
}
add_action( 'customize_preview_init', 'idltm_customize_preview_js' );

/**
 * Output custom colors CSS
 */
function idltm_customize_css() {
    $primary_color = get_theme_mod( 'primary_color', '#19260a' );
    $hover_color   = get_theme_mod( 'hover_color', '#4992ff' );
    ?>
    <style type="text/css">
        :root {
            --color-primary: <?php echo esc_attr( $primary_color ); ?>;
            --color-hover: <?php echo esc_attr( $hover_color ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'idltm_customize_css' );
