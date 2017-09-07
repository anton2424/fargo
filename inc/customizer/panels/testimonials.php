<?php
/**
 * Testimonials Section Customizer Options
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
$testimonials_panel = new Fargo_WP_Customize_Panel( $wp_customize, $prefix .'_testimonials_panel', array(
	'title'    => esc_html__( 'Testimonials', 'fargo' ),
	'priority' => 3,
	'panel'    => 'fargo_frontpage_sections_panel'
) );

$wp_customize->add_panel( $testimonials_panel );

/**
 * GENERAL
 */
$wp_customize->add_section( $prefix .'_testimonials_general_section', array(
	'title'    => __( 'General', 'fargo' ),
	'priority' => 1,
	'panel'    => $prefix . '_testimonials_panel',
) );

/**
 * Section Enable
 */
$wp_customize->add_setting( $prefix . '_testimonials_general_enable', array(
    'sanitize_callback'     => $prefix . '_sanitize_checkbox',
    'default'               => 1,
) );

$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_testimonials_general_enable', array(
    'type'                  => 'mte-toggle',
    'label'                 => esc_html__( 'Section Enable', 'fargo' ),
    'section'               => $prefix . '_testimonials_general_section',
	'settings'              => $prefix . '_testimonials_general_enable',
) ) );

/**
 * Title
 */
$wp_customize->add_setting( $prefix .'_testimonials_general_title', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_html',
    'default'               => esc_html__( 'TESTIMONIALS', 'fargo' ),
) );

$wp_customize->add_control( $prefix .'_testimonials_general_title', array(
    'label'                 => esc_html__( 'Title', 'fargo' ),
    'section'               => $prefix . '_testimonials_general_section',
	'settings'              => $prefix . '_testimonials_general_title',
) );

$wp_customize->selective_refresh->add_partial( $prefix .'_testimonials_general_title', array(
    'selector'              => '#testimonials .section-header h2',
) );

/**
 * Sub Title
 */
$wp_customize->add_setting( $prefix .'_testimonials_general_subtitle', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_html',
    'default'               => esc_html__( 'This is a description for the Testimonials section. You can set it up in the Customizer > Front Page Sections > Testimonials and add items by clicking on Add or edit Testimonials.', 'fargo' ),
) );

$wp_customize->add_control( $prefix .'_testimonials_general_subtitle', array(
    'label'                 => esc_html__( 'Subtitle', 'fargo' ),
    'section'               => $prefix . '_testimonials_general_section',
	'settings'              => $prefix . '_testimonials_general_subtitle',
) );

$wp_customize->selective_refresh->add_partial( $prefix .'_testimonials_general_subtitle', array(
    'selector'              => '#testimonials .section-header h5',
) );

/**
 * General Content
 */		
$wp_customize->add_setting( $prefix . '_testimonials_general_content', array(
	'transport'             => $selective_refresh ? 'postMessage' : 'refresh',
) );

$hestia_testimonials_content_control = $wp_customize->get_setting( $prefix .'_testimonials_general_content' );

if ( ! empty( $hestia_testimonials_content_control ) ) {
	$hestia_testimonials_content_control->default = json_encode( array(
	array(
		'image_url' => get_template_directory_uri() . '/assets/img/5.jpg',
		'title'     => esc_html__( 'Inverness McKenzie', 'themeisle-companion' ),
		'subtitle'  => esc_html__( 'Business Owner', 'themeisle-companion' ),
		'text'      => esc_html__( '"We have no regrets! After using your product my business skyrocketed! I made back the purchase price in just 48 hours! I couldn\'t have asked for more than this."', 'themeisle-companion' ),
		'id'        => 'customizer_repeater_56d7ea7f40d56',
	),
	array(
		'image_url' => get_template_directory_uri() . '/assets/img/6.jpg',
		'title'     => esc_html__( 'Hanson Deck', 'themeisle-companion' ),
		'subtitle'  => esc_html__( 'Independent Artist', 'themeisle-companion' ),
		'text'      => esc_html__( '"Your company is truly upstanding and is behind its product 100 percent. Hestia is worth much more than I paid. I like Hestia more each day because it makes easier."', 'themeisle-companion' ),
		'id'        => 'customizer_repeater_56d7ea7f40d66',
	),
	array(
		'image_url' => get_template_directory_uri() . '/assets/img/7.jpg',
		'title'     => esc_html__( 'Natalya Undergrowth', 'themeisle-companion' ),
		'subtitle'  => esc_html__( 'Freelancer', 'themeisle-companion' ),
		'text'      => esc_html__( '"Thank you for making it painless, pleasant and most of all hassle free! I am so pleased with this product. Dude, your stuff is great! I will refer everyone I know."', 'themeisle-companion' ),
		'id'        => 'customizer_repeater_56d7ea7f40d76',
	),
		) );
}
	
