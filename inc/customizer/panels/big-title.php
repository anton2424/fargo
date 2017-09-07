	<?php
/**
 * Big Title Section Customizer Options
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
$panel_big_title = new Fargo_Customizer_Multipanel_Control( $wp_customize, $prefix .'_big_title_panel', array(
	'title'    => esc_html__( 'Big Title', 'fargo' ),
	'priority' => 1,
	'panel'    => 'fargo_frontpage_sections_panel'
) );

$wp_customize->add_panel( $panel_big_title );


/**
 * GENERAL
 */
$wp_customize->add_section( $prefix .'_big_title_general_section', array(
	'title'    => __( 'General', 'fargo' ),
	'priority' => 1,
	'panel'    => $prefix . '_big_title_panel',
) );

/**
 * Section Enable
 */
$wp_customize->add_setting( $prefix . '_big_title_general_enable', array(
	'sanitize_callback'     => 'fargo_sanitize_checkbox',
	'default'               => 1,
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_big_title_general_enable', array(
	'type'                  => 'mte-toggle',
	'label'                 => esc_html__( 'Section Enable', 'fargo' ),
	'section'               => $prefix . '_big_title_general_section',
	'settings'              => $prefix . '_big_title_general_enable',
) ) );

/**
 * Section Style
 */
$wp_customize->add_setting( $prefix . '_big_title_general_style', array(
	'transport'             => 'postMessage',
    'sanitize_callback'     => 'sanitize_text_field',
	'default'               => 'auto',
) );

$wp_customize->add_control( $prefix . '_big_title_general_style', array(
    'label'      		    => esc_html__( 'Section Style', 'fargo' ),
	'type'                  => 'select',
    'section'               => $prefix . '_big_title_general_section',
	'settings'              => $prefix . '_big_title_general_style',
    'choices'               => array(
		1                   => esc_html__( 'Custum', 'fargo' ),
        2                   => esc_html__( 'Style 1', 'fargo' ),
        3                   => esc_html__( 'Style 2', 'fargo' ),
        4                   => esc_html__( 'Style 3', 'fargo' ),
    ),
) );

/**
 * Title
 */
$wp_customize->add_setting( $prefix . '_big_title_general_title', array(
	'transport'             => 'postMessage',
	'sanitize_callback'     => 'wp_kses_post',
	'default'               => esc_html__( 'ONE PAGE BISSNESS THEME', 'fargo' ),
) );

$wp_customize->add_control( $prefix . '_big_title_general_title', array(
	'label'                 => esc_html__( 'Title', 'fargo' ),
	'section'               => $prefix . '_big_title_general_section',
	'settings'              => $prefix . '_big_title_general_title',
) );
	
$wp_customize->selective_refresh->add_partial( $prefix .'_big_title_general_title', array(
    'selector'              => '#big-title.front-page-section h1',
) );

/**
 * Sub Title
 */
$wp_customize->add_setting( $prefix . '_big_title_general_subtitle', array(
	'transport'             => 'postMessage',
	'sanitize_callback'     => 'wp_kses_post',
	'default'               => esc_html__( 'Lada is a great one-page theme, perfect for  who just wants a new website for his business.', 'fargo' ),
) );
	
$wp_customize->add_control( $prefix . '_big_title_general_subtitle', array(
	'label'                 => esc_html__( 'Subtitle', 'fargo' ),
	'section'               => $prefix . '_big_title_general_section',
	'settings'              => $prefix . '_big_title_general_subtitle',
) ) ;

$wp_customize->selective_refresh->add_partial( $prefix .'_big_title_general_subtitle', array(
    'selector'              => '#big-title.front-page-section h6',
) );


/**
 * First Button Title
 */
$wp_customize->add_setting( $prefix . '_big_title_general_first_button_title', array(
	'transport'             => 'postMessage',
	'sanitize_callback'     => 'sanitize_text_field',
	'default'               => esc_html__( 'big_title', 'fargo' ),
) );

