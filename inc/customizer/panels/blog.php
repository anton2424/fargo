<?php
/**
 * Blog Section Customizer Options
 *
 * @since 1.0.0
 */
 
 if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
 
/**
 * Variable
 */
$panel  = 'fargo_panel_blog';
$prefix = 'fargo';

/**
 * Panel
 */
$wp_customize->add_section( $panel , array(
    'priority'      	    => fargo_get_section_position($panel),
	'capability'            => 'edit_theme_options',
	'theme_supports'        => '',
    'title'                 => esc_html__( 'Blog', 'fargo' ), 
    'panel' 	            => 'fargo_frontpage_panel'
) );

/**
 * Tabs
 */
$wp_customize->add_setting( $prefix . '_blog_tab', array(
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_kses_post'
    )
);

$wp_customize->add_control( new Fargo_Customizer_Tab_Control( $wp_customize, $prefix . '_blog_tab', array(
	'type'                  => 'epsilon-tab',
	'section'               => $panel,
	'buttons'               => array(
	    array(
			'name'          => esc_html__( 'General', 'fargo' ),
			'fields'        => array(
				$prefix . '_blog_general_enable',
				$prefix . '_blog_general_title',
				$prefix . '_blog_general_subtitle',
				$prefix . '_blog_general_button_text',
				),
			'active'        => true
		),
		array(
			'name'          => esc_html__( 'Settings', 'fargo' ),
			'fields'        => array(
				$prefix . '_blog_settings_width',
				$prefix . '_blog_settings_layout',
				$prefix . '_blog_settings_number_posts',
				$prefix . '_blog_settings_words_number',
				),
			'active'        => true
			),
	   array(
			'name'          => esc_html__( 'Colors', 'fargo' ),
			'fields'        => array(
				$prefix . '_blog_colors_background',
				$prefix . '_blog_colors_title',
				$prefix . '_blog_colors_subtitle',
				$prefix . '_blog_colors_post_text',
				$prefix . '_blog_colors_post_text_hover',
				$prefix . '_blog_colors_post_content',
				$prefix . '_blog_colors_post_box',
				$prefix . '_blog_colors_button',
				$prefix . '_blog_colors_button_hover',
				$prefix . '_blog_colors_button_text',
				$prefix . '_blog_colors_button_text_hover',
				$prefix . '_blog_post_button_color',
				$prefix . '_blog_post_button_hover_color',
			),
		),
		array(
			'name'          => esc_html__( 'Backgrounds', 'fargo' ),
			'fields'        => array(
				$prefix . '_blog_backgrounds_image',
				$prefix . '_blog_backgrounds_position',
				$prefix . '_blog_backgrounds_size',
				$prefix . '_blog_backgrounds_repeat',
				$prefix . '_blog_backgrounds_attachment',
				$prefix . '_blog_backgrounds_overlay',
				$prefix . '_blog_backgrounds_overlay_color',
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
$wp_customize->add_setting( $prefix . '_blog_general_enable', array(
    'sanitize_callback'     => 'fargo_sanitize_checkbox',
    'default'               => 1,
) );
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_blog_general_enable', array(
    'type'                  => 'mte-toggle',
    'label'                 => esc_html__( 'Section Enable', 'fargo' ),
    'section'               => $panel,
	'settings'              => $prefix . '_blog_general_enable',
) ) );

/**
 * Title
 */
$wp_customize->add_setting( $prefix .'_blog_general_title', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_html',
    'default'               => esc_html__( 'BLOG', 'fargo' ),
) );

$wp_customize->add_control( $prefix .'_blog_general_title', array(
    'label'                 => esc_html__( 'Title', 'fargo' ),
    'section'               => $panel,
	'settings'              => $prefix . '_blog_general_title',
) );

$wp_customize->selective_refresh->add_partial( $prefix .'_blog_general_title', array(
    'selector'              => '#blog .section-header h2',
) );

/**
 * Subtitle
 */
$wp_customize->add_setting( $prefix .'_blog_general_subtitle', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_html',
    'default'               => esc_html__( 'This is a description for the Blog section. You can set it up in the Customizer > Front Page Sections > Blog.', 'fargo' ),
) );

$wp_customize->add_control( $prefix .'_blog_general_subtitle', array(
    'label'                 => esc_html__( 'Subtitle', 'fargo' ),
    'section'               => $panel,
	'settings'              => $prefix . '_blog_general_subtitle',
) );

$wp_customize->selective_refresh->add_partial( $prefix .'_blog_general_subtitle', array(
    'selector'              => '#blog .section-header h5',
) );

/**
 * Button Text
 */
$wp_customize->add_setting( $prefix .'_blog_general_button_text', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'sanitize_text_field',
    'default'               => esc_html__( 'See blog', 'fargo' ),
) );

