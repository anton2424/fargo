<?php
/**
 * Map Section Customizer Options
 *
 * @since 1.0.0
 */
 
 if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
 
/**
 * Variable
 */
$panel = 'fargo_panel_map';
$prefix = 'fargo';

/**
 * Panel
 */
$wp_customize->add_section( $panel, array(
	'priority'       => fargo_get_section_position($panel),
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => __( 'Map', 'fargo' ),
	'panel'			 => 'fargo_frontpage_panel'
) );

/**
 * Tabs
 */
$wp_customize->add_setting( $prefix . '_map_tab', array(
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    )
);

$wp_customize->add_control(  new Fargo_Customizer_Tab_Control( $wp_customize,
    $prefix . '_map_tab',
    array(
        'type'      => 'epsilon-tab',
        'section'   => $panel,
        'buttons'   => array(
		            array(
                'name' => __( 'General', 'fargo' ),
                'fields'    => array(
				    $prefix . '_map_general_enable',
                    $prefix . '_map_general_title',
                    $prefix . '_map_general_subtitle',
					$prefix . '_map_general_entry',
                    $prefix . '_map_general_content',
                    ),
                'active' => true
                ),
		    array(
                'name' => __( 'Settings', 'fargo' ),
                'fields'    => array(
                    $prefix . '_map_settings_width',
                    $prefix . '_map_settings_position',
                    ),
                ),
            array(
                'name' => __( 'Colors', 'fargo' ),
                'fields'    => array(
                    $prefix . '_map_colors_background',
                    $prefix . '_map_colors_title',
                    $prefix . '_map_colors_subtitle',
                    ),
                ),
            array(
                'name' => __( 'Backgrounds', 'fargo' ),
                'fields'    => array(
                    $prefix . '_map_backgrounds_image',
                    $prefix . '_map_backgrounds_position',
					$prefix . '_map_backgrounds_size',
                    $prefix . '_map_backgrounds_repeat',
                    $prefix . '_map_backgrounds_attachment',
                    
                    ),
                ),
            ),
    ) )
);

/**
 * GENERAL
 */

/**
 * Show
 */
$wp_customize->add_setting( $prefix . '_map_general_enable', array(
	'sanitize_callback' => $prefix . '_sanitize_checkbox',
	'default'           => 1,
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_map_general_enable', array(
	'type'     => 'mte-toggle',
	'label'    => __( 'Section Enable', 'fargo' ),
	'section'  => $panel,
) ) );

/**
 * Title
 */
$wp_customize->add_setting( $prefix . '_map_general_title', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'           => __( 'MAP', 'fargo' ),
	'transport'         => 'postMessage',
) );
	
$wp_customize->add_control( $prefix . '_map_general_title', array(
	'label'       => __( 'Title', 'fargo' ),
	'section'     => $panel,
) );
	
$wp_customize->selective_refresh->add_partial( $prefix .'_map_general_title', array(
    'selector' => '#about .section-header h2',
) );

/**
 * Sub Title
 */
$wp_customize->add_setting( $prefix . '_map_general_subtitle', array(
	'sanitize_callback' => 'wp_kses_post',
	'default'           => __( 'This is a description for the Map section. You can set it up in the Customizer > Front Page Sections > Map.', 'fargo' ),
	'transport'         => 'postMessage',
) );
		
$wp_customize->add_control( $prefix . '_map_general_subtitle', array(
	'label'       => __( 'Subtitle', 'fargo' ),
	'section'     => $panel,
) );

$wp_customize->selective_refresh->add_partial( $prefix .'_map_general_subtitle', array(
	'selector' => '#about .section-header h6',
) );

/**
 * Entry
 */
$wp_customize->add_setting( $prefix .'_map_general_entry',
    array(
        'sanitize_callback' => 'wp_kses_post',
        'default'           => '',
        'transport'         => 'postMessage'
    )
);

$wp_customize->add_control( new Epsilon_Editor_Custom_Control(
    $wp_customize,
    $prefix .'_map_general_entry',
    array(
        'label'         => __( 'Entry', 'fargo' ),
        'section'       => $panel,
    ) )
);

$wp_customize->selective_refresh->add_partial( $prefix .'_map_general_entry', array(
    'selector' => '#full-width .section-header .section-description',
) );

/**
 * SETTINGS
 */

/**
 * Full Width
 */
$wp_customize->add_setting( $prefix . '_map_settings_width', array(
	'sanitize_callback' => $prefix . '_sanitize_checkbox',
	'default'           => 0,
	'transport'         => 'postMessage',
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_map_settings_width', array(
	'type'     => 'mte-toggle',
	'label'    => __( 'Full Width', 'fargo' ),
	'section'  => $panel,
) ) );

/**
 * Background Size
 */
