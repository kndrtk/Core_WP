<?php
/**
 * 
 * Savana - Ecommerce WordPress Theme
 * Main Functions File
 * 
 * @encoding     UTF-8
 * @copyright    Copyright (C) 2025 IDLayers (http://idlayers.com). All rights reserved.
 * @license      Envato Standard License http://themeforest.net/licenses/standard?ref=IDLayers
 * @author       Oleksandr Kondratiuk (alex.sledg@gmail.com)
 * @support      alex.sledg@gmail.com
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Define theme constants
 */
define( 'NEW_THEME_VERSION', '1.0.0' );
define( 'NEW_THEME_DIR', get_template_directory() );
define( 'NEW_THEME_URI', get_template_directory_uri() );

/**
 * TGM Plugin Activation - Required Plugins
 */
require get_parent_theme_file_path( '/inc/required-plugins.php' );

/**
 * Theme setup and support
 */
require get_parent_theme_file_path( '/inc/theme-support.php' );

/**
 * Enqueue scripts and styles
 */
require get_parent_theme_file_path( '/inc/enqueue.php' );

/**
 * Customizer settings
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * Widget registration
 */
require get_parent_theme_file_path( '/inc/widgets.php' );

/**
 * Template tags and helper functions
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Body classes
 */
require get_parent_theme_file_path( '/inc/body-classes.php' );

/**
 * Data validation functions
 */
require get_parent_theme_file_path( '/inc/validation.php' );

/**
 * WooCommerce integration (if active)
 */
if ( class_exists( 'WooCommerce' ) ) {
    require get_parent_theme_file_path( '/inc/woocommerce.php' );
}