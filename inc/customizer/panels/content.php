<?php
/**
 * Content Section Customizer Options
 *
 * @since 1.0.0
 */
 
 if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
 
/**
 * Variable
 */
$prefix = 'fargo';

/**
 * Panel
 */
$counter_panel = new Fargo_WP_Customize_Panel( $wp_customize, $prefix .'_counter_panel', array(
	'title'    => esc_html__( 'Counter', 'fargo' ),
	'priority' => 4,
	'panel'    => 'fargo_frontpage_sections_panel'
) );

$wp_customize->add_panel( $counter_panel );

/**
 * GENERAL
 */

/**
 * Section Enable
 */
$wp_customize->add_setting( $prefix . '_content_general_enable', array(
	'sanitize_callback'     => $prefix . '_sanitize_checkbox',
	'default'               => 1,
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_content_general_enable', array(
	'type'                  => 'mte-toggle',
	'label'                 => esc_html__( 'Section Enable', 'fargo' ),
	'section'               => $panel,
) ) );

/**
 * Title
 */
$wp_customize->add_setting( $prefix . '_content_general_title', array(
	'sanitize_callback'     => 'sanitize_text_field',
	'default'               => esc_html__( 'CONTENT', 'fargo' ),
	'transport'             => 'postMessage',
) );
	
$wp_customize->add_control( $prefix . '_content_general_title', array(
	'label'                 => esc_html__( 'Title', 'fargo' ),
	'section'               => $panel,
) );
	
$wp_customize->selective_refresh->add_partial( $prefix .'_content_general_title', array(
    'selector'              => '#content .section-header h2',
) );

/**
 * Sub Title
 */
$wp_customize->add_setting( $prefix . '_content_general_subtitle', array(
	'sanitize_callback'     => 'wp_kses_post',
	'default'               => esc_html__( 'This is a description for the Content section. You can set it up in the Customizer > Front Page Sections > Content.', 'fargo' ),
	'transport'             => 'postMessage',
) );
		
$wp_customize->add_control( $prefix . '_content_general_subtitle', array(
	'label'                 => esc_html__( 'Subtitle', 'fargo' ),
	'section'               => $panel,
) );

$wp_customize->selective_refresh->add_partial( $prefix .'_content_general_subtitle', array(
	'selector'              => '#content .section-header h6',
) );

/**
 * Entry
 */
$wp_customize->add_setting( $prefix .'_content_general_entry', array(
    'sanitize_callback'     => 'wp_kses_post',
    'default'               => '',
    'transport'             => 'postMessage'
) );

$wp_customize->add_control( new Epsilon_Editor_Custom_Control( $wp_customize, $prefix .'_content_general_entry', array(
    'label'                 => esc_html__( 'Entry', 'fargo' ),
    'section'               => $panel,
) ) );

$wp_customize->selective_refresh->add_partial( $prefix .'_content_general_entry', array(
    'selector'              => '#content .section-content',
) );

/**
 * SETTINGS
 */

/**
 * Full Width
 */
$wp_customize->add_setting( $prefix . '_content_settings_width', array(
	'sanitize_callback'     => $prefix . '_sanitize_checkbox',
	'default'               => 0,
	'transport'             => 'postMessage',
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_content_settings_width', array(
	'type'                  => 'mte-toggle',
	'label'                 => esc_html__( 'Full Width', 'fargo' ),
	'section'               => $panel,
) ) );

/**
 * Background Size
 */
$wp_customize->add_setting( $prefix . '_content_settings_position', array(
    'default'               => 'auto',
    'sanitize_callback'     => 'sanitize_text_field',
    'transport'             => 'postMessage',
) );

$wp_customize->add_control( $prefix . '_content_settings_position', array(
    'label'                 => esc_html__( 'Position', 'fargo' ),
    'section'               => $panel,
    'type'                  => 'select',
    'choices'               => array(
        'auto'              => esc_html__( 'Left Text Right Skill', 'fargo' ),
        'sogo'              => esc_html__( 'Right Skill Left Text', 'fargo' ),
    ),
) );

/**
 * COLORS
 */

/**
 * Background Colors
 */
$wp_customize->add_setting( $prefix . '_content_colors_background', array(
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#fff',
    'transport'             => 'postMessage',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_content_colors_background', array(
    'label'                 => esc_html__( 'Background Color', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_content_colors_background',
) ) );

/**
 * Title Colors
 */
$wp_customize->add_setting( $prefix . '_content_colors_title', array(
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#545454',
    'transport'             => 'postMessage',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_content_colors_title', array(
    'label'                 => esc_html__( 'Title Color', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_content_colors_title',
) ) );