$wp_customize->add_control( new Fargo_Repeater( $wp_customize, $prefix . '_testimonials_general_content', array(
	'label'                             => esc_html__( 'Testimonials Content', 'fargo' ),
	'section'               => $prefix . '_testimonials_general_section',
	'add_field_label'                   => esc_html__( 'Add Testimonials', 'fargo' ),
	'item_name'                         => esc_html__( 'Testimonials', 'fargo' ),
	'customizer_repeater_image_control'    => true,
    'customizer_repeater_title_control'    => true,
	'customizer_repeater_subtitle_control' => true,
    'customizer_repeater_text_control'     => true,
	'customizer_repeater_link_control'     => true,
) ) );
			
function hestia_testimonials_content_callback() {
	$hestia_testimonials_content = get_theme_mod( $prefix . '_testimonials_general_content' );
	hestia_testimonials_content( $hestia_testimonials_content, true );
}

/**
 * SETTINGS
 */
$wp_customize->add_section( $prefix .'_testimonials_settings_section', array(
	'title'    => __( 'Settings', 'fargo' ),
	'priority' => 2,
	'panel'    => $prefix . '_testimonials_panel',
) );
/**
 * Full Width
 */
$wp_customize->add_setting( $prefix . '_testimonials_settings_section_width', array(
	'transport'             => 'postMessage',
	'sanitize_callback'     => 'fargo_sanitize_checkbox',
	'default'               => 0,
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_testimonials_settings_section_width', array(
	'type'                  => 'mte-toggle',
	'label'                 => esc_html__( 'Full Width', 'fargo' ),
	'section'               => $prefix . '_testimonials_settings_section',
	'settings'              => $prefix . '_testimonials_settings_section_width',
) ) );
 
/**
 * Layout
 */
$wp_customize->add_setting( $prefix . '_testimonials_settings_section_layout', array(
    'sanitize_callback'     => 'sanitize_text_field',
	'default'               => 3,
) );

$wp_customize->add_control( $prefix . '_testimonials_settings_section_layout', array(
    'label'                 => esc_html__( 'Layout', 'fargo' ),
	'type'                  => 'select',
    'section'               => $prefix . '_testimonials_settings_section',
	'settings'              => $prefix . '_testimonials_settings_section_layout',
    'choices'               => array(
        6                   => esc_html__( '2 Columns', 'fargo' ),
        4                   => esc_html__( '3 Columns', 'fargo' ),
		3                   => esc_html__( '4 Columns', 'fargo' ),
    ),
) );

/**
 * Font Size Description
 */
$wp_customize->add_setting( $prefix .'_testimonials_settings_section_font_description', array(
	'transport'        		=> 'postMessage',
    'default'               => 15,
) );