$wp_customize->add_setting( $prefix . '_map_settings_position', array(
    'default' => 'auto',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( $prefix . '_map_settings_position', array(
    'label'      => __( 'Position', 'fargo' ),
    'section'    => $panel,
    'type'       => 'select',
    'choices'    => array(
        'auto'    => __( 'Left Text Right Skill', 'fargo' ),
        'sogo'    => __( 'Right Skill Left Text', 'fargo' ),
    ),
) );

/**
 * COLORS
 */

/**
 * Background Colors
 */
$wp_customize->add_setting( $prefix . '_map_colors_background', array(
    'sanitize_callback' => 'fargo_sanitize_color',
    'default'           => '#fff',
    'transport'         => 'postMessage',

) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_map_colors_background', array(
    'label'    => __( 'Background Color', 'fargo' ),
    'section'  => $panel,
    'settings' => $prefix . '_map_colors_background',
) ) );

/**
 * Title Colors
 */
$wp_customize->add_setting( $prefix . '_map_colors_title', array(
    'sanitize_callback' => 'fargo_sanitize_color',
    'default'           => '#545454',
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_map_colors_title', array(
    'label'    => __( 'Title Color', 'fargo' ),
    'section'  => $panel,
    'settings' => $prefix . '_map_colors_title',
) ) );

/**
 * Sub Title Colors
 */
$wp_customize->add_setting( $prefix . '_map_colors_subtitle', array(
    'sanitize_callback' => 'fargo_sanitize_color',
    'default'           => '#8c9597',
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_map_colors_subtitle', array(
    'label'    => __( 'Description Color', 'fargo' ),
    'section'  => $panel,
    'settings' => $prefix . '_map_colors_subtitle',
) ) );

	
/**
 * BACKGROUNDS
 */

/**
 * Background Image
 */
$wp_customize->add_setting( $prefix . '_map_backgrounds_image', array(
    'sanitize_callback' => 'esc_url',
    'default'           => '',
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $prefix . '_map_backgrounds_image', array(
    'label'    => __( 'Background Image', 'fargo' ),
    'section'  => $panel,
    'settings' => $prefix . '_map_backgrounds_image',
) ) );

/**
 * Background Position
 */
$wp_customize->add_setting( $prefix . '_map_backgrounds_position', array(
    'default' => 'initial',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( $prefix . '_map_backgrounds_position', array(
    'label'      => __( 'Background Position', 'fargo' ),
    'section'    => $panel,
    'type'       => 'select',
    'choices'    => array(
		'initial' 			=> __( 'Default', 'fargo' ),
		'top left' 			=> __( 'Top Left', 'fargo' ),
		'top center' 		=> __( 'Top Center', 'fargo' ),
		'top right'  		=> __( 'Top Right', 'fargo' ),
		'center left' 		=> __( 'Center Left', 'fargo' ),
		'center center' 	=> __( 'Center Center', 'fargo' ),
		'center right' 		=> __( 'Center Right', 'fargo' ),
		'bottom left' 		=> __( 'Bottom Left', 'fargo' ),
		'bottom center' 	=> __( 'Bottom Center', 'fargo' ),
		'bottom right' 		=> __( 'Bottom Right', 'fargo' ),
    ),
) );

/**
 * Background Size
 */
$wp_customize->add_setting( $prefix . '_map_backgrounds_size', array(
    'default' => 'auto',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( $prefix . '_map_backgrounds_size', array(
    'label'      => __( 'Background Size', 'fargo' ),
    'section'    => $panel,
    'type'       => 'select',
    'choices'    => array(
        'auto'    => __( 'Default', 'fargo' ),
        'contain' => __( 'Fit to Screen', 'fargo' ),
        'cover'   => __( 'Fill Screen', 'fargo' ),
    ),
) );

/**
 * Background Repeat
 */
$wp_customize->add_setting( $prefix . '_map_backgrounds_repeat', array(
    'default' => 'initial',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( $prefix . '_map_backgrounds_repeat', array(
    'label'      => __( 'Background Repeat', 'fargo' ),
    'section'    => $panel,
    'type'       => 'select',
    'choices'    => array(
	    'initial' 	=> __( 'Default', 'fargo' ),
		'no-repeat' => __( 'No-repeat', 'fargo' ),
		'repeat' 	=> __( 'Repeat', 'fargo' ),
		'repeat-x' 	=> __( 'Repeat-x', 'fargo' ),
		'repeat-y' 	=> __( 'Repeat-y', 'fargo' ),
    ),
) );

/**
 * Background Attachment
 */
$wp_customize->add_setting( $prefix . '_map_backgrounds_attachment', array(
    'default' => 'initial',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( $prefix . '_map_backgrounds_attachment', array(
    'label'      => __( 'Background Attachment', 'fargo' ),
    'section'    => $panel,
    'type'       => 'select',
    'choices'    => array(
		'initial' 	=> __( 'Default', 'fargo' ),
		'scroll' 	=> __( 'Scroll', 'fargo' ),
		'fixed' 	=> __( 'Fixed', 'fargo' )
    ),
) );