$wp_customize->add_control( $prefix . '_big_title_general_first_button_title', array(
	'label'                 => esc_html__( 'First Button Title', 'fargo' ),
	'section'               => $prefix . '_big_title_general_section',
	'settings'              => $prefix . '_big_title_general_first_button_title',
) );

$wp_customize->selective_refresh->add_partial( $prefix .'_big_title_general_first_button_title', array(
    'selector'              => '#big-title.front-page-section .btn-one',
) );

/**
 * First Button URL
 */
$wp_customize->add_setting( $prefix . '_big_title_general_first_button_url', array(
	'transport'             => 'postMessage',
	'sanitize_callback'     => 'esc_url_raw',
	'default'               => esc_url( '#big_title' ),
) );

$wp_customize->add_control( $prefix . '_big_title_general_first_button_url', array(
	'label'                 => esc_html__( 'First Button URL', 'fargo' ),
	'section'               => $prefix . '_big_title_general_section',
	'settings'              => $prefix . '_big_title_general_first_button_url',
) );

/**
 * Second Button Title
 */
$wp_customize->add_setting( $prefix . '_big_title_general_second_button_title', array(
	'transport'             => 'postMessage',
	'sanitize_callback'     => 'sanitize_text_field',
	'default'               => esc_html__( 'DOWNLOAD', 'fargo' ),
) );

$wp_customize->add_control( $prefix . '_big_title_general_second_button_title', array(
	'label'                 => esc_html__( 'Second Button Title', 'fargo' ),
	'section'               => $prefix . '_big_title_general_section',
	'settings'              => $prefix . '_big_title_general_second_button_title',
) );

$wp_customize->selective_refresh->add_partial( $prefix .'_big_title_general_second_button_title', array(
    'selector'              => '#big-title.front-page-section .btn-two',
) );

/**
 * Second Button Url
 */
$wp_customize->add_setting( $prefix . '_big_title_general_second_button_url', array(
	'transport'             => 'postMessage',
	'sanitize_callback'     => 'esc_url_raw',
	'default'               => esc_url( '#ribbon' ),
) );

$wp_customize->add_control( $prefix . '_big_title_general_second_button_url', array(
	'label'                 => esc_html__( 'Second Button URL', 'fargo' ),
	'section'               => $prefix . '_big_title_general_section',
	'settings'              => $prefix . '_big_title_general_second_button_url',
) );

/**
 * SETTINGS
 */
$wp_customize->add_section( $prefix .'_big_title_settings_section', array(
	'title'    => __( 'Settings', 'fargo' ),
	'priority' => 1,
	'panel'    => $prefix . '_big_title_panel',
) );
 
/**
 * Full Width
 */
$wp_customize->add_setting( $prefix . '_big_title_settings_width', array(
    'transport'         => 'postMessage',
	'sanitize_callback' => 'fargo_sanitize_checkbox',
	'default'           => 0,
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_big_title_settings_width', array(
	'type'                  => 'mte-toggle',
	'label'                 => esc_html__( 'Full Width', 'fargo' ),
	'section'               => $prefix . '_big_title_settings_section',
	'settings'              => $prefix . '_big_title_settings_width',
) ) ); 

/**
 * Full Screen
 */
$wp_customize->add_setting( $prefix . '_big_title_settings_screen', array(
	'transport'             => 'postMessage',
	'sanitize_callback'     => 'fargo_sanitize_checkbox',
	'default'               => 0,
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_big_title_settings_screen', array(
	'type'                  => 'mte-toggle',
	'label'                 => esc_html__( 'Full Screen', 'fargo' ),
	'section'               => $prefix . '_big_title_settings_section',
	'settings'              => $prefix . '_big_title_settings_screen',
) ) );

/**
 * Buttons
 */
$wp_customize->add_setting( $prefix .'_big_title_settings_button_heading', array(
	'sanitize_callback' 	=> 'wp_kses',
) );

$wp_customize->add_control( new Fargo_Customizer_Heading_Control( $wp_customize, $prefix .'_big_title_settings_button_heading', array(
	'label'    				=> esc_html__( 'Buttons', 'fargo' ),
	'section'               => $prefix . '_big_title_settings_section',
	'settings'              => $prefix . '_big_title_settings_button_heading',
) ) );