$wp_customize->add_control( new Fargo_Customizer_Range_Control( $wp_customize, $prefix .'_testimonials_settings_section_font_description', array(
    'label'                 => esc_html__( 'Font Size Desctiption', 'fargo' ),
	'section'               => $prefix . '_testimonials_settings_section',
	'settings'              => $prefix . '_testimonials_settings_section_font_description',
    'choices'               => array(
		'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ),
) ) );

/**
 * Font Size Name
 */
$wp_customize->add_setting( $prefix .'_testimonials_settings_section_font_name', array(
	'transport'        		=> 'postMessage',
    'default'               => 15,
) );

$wp_customize->add_control( new Fargo_Customizer_Range_Control( $wp_customize, $prefix .'_testimonials_settings_section_font_name', array(
    'label'                 => esc_html__( 'Font Size Name', 'fargo' ),
	'section'               => $prefix . '_testimonials_settings_section',
	'settings'              => $prefix . '_testimonials_settings_section_font_name',
    'choices'               => array(
		'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ),
) ) );

/**
 * Font Size Name
 */
$wp_customize->add_setting( $prefix .'_testimonials_settings_section_font_name', array(
	'transport'        		=> 'postMessage',
    'default'               => 15,
) );

$wp_customize->add_control( new Fargo_Customizer_Range_Control( $wp_customize, $prefix .'_testimonials_settings_section_font_name', array(
    'label'                 => esc_html__( 'Font Size Name', 'fargo' ),
	'section'               => $prefix . '_testimonials_settings_section',
	'settings'              => $prefix . '_testimonials_settings_section_font_name',
    'choices'               => array(
		'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ),
) ) ); 
 
/**
 * Font Size Position
 */
$wp_customize->add_setting( $prefix .'_testimonials_settings_section_font_position', array(
	'transport'        		=> 'postMessage',
    'default'               => 15,
) );

$wp_customize->add_control( new Fargo_Customizer_Range_Control( $wp_customize, $prefix .'_testimonials_settings_section_font_position', array(
    'label'                 => esc_html__( 'Font Size Position', 'fargo' ),
	'section'               => $prefix . '_testimonials_settings_section',
	'settings'              => $prefix . '_testimonials_settings_section_font_position',
    'choices'               => array(
		'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ),
) ) ); 

/**
 *  Size Image
 */
$wp_customize->add_setting( $prefix .'_testimonials_settings_section_size_image', array(
	'transport'        		=> 'postMessage',
    'default'               => 15,
) );

$wp_customize->add_control( new Fargo_Customizer_Range_Control( $wp_customize, $prefix .'_testimonials_settings_section_size_image', array(
    'label'                 => esc_html__( 'Size Image (px)', 'fargo' ),
	'section'               => $prefix . '_testimonials_settings_section',
	'settings'              => $prefix . '_testimonials_settings_section_size_image',
    'choices'               => array(
		'min'  => 0,
        'max'  => 200,
        'step' => 1,
    ),
) ) ); 


/**
 * COLORS
 */
$wp_customize->add_section( $prefix .'_testimonials_colors_section', array(
	'title'    => __( 'Colors', 'fargo' ),
	'priority' => 3,
	'panel'    => $prefix . '_testimonials_panel',
) );

/**
 * Background Color
 */ 
$wp_customize->add_setting( $prefix . '_testimonials_colors_background', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_testimonials_colors_background', array(
    'label'                 => esc_html__( 'Background Color', 'fargo' ),
    'section'               => $prefix . '_testimonials_colors_section',
    'settings'              => $prefix . '_testimonials_colors_background',
) ) );

/**
 * Heading
 */
$wp_customize->add_setting( $prefix .'_testimonials_colors_heading', array(
	'sanitize_callback' 	=> 'wp_kses',
) );

$wp_customize->add_control( new Fargo_Customizer_Heading_Control( $wp_customize, $prefix .'_testimonials_colors_heading', array(
	'label'    				=> esc_html__( 'Heading', 'fargo' ),
	'section'               => $prefix . '_testimonials_colors_section',
	'settings'              => $prefix . '_testimonials_colors_heading',
) ) );

/**
 * Title Color
 */ 
$wp_customize->add_setting( $prefix . '_testimonials_colors_title', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_testimonials_colors_title', array(
    'label'                 => esc_html__( 'Title Color', 'fargo' ),
    'section'               => $prefix . '_testimonials_colors_section',
    'settings'              => $prefix . '_testimonials_colors_title',
) ) );

/**
 * Sub Title Color
 */ 
$wp_customize->add_setting( $prefix . '_testimonials_colors_subtitle', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_testimonials_colors_subtitle', array(
    'label'                 => esc_html__( 'Subtitle Color', 'fargo' ),
    'section'               => $prefix . '_testimonials_colors_section',
    'settings'              => $prefix . '_testimonials_colors_subtitle',
) ) );

/**
 * Content Heading
 */
$wp_customize->add_setting( $prefix .'_testimonials_colors_content_heading', array(
	'sanitize_callback' 	=> 'wp_kses',
) );

$wp_customize->add_control( new Fargo_Customizer_Heading_Control( $wp_customize, $prefix .'_testimonials_colors_content_heading', array(
	'label'    				=> esc_html__( 'Content', 'fargo' ),
	'section'               => $prefix . '_testimonials_colors_section',
	'settings'              => $prefix . '_testimonials_colors_content_heading',
) ) );

/**
 * Description Color
 */ 
$wp_customize->add_setting( $prefix . '_testimonials_colors_description', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_testimonials_colors_description', array(
    'label'                 => esc_html__( 'Description Color', 'fargo' ),
    'section'               => $prefix . '_testimonials_colors_section',
    'settings'              => $prefix . '_testimonials_colors_description',
) ) );

/**
 * Name Color
 */ 
$wp_customize->add_setting( $prefix . '_testimonials_colors_name', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_testimonials_colors_name', array(
    'label'                 => esc_html__( 'Name Color', 'fargo' ),
    'section'               => $prefix . '_testimonials_colors_section',
    'settings'              => $prefix . '_testimonials_colors_name',
) ) );

/**
 * Position Color
 */ 
$wp_customize->add_setting( $prefix . '_testimonials_colors_position', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_testimonials_colors_position', array(
    'label'                 => esc_html__( 'Position Color', 'fargo' ),
    'section'               => $prefix . '_testimonials_colors_section',
    'settings'              => $prefix . '_testimonials_colors_position',
) ) );

/**
 * Content Background Color
 */
$wp_customize->add_setting( $prefix . '_testimonials_colors_content_background', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#fffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_testimonials_colors_content_background', array(
    'label'                 => esc_html__( 'Content Background Color', 'fargo' ),
    'section'               => $prefix . '_testimonials_colors_section',
    'settings'              => $prefix . '_testimonials_colors_content_background',
) ) );


