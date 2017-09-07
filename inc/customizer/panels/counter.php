<?php
/**
 * Counter Section Customizer Options
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
$wp_customize->add_section( $prefix .'_counter_general_section', array(
	'title'    => __( 'General', 'fargo' ),
	'priority' => 1,
	'panel'    => $prefix . '_counter_panel',
) );

/**
 * Section Enable
 */
$wp_customize->add_setting( $prefix . '_counter_general_enable', array(
	'sanitize_callback'     => 'fargo_sanitize_checkbox',
	'default'               => 1,
) );

$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_counter_general_enable', array(
	'type'                  => 'mte-toggle',
	'label'                 => esc_html__( 'Section Enable', 'fargo' ),
	'section'               => $prefix . '_counter_general_section',
	'settings'              => $prefix . '_counter_general_enable',
) ) );

/**
 * Title
 */
$wp_customize->add_setting( $prefix .'_counter_general_title', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_html',
    'default'               => esc_html__( 'COUNTER', 'fargo' ),
) );

$wp_customize->add_control( $prefix .'_counter_general_title', array(
    'label'                 => esc_html__( 'Title', 'fargo' ),
    'section'               => $prefix . '_counter_general_section',
	'settings'              => $prefix . '_counter_general_title',
) );

$wp_customize->selective_refresh->add_partial( $prefix .'_counter_general_title', array(
    'selector'              => '#counter .section-header h2',
) );

/**
 * Sub Title
 */
$wp_customize->add_setting( $prefix .'_counter_general_subtitle', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_html',
    'default'               => esc_html__( 'This is a description for the Counter section. You can set it up in the Customizer > Front Page Sections > Counter and add items by clicking on Add or edit Counter.', 'fargo' ),
) );

$wp_customize->add_control( $prefix .'_counter_general_subtitle', array(
    'label'                 => esc_html__( 'Subtitle', 'fargo' ),
    'section'               => $prefix . '_counter_general_section',
	'settings'              => $prefix . '_counter_general_subtitle',
) );

$wp_customize->selective_refresh->add_partial( $prefix .'_counter_general_subtitle', array(
    'selector'              => '#counter .section-header h5',
) );

/**
 * General Content
 */		
$wp_customize->add_setting( $prefix . '_counter_general_content', array(
	'transport'             => $selective_refresh ? 'postMessage' : 'refresh',
) );

$hestia_counter_content_control = $wp_customize->get_setting( $prefix .'_counter_general_content' );

if ( ! empty( $hestia_counter_content_control ) ) {
	$hestia_counter_content_control->default = json_encode( array( 
		array(
			'icon_value' => 'fa-wechat',
			'title'      => __( '185567', 'fargo' ),
			'text'       => __( 'Lines Of Code', 'fargo' ),
			'color'      => '#fff',
		),
		array(
			'icon_value' => 'fa-check',
			'title'      => __( '360', 'fargo' ),
			'text'       => __( 'Cups Of Coffee', 'fargo' ),
			'color'      => '#fff',
		),
		array(
			'icon_value' => 'fa-support',
			'title'      => __( '80', 'fargo' ),
			'text'       => __( 'Years In Business', 'fargo' ),
			'color'      => '#fff',
		),
		array(
			'icon_value' => 'fa-wechat',
			'title'      => __( '90', 'fargo' ),
			'text'       => __( 'Customer Satisfaction', 'fargo' ),
			'color'      => '#fff',
		),
	) );
}
	
$wp_customize->add_control( new Fargo_Repeater( $wp_customize, $prefix . '_counter_general_content', array(
	'label'                             => esc_html__( 'Counter Content', 'fargo' ),
	'section'                           => $prefix . '_counter_general_section',
	'add_field_label'                   => esc_html__( 'Add counter', 'fargo' ),
	'item_name'                         => esc_html__( 'Counter', 'fargo' ),
	'customizer_repeater_icon_control'  => true,
	'customizer_repeater_title_control' => true,
	'customizer_repeater_text_control'  => true,
	'customizer_repeater_color_control' => true,
) ) );
			
