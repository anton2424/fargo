<?php
/**
 * General Customizer Options
 *
 * @since 1.0.0
 */

 if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Variable
 */
$panel = 'fargo_panel_general';
$prefix = 'fargo';


// Change panel for Static Front Page
$site_title        = $wp_customize->get_section( 'static_front_page' );
$site_title->priority    = 50;


// Change Logo section
$site_logo              = $wp_customize->get_control( 'custom_logo' );
$site_logo->description = __( 'The site logo is used as a graphical representation of your company name. Recommended size: 105 (width) x 75 (height) pixels(px).', 'fargo' );
$site_logo->label       = __( 'Site logo', 'fargo' );
$site_logo->section     = $prefix . '_general_logo_section';
$site_logo->priority    = 1;

// Change site icon section
$site_icon           = $wp_customize->get_control( 'site_icon' );
$site_icon->section  = $prefix . '_general_logo_section';
$site_icon->priority = 2;




/***********************************************/
/************** GENERAL OPTIONS  ***************/
/***********************************************/


$wp_customize->add_panel( $panel, array(
	'priority'       => 1,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => __( 'General Options', 'fargo' ),

) );

/***********************************************/
/****************** Preloader  *****************/
/***********************************************/

$wp_customize->add_section( $prefix . '_preloader_section', array(
	'title'    => __( 'Preloader', 'fargo' ),
	'priority' => 2,
	'panel'    => $panel,
) );

// Enable the preloader?
$wp_customize->add_setting( $prefix . '_preloader_enables', array(
	'default'           => 0,
) );
$wp_customize->add_control(  new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_preloader_enables', array(
	'type'     => 'mte-toggle',
	'label'    => __( 'Enable the site preloader?', 'fargo' ),
	'section'  => $prefix . '_preloader_section',
	'priority' => 1,
) ) );

// Background Color
$wp_customize->add_setting( $prefix . '_preloader_background_color', array(
	'sanitize_callback' => 'fargo_sanitize_color',
	'default'           => '#ffffff',
) );
$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_preloader_background_color', array(
	'label'       => __( 'Preloader background color', 'fargo' ),
	'section'     => $prefix . '_preloader_section',
	'settings'    => $prefix . '_preloader_background_color',
	'active_callback'       => 'fargo_cac_has_preloader',
	'priority'    => 2,
) ) );

// Primary Color
$wp_customize->add_setting( $prefix . '_preloader_primary_color', array(
	'sanitize_callback' => 'fargo_sanitize_color',
	'default'           => '#f1d204',
) );
$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_preloader_primary_color', array(
	'label'       => __( 'Preloader primary color', 'fargo' ),
	'section'     => $prefix . '_preloader_section',
	'settings'    => $prefix . '_preloader_primary_color',
	'priority'    => 3,
) ) );

// Secondly Color
$wp_customize->add_setting( $prefix . '_preloader_secondly_color', array(
	'sanitize_callback' => 'fargo_sanitize_color',
	'default'           => '#ffffff',
) );
$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_preloader_secondly_color', array(
	'label'       => __( 'Preloader secondary color', 'fargo' ),
	'section'     => $prefix . '_preloader_section',
	'settings'    => $prefix . '_preloader_secondly_color',
	'priority'    => 4,
) ) );

/***********************************************/
/*********** Logo section  ************/
/***********************************************/

$wp_customize->add_section( $prefix . '_general_logo_section', array(
	'title'    => __( 'Logo', 'fargo' ),
	'priority' => 1,
	'panel'    => $panel,
) );

/***********************************************/
/*********** General Site Settings  ************/
/***********************************************/
$wp_customize->selective_refresh->add_partial( 'custom_logo', array(
    'selector' => '#header .col-sm-2 a:not(.header-logo)',
    'render_callback' => $prefix .'_custom_logo',
) );

/* Company text logo */
$wp_customize->add_setting( $prefix . '_text_logo', array(
	'sanitize_callback' => 'fargo_sanitize_html',
	'default'           => __( 'Fargo', 'fargo' ),
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( $prefix . '_text_logo', array(
	'label'       => __( 'Text logo (company name)', 'fargo' ),
	'section'     => $prefix . '_general_logo_section',
	'priority'    => 2,
) );
$wp_customize->selective_refresh->add_partial( $prefix .'_text_logo', array(
    'selector' => '#header a.header-logo',
) );


$wp_customize->add_section( $prefix . '_general_section_colors', array(
	'title'    => __( 'Colors', 'fargo' ),
	'priority' => 3,
	'panel'    => $panel,
) );

/**
 * Colors Background 
 */
$wp_customize->add_setting( $prefix . '_general_colors_bakcground', array(
    'sanitize_callback' => 'fargo_sanitize_color',
    'default'           => '#545454',
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_general_colors_bakcground', array(
    'label'    => __( 'Background Colors', 'fargo' ),
    'section'     => $prefix . '_general_section_colors',
) ) );