<?php
/**
 * Contact Section Customizer Options
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
$contact_panel = new Fargo_WP_Customize_Panel( $wp_customize, $prefix .'_contact_panel', array(
	'title'                => esc_html__( 'Contact', 'fargo' ),
	'priority'             => 5,
	'panel'                => 'fargo_frontpage_sections_panel'
) );

$wp_customize->add_panel( $contact_panel );


/**
 * GENERAL
 */
$wp_customize->add_section( $prefix .'_contact_general_section', array(
	'title'                 => __( 'General', 'fargo' ),
	'priority'              => 1,
	'panel'                 => $prefix . '_contact_panel',
) );

/**
 * Section Enable
 */
$wp_customize->add_setting( $prefix . '_contact_general_enable',
    array(
        'sanitize_callback' => $prefix . '_sanitize_checkbox',
        'default'           => 1,
    )
);

$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_contact_general_enable', array(
	'type'         	        => 'mte-toggle',
	'label'                 => __( 'Section Enable', 'fargo' ),
	'section'               => $prefix . '_contact_general_section',
) ) );

/**
 * Title
 */
$wp_customize->add_setting( $prefix .'_contact_general_title', array(
    'sanitize_callback'     => 'fargo_sanitize_html',
    'default'               => __( 'CONTACT', 'fargo' ),
    'transport'             => 'postMessage'
) );

$wp_customize->add_control( $prefix .'_contact_general_title', array(
    'label'                 => __( 'Title', 'fargo' ),
    'section'               => $prefix . '_contact_general_section',
) );

$wp_customize->selective_refresh->add_partial( $prefix .'_contact_general_title', array(
    'selector'              => '#contact .section-header h2',
) );

/**
 * Sub Title
 */
$wp_customize->add_setting( $prefix .'_contact_general_subtitle', array(
    'sanitize_callback'     => 'fargo_sanitize_html',
    'default'               => __( 'This is a description for the Contact section. You can set it up in the Customizer > Front Page Sections > Contact.', 'fargo' ),
    'transport'             => 'postMessage'
) );

$wp_customize->add_control( $prefix .'_contact_general_subtitle', array(
    'label'                 => __( 'Subtitle', 'fargo' ),
	'section'               => $prefix . '_contact_general_section',
) );

$wp_customize->selective_refresh->add_partial( $prefix .'_contact_general_subtitle', array(
    'selector'              => '#contact .section-header h6',
) );


/**
 * SETTINGS
 */
$wp_customize->add_section( $prefix .'_contact_settings_section', array(
	'title'                 => __( 'Settings', 'fargo' ),
	'priority'              => 2,
	'panel'                 => $prefix . '_contact_panel',
) );

/**
 * Full Width
 */
$wp_customize->add_setting( $prefix . '_contact_settings_width', array(
	'sanitize_callback'     => $prefix . '_sanitize_checkbox',
	'default'               => 0,
	'transport'             => 'postMessage',
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_contact_settings_width', array(
	'type'                  => 'mte-toggle',
	'label'                 => __( 'Full Width', 'fargo' ),
	'section'               => $prefix . '_contact_general_section',
) ) );

/**
 * Contact Form
 */
$wp_customize->add_setting( $prefix .'_contact_general_contact_form_7', array(
    'sanitize_callback'     => 'sanitize_key'
) );

$wp_customize->add_control( new Fargo_Custumizer_CF7_Control( $wp_customize, $prefix .'_contact_general_contact_form_7', array(
    'label'                 => __( 'Select the contact form', 'fargo' ),
    'section'               => $prefix . '_contact_settings_section',
    'type'                  => 'fargo_contact_form_7'
) ) );

$wp_customize->add_setting( $prefix . '_contact_general_install_contact_form_7', array(
    'sanitize_callback' => 'esc_html',
    'default'           => '',
    'transport'         => 'refresh'
) );

$wp_customize->add_control( new Fargo_Text_Custom_Control( $wp_customize, $prefix . '_contact_general_install_contact_form_7', array(
    'label'             => __( 'Contact Form Creation', 'fargo' ),
    'description'       => sprintf( '%s %s %s', __( 'Install', 'fargo' ), '<a href="https://wordpress.org/plugins/contact-form-7/" title="Contact Form 7" target="_blank">Contact Form 7</a>', __( 'and select a contact form to work this setting.', 'fargo' ) ),
    'section'               => $prefix . '_contact_settings_section',
    'settings'          => $prefix . '_contact_general_install_contact_form_7',
    'active_callback'   => 'fargo_is_not_active_contact_form_7'
) ) );

$wp_customize->add_setting( $prefix . '_contact_general_create_contact_form_7', array(
    'sanitize_callback' => 'esc_html',
    'default'           => '',
    'transport'         => 'refresh'
) );

