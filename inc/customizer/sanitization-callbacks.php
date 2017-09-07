<?php
/**
 * Sanitization Callbacks
 * 
 * @package Fargo WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Function to sanitize checkboxes
 *
 * @param $value
 *
 * @return int
 */
function fargo_sanitize_checkbox( $value ) {
	if ( $value == 1 ) {
	return 1;
	} else {
	return 0;
	}
}

/**
 * Color sanitization callback
 *
 * @since 1.2.1
 */
function fargo_sanitize_color( $color ) {
    if ( empty( $color ) || is_array( $color ) ) {
        return '';
    }

    // If string does not start with 'rgba', then treat as hex.
	// sanitize the hex color and finally convert hex to rgba
    if ( false === strpos( $color, 'rgba' ) ) {
        return sanitize_hex_color( $color );
    }

    // By now we know the string is formatted as an rgba color so we need to further sanitize it.
    $color = str_replace( ' ', '', $color );
    sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );

    return 'rgba('.$red.','.$green.','.$blue.','.$alpha.')';
}


function illdy_sanitize_select( $input, $setting ) {
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 *  Sanitize HTML
 */
function fargo_sanitize_html( $input ) {
	$input = force_balance_tags( $input );
	$allowed_html = array(
		'a' => array(
			'href' => array(),
			'title' => array(),
			),
		'br' => array() ,
		'em' => array() ,
		'img' => array(
			'alt' => array() ,
			'src' => array() ,
			'srcset' => array() ,
			'title' => array() ,
			),
		'strong' => array() ,
		);
	$output = wp_kses($input, $allowed_html);
	return $output;
}

/**
 *  Sanitize Select
 */
function fargo_sanitize_select( $input ) {
	if ( is_numeric($input) ) {
		return intval($input);
	}
}

/**
 *  Active Callback: Is not active Contact Form 7
 */
function fargo_is_not_active_contact_form_7() {
	if ( !class_exists( 'WPCF7' ) ) {
		return true;
	} else {
		return false;
	}
}

/**
 *  Active Callback: Without Contact Form 7
 */
function fargo_have_not_contact_form_7() {
	if ( class_exists( 'WPCF7' ) ) {
		$args = array(
			'post_type' => 'wpcf7_contact_form',
			'post_status' => 'publish',
			'posts_per_page' => - 1
		);
		$posts = get_posts( $args );
		if ( count( $posts ) > 0 ) {
			return false;
		} else {
		    return true;
		}
	} else {
	    return false;
	}
}

function fargo_create_contact_tab_sections() {
	$prefix = 'fargo';
	$sections = array(
		$prefix . '_contact_us_show',
		$prefix . '_contact_us_general_title',
		$prefix . '_contact_us_entry',
		$prefix . '_contact_us_general_address_title',
		$prefix . '_contact_us_general_customer_support_title', 
		);
		
	if ( fargo_is_not_active_contact_form_7() ) {
		$sections[] = $prefix . '_contact_us_install_contact_form_7';
	} elseif (fargo_have_not_contact_form_7() ) {
	    $sections[] = $prefix . '_contact_us_create_contact_form_7';
	} else {
		$sections[] = $prefix . '_contact_us_general_contact_form_7';
	}
	return $sections;
}

/**
 *  Sanitize Radio Buttons
 */
function fargo_sanitize_radio_buttons( $input, $setting ) {
	global $wp_customize;
	$control = $wp_customize->get_control( $setting->id );
	if (array_key_exists( $input, $control->choices ) ) {
		return $input;
	}
	else {
	return $setting->default;
	}
}

function fargo_cac_has_icon_border() {
	if ( get_theme_mod( 'fargo_features_styles_icon', 1 )==3 || get_theme_mod( 'fargo_features_styles_icon', 1 )==5 ) {
		return true;
	} else {
		return false;
	}
}
function fargo_cac_has_button_border() {
	if ( get_theme_mod( 'fargo_features_styles_button', 1 )==3 ) {
		return true;
	} else {
		return false;
	}
}

function fargo_cac_has_icon_borders() {
	if ( get_theme_mod( 'fargo_features_styles_icon', 1 )!=1 ) {
		return true;
	} else {
		return false;
	}
}



function fargo_cac_has_preloader() {
	if ( get_theme_mod( 'fargo_preloader_enables', 0 )== 1 ) {
		return true;
	} else {
		return false;
	}
}