function hestia_counter_content_callback() {
	$hestia_counter_content = get_theme_mod( $prefix . '_counter_general_content' );
	hestia_counter_content( $hestia_counter_content, true );
}


/**
 * SETTINGS
 */
$wp_customize->add_section( $prefix .'_counter_settings_section', array(
	'title'    => __( 'Settings', 'fargo' ),
	'priority' => 2,
	'panel'    => $prefix . '_counter_panel',
) );

/**
 * Full Width
 */
$wp_customize->add_setting( $prefix . '_counter_settings_width', array(
	'transport'             => 'postMessage',
	'sanitize_callback'     => 'fargo_sanitize_checkbox',
	'default'               => 0,
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_counter_settings_width', array(
	'type'                  => 'mte-toggle',
	'label'                 => esc_html__( 'Full Width', 'fargo' ),
	'section'               => $prefix . '_counter_settings_section',
	'settings'              => $prefix . '_counter_settings_width',
) ) );
 
/**
 * Layout
 */
$wp_customize->add_setting( $prefix .'_counter_settings_layout', array(
    'default'               => 3,
) );

$wp_customize->add_control( new Fargo_Customizer_Range_Control( $wp_customize, $prefix .'_counter_settings_layout', array(
    'label'                 => esc_html__( 'Layouts', 'fargo' ),
	'section'               => $prefix . '_counter_settings_section',
	'settings'              => $prefix . '_counter_settings_layout',
    'choices'               => array(
        'min'               => 1,
        'max'               => 5,
        'step'              => 1,
    ),
) ) );


/**
 * COLORS
 */
$wp_customize->add_section( $prefix .'_counter_colors_section', array(
	'title'    => __( 'Colors', 'fargo' ),
	'priority' => 3,
	'panel'    => $prefix . '_counter_panel',
) );

/**
 * Background Color
 */
$wp_customize->add_setting( $prefix . '_counter_colors_background', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_counter_colors_background', array(
    'label'                 => esc_html__( 'Background Color', 'fargo' ),
    'section'               => $prefix . '_counter_colors_section',
    'settings'              => $prefix . '_counter_colors_background',
) ) );

/**
 * Title Color
 */
$wp_customize->add_setting( $prefix . '_counter_colors_title', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_counter_colors_title', array(
    'label'                 => esc_html__( 'Title Color', 'fargo' ),
    'section'               => $prefix . '_counter_colors_section',
    'settings'              => $prefix . '_counter_colors_title',
) ) );

/**
 * Sub Title Color
 */
$wp_customize->add_setting( $prefix . '_counter_colors_subtitle', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_counter_colors_subtitle', array(
    'label'                 => esc_html__( 'Subtitle Color', 'fargo' ),
    'section'               => $prefix . '_counter_colors_section',
    'settings'              => $prefix . '_counter_colors_subtitle',
) ) );


/**
 * BACKGROUNDS
 */
$wp_customize->add_section( $prefix .'_counter_backgrounds_section', array(
	'title'    => __( 'Backgrounds', 'fargo' ),
	'priority' => 4,
	'panel'    => $prefix . '_counter_panel',
) );

/**
 * Background Image
 */
$wp_customize->add_setting( $prefix . '_counter_backgrounds_image', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'esc_url',
	'default'               => '',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $prefix . '_counter_backgrounds_image', array(
    'label'                 => esc_html__( 'Background Image', 'fargo' ),
    'section'               => $prefix . '_counter_backgrounds_section',
    'settings'              => $prefix . '_counter_backgrounds_image',
) ) );

/**
 * Background Position
 */
$wp_customize->add_setting( $prefix . '_counter_backgrounds_position', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'sanitize_text_field',
	'default'               => 'initial',
) );