$wp_customize->add_control( $prefix .'_blog_general_button_text', array(
    'label'                 => esc_html__( 'Button Text', 'fargo' ),
    'section'               => $panel,
	'settings'              => $prefix . '_blog_general_button_text',
) );

$wp_customize->selective_refresh->add_partial( $prefix .'_blog_general_button_text', array(
    'selector'              => '#blog .latest-news-button',
) );

/**
 * SETTINGS
 */

/**
 * Full Width
 */
$wp_customize->add_setting( $prefix . '_blog_settings_width', array(
	'transport'             => 'postMessage',
	'sanitize_callback'     => 'fargo_sanitize_checkbox',
	'default'               => 0,
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_blog_settings_width', array(
	'type'                  => 'mte-toggle',
	'label'                 => esc_html__( 'Full Width', 'fargo' ),
	'section'               => $panel,
	'settings'              => $prefix . '_blog_general_button_text',
) ) );
 
/**
 * Layout
 */
$wp_customize->add_setting( $prefix .'_blog_settings_layout', array(
	'sanitize_callback'	    => 'sanitize_text_field',
    'default'               => 3,
) );

$wp_customize->add_control( new Fargo_Customizer_Range_Control( $wp_customize, $prefix .'_blog_settings_layout', array(
    'label'                 => esc_html__( 'Layouts', 'fargo' ),
    'section'               => $panel,
	'settings'              => $prefix . '_blog_settings_layout',
    'choices'               => array(
        'min'               => 1,
        'max'  => 5,
        'step' => 1,
	),
) ) );

/**
 * Number Post
 */
$wp_customize->add_setting( $prefix .'_blog_settings_number_posts', array(
	'sanitize_callback'     => 'sanitize_text_field',
    'default'               => 3,
) );

$wp_customize->add_control( new Fargo_Customizer_Range_Control( $wp_customize, $prefix .'_blog_settings_number_posts', array(
    'label'                 => esc_html__( 'Number of posts', 'fargo' ),
    'section'               => $panel,
	'settings'              => $prefix . '_blog_settings_number_posts',
    'choices'               => array(
        'min'               => 3,
        'max'               => 9,
        'step'              => 3,
    ),
) ) );

/**
 * Words Post
 */
$wp_customize->add_setting( $prefix .'_blog_settings_words_number', array(
   'sanitize_callback' 	    => 'sanitize_text_field',
   'default'                => 20,
) );

$wp_customize->add_control( new Fargo_Customizer_Range_Control( $wp_customize, $prefix .'_blog_settings_words_number', array(
    'label'                 => esc_html__( 'Number of words in post entry', 'fargo' ),
	'section'               => $panel,
	'settings'              => $prefix . '_blog_settings_words_number',
    'choices'               => array(
        'min'               => 20,
        'max'               => 100,
        'step'              => 10,
        ),
) ) );

/**
 * COLORS
 */

/**
 * Background Color
 */
$wp_customize->add_setting( $prefix . '_blog_colors_background', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_blog_colors_background', array(
    'label'                 => esc_html__( 'Background Color', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_blog_colors_background',
) ) );

/**
 * Title Color
 */
$wp_customize->add_setting( $prefix . '_blog_colors_title', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_blog_colors_title', array(
    'label'                 => esc_html__( 'Title Color', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_blog_colors_title',
) ) );

/**
 * Subtitle Color
 */
$wp_customize->add_setting( $prefix . '_blog_colors_subtitle', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_blog_colors_subtitle', array(
    'label'                 => esc_html__( 'Subtitle Color', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_blog_colors_subtitle',
) ) );

/**
 * Post Title Text Color
 */
$wp_customize->add_setting( $prefix . '_blog_colors_post_text', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_blog_colors_post_text', array(
    'label'                 => esc_html__( 'Post Title Color', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_blog_colors_post_text',
) ) );

/**
 * Post Title Text Color Hover
 */
$wp_customize->add_setting( $prefix . '_blog_colors_post_text_hover', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_blog_colors_post_text_hover', array(
    'label'                 => esc_html__( 'Post Title Hover Color', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_blog_colors_post_text_hover',
) ) );

/**
 * Post Content Text Color
 */
$wp_customize->add_setting( $prefix . '_blog_colors_post_content', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_blog_colors_post_content', array(
    'label'                 => esc_html__( 'Post Content Color', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_blog_colors_post_content',
) ) );

/**
 * Post Box Background Color
 */
$wp_customize->add_setting( $prefix . '_blog_colors_post_box', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_blog_colors_post_box', array(
    'label'                 => esc_html__( 'Post Box Background Color', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_blog_colors_post_box',
) ) );

/**
 * Blog Button Background Color
 */
$wp_customize->add_setting( $prefix . '_blog_colors_button', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_blog_colors_button', array(
    'label'                 => esc_html__( 'Blog Button Background Color', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_blog_colors_button',
) ) );