/**
 * First Button Windows
 */
$wp_customize->add_setting( $prefix . '_big_title_settings_first_button_window', array(
	'transport'             => 'postMessage',
	'sanitize_callback'     => 'fargo_sanitize_checkbox',
	'default'               => 0,
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_big_title_settings_first_button_window', array(
	'type'                  => 'mte-toggle',
	'label'                 => esc_html__( 'First Button New Windows', 'fargo' ),
	'section'               => $prefix . '_big_title_settings_section',
	'settings'              => $prefix . '_big_title_settings_first_button_window',
) ) );

/**
 * Second Button Windows
 */
$wp_customize->add_setting( $prefix . '_big_title_settings_second_button_window', array(
	'transport'             => 'postMessage',
	'sanitize_callback'     => 'fargo_sanitize_checkbox',
	'default'               => 0,
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_big_title_settings_second_button_window', array(
	'type'                  => 'mte-toggle',
	'label'                 => esc_html__( 'Second Button New Windows', 'fargo' ),
	'section'               => $prefix . '_big_title_settings_section',
	'settings'              => $prefix . '_big_title_settings_second_button_window',
) ) );

/**
 * First Button Style
 */
$wp_customize->add_setting( $prefix . '_big_title_settings_first_button_style', array(
    'transport'        		=> 'postMessage',
    'sanitize_callback' 	=> 'sanitize_text_field',
	'default'               => 'initial',
) );

$wp_customize->add_control( $prefix . '_big_title_settings_first_button_style', array(
    'label'                 => esc_html__( 'First Button Style', 'fargo' ),
	'type'                  => 'select',
    'section'               => $prefix . '_big_title_settings_section',
	'settings'              => $prefix . '_big_title_settings_first_button_style',
    'choices'               => array(
		'initial'         	=> esc_html__( 'Custom', 'fargo' ),
		'scroll' 	        => esc_html__( 'Orange', 'fargo' ),
    ),
) );

/**
 * Scond Button Style
 */
$wp_customize->add_setting( $prefix . '_big_title_settings_second_button_style', array(
    'transport'        		=> 'postMessage',
    'sanitize_callback' 	=> 'sanitize_text_field',
	'default'               => 'initial',
) );

$wp_customize->add_control( $prefix . '_big_title_settings_second_button_style', array(
    'label'                 => esc_html__( 'Second Button Style', 'fargo' ),
	'type'                  => 'select',
    'section'               => $prefix . '_big_title_settings_section',
	'settings'              => $prefix . '_big_title_settings_second_button_style',
    'choices'               => array(
		'initial'         	=> esc_html__( 'Custom', 'fargo' ),
		'scroll' 	        => esc_html__( 'Orange', 'fargo' ),
    ),
) );

/**
 * COLORS
 */
$wp_customize->add_section( $prefix .'_big_title_colors_section', array(
	'title'    => __( 'Colors', 'fargo' ),
	'priority' => 1,
	'panel'    => $prefix . '_big_title_panel',
) );
/**
 * Background Color
 */
$wp_customize->add_setting( $prefix . '_big_title_colors_background', array(
	'transport'             => 'postMessage',
	'sanitize_callback'     => 'sanitize_hex_color',
	'default'               => '#ffffff',

) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_big_title_colors_background', array(
	'label'                 => esc_html__( 'Background Color', 'fargo' ),
	'section'               => $prefix . '_big_title_colors_section',
	'settings'              => $prefix . '_big_title_colors_background',
) ) );

/**
 * Heading
 */
$wp_customize->add_setting( $prefix .'_big_title_colors_heading', array(
	'sanitize_callback' 	=> 'wp_kses',
) );

$wp_customize->add_control( new Fargo_Customizer_Heading_Control( $wp_customize, $prefix .'_big_title_colors_heading', array(
	'label'    				=> esc_html__( 'Heading', 'fargo' ),
	'section'               => $prefix . '_big_title_colors_section',
	'settings'              => $prefix . '_big_title_colors_heading',
) ) );