/**
 * BACKGROUNDS
 */
$wp_customize->add_section( $prefix .'_testimonials_backgrounds_section', array(
	'title'    => __( 'Settings', 'fargo' ),
	'priority' => 4,
	'panel'    => $prefix . '_testimonials_panel',
) );

/**
 * Background Image
 */
$wp_customize->add_setting( $prefix . '_testimonials_backgrounds_image', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'esc_url',
	'default'               => '',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $prefix . '_testimonials_backgrounds_image', array(
    'label'                 => esc_html__( 'Background Image', 'fargo' ),
    'section'               => $prefix . '_testimonials_backgrounds_section',
    'settings'              => $prefix . '_testimonials_backgrounds_image',
) ) );

/**
 * Background Position
 */
$wp_customize->add_setting( $prefix . '_testimonials_backgrounds_position', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'sanitize_text_field',
	'default'               => 'initial',
) );

$wp_customize->add_control( $prefix . '_testimonials_backgrounds_position', array(
    'label'                 => esc_html__( 'Background Position', 'fargo' ),
	'type'                  => 'select',
    'section'               => $prefix . '_testimonials_backgrounds_section',
	'settings'              => $prefix . '_testimonials_backgrounds_position',
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
$wp_customize->add_setting( $prefix . '_testimonials_backgrounds_size', array(
	'transport'             => 'postMessage',
    'sanitize_callback'     => 'sanitize_text_field',
	'default'               => 'auto',
) );

$wp_customize->add_control( $prefix . '_testimonials_backgrounds_size', array(
    'label'      		    => esc_html__( 'Background Size', 'fargo' ),
	'type'                  => 'select',
    'section'               => $prefix . '_testimonials_backgrounds_section',
	'settings'              => $prefix . '_testimonials_backgrounds_size',
    'choices'               => array(
        'auto'              => esc_html__( 'Default', 'fargo' ),
        'contain'           => esc_html__( 'Fit to Screen', 'fargo' ),
        'cover'             => esc_html__( 'Fill Screen', 'fargo' ),
    ),
) );

/**
 * Background Repeat
 */
$wp_customize->add_setting( $prefix . '_testimonials_backgrounds_repeat', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'sanitize_text_field',
	'default'               => 'initial',
) );

$wp_customize->add_control( $prefix . '_testimonials_backgrounds_repeat', array(
    'label'     		    => esc_html__( 'Background Repeat', 'fargo' ),
	'type'                  => 'select',
    'section'               => $prefix . '_testimonials_backgrounds_section',
	'settings'              => $prefix . '_testimonials_backgrounds_repeat',
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
$wp_customize->add_setting( $prefix . '_testimonials_backgrounds_attachment', array(
    'transport'        		=> 'postMessage',
    'sanitize_callback' 	=> 'sanitize_text_field',
	'default'               => 'initial',
) );

$wp_customize->add_control( $prefix . '_testimonials_backgrounds_attachment', array(
    'label'                 => esc_html__( 'Background Attachment', 'fargo' ),
	'type'                  => 'select',
    'section'               => $prefix . '_testimonials_backgrounds_section',
	'settings'              => $prefix . '_testimonials_backgrounds_attachment',
    'choices'               => array(
		'initial'         	=> esc_html__( 'Default', 'fargo' ),
		'scroll' 	        => esc_html__( 'Scroll', 'fargo' ),
		'fixed' 	        => esc_html__( 'Fixed', 'fargo' )
    ),
) );

/**
 * Background Overlay Enable
 */
$wp_customize->add_setting( $prefix . '_testimonials_backgrounds_overlay', array(
    'transport'             => 'postMessage',
	'sanitize_callback'     => 'fargo_sanitize_checkbox',
	'default'               => 0,
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_testimonials_backgrounds_overlay', array(
	'label'                 => esc_html__( 'Overlay Enable', 'fargo' ),
	'type'                  => 'mte-toggle',
	'section'               => $prefix . '_testimonials_backgrounds_section',
	'settings'              => $prefix . '_testimonials_backgrounds_overlay',
) ) );

/**
 * Background Overlay Color
 */
$wp_customize->add_setting( $prefix . '_testimonials_backgrounds_overlay_color', array(
    'transport'             => 'postMessage',
	'sanitize_callback'     => 'fargo_sanitize_color',
	'default'               => '#ffffff',		
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_testimonials_backgrounds_overlay_color', array(
    'label'                 => esc_html__( 'Overlay Color', 'fargo' ),
    'section'               => $prefix . '_testimonials_backgrounds_section',
    'settings'              => $prefix . '_testimonials_backgrounds_overlay_color',
) ) );