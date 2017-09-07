<?php
/**
 * Footer Customizer Options
 *
 * @since 1.0.0
 */
 
 if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Fargo_Footer_Customizer { 

	public function __construct() {
		
		add_action( 'customize_register', 	array( $this, 'customizer_options' ) );
		add_filter( 'fargo_head_css', 		array( $this, 'head_css' ) );

	}
 
    public function customizer_options( $wp_customize ) {

		$panel  = 'fargo_panel_footer';
		$prefix = 'fargo';	
	
		$wp_customize->add_panel( $panel, array(
			'priority'            => 18,
			'capability'          => 'edit_theme_options',
			'theme_supports'      => '',
			'title'               => esc_html__( 'Footer', 'fargo' ),
		) );

		/**
		 * FOOTER WIDGET
		 */
		$wp_customize->add_section( $prefix . '_footer_section_widget', array(
			'title'                 => esc_html__( 'Footer Widget', 'fargo' ),
			'priority'              => 1,
			'panel'                 => $panel,
		) );

		/**
		 * Footer Widget Enable
		 */
		$wp_customize->add_setting( $prefix . '_footer_widget_general_enable', array(
			'sanitize_callback'     => $prefix . '_sanitize_checkbox',
			'default'               => 1,
		) );
			
		$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_footer_widget_general_enable', array(
			'type'                  => 'mte-toggle',
			'label'                 => esc_html__( 'Enable Footer Widget', 'fargo' ),
			'section'               => $prefix . '_footer_section_widget',
		) ) );

		/**
		 * Footer Widget Background Color
		 */
		$wp_customize->add_setting( $prefix . '_footer_widget_colors_background', array(
			'sanitize_callback'     => 'fargo_sanitize_color',
			'default'               => '#ffffff',
			'transport'             => 'postMessage',
		) );

		$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_footer_widget_colors_background', array(
			'label'                 => esc_html__( 'Background Color', 'fargo' ),
			'section'               => $prefix . '_footer_section_widget',
		) ) );

		/**
		 * Footer Widget Border Color
		 */
		$wp_customize->add_setting( $prefix . '_footer_widget_colors_border', array(
			'sanitize_callback'     => 'fargo_sanitize_color',
			'default'               => '#ffffff',
			'transport'             => 'postMessage',
		) );

		$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_footer_widget_colors_border', array(
			'label'                 => esc_html__( 'Border Color', 'fargo' ),
			'section'               => $prefix . '_footer_section_widget',
		) ) );

		/**
		 * Footer Widget Elements Color
		 */
		$wp_customize->add_setting( $prefix . '_footer_widget_colors_element', array(
			'sanitize_callback'     => 'fargo_sanitize_color',
			'default'               => '#ffffff',
			'transport'             => 'postMessage',
		) );

		$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_footer_widget_colors_element', array(
			'label'                 => esc_html__( 'Elements Color', 'fargo' ),
			'section'               => $prefix . '_footer_section_widget',
		) ) );

		/**
		 * Footer Widget Title Color
		 */
		$wp_customize->add_setting( $prefix . '_footer_widget_colors_title', array(
			'sanitize_callback'     => 'fargo_sanitize_color',
			'default'               => '#ffffff',
			'transport'             => 'postMessage',
		) );

		$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_footer_widget_colors_title', array(
			'label'                 => esc_html__( 'Title Color', 'fargo' ),
			'section'               => $prefix . '_footer_section_widget',
		) ) );

		/**
		 * Footer Widget Text Color
		 */
		$wp_customize->add_setting( $prefix . '_footer_widget_colors_text', array(
			'sanitize_callback'     => 'fargo_sanitize_color',
			'default'               => '#ffffff',
			'transport'             => 'postMessage',
		) );

		$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_footer_widget_colors_text', array(
			'label'                 => esc_html__( 'Text Color', 'fargo' ),
			'section'               => $prefix . '_footer_section_widget',
		) ) );

		/**
		 * Footer Widget link Color
		 */
		$wp_customize->add_setting( $prefix . '_footer_widget_colors_link', array(
			'sanitize_callback'     => 'fargo_sanitize_color',
			'default'               => '#ffffff',
			'transport'             => 'postMessage',
		) );

		$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_footer_widget_colors_link', array(
			'label'                 => esc_html__( 'Link Color', 'fargo' ),
			'section'               => $prefix . '_footer_section_widget',
		) ) );

		/**
		 * Footer Widget link Color: Hover 
		 */
		$wp_customize->add_setting( $prefix . '_footer_widget_colors_link_hover', array(
			'sanitize_callback'     => 'fargo_sanitize_color',
			'default'               => '#ffffff',
			'transport'             => 'postMessage',
		) );

		$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_footer_widget_colors_link_hover', array(
			'label'                 => esc_html__( 'Link Color: Hover', 'fargo' ),
			'section'               => $prefix . '_footer_section_widget',
		) ) );


		/**
		 * FOOTER BOTTOM
		 */
		 
		$wp_customize->add_section( $prefix . '_footer_section_bottom', array(
			'title'                 => esc_html__( 'Footer Bottom', 'fargo' ),
			'priority'              => 2,
			'panel'                 => $panel,
		) );

		/**
		 * Footer Bottom Enable
		 */
		$wp_customize->add_setting( $prefix . '_footer_bottom_general_enable', array(
			'sanitize_callback'     => $prefix . '_sanitize_checkbox',
			'default'               => 1,
		) );
			
		$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_footer_bottom_general_enable', array(
			'type'                  => 'mte-toggle',
			'label'                 => esc_html__( 'Enable Footer Bottom', 'fargo' ),
			'section'               => $prefix . '_footer_section_bottom',
		) ) );

		/**
		 * Footer Bottom Position Text
		 */
		$wp_customize->add_setting( $prefix . '_footer_bottom_general_position', array(
			'default'               => 'center',
			'sanitize_callback'     => 'sanitize_text_field',
			'transport'             => 'postMessage',
		) );

		$wp_customize->add_control( $prefix . '_footer_bottom_general_position', array(
			'label'                 => esc_html__( 'Position Text', 'fargo' ),
			'section'               => $prefix . '_footer_section_bottom',
			'type'                  => 'select',
			'choices'               => array(
				'center'            => esc_html__( 'Center', 'fargo' ),
				'left'              => esc_html__( 'Left', 'fargo' ),
				'right'             => esc_html__( 'Right', 'fargo' ),
			),
		) );

		/**
		 * Footer Bottom Copyright Text
		 */
		$wp_customize->add_setting( $prefix .'_footer_bottom_general_copyright', array(
			'sanitize_callback'     => 'wp_kses_post',
			'default'               => '',
			'transport'             => 'postMessage'
		) );

		$wp_customize->add_control( new Epsilon_Editor_Custom_Control( $wp_customize, $prefix .'_footer_bottom_general_copyright', array(
			'label'                 => esc_html__( 'Footer Copyright', 'fargo' ),
			'section'               => $prefix . '_footer_section_bottom',
		) ) );

		$wp_customize->selective_refresh->add_partial( $prefix .'_footer_bottom_general_copyright', array(
			'selector'              => '#footer .footer-bottom .bottom-copyright',
		) );

		/**
		 * Footer Bottom Background Color
		 */
		$wp_customize->add_setting( $prefix . '_footer_bottom_colors_background', array(
			'sanitize_callback'     => 'fargo_sanitize_color',
			'default'               => '#ffffff',
			'transport'             => 'postMessage',
		) );

		$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_footer_bottom_colors_background', array(
			'label'                 => esc_html__( 'Background Color', 'fargo' ),
			'section'               => $prefix . '_footer_section_bottom',
		) ) );

		/**
		 * Footer Bottom Text Color
		 */
		$wp_customize->add_setting( $prefix . '_footer_bottom_colors_text', array(
			'sanitize_callback'     => 'fargo_sanitize_color',
			'default'               => '#ffffff',
			'transport'             => 'postMessage',
		) );

		$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_footer_bottom_colors_text', array(
			'label'                 => esc_html__( 'Text Color', 'fargo' ),
			'section'               => $prefix . '_footer_section_bottom',
		) ) );

		/**
		 * Footer Bottom link Color
		 */
		$wp_customize->add_setting( $prefix . '_footer_bottom_colors_link', array(
			'sanitize_callback'     => 'fargo_sanitize_color',
			'default'               => '#ffffff',
			'transport'             => 'postMessage',
		) );

		$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_footer_bottom_colors_link', array(
			'label'                 => esc_html__( 'Link Color', 'fargo' ),
			'section'               => $prefix . '_footer_section_bottom',
		) ) );

		/**
		 * Footer Bottom link Color: Hover 
		 */
		$wp_customize->add_setting( $prefix . '_footer_bottom_colors_link_hover', array(
			'sanitize_callback'     => 'fargo_sanitize_color',
			'default'               => '#ffffff',
			'transport'             => 'postMessage',
		) );

		$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_footer_bottom_colors_link_hover', array(
			'label'                 => esc_html__( 'Link Color: Hover', 'fargo' ),
			'section'               => $prefix . '_footer_section_bottom',
		) ) );
	}
 
 
 
 }
return new Fargo_Footer_Customizer();











