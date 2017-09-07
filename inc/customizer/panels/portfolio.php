<?php
/**
 * Portfolio Section Customizer Options
 *
 * @since 1.0.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Variable
 */
$panel = 'fargo_panel_portfolio';
$prefix = 'fargo';

/**
 * Panel
 */
$wp_customize->add_section( $panel, array(
    'priority'          => fargo_get_section_position($panel),
    'capability'        => 'edit_theme_options',
    'theme_supports'    => '',
    'title'             => __( 'Portfolio', 'fargo' ),
    'panel'             => 'fargo_frontpage_panel'
) );

/**
 * Tabs
 */
$wp_customize->add_setting( $prefix . '_portfolio_tab', array(
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_kses_post'
    )
);

$wp_customize->add_control(  new Fargo_Customizer_Tab_Control( $wp_customize,
    $prefix . '_portfolio_tab',
    array(
        'type'      => 'epsilon-tab',
        'section'   => $panel,
        'buttons'   => array( array(
            'name' => __( 'General', 'fargo' ),
                'fields'    => array(
                $prefix . '_portfolio_general_enable',
                $prefix . '_portfolio_general_title',
			    $prefix . '_portfolio_general_subtitle',
			    $prefix . '_portfolio_general_content',		   
                ),
                'active' => true
                ),
				array(
                'name' => __( 'Settings', 'fargo' ),
                'fields'    => array(
                $prefix . '_portfolio_settings_lightbox',
				$prefix . '_portfolio_settings_width',
                $prefix . '_portfolio_settings_layout',
                ),
                ),
                array(
                'name' => __( 'Colors', 'fargo' ),
                'fields'    => array(
                $prefix . '_portfolio_colors_background',
                $prefix . '_portfolio_colors_title',
                $prefix . '_portfolio_colors_subtitle',
                ),
                ),
                array(
                'name' => __( 'Backgrounds', 'fargo' ),
                'fields'    => array(
                $prefix . '_portfolio_backgrounds_image',
			    $prefix . '_portfolio_backgrounds_position',
                $prefix . '_portfolio_backgrounds_size',
                $prefix . '_portfolio_backgrounds_repeat',
                $prefix . '_portfolio_backgrounds_attachment',
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
$wp_customize->add_setting( $prefix . '_portfolio_general_enable', array(
    'sanitize_callback' => $prefix . '_sanitize_checkbox',
    'default'           => 1,
) );

$wp_customize->add_control(  new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_portfolio_general_enable', array(
    'type'      => 'mte-toggle',
    'label'     => __( 'Section Enable', 'fargo' ),
    'section'   => $panel,
) ) );

/**
 * Title
 */
$wp_customize->add_setting( $prefix .'_portfolio_general_title', array(
    'sanitize_callback' => 'fargo_sanitize_html',
    'default'           => __( 'PORTFOLIO', 'fargo' ),
    'transport'         => 'postMessage'
) );

$wp_customize->add_control( $prefix .'_portfolio_general_title', array(
    'label'         => __( 'Title', 'fargo' ),
    'section'       => $panel,
) );

$wp_customize->selective_refresh->add_partial( $prefix .'_portfolio_general_title', array(
    'selector' => '#portfolio .section-header h2',
) );

/**
 * Sub Title
 */  
$wp_customize->add_setting( $prefix .'_portfolio_general_subtitle', array(
    'sanitize_callback' => 'wp_kses_post',
    'default'           => __( 'This is a description for the Portfolio section. You can set it up in the Customizer > Front Page Sections > Portfolio and add items by clicking on Add or edit Portfolio.', 'fargo' ),
    'transport'         => 'postMessage'
) );

$wp_customize->add_control( $prefix .'_portfolio_general_subtitle', array(
    'label'         => __( 'Subtitle', 'fargo' ),
    'section'       => $panel,
) ) ;

$wp_customize->selective_refresh->add_partial( $prefix .'_portfolio_general_subtitle', array(
    'selector' => '#portfolio .section-header h6',
) );
    
/**
 * General Content
 */		
$wp_customize->add_setting( $prefix . '_portfolio_general_content', array(
	'transport'         => $selective_refresh ? 'postMessage' : 'refresh',
) );

$hestia_portfolio_content_control = $wp_customize->get_setting( $prefix .'_portfolio_general_content' );

if ( ! empty( $hestia_portfolio_content_control ) ) {
	$hestia_portfolio_content_control->default = json_encode( array( array(
	'icon_value' => 'fa-wechat',
	'title'      => esc_html__( 'Responsive', 'themeisle-companion' ),
	'text'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'themeisle-companion' ),
	'link'       => '#',
	'id'         => 'customizer_repeater_56d7ea7f40b56',
	'color'      => '#e91e63',
	),
		array(
		'icon_value' => 'fa-check',
		'title'      => esc_html__( 'Quality', 'themeisle-companion' ),
		'text'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'themeisle-companion' ),
		'link'       => '#',
		'id'         => 'customizer_repeater_56d7ea7f40b66',
		'color'      => '#00bcd4',
		),
			array(
			'icon_value' => 'fa-support',
			'title'      => esc_html__( 'Support', 'themeisle-companion' ),
			'text'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'themeisle-companion' ),
			'link'       => '#',
			'id'         => 'customizer_repeater_56d7ea7f40b86',
			'color'      => '#4caf50',
			),
		) );
	}
	
$wp_customize->add_control( new Fargo_Repeater( $wp_customize, $prefix . '_portfolio_general_content', array(
	'label'                             => esc_html__( 'Portfolio Content', 'fargo' ),
	'section'                           => $panel,
	'add_field_label'                   => esc_html__( 'Add Portfolio', 'fargo' ),
	'item_name'                         => esc_html__( 'Portfolio', 'fargo' ),
	'customizer_repeater_icon_control'  => true,
	'customizer_repeater_title_control' => true,
	'customizer_repeater_text_control'  => true,
	'customizer_repeater_link_control'  => true,
	'customizer_repeater_color_control' => true,
	'priority'    => 19,
) ) );
			
function hestia_portfolio_content_callback() {
	$hestia_portfolio_content = get_theme_mod( $prefix . '_portfolio_general_content' );
	hestia_portfolio_content( $hestia_portfolio_content, true );
}

/**
 * SETTINGS
 */

/**
 * Full Width
 */
$wp_customize->add_setting( $prefix . '_portfolio_settings_width', array(
	'sanitize_callback' => $prefix . '_sanitize_checkbox',
	'default'           => 0,
	'transport'         => 'postMessage',
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_portfolio_settings_width', array(
	'type'     => 'mte-toggle',
	'label'    => __( 'Full Width', 'fargo' ),
	'section'  => $panel,
) ) );

