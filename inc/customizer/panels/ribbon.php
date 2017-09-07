<?php
/**
 * Ribbon Section Customizer Options
 *
 * @since 1.0.0
 */
 
 if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
 
/**
 * Variable
 */
$panel  = 'fargo_panel_ribbon';
$prefix = 'fargo';

/**
 * Panel
 */
$wp_customize->add_section( $panel, array(
	'priority'              => fargo_get_section_position( $panel ),
	'capability'            => 'edit_theme_options',
	'theme_supports'        => '',
	'title'                 => esc_html__( 'Ribbon', 'fargo' ),
	'panel'			        => 'fargo_frontpage_panel'
) );

/**
 * Tabs
 */
$wp_customize->add_setting( $prefix . '_ribbon_tab', array(
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    )
);

$wp_customize->add_control( new Fargo_Customizer_Tab_Control( $wp_customize, $prefix . '_ribbon_tab', array(
    'type'                  => 'epsilon-tab',
    'section'               => $panel,
    'buttons'               => array(
		array(
            'name'          => esc_html__( 'General', 'fargo' ),
            'fields'        => array(
				$prefix . '_ribbon_general_enable',
			    $prefix . '_ribbon_general_description',
				$prefix . '_ribbon_general_button_title',
				$prefix . '_ribbon_general_button_title_url',
            ),
            'active'        => true
        ),
		array(
            'name'          => esc_html__( 'Settings', 'fargo' ),
            'fields'        => array(
                $prefix . '_ribbon_settings_width',
				$prefix . '_ribbon_settings_button_window',
            ),
        ),
        array(
            'name'          => esc_html__( 'Colors', 'fargo' ),
            'fields'        => array(
                $prefix . '_ribbon_colors_background',
                $prefix . '_ribbon_colors_desctiption',
			    $prefix . '_ribbon_colors_button',
				$prefix . '_ribbon_colors_button_hover',
				$prefix . '_ribbon_colors_button_text',
				$prefix . '_ribbon_colors_button_text_hover',
            ),
        ),
        array(
            'name'          => esc_html__( 'Backgrounds', 'fargo' ),
            'fields'        => array(
                $prefix . '_ribbon_backgrounds_image',
                $prefix . '_ribbon_backgrounds_position',
			    $prefix . '_ribbon_backgrounds_size',
                $prefix . '_ribbon_backgrounds_repeat',
                $prefix . '_ribbon_backgrounds_attachment', 
				$prefix . '_ribbon_backgrounds_overlay',
				$prefix . '_ribbon_backgrounds_overlay_color', 				
            ),
        ),  
	),
) ) );

/**
 * GENERAL
 */

/**
 * Section Enable
 */
$wp_customize->add_setting( $prefix . '_ribbon_general_enable', array(
	'sanitize_callback'     => $prefix . '_sanitize_checkbox',
	'default'               => 1,
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_ribbon_general_enable', array(
	'type'                  => 'mte-toggle',
	'label'                 => esc_html__( 'Section Enable', 'fargo' ),
	'section'               => $panel,
) ) );

/**
 * Description
 */
$wp_customize->add_setting( $prefix .'_ribbon_general_description',
    array(
        'sanitize_callback' => 'wp_kses_post',
        'default'           => '12',
        'transport'         => 'postMessage'
    )
);

$wp_customize->add_control( new Epsilon_Editor_Custom_Control( $wp_customize, $prefix .'_ribbon_general_description', array(
	'label'         => esc_html__( 'Description', 'fargo' ),
	'section'       => $panel,
) ) );

$wp_customize->selective_refresh->add_partial( $prefix .'_ribbon_general_entry', array(
    'selector' => '#ribbon .section-header .section-description',
) );

/**
 * Button Title
 */
$wp_customize->add_setting( $prefix . '_ribbon_general_button_title', array(
	'sanitize_callback'     => 'wp_kses_post',
	'default'               => esc_html__( 'Download', 'fargo' ),
	'transport'             => 'postMessage',
) );
		