/**
 * Title Color
 */
$wp_customize->add_setting( $prefix . '_big_title_colors_title', array(
	'transport'             => 'postMessage',
	'sanitize_callback'     => 'sanitize_hex_color',
	'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_big_title_colors_title', array(
	'label'                 => esc_html__( 'Title Color', 'fargo' ),
	'section'               => $prefix . '_big_title_colors_section',
	'settings'              => $prefix . '_big_title_colors_title',
) ) );

/**
 * Sub Title Color
 */
$wp_customize->add_setting( $prefix . '_big_title_colors_subtitle', array(
	'transport'             => 'postMessage',
	'sanitize_callback'     => 'sanitize_hex_color',
	'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_big_title_colors_subtitle', array(
	'label'                 => esc_html__( 'Subtitle Color', 'fargo' ),
	'section'               => $prefix . '_big_title_colors_section',
	'settings'              => $prefix . '_big_title_colors_subtitle',
) ) );

/**
 * First Button Heading
 */
$wp_customize->add_setting( $prefix .'_big_title_colors_first_button_heading', array(
	'sanitize_callback' 	=> 'wp_kses',
) );

$wp_customize->add_control( new Fargo_Customizer_Heading_Control( $wp_customize, $prefix .'_big_title_colors_first_button_heading', array(
	'label'    				=> esc_html__( 'First Button', 'fargo' ),
	'section'               => $prefix . '_big_title_colors_section',
	'settings'              => $prefix . '_big_title_colors_first_button_heading',
) ) );

/**
 * First Button Background Color
 */
$wp_customize->add_setting( $prefix . '_big_title_colors_first_button', array(
	'transport'             => 'postMessage',
	'sanitize_callback'     => 'sanitize_hex_color',
	'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_big_title_colors_first_button', array(
	'label'                 => esc_html__( 'First Button Background Color', 'fargo' ),
	'section'               => $prefix . '_big_title_colors_section',
	'settings'              => $prefix . '_big_title_colors_first_button',
) ) );

/**
 * First Button Background Color: Hover
 */
$wp_customize->add_setting( $prefix . '_big_title_colors_first_button_hover', array(
	'transport'             => 'postMessage',
	'sanitize_callback'     => 'sanitize_hex_color',
	'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_big_title_colors_first_button_hover', array(
	'label'                 => esc_html__( 'First Button Background Color: Hover', 'fargo' ),
	'section'               => $prefix . '_big_title_colors_section',
	'settings'              => $prefix . '_big_title_colors_first_button_hover',
) ) );

/**
 * First Button Text Color 
 */
$wp_customize->add_setting( $prefix . '_big_title_colors_first_button_text', array(
	'transport'             => 'postMessage',
	'sanitize_callback'     => 'sanitize_hex_color',
	'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_big_title_colors_first_button_text', array(
	'label'                 => esc_html__( 'First Button Text Color', 'fargo' ),
	'section'               => $prefix . '_big_title_colors_section',
	'settings'              => $prefix . '_big_title_colors_first_button_text',
) ) );

/**
 * First Button Text Color: Hover
 */
$wp_customize->add_setting( $prefix . '_big_title_colors_first_button_text_hover', array(
	'transport'             => 'postMessage',
	'sanitize_callback'     => 'sanitize_hex_color',
	'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_big_title_colors_first_button_text_hover', array(
	'label'                 => esc_html__( 'First Button Text Color: Hover', 'fargo' ),
	'section'               => $prefix . '_big_title_colors_section',
	'settings'              => $prefix . '_big_title_colors_first_button_text_hover',
) ) );

/**
 * Second Button Heading
 */
$wp_customize->add_setting( $prefix .'_big_title_colors_second_button_heading', array(
	'sanitize_callback' 	=> 'wp_kses',
) );

$wp_customize->add_control( new Fargo_Customizer_Heading_Control( $wp_customize, $prefix .'_big_title_colors_second_button_heading', array(
	'label'    				=> esc_html__( 'Second Button', 'fargo' ),
	'section'               => $prefix . '_big_title_colors_section',
	'settings'              => $prefix . '_big_title_colors_second_button_heading',
) ) );