/**
 * Lightbox
 */
$wp_customize->add_setting( $prefix . '_portfolio_settings_lightbox', array(
    'sanitize_callback' => $prefix . '_sanitize_checkbox',
    'default'           => 0,
    'transport'         => 'postMessage'
    )
);

$wp_customize->add_control(  new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_portfolio_settings_lightbox', array(
    'type'      => 'mte-toggle',
    'label'     => __( 'Enable Lightbox ?', 'fargo' ),
    'section'   => $panel,
) ) );

/**
 * COLORS
 */
 
/**
 * Background Color
 */
$wp_customize->add_setting( $prefix . '_portfolio_colors_background', array(
    'sanitize_callback' => 'fargo_sanitize_color',
    'default'           => '#fff',
    'transport'         => 'postMessage',

) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_portfolio_colors_background', array(
    'label'    => __( 'Background Color', 'fargo' ),
    'section'  => $panel,
    'settings' => $prefix . '_portfolio_colors_background',
) ) );

/**
 * Background Title
 */
$wp_customize->add_setting( $prefix . '_portfolio_colors_title', array(
    'sanitize_callback' => 'fargo_sanitize_color',
    'default'           => '#545454',
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_portfolio_colors_title', array(
    'label'    => __( 'Title Color', 'fargo' ),
    'section'  => $panel,
    'settings' => $prefix . '_portfolio_colors_title',
) ) );

/**
 * Background Sub Title
 */
$wp_customize->add_setting( $prefix . '_portfolio_colors_subtitle', array(
    'sanitize_callback' => 'fargo_sanitize_color',
    'default'           => '#8c9597',
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_portfolio_colors_subtitle', array(
    'label'    => __( 'Description Color', 'fargo' ),
    'section'  => $panel,
    'settings' => $prefix . '_portfolio_colors_subtitle',
) ) );

/**
 * BACKGROUNDS
 */

/**
 * Background Image
 */
$wp_customize->add_setting( $prefix . '_portfolio_backgrounds_image', array(
    'sanitize_callback' => 'esc_url',
    'default'           => '',
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $prefix . '_portfolio_backgrounds_image', array(
    'label'    => __( 'Background Image', 'fargo' ),
    'section'  => $panel,
    'settings' => $prefix . '_portfolio_backgrounds_image',
) ) );

/**
 * Background Position
 */
$wp_customize->add_setting( $prefix . '_portfolio_backgrounds_position', array(
    'default' => 'initial',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( $prefix . '_portfolio_backgrounds_position', array(
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
$wp_customize->add_setting( $prefix . '_portfolio_backgrounds_size', array(
    'default' => 'auto',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( $prefix . '_portfolio_backgrounds_size', array(
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
$wp_customize->add_setting( $prefix . '_portfolio_backgrounds_repeat', array(
    'default' => 'initial',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( $prefix . '_portfolio_backgrounds_repeat', array(
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
$wp_customize->add_setting( $prefix . '_portfolio_backgrounds_attachment', array(
    'default' => 'initial',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( $prefix . '_portfolio_backgrounds_attachment', array(
    'label'      => __( 'Background Attachment', 'fargo' ),
    'section'    => $panel,
    'type'       => 'select',
    'choices'    => array(
		'initial' 	=> __( 'Default', 'fargo' ),
		'scroll' 	=> __( 'Scroll', 'fargo' ),
		'fixed' 	=> __( 'Fixed', 'fargo' )
    ),
) );