$wp_customize->add_control( $prefix . '_ribbon_general_button_title', array(
	'label'                 => esc_html__( 'Button Title', 'fargo' ),
	'section'               => $panel,
) );

$wp_customize->selective_refresh->add_partial( $prefix .'_ribbon_general_button_title', array(
	'selector'              => '#ribbon .section-header h6',
) );

/**
 * Button Title Url
 */
$wp_customize->add_setting( $prefix . '_ribbon_general_button_title_url', array(
	'sanitize_callback'     => 'wp_kses_post',
	'default'               => esc_html__( '#', 'fargo' ),
	'transport'             => 'postMessage',
) );
		
$wp_customize->add_control( $prefix . '_ribbon_general_button_title_url', array(
	'label'                 => esc_html__( 'Button Title URL', 'fargo' ),
	'section'               => $panel,
) );

/**
 * SETTINGS
 */

/**
 * Full Width
 */
$wp_customize->add_setting( $prefix . '_ribbon_settings_width', array(
	'sanitize_callback'     => $prefix . '_sanitize_checkbox',
	'default'               => 0,
	'transport'             => 'postMessage',
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_ribbon_settings_width', array(
	'type'                  => 'mte-toggle',
	'label'                 => esc_html__( 'Full Width', 'fargo' ),
	'section'               => $panel,
) ) );

/**
 *  Button New Windows
 */
$wp_customize->add_setting( $prefix . '_ribbon_settings_button_window', array(
	'transport'             => 'postMessage',
	'sanitize_callback'     => 'fargo_sanitize_checkbox',
	'default'               => 0,
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_ribbon_settings_button_window', array(
	'type'                  => 'mte-toggle',
	'label'                 => esc_html__( 'Button New Windows', 'fargo' ),
	'section'               => $panel,
	'settings'              => $prefix . '_ribbon_settings_button_window',
) ) );


/**
 * COLORS
 */

/**
 * Background Color
 */
$wp_customize->add_setting( $prefix . '_ribbon_colors_background', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
	'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_ribbon_colors_background', array(
    'label'                 => esc_html__( 'Background Color', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_ribbon_colors_background',
) ) );

/**
 * Desctiption Color
 */
$wp_customize->add_setting( $prefix . '_ribbon_colors_desctiption', array(
    'transport'             => 'postMessage',
	'sanitize_callback'     => 'fargo_sanitize_color',
	'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_ribbon_colors_desctiption', array(
    'label'                 => esc_html__( 'Desctiption Color', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_ribbon_colors_desctiption',
) ) );


/**
 * Button Background Color
 */
$wp_customize->add_setting( $prefix . '_ribbon_colors_button', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
	'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_ribbon_colors_button', array(
    'label'                 => esc_html__( 'Button Background Color', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_ribbon_colors_button',
) ) );

/**
 * Button Background Color: Hover
 */
$wp_customize->add_setting( $prefix . '_ribbon_colors_button_hover', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
	'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_ribbon_colors_button_hover', array(
    'label'                 => esc_html__( 'Button Background Color: Hover', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_ribbon_colors_button_hover',
) ) );

/**
 * Button Text Color
 */
$wp_customize->add_setting( $prefix . '_ribbon_colors_button_text', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_ribbon_colors_button_text', array(
    'label'                 => esc_html__( 'Button Text Color', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_ribbon_colors_button_text',
) ) );

/**
 * Button Text Color: Hover
 */
$wp_customize->add_setting( $prefix . '_ribbon_colors_button_text_hover', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_ribbon_colors_button_text_hover', array(
    'label'                 => esc_html__( 'Button Text Color: Hover', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_ribbon_colors_button_text_hover',
) ) );
	
/**
 * BACKGROUNDS
 */

/**
 * Background Image
 */