/**
 * Blog Button Background Color Hover
 */
$wp_customize->add_setting( $prefix . '_blog_colors_button_hover', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_blog_colors_button_hover', array(
    'label'                 => esc_html__( 'Blog Button Background Color: Hover', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_blog_colors_button_hover',
) ) );


/**
 * Blog Button Text Color
 */
$wp_customize->add_setting( $prefix . '_blog_colors_button_text', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_blog_colors_button_text', array(
    'label'                 => esc_html__( 'Blog Button Text Color', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_blog_colors_button_text',
) ) );

/**
 * Blog Button Text Color Hover
 */
$wp_customize->add_setting( $prefix . '_blog_colors_button_text_hover', array(
	'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_blog_colors_button_text_hover', array(
    'label'                 => esc_html__( 'Blog Button Text Color: Hover', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_blog_colors_button_text_hover',
) ) );

/**
 * BACKGROUNDS
 */

/**
 * Background Image
 */
$wp_customize->add_setting( $prefix . '_blog_backgrounds_image', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'esc_url',
	'default'               => '',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $prefix . '_blog_backgrounds_image', array(
    'label'                 => esc_html__( 'Background Image', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_blog_backgrounds_image',
) ) );

/**
 * Background Position
 */
$wp_customize->add_setting( $prefix . '_blog_backgrounds_position', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'sanitize_text_field',
	'default'               => 'initial',
) );

$wp_customize->add_control( $prefix . '_blog_backgrounds_position', array(
    'label'                 => esc_html__( 'Background Position', 'fargo' ),
	'type'                  => 'select',
    'section'               => $panel,
	'settings'              => $prefix . '_blog_backgrounds_position',
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
$wp_customize->add_setting( $prefix . '_blog_backgrounds_size', array(
	'transport'             => 'postMessage',
    'sanitize_callback'     => 'sanitize_text_field',
	'default'               => 'auto',
) );

$wp_customize->add_control( $prefix . '_blog_backgrounds_size', array(
    'label'      		    => esc_html__( 'Background Size', 'fargo' ),
	'type'                  => 'select',
    'section'               => $panel,
	'settings'              => $prefix . '_blog_backgrounds_size',
    'choices'               => array(
        'auto'              => esc_html__( 'Default', 'fargo' ),
        'contain'           => esc_html__( 'Fit to Screen', 'fargo' ),
        'cover'             => esc_html__( 'Fill Screen', 'fargo' ),
    ),
) );

/**
 * Background Repeat
 */
$wp_customize->add_setting( $prefix . '_blog_backgrounds_repeat', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'sanitize_text_field',
	'default'               => 'initial',
) );

$wp_customize->add_control( $prefix . '_blog_backgrounds_repeat', array(
    'label'     		    => esc_html__( 'Background Repeat', 'fargo' ),
	'type'                  => 'select',
    'section'               => $panel,
	'settings'              => $prefix . '_blog_backgrounds_repeat',
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
$wp_customize->add_setting( $prefix . '_blog_backgrounds_attachment', array(
    'transport'        		=> 'postMessage',
    'sanitize_callback' 	=> 'sanitize_text_field',
	'default'               => 'initial',
) );

$wp_customize->add_control( $prefix . '_blog_backgrounds_attachment', array(
    'label'                 => esc_html__( 'Background Attachment', 'fargo' ),
	'type'                  => 'select',
    'section'               => $panel,
	'settings'              => $prefix . '_blog_backgrounds_attachment',
    'choices'               => array(
		'initial'         	=> esc_html__( 'Default', 'fargo' ),
		'scroll' 	        => esc_html__( 'Scroll', 'fargo' ),
		'fixed' 	        => esc_html__( 'Fixed', 'fargo' )
    ),
) );

/**
 * Background Overlay Enable
 */
$wp_customize->add_setting( $prefix . '_blog_backgrounds_overlay', array(
    'transport'             => 'postMessage',
	'sanitize_callback'     => 'fargo_sanitize_checkbox',
	'default'               => 0,
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_blog_backgrounds_overlay', array(
	'label'                 => esc_html__( 'Overlay Enable', 'fargo' ),
	'type'                  => 'mte-toggle',
	'section'               => $panel,
	'settings'              => $prefix . '_blog_backgrounds_overlay',
) ) );

/**
 * Background Overlay Color
 */
$wp_customize->add_setting( $prefix . '_blog_backgrounds_overlay_color', array(
    'transport'             => 'postMessage',
	'sanitize_callback'     => 'fargo_sanitize_color',
	'default'               => '#ffffff',		
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_blog_backgrounds_overlay_color', array(
    'label'                 => esc_html__( 'Overlay Color', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_blog_backgrounds_overlay_color',
) ) );