/**
 * Second Button Background Color
 */
$wp_customize->add_setting( $prefix . '_big_title_colors_second_button', array(
	'transport'             => 'postMessage',
	'sanitize_callback'     => 'sanitize_hex_color',
	'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_big_title_colors_second_button', array(
	'label'                 => esc_html__( 'Second Button Background Color', 'fargo' ),
	'section'               => $prefix . '_big_title_colors_section',
	'settings'              => $prefix . '_big_title_colors_second_button',
) ) );

/**
 * Second Button Background Color: Hover
 */
$wp_customize->add_setting( $prefix . '_big_title_colors_second_button_hover', array(
	'transport'             => 'postMessage',
	'sanitize_callback'     => 'sanitize_hex_color',
	'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_big_title_colors_second_button_hover', array(
	'label'                 => esc_html__( 'Second Button Background Color: Hover ', 'fargo' ),
	'section'               => $prefix . '_big_title_colors_section',
	'settings'              => $prefix . '_big_title_colors_second_button_hover',
) ) );

/**
 * Second Button Text Color
 */
$wp_customize->add_setting( $prefix . '_big_title_colors_second_button_text', array(
	'transport'             => 'postMessage',
	'sanitize_callback'     => 'sanitize_hex_color',
	'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_big_title_colors_second_button_text', array(
	'label'                 => esc_html__( 'Second Button Text Color', 'fargo' ),
	'section'               => $prefix . '_big_title_colors_section',
	'settings'              => $prefix . '_big_title_colors_second_button_text',
) ) );

/**
 * Second Button Text Color: Hover
 */
$wp_customize->add_setting( $prefix . '_big_title_colors_second_button_text_hover', array(
	'transport'             => 'postMessage',
	'sanitize_callback'     => 'sanitize_hex_color',
	'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_big_title_colors_second_button_text_hover', array(
	'label'                 => esc_html__( 'Second Button Text Color: Hover', 'fargo' ),
	'section'               => $prefix . '_big_title_colors_section',
	'settings'              => $prefix . '_big_title_colors_second_button_text_hover',
) ) );

/**
 * BACKGROUNDS
 */
$wp_customize->add_section( $prefix .'_big_title_backgrounds_section', array(
	'title'    => __( 'Backgrounds', 'fargo' ),
	'priority' => 1,
	'panel'    => $prefix . '_big_title_panel',
) );

/**
 * Background Type
 */
$wp_customize->add_setting( $prefix . '_big_title_backgrounds_type', array(
    'sanitize_callback' 	=> 'sanitize_text_field',
	'default'               => 'initial',
) );

$wp_customize->add_control( $prefix . '_big_title_backgrounds_type', array(
    'label'                 => esc_html__( 'Background Type', 'fargo' ),
	'type'                  => 'select',
    'section'               => $prefix . '_big_title_backgrounds_section',
	'settings'              => $prefix . '_big_title_backgrounds_type',
    'choices'               => array(
		'initial'         	=> esc_html__( 'Image', 'fargo' ),
		'scroll' 	        => esc_html__( 'Video', 'fargo' ),
    ),
) ); 
 
/**
 * Background Image
 */
$wp_customize->add_setting( $prefix . '_big_title_backgrounds_image', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'esc_url',
	'default'               => '',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $prefix . '_big_title_backgrounds_image', array(
    'label'                 => esc_html__( 'Background Image', 'fargo' ),
    'section'               => $prefix . '_big_title_backgrounds_section',
    'settings'              => $prefix . '_big_title_backgrounds_image',
) ) );

/**
 * Background Position
 */
$wp_customize->add_setting( $prefix . '_big_title_backgrounds_position', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'sanitize_text_field',
	'default'               => 'initial',
) );