$wp_customize->add_control( new Fargo_Text_Custom_Control( $wp_customize, $prefix . '_contact_general_create_contact_form_7', array(
    'label'             => __( 'Contact Form Creation', 'fargo' ),
    'description'       => sprintf( '%s %s', __( 'Create a contact form from ', 'fargo' ), '<a href="'.admin_url('admin.php?page=wpcf7-new').'" title="Contact Form 7" target="_blank">here</a>' ),
    'section'               => $prefix . '_contact_settings_section',
    'settings'          => $prefix . '_contact_general_create_contact_form_7',
    'active_callback'   => 'fargo_have_not_contact_form_7'
) ) );
 
 
/**
 * COLORS
 */
$wp_customize->add_section( $prefix .'_contact_colors_section', array(
	'title'                 => __( 'Colors', 'fargo' ),
	'priority'              => 3,
	'panel'                 => $prefix . '_contact_panel',
) );

/**
 * Background Color
 */
$wp_customize->add_setting( $prefix . '_contact_colors_background', array(
    'sanitize_callback' => 'fargo_sanitize_color',
    'default'           => '#fff',
    'transport'         => 'postMessage',

) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_contact_colors_background', array(
    'label'    => __( 'Background Color', 'fargo' ),
    'section'               => $prefix . '_contact_colors_section',
    'settings' => $prefix . '_contact_colors_background',
) ) );

/**
 * Title Color
 */
$wp_customize->add_setting( $prefix . '_contact_colors_title', array(
    'sanitize_callback' => 'fargo_sanitize_color',
    'default'           => '#545454',
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_contact_colors_title', array(
    'label'    => __( 'Title Color', 'fargo' ),
    'section'               => $prefix . '_contact_colors_section',
    'settings' => $prefix . '_contact_colors_title',
) ) );

/**
 * Sub Title Color
 */
$wp_customize->add_setting( $prefix . '_contact_colors_subtitle', array(
    'sanitize_callback' => 'fargo_sanitize_color',
    'default'           => '#8c9597',
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_contact_colors_subtitle', array(
    'label'    => __( 'Subtitle Color', 'fargo' ),
    'section'               => $prefix . '_contact_colors_section',
    'settings' => $prefix . '_contact_colors_subtitle',
) ) );

/**
 * Content Name Color
 */
$wp_customize->add_setting( $prefix . '_contact_colors_content_name', array(
    'sanitize_callback' => 'fargo_sanitize_color',
    'default'           => '#8c9597',
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_contact_colors_content_name', array(
    'label'    => __( 'Content Name Color', 'fargo' ),
    'section'               => $prefix . '_contact_colors_section',
    'settings' => $prefix . '_contact_colors_content_name',
) ) );

/**
 * Content Text Color
 */
$wp_customize->add_setting( $prefix . '_contact_colors_content_text', array(
    'sanitize_callback' => 'fargo_sanitize_color',
    'default'           => '#8c9597',
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_contact_colors_content_text', array(
    'label'    => __( 'Content Text Color', 'fargo' ),
    'section'               => $prefix . '_contact_colors_section',
    'settings' => $prefix . '_contact_colors_content_text',
) ) );


/**
 * BACKGROUNDS
 */
$wp_customize->add_section( $prefix .'_contact_backgrounds_section', array(
	'title'                 => __( 'Backgrounds', 'fargo' ),
	'priority'              => 4,
	'panel'                 => $prefix . '_contact_panel',
) );

/**
 * Background Image
 */
$wp_customize->add_setting( $prefix . '_contact_backgrounds_image', array(
    'sanitize_callback' => 'esc_url',
    'default'           => '',
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $prefix . '_contact_backgrounds_image', array(
    'label'    => __( 'Background Image', 'fargo' ),
    'section'               => $prefix . '_contact_backgrounds_section',
    'settings' => $prefix . '_contact_backgrounds_image',
) ) );

/**
 * Background Position
 */
$wp_customize->add_setting( $prefix . '_contact_backgrounds_position', array(
    'default' => 'initial',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( $prefix . '_contact_backgrounds_position', array(
    'label'      => __( 'Background Position', 'fargo' ),
   'section'               => $prefix . '_contact_backgrounds_section',
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
$wp_customize->add_setting( $prefix . '_contact_backgrounds_size', array(
    'default' => 'auto',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( $prefix . '_contact_backgrounds_size', array(
    'label'      => __( 'Background Size', 'fargo' ),
    'section'               => $prefix . '_contact_backgrounds_section',
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
$wp_customize->add_setting( $prefix . '_contact_backgrounds_repeat', array(
    'default' => 'initial',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( $prefix . '_contact_backgrounds_repeat', array(
    'label'      => __( 'Background Repeat', 'fargo' ),
    'section'               => $prefix . '_contact_backgrounds_section',
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
$wp_customize->add_setting( $prefix . '_contact_backgrounds_attachment', array(
    'default' => 'initial',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( $prefix . '_contact_backgrounds_attachment', array(
    'label'      => __( 'Background Attachment', 'fargo' ),
    'section'               => $prefix . '_contact_backgrounds_section',
    'type'       => 'select',
    'choices'    => array(
		'initial' 	=> __( 'Default', 'fargo' ),
		'scroll' 	=> __( 'Scroll', 'fargo' ),
		'fixed' 	=> __( 'Fixed', 'fargo' )
    ),
) );