$wp_customize->add_setting( $prefix . '_ribbon_backgrounds_image', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'esc_url',
	'default'               => '',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $prefix . '_ribbon_backgrounds_image', array(
    'label'                 => esc_html__( 'Background Image', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_ribbon_backgrounds_image',
) ) );

/**
 * Background Position
 */
$wp_customize->add_setting( $prefix . '_ribbon_backgrounds_position', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'sanitize_text_field',
	'default'               => 'initial',
) );

$wp_customize->add_control( $prefix . '_ribbon_backgrounds_position', array(
    'label'                 => esc_html__( 'Background Position', 'fargo' ),
	'type'                  => 'select',
    'section'               => $panel,
	'settings'              => $prefix . '_ribbon_backgrounds_position',
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
$wp_customize->add_setting( $prefix . '_ribbon_backgrounds_size', array(
	'transport'             => 'postMessage',
    'sanitize_callback'     => 'sanitize_text_field',
	'default'               => 'auto',
) );

$wp_customize->add_control( $prefix . '_ribbon_backgrounds_size', array(
    'label'      		    => esc_html__( 'Background Size', 'fargo' ),
	'type'                  => 'select',
    'section'               => $panel,
	'settings'              => $prefix . '_ribbon_backgrounds_size',
    'choices'               => array(
        'auto'              => esc_html__( 'Default', 'fargo' ),
        'contain'           => esc_html__( 'Fit to Screen', 'fargo' ),
        'cover'             => esc_html__( 'Fill Screen', 'fargo' ),
    ),
) );

/**
 * Background Repeat
 */
$wp_customize->add_setting( $prefix . '_ribbon_backgrounds_repeat', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'sanitize_text_field',
	'default'               => 'initial',
) );

$wp_customize->add_control( $prefix . '_ribbon_backgrounds_repeat', array(
    'label'     		    => esc_html__( 'Background Repeat', 'fargo' ),
	'type'                  => 'select',
    'section'               => $panel,
	'settings'              => $prefix . '_ribbon_backgrounds_repeat',
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
$wp_customize->add_setting( $prefix . '_ribbon_backgrounds_attachment', array(
    'transport'        		=> 'postMessage',
    'sanitize_callback' 	=> 'sanitize_text_field',
	'default'               => 'initial',
) );

$wp_customize->add_control( $prefix . '_ribbon_backgrounds_attachment', array(
    'label'                 => esc_html__( 'Background Attachment', 'fargo' ),
	'type'                  => 'select',
    'section'               => $panel,
	'settings'              => $prefix . '_ribbon_backgrounds_attachment',
    'choices'               => array(
		'initial'         	=> esc_html__( 'Default', 'fargo' ),
		'scroll' 	        => esc_html__( 'Scroll', 'fargo' ),
		'fixed' 	        => esc_html__( 'Fixed', 'fargo' )
    ),
) );

/**
 * Background Overlay Enable
 */
$wp_customize->add_setting( $prefix . '_ribbon_backgrounds_overlay', array(
    'transport'             => 'postMessage',
	'sanitize_callback'     => 'fargo_sanitize_checkbox',
	'default'               => 0,
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_ribbon_backgrounds_overlay', array(
	'label'                 => esc_html__( 'Overlay Enable', 'fargo' ),
	'type'                  => 'mte-toggle',
	'section'               => $panel,
	'settings'              => $prefix . '_ribbon_backgrounds_overlay',
) ) );

/**
 * Background Overlay Color
 */
$wp_customize->add_setting( $prefix . '_ribbon_backgrounds_overlay_color', array(
    'transport'             => 'postMessage',
	'sanitize_callback'     => 'fargo_sanitize_color',
	'default'               => '#ffffff',		
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_ribbon_backgrounds_overlay_color', array(
    'label'                 => esc_html__( 'Overlay Color', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_ribbon_backgrounds_overlay_color',
) ) );