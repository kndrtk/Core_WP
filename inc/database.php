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
 * Get posts by custom meta value
 * Example of proper $wpdb usage with prepare()
 *
 * @param string $meta_key   Meta key to search.
 * @param mixed  $meta_value Meta value to match.
 * @param int    $limit      Number of posts to retrieve.
 * @return array Posts array.
 */
function idltm_get_posts_by_meta( $meta_key, $meta_value, $limit = 10 ) {
    global $wpdb;
    
    // Validate inputs
    $meta_key   = sanitize_key( $meta_key );
    $meta_value = sanitize_text_field( $meta_value );
    $limit      = absint( $limit );
    
    if ( empty( $meta_key ) || $limit < 1 ) {
        return array();
    }
    
    // Prepare and execute query
    $results = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT p.*, pm.meta_value 
            FROM {$wpdb->posts} p
            INNER JOIN {$wpdb->postmeta} pm ON p.ID = pm.post_id
            WHERE pm.meta_key = %s 
            AND pm.meta_value = %s
            AND p.post_status = %s
            AND p.post_type = %s
            LIMIT %d",
            $meta_key,
            $meta_value,
            'publish',
            'post',
            $limit
        )
    );
    
    return $results;
}

/**
 * Search posts by keyword using LIKE
 *
 * @param string $keyword Search keyword.
 * @return array Posts array.
 */
function idltm_search_posts( $keyword ) {
    global $wpdb;
    
    // Sanitize and prepare for LIKE
    $search = '%' . $wpdb->esc_like( sanitize_text_field( $keyword ) ) . '%';
    
    $results = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * FROM {$wpdb->posts} 
            WHERE (post_title LIKE %s OR post_content LIKE %s)
            AND post_status = %s
            AND post_type = %s
            ORDER BY post_date DESC
            LIMIT 20",
            $search,
            $search,
            'publish',
            'post'
        )
    );
    
    return $results;
}

/**
 * Get posts by multiple IDs
 *
 * @param array $post_ids Array of post IDs.
 * @return array Posts array.
 */
function idltm_get_posts_by_ids( $post_ids ) {
    global $wpdb;
    
    // Validate all IDs are integers
    $post_ids = array_map( 'absint', $post_ids );
    $post_ids = array_filter( $post_ids );
    
    if ( empty( $post_ids ) ) {
        return array();
    }
    
    // Create placeholders for IN clause
    $placeholders = implode( ', ', array_fill( 0, count( $post_ids ), '%d' ) );
    
    $results = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * FROM {$wpdb->posts} 
            WHERE ID IN ($placeholders)
            AND post_status = %s",
            array_merge( $post_ids, array( 'publish' ) )
        )
    );
    
    return $results;
}