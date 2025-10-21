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
 * WooCommerce setup
 */
function idltm_woocommerce_setup() {
    add_theme_support(
        'woocommerce',
        array(
            'thumbnail_image_width' => 300,
            'single_image_width'    => 600,
            'product_grid'          => array(
                'default_rows'    => 3,
                'min_rows'        => 2,
                'max_rows'        => 8,
                'default_columns' => 3,
                'min_columns'     => 2,
                'max_columns'     => 5,
            ),
        )
    );
    
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'idltm_woocommerce_setup' );

/**
 * Remove default WooCommerce wrapper
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

/**
 * Add custom WooCommerce wrapper
 */
function idltm_woocommerce_wrapper_start() {
    echo '<main id="primary" class="site-main woocommerce-page"><div class="container"><div class="content-wrapper"><div class="content-area">';
}
add_action( 'woocommerce_before_main_content', 'idltm_woocommerce_wrapper_start', 10 );

function idltm_woocommerce_wrapper_end() {
    echo '</div>';
    if ( is_active_sidebar( 'shop-sidebar' ) ) {
        echo '<aside id="secondary" class="widget-area shop-sidebar">';
        dynamic_sidebar( 'shop-sidebar' );
        echo '</aside>';
    }
    echo '</div></div></main>';
}
add_action( 'woocommerce_after_main_content', 'idltm_woocommerce_wrapper_end', 10 );

/**
 * Change number of products per page
 */
function idltm_products_per_page() {
    return 12;
}
add_filter( 'loop_shop_per_page', 'idltm_products_per_page', 20 );

/**
 * Change number of related products
 */
function idltm_related_products_args( $args ) {
    $args['posts_per_page'] = 4;
    $args['columns']        = 4;
    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'idltm_related_products_args' );

/**
 * Update cart count via AJAX
 */
function idltm_update_cart_count() {
    if ( class_exists( 'WooCommerce' ) ) {
        echo WC()->cart->get_cart_contents_count();
    }
    wp_die();
}
add_action( 'wp_ajax_idltm_update_cart_count', 'idltm_update_cart_count' );
add_action( 'wp_ajax_nopriv_idltm_update_cart_count', 'idltm_update_cart_count' );

/**
 * Add cart count to fragments
 */
function idltm_add_to_cart_fragment( $fragments ) {
    ob_start();
    ?>
    <span class="cart-count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
    <?php
    $fragments['.cart-count'] = ob_get_clean();
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'idltm_add_to_cart_fragment' );