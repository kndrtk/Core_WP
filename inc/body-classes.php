<?php
/**
 * 
 * Savana - Ecommerce WordPress Theme
 * Custom Body Classes
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
 * Add custom body classes
 *
 * @param array $classes Existing body classes.
 * @return array Modified body classes.
 */
function idltm_body_classes( $classes ) {
    
    // Sidebar detection
    if ( is_active_sidebar( 'sidebar-1' ) && ! is_page_template( 'page-templates/full-width.php' ) ) {
        $classes[] = 'has-sidebar';
    } else {
        $classes[] = 'no-sidebar';
    }
    
    // Post format classes
    if ( is_singular( 'post' ) ) {
        $format = get_post_format() ?: 'standard';
        $classes[] = 'post-format-' . $format;
    }
    
    // Device classes
    if ( wp_is_mobile() ) {
        $classes[] = 'mobile-device';
    } else {
        $classes[] = 'desktop-device';
    }
    
    // User role classes
    if ( is_user_logged_in() ) {
        $user = wp_get_current_user();
        $roles = ( array ) $user->roles;
        
        foreach ( $roles as $role ) {
            $classes[] = 'role-' . sanitize_html_class( $role );
        }
    } else {
        $classes[] = 'guest-user';
    }
    
    // WooCommerce specific
    if ( function_exists( 'is_woocommerce' ) ) {
        if ( is_shop() ) {
            $classes[] = 'woocommerce-shop';
        }
        
        if ( is_product() ) {
            $classes[] = 'woocommerce-product';
        }
        
        if ( is_cart() ) {
            $classes[] = 'woocommerce-cart';
        }
        
        if ( is_checkout() ) {
            $classes[] = 'woocommerce-checkout';
        }
    }
    
    return $classes;
}
add_filter( 'body_class', 'idltm_body_classes' );