$wp_customize->add_control( $prefix . '_counter_backgrounds_position', array(
    'label'                 => esc_html__( 'Background Position', 'fargo' ),
	'type'                  => 'select',
    'section'               => $prefix . '_counter_backgrounds_section',
	'settings'              => $prefix . '_counter_backgrounds_position',
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
$wp_customize->add_setting( $prefix . '_counter_backgrounds_size', array(
	'transport'             => 'postMessage',
    'sanitize_callback'     => 'sanitize_text_field',
	'default'               => 'auto',
) );

$wp_customize->add_control( $prefix . '_counter_backgrounds_size', array(
    'label'      		    => esc_html__( 'Background Size', 'fargo' ),
	'type'                  => 'select',
    'section'               => $prefix . '_counter_backgrounds_section',
	'settings'              => $prefix . '_counter_backgrounds_size',
    'choices'               => array(
        'auto'              => esc_html__( 'Default', 'fargo' ),
        'contain'           => esc_html__( 'Fit to Screen', 'fargo' ),
        'cover'             => esc_html__( 'Fill Screen', 'fargo' ),
    ),
) );

/**
 * Background Repeat
 */
$wp_customize->add_setting( $prefix . '_counter_backgrounds_repeat', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'sanitize_text_field',
	'default'               => 'initial',
) );

$wp_customize->add_control( $prefix . '_counter_backgrounds_repeat', array(
    'label'     		    => esc_html__( 'Background Repeat', 'fargo' ),
	'type'                  => 'select',
    'section'               => $prefix . '_counter_backgrounds_section',
	'settings'              => $prefix . '_counter_backgrounds_repeat',
    'choices'               => array(
	    'initial'        	=> esc_html__( 'Default', 'fargo' ),
		'no-repeat'         => esc_html__( 'No-repeat', 'fargo' ),
		'repeat' 	        => esc_html__( 'Repeat', 'fargo' ),
		'repeat-x'      	=> esc_html__( 'Repeat-x', 'fargo' ),
		'repeat-y'      	=> esc_html__( 'Repeat-y', 'fargo' ),
    ),
) );

/**
 * Background Attachment
 */
$wp_customize->add_setting( $prefix . '_counter_backgrounds_attachment', array(
    'transport'        		=> 'postMessage',
    'sanitize_callback' 	=> 'sanitize_text_field',
	'default'               => 'initial',
) );

$wp_customize->add_control( $prefix . '_counter_backgrounds_attachment', array(
    'label'                 => esc_html__( 'Background Attachment', 'fargo' ),
	'type'                  => 'select',
    'section'               => $prefix . '_counter_backgrounds_section',
	'settings'              => $prefix . '_counter_backgrounds_attachment',
    'choices'               => array(
		'initial'         	=> esc_html__( 'Default', 'fargo' ),
		'scroll' 	        => esc_html__( 'Scroll', 'fargo' ),
		'fixed' 	        => esc_html__( 'Fixed', 'fargo' )
    ),
) );

/**
 * Background Overlay Enable
 */
$wp_customize->add_setting( $prefix . '_counter_backgrounds_overlay', array(
    'transport'             => 'postMessage',
	'sanitize_callback'     => 'fargo_sanitize_checkbox',
	'default'               => 0,
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_counter_backgrounds_overlay', array(
	'label'                 => esc_html__( 'Overlay Enable', 'fargo' ),
	'type'                  => 'mte-toggle',
	'section'               => $prefix . '_counter_backgrounds_section',
	'settings'              => $prefix . '_counter_backgrounds_overlay',
) ) );

/**
 * Background Overlay Color
 */
$wp_customize->add_setting( $prefix . '_counter_backgrounds_overlay_color', array(
    'transport'             => 'postMessage',
	'sanitize_callback'     => 'fargo_sanitize_color',
	'default'               => '#ffffff',		
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_counter_backgrounds_overlay_color', array(
    'label'                 => esc_html__( 'Overlay Color', 'fargo' ),
    'section'               => $prefix . '_counter_backgrounds_section',
    'settings'              => $prefix . '_counter_backgrounds_overlay_color',
) ) );