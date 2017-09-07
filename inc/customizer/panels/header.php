<?php
/**
 * Header Customizer Options
 *
 * @since 1.0.0
 */

 if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Variable
 */ 
$panel  = 'fargo_panel_header';
$prefix = 'fargo';

/**
 * Panel
 */
$wp_customize->add_panel( $panel, array(
	'priority'            => 17,
	'capability'          => 'edit_theme_options',
	'theme_supports'      => '',
	'title'               => esc_html__( 'Header', 'fargo' ),
) );

/**
 * Header Top Bar
 */
$wp_customize->add_section( $prefix . '_section_header_top', array(
	'title'                 => esc_html__( 'Top Bar', 'fargo' ),
	'priority'              => 1,
	'panel'                 => $panel,
) );

/**
 * Header Top Bar Enable
 */
$wp_customize->add_setting( $prefix . '_header_top_general_enable', array(
	'sanitize_callback'     => $prefix . '_sanitize_checkbox',
	'default'               => 0,
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_header_top_general_enable', array(
	'type'                  => 'mte-toggle',
	'label'                 => esc_html__( 'Enable Top Bar', 'fargo' ),
	'section'               => $prefix . '_section_header_top',
) ) );

/**
 * Header Top Bar Full Width
 */
$wp_customize->add_setting( $prefix . '_header_top_general_width', array(
	'sanitize_callback'     => $prefix . '_sanitize_checkbox',
	'default'               => 0,
	'transport'             => 'postMessage',
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_header_top_general_width', array(
	'type'                  => 'mte-toggle',
	'label'                 => esc_html__( 'Full Width', 'fargo' ),
	'section'               => $prefix . '_section_header_top',
) ) );

/**
 * Header Top Bar Full Width
 */
$wp_customize->add_setting( $prefix . '_header_top_general_fixed', array(
	'sanitize_callback'     => $prefix . '_sanitize_checkbox',
	'default'               => 0,
	'transport'             => 'postMessage',
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_header_top_general_fixed', array(
	'type'                  => 'mte-toggle',
	'label'                 => esc_html__( 'Fixed Bar', 'fargo' ),
	'section'               => $prefix . '_section_header_top',
) ) );

/**
 * Header Top Bar Full Width
 */
$wp_customize->add_setting( $prefix . '_header_top_general_width', array(
	'sanitize_callback'     => $prefix . '_sanitize_checkbox',
	'default'               => 1,
	'transport'             => 'postMessage',
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_header_top_general_width', array(
	'type'                  => 'mte-toggle',
	'label'                 => esc_html__( 'Full Width', 'fargo' ),
	'section'               => $prefix . '_section_header_top',
) ) );

/**
 * Header Top Bar Background Color
 */
$wp_customize->add_setting( $prefix . '_header_top_colors_background', array(
    'sanitize_callback'     => 'sanitize_hex_color',
    'default'               => '#ffffff',
    'transport'             => 'postMessage',
) );

$wp_customize->add_control( new fargo_Customizer_Color_Control( $wp_customize, $prefix . '_header_top_colors_background', array(
    'label'                 => esc_html__( 'Background Color', 'fargo' ),
    'section'               => $prefix . '_section_header_top',
) ) );

/**
 * Header Top Bar link Color
 */
$wp_customize->add_setting( $prefix . '_header_top_colors_link', array(
    'sanitize_callback'     => 'sanitize_hex_color',
    'default'               => '#ffffff',
    'transport'             => 'postMessage',
) );

$wp_customize->add_control( new fargo_Customizer_Color_Control( $wp_customize, $prefix . '_header_top_colors_link', array(
    'label'                 => esc_html__( 'Link Color', 'fargo' ),
    'section'               => $prefix . '_section_header_top',
) ) );

/**
 * Header Top Bar Link Color: Hover 
 */
$wp_customize->add_setting( $prefix . '_header_top_colors_link_hover', array(
    'sanitize_callback'     => 'sanitize_hex_color',
    'default'               => '#ffffff',
    'transport'             => 'postMessage',
) );

$wp_customize->add_control( new fargo_Customizer_Color_Control( $wp_customize, $prefix . '_header_top_colors_link_hover', array(
    'label'                 => esc_html__( 'Link Color: Hover', 'fargo' ),
    'section'               => $prefix . '_section_header_top',
) ) );

/**
 * Header Main Menu
 */
$wp_customize->add_section( $prefix . '_section_header_main', array(
	'title'                 => esc_html__( 'Main Menu', 'fargo' ),
	'priority'              => 2,
	'panel'                 => $panel,
) );