$wp_customize->add_control( $prefix . '_big_title_backgrounds_position', array(
    'label'                 => esc_html__( 'Background Position', 'fargo' ),
	'type'                  => 'select',
    'section'               => $prefix . '_big_title_backgrounds_section',
	'settings'              => $prefix . '_big_title_backgrounds_position',
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
$wp_customize->add_setting( $prefix . '_big_title_backgrounds_size', array(
	'transport'             => 'postMessage',
    'sanitize_callback'     => 'sanitize_text_field',
	'default'               => 'auto',
) );

$wp_customize->add_control( $prefix . '_big_title_backgrounds_size', array(
    'label'      		    => esc_html__( 'Background Size', 'fargo' ),
	'type'                  => 'select',
    'section'               => $prefix . '_big_title_backgrounds_section',
	'settings'              => $prefix . '_big_title_backgrounds_size',
    'choices'               => array(
        'auto'              => esc_html__( 'Default', 'fargo' ),
        'contain'           => esc_html__( 'Fit to Screen', 'fargo' ),
        'cover'             => esc_html__( 'Fill Screen', 'fargo' ),
    ),
) );

/**
 * Background Repeat
 */
$wp_customize->add_setting( $prefix . '_big_title_backgrounds_repeat', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'sanitize_text_field',
	'default'               => 'initial',
) );

$wp_customize->add_control( $prefix . '_big_title_backgrounds_repeat', array(
    'label'     		    => esc_html__( 'Background Repeat', 'fargo' ),
	'type'                  => 'select',
    'section'               => $prefix . '_big_title_backgrounds_section',
	'settings'              => $prefix . '_big_title_backgrounds_repeat',
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
$wp_customize->add_setting( $prefix . '_big_title_backgrounds_attachment', array(
    'transport'        		=> 'postMessage',
    'sanitize_callback' 	=> 'sanitize_text_field',
	'default'               => 'initial',
) );

$wp_customize->add_control( $prefix . '_big_title_backgrounds_attachment', array(
    'label'                 => esc_html__( 'Background Attachment', 'fargo' ),
	'type'                  => 'select',
    'section'               => $prefix . '_big_title_backgrounds_section',
	'settings'              => $prefix . '_big_title_backgrounds_attachment',
    'choices'               => array(
		'initial'         	=> esc_html__( 'Default', 'fargo' ),
		'scroll' 	        => esc_html__( 'Scroll', 'fargo' ),
		'fixed' 	        => esc_html__( 'Fixed', 'fargo' )
    ),
) );

/**
 * Background Parallax
 */
$wp_customize->add_setting( $prefix . '_big_title_backgrounds_parallax', array(
    'transport'             => 'postMessage',
	'sanitize_callback'     => 'fargo_sanitize_checkbox',
	'default'               => 0,
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_big_title_backgrounds_parallax', array(
	'label'                 => esc_html__( 'Enable Parralax', 'fargo' ),
	'type'                  => 'mte-toggle',
	'section'               => $prefix . '_big_title_backgrounds_section',
	'settings'              => $prefix . '_big_title_backgrounds_parallax',
) ) );

/**
 * Background Overlay Enable
 */
$wp_customize->add_setting( $prefix . '_big_title_backgrounds_overlay', array(
    'transport'             => 'postMessage',
	'sanitize_callback'     => 'fargo_sanitize_checkbox',
	'default'               => 1,
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_big_title_backgrounds_overlay', array(
	'label'                 => esc_html__( 'Enable Overlay', 'fargo' ),
	'type'                  => 'mte-toggle',
	'section'               => $prefix . '_big_title_backgrounds_section',
	'settings'              => $prefix . '_big_title_backgrounds_overlay',
) ) );

/**
 * Background Overlay Color
 */
$wp_customize->add_setting( $prefix . '_big_title_backgrounds_overlay_color', array(
    'transport'             => 'postMessage',
	'sanitize_callback'     => 'fargo_sanitize_color',
	'default'               => '#ffffff',		
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_big_title_backgrounds_overlay_color', array(
    'label'                 => esc_html__( 'Overlay Color', 'fargo' ),
    'section'               => $prefix . '_big_title_backgrounds_section',
    'settings'              => $prefix . '_big_title_backgrounds_overlay_color',
) ) );