/**
 * Sub Title Colors
 */
$wp_customize->add_setting( $prefix . '_content_colors_subtitle', array(
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#8c9597',
    'transport'             => 'postMessage',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_content_colors_subtitle', array(
    'label'                 => esc_html__( 'Description Color', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_content_colors_subtitle',
) ) );

	
/**
 * BACKGROUNDS
 */

/**
 * Background Image
 */
$wp_customize->add_setting( $prefix . '_content_backgrounds_image', array(
    'sanitize_callback'     => 'esc_url',
    'default'               => '',
    'transport'             => 'postMessage',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $prefix . '_content_backgrounds_image', array(
    'label'                 => esc_html__( 'Background Image', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_content_backgrounds_image',
) ) );

/**
 * Background Position
 */
$wp_customize->add_setting( $prefix . '_content_backgrounds_position', array(
    'default'               => 'initial',
    'sanitize_callback'     => 'sanitize_text_field',
    'transport'             => 'postMessage',
) );

$wp_customize->add_control( $prefix . '_content_backgrounds_position', array(
    'label'                 => esc_html__( 'Background Position', 'fargo' ),
    'section'               => $panel,
    'type'                  => 'select',
    'choices'               => array(
		'initial' 			=> esc_html__( 'Default', 'fargo' ),
		'top left' 			=> esc_html__( 'Top Left', 'fargo' ),
		'top center' 		=> esc_html__( 'Top Center', 'fargo' ),
		'top right'  		=> esc_html__( 'Top Right', 'fargo' ),
		'center left' 		=> esc_html__( 'Center Left', 'fargo' ),
		'center center' 	=> esc_html__( 'Center Center', 'fargo' ),
		'center right' 		=> esc_html__( 'Center Right', 'fargo' ),
		'bottom left' 		=> esc_html__( 'Bottom Left', 'fargo' ),
		'bottom center' 	=> esc_html__( 'Bottom Center', 'fargo' ),
		'bottom right' 		=> esc_html__( 'Bottom Right', 'fargo' ),
    ),
) );

/**
 * Background Size
 */
$wp_customize->add_setting( $prefix . '_content_backgrounds_size', array(
    'default'               => 'auto',
    'sanitize_callback'     => 'sanitize_text_field',
    'transport'             => 'postMessage',
) );

$wp_customize->add_control( $prefix . '_content_backgrounds_size', array(
    'label'                 => esc_html__( 'Background Size', 'fargo' ),
    'section'               => $panel,
    'type'                  => 'select',
    'choices'               => array(
        'auto'              => esc_html__( 'Default', 'fargo' ),
        'contain'           => esc_html__( 'Fit to Screen', 'fargo' ),
        'cover'             => esc_html__( 'Fill Screen', 'fargo' ),
    ),
) );

/**
 * Background Repeat
 */
$wp_customize->add_setting( $prefix . '_content_backgrounds_repeat', array(
    'default'               => 'initial',
    'sanitize_callback'     => 'sanitize_text_field',
    'transport'             => 'postMessage',
) );

$wp_customize->add_control( $prefix . '_content_backgrounds_repeat', array(
    'label'                 => esc_html__( 'Background Repeat', 'fargo' ),
    'section'               => $panel,
    'type'                  => 'select',
    'choices'               => array(
	    'initial' 	        => esc_html__( 'Default', 'fargo' ),
		'no-repeat'         => esc_html__( 'No-repeat', 'fargo' ),
		'repeat' 	        => esc_html__( 'Repeat', 'fargo' ),
		'repeat-x'       	=> esc_html__( 'Repeat-x', 'fargo' ),
		'repeat-y' 	        => esc_html__( 'Repeat-y', 'fargo' ),
    ),
) );

/**
 * Background Attachment
 */
$wp_customize->add_setting( $prefix . '_content_backgrounds_attachment', array(
    'default' => 'initial',
    'sanitize_callback'     => 'sanitize_text_field',
    'transport'             => 'postMessage',
) );

$wp_customize->add_control( $prefix . '_content_backgrounds_attachment', array(
    'label'                 => esc_html__( 'Background Attachment', 'fargo' ),
    'section'               => $panel,
    'type'                  => 'select',
    'choices'               => array(
		'initial' 	        => esc_html__( 'Default', 'fargo' ),
		'scroll' 	        => esc_html__( 'Scroll', 'fargo' ),
		'fixed' 	        => esc_html__( 'Fixed', 'fargo' )
    ),
) );