/**
 * Header Main Menu Enable
 */
$wp_customize->add_setting( $prefix . '_header_main_general_enable', array(
	'sanitize_callback'     => $prefix . '_sanitize_checkbox',
	'default'               => 1,
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_header_main_general_enable', array(
	'type'                  => 'mte-toggle',
	'label'                 => esc_html__( 'Enable Main Menu', 'fargo' ),
	'section'               => $prefix . '_section_header_main',
) ) );

/**
 * Header Main Menu Sticky
 */
$wp_customize->add_setting( $prefix . '_header_main_general_sticky', array(
	'sanitize_callback'     => $prefix . '_sanitize_checkbox',
	'default'               => 0,
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_header_main_general_sticky', array(
	'type'                  => 'mte-toggle',
	'label'                 => esc_html__( 'Sticky Menu', 'fargo' ),
	'section'               => $prefix . '_section_header_main',
) ) );

/**
 * Header Main Menu Full Width
 */
$wp_customize->add_setting( $prefix . '_header_main_general_width', array(
	'sanitize_callback'     => $prefix . '_sanitize_checkbox',
	'default'               => 0,
	'transport'             => 'postMessage',
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_header_main_general_width', array(
	'type'                  => 'mte-toggle',
	'label'                 => esc_html__( 'Full Width', 'fargo' ),
	'section'               => $prefix . '_section_header_main',
) ) );

/**
 * Header Main Menu Search
 */
$wp_customize->add_setting( $prefix . '_header_main_general_search', array(
	'sanitize_callback'     => $prefix . '_sanitize_checkbox',
	'default'               => 1,
	'transport'             => 'postMessage',
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_header_main_general_search', array(
	'type'                  => 'mte-toggle',
	'label'                 => esc_html__( 'Enable Search', 'fargo' ),
	'section'               => $prefix . '_section_header_main',
) ) );

/**
 * Header Main Menu Cart
 */
$wp_customize->add_setting( $prefix . '_header_main_general_cart', array(
	'sanitize_callback'     => $prefix . '_sanitize_checkbox',
	'default'               => 1,
	'transport'             => 'postMessage',
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_header_main_general_cart', array(
	'type'                  => 'mte-toggle',
	'label'                 => esc_html__( 'Enable Cart', 'fargo' ),
	'section'               => $prefix . '_section_header_main',
) ) );

/**
 * Header Main Menu Style
 */
$wp_customize->add_setting( $prefix . '_header_main_general_transparent', array(
	'sanitize_callback'     => $prefix . '_sanitize_checkbox',
	'default'               => 0,
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_header_main_general_transparent', array(
	'type'                  => 'mte-toggle',
	'label'                 => esc_html__( 'Enable Transparent', 'fargo' ),
	'section'               => $prefix . '_section_header_main',
) ) );

/**
 * Header Main Menu Background Color
 */
$wp_customize->add_setting( $prefix . '_header_main_colors_background', array(
    'sanitize_callback'     => 'sanitize_hex_color',
    'default'               => '#ffffff',
    'transport'             => 'postMessage',
) );

$wp_customize->add_control( new fargo_Customizer_Color_Control( $wp_customize, $prefix . '_header_main_colors_background', array(
    'label'                 => esc_html__( 'Background Color', 'fargo' ),
    'section'               => $prefix . '_section_header_main',
) ) );

/**
 * Header Main Menu link Color
 */
$wp_customize->add_setting( $prefix . '_header_main_colors_link', array(
    'sanitize_callback'     => 'sanitize_hex_color',
    'default'               => '#ffffff',
    'transport'             => 'postMessage',
) );

$wp_customize->add_control( new fargo_Customizer_Color_Control( $wp_customize, $prefix . '_header_main_colors_link', array(
    'label'                 => esc_html__( 'Link Color', 'fargo' ),
    'section'               => $prefix . '_section_header_main',
) ) );

/**
 * Header Main Menu Link Color: Hover 
 */
$wp_customize->add_setting( $prefix . '_header_main_colors_link_hover', array(
    'sanitize_callback'     => 'sanitize_hex_color',
    'default'               => '#ffffff',
    'transport'             => 'postMessage',
) );

$wp_customize->add_control( new fargo_Customizer_Color_Control( $wp_customize, $prefix . '_header_main_colors_link_hover', array(
    'label'                 => esc_html__( 'Link Color: Hover', 'fargo' ),
    'section'               => $prefix . '_section_header_main',
) ) );


