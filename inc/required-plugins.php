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

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_parent_theme_file_path( '/inc/lib/class-tgm-plugin-activation.php' );

add_action( 'tgmpa_register', 'idltm_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 */
function idltm_register_required_plugins() {
    
    $plugins = array(
        
        // Required Plugins
        array(
            'name'               => 'WooCommerce',
            'slug'               => 'woocommerce',
            'required'           => true,
            'version'            => '8.0.0',
        ),
        
        array(
            'name'               => 'Contact Form 7',
            'slug'               => 'contact-form-7',
            'required'           => true,
        ),
        
        array(
            'name'               => 'Elementor',
            'slug'               => 'elementor',
            'required'           => true,
        ),
        
        // Recommended Plugins
        array(
            'name'               => 'Yoast SEO',
            'slug'               => 'wordpress-seo',
            'required'           => false,
        ),
        
        array(
            'name'               => 'WP Super Cache',
            'slug'               => 'wp-super-cache',
            'required'           => false,
        ),
        
        array(
            'name'               => 'Smush',
            'slug'               => 'wp-smushit',
            'required'           => false,
        ),
        
        array(
            'name'               => 'MailChimp for WordPress',
            'slug'               => 'mailchimp-for-wp',
            'required'           => false,
        ),
        
        array(
            'name'               => 'Wordfence Security',
            'slug'               => 'wordfence',
            'required'           => false,
        ),
        
    );
    
    $config = array(
        'id'           => 'new_theme',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'parent_slug'  => 'themes.php',
        'capability'   => 'edit_theme_options',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
    );
    
    tgmpa( $plugins, $config );
}