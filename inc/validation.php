<?php
/**
 * 
 * Savana - Ecommerce WordPress Theme
 * Data Validation Functions
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
 * Validate email address
 *
 * @param string $email Email address to validate.
 * @return bool
 */
function idltm_validate_email( $email ) {
    return is_email( $email );
}

/**
 * Validate URL
 *
 * @param string $url URL to validate.
 * @return bool
 */
function idltm_validate_url( $url ) {
    return filter_var( $url, FILTER_VALIDATE_URL ) !== false;
}

/**
 * Validate phone number
 *
 * @param string $phone Phone number to validate.
 * @return bool
 */
function idltm_validate_phone( $phone ) {
    $phone = preg_replace( '/[^0-9]/', '', $phone );
    return strlen( $phone ) >= 10 && strlen( $phone ) <= 15;
}

/**
 * Validate US zip code
 *
 * @param string $zip_code Zip code to validate.
 * @return bool
 */
function idltm_validate_us_zip_code( $zip_code ) {
    if ( empty( $zip_code ) ) {
        return false;
    }
    
    if ( 10 < strlen( trim( $zip_code ) ) ) {
        return false;
    }
    
    if ( ! preg_match( '/^\d{5}(-?\d{4})?$/', $zip_code ) ) {
        return false;
    }
    
    return true;
}

/**
 * Sanitize and validate select/dropdown input
 *
 * @param string $input User input.
 * @param array  $allowed_values Array of allowed values.
 * @return string|false Sanitized value or false if invalid.
 */
function idltm_validate_select( $input, $allowed_values ) {
    $input = sanitize_key( $input );
    
    if ( in_array( $input, $allowed_values, true ) ) {
        return $input;
    }
    
    return false;
}