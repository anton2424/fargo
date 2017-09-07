	<?php
/**
 * Features Section Customizer Options
 *
 * @since 1.0.2
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
 
class Fargo_Features_Customizer { 

	/**
	 * Setup class.
	 *
	 * @since 1.0
	 */
	public function __construct() {
		
		add_action( 'customize_register', 	array( $this, 'customizer_options' ) );
		add_filter( 'fargo_head_css', 		array( $this, 'head_css' ) );

	}

	/**
	 * Customizer options
	 *
	 * @since 1.0.0
	 */
    public function customizer_options( $wp_customize ) {	
		 
		/**
		 * Panel
		 */
		$wp_customize->add_panel ( new Fargo_Customizer_Multipanel_Control( $wp_customize, 'fargo_features_panel', array(
			'title'    => esc_html__( 'Features', 'fargo' ),
			'priority' => 2,
			'panel'    => 'fargo_frontpage_sections_panel'
		) ) );

		/**
		 * GENERAL
		 */
		$wp_customize->add_section( 'fargo_features_general_section', array(
			'title'    => __( 'General', 'fargo' ),
			'priority' => 1,
			'panel'    => 'fargo_features_panel',
		) );

		/**
		 * Section Enable
		 */
		$wp_customize->add_setting( 'fargo_features_general_enable', array(
			'sanitize_callback'     => 'fargo_sanitize_checkbox',
			'default'               => 1,
		) );
			
		$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, 'fargo_features_general_enable', array(
			'type'                  => 'mte-toggle',
			'label'                 => esc_html__( 'Section Enable', 'fargo' ),
			'section'               => 'fargo_features_general_section',
			'settings'              => 'fargo_features_general_enable',
		) ) );

		/**
		 * Title
		 */
		$wp_customize->add_setting( 'fargo_features_general_title', array(
			'transport'             => 'postMessage',
			'sanitize_callback'     => 'sanitize_text_field',
			'default'               => esc_html__( 'FEATURES', 'fargo' ),
		) );
			
		$wp_customize->add_control( 'fargo_features_general_title', array(
			'label'                 => esc_html__( 'Title', 'fargo' ),
			'section'               => 'fargo_features_general_section',
			'settings'              => 'fargo_features_general_title',
		) );
			
		$wp_customize->selective_refresh->add_partial( 'fargo_features_general_title', array(
			'selector'              => '#features.front-page-section .section-header h2',
		) );

		/**
		 * Sub Title
		 */
		$wp_customize->add_setting( 'fargo_features_general_subtitle', array(
			'sanitize_callback'     => 'wp_kses_post',
			'transport'             => 'postMessage',
			'default'               => esc_html__( 'This is a description for the Features section. You can set it up in the Customizer > Front Page Sections > Features and add items by clicking on Add or edit Features.', 'fargo' ),

		) );

		$wp_customize->add_control ( $wp_customize, 'fargo_features_general_subtitle', array(
			'label'                 => esc_html__( 'Subtitle', 'fargo' ),
			'section'               => 'fargo_features_general_section',
			'settings'              => 'fargo_features_general_subtitle',
		) ) ;

		$wp_customize->selective_refresh->add_partial( 'fargo_features_general_subtitle', array(
			'selector'              => '#features.front-page-section .section-header h5',
		) );

		/**
		 * General Content
		 */	
		$wp_customize->add_setting( 'fargo_features_general_content', array(
			'transport'         => $selective_refresh ? 'postMessage' : 'refresh',
		) );

		$hestia_features_content_control = $wp_customize->get_setting( 'fargo_features_general_content' );
		if ( ! empty( $hestia_features_content_control ) ) {
		$hestia_features_content_control->default = json_encode( array(
				array(
					'icon_value' => 'fa-shopping-cart',
					'title'      => __( 'Woocomerce', 'fargo' ),
					'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'fargo' ),
					'link'       => '#',
					'color'      => '#e91e63',
				),
				array(
					'icon_value' => 'fa-desktop',
					'title'      => __( 'Responsive', 'fargo' ),
					'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'fargo' ),
					'link'       => '#',
					'color'      => '#00bcd4',
				),
				array(
					'icon_value' => 'fa-align-justify',
					'title'      => __( 'Content Bilder', 'fargo' ),
					'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'fargo' ),
					'link'       => '#',
					'color'      => '#4caf50',
				),
				array(
					'icon_value' => 'fa-gear',
					'title'      => __( 'Customizer', 'fargo' ),
					'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'fargo' ),
					'link'       => '#',
					'color'      => '#0072bc',
				),
						array(
					'icon_value' => 'fa-photo',
					'title'      => __( 'Parallax Effect', 'fargo' ),
					'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'fargo' ),
					'link'       => '#',
					'color'      => '#e91e63',
				),
				array(
					'icon_value' => 'fa-support',
					'title'      => __( 'Support', 'fargo' ),
					'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'fargo' ),
					'link'       => '#',
					'color'      => '#00bcd4',
				),
				array(
					'icon_value' => 'fa-html5',
					'title'      => __( 'HTML5 and CSS3', 'fargo' ),
					'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'fargo' ),
					'link'       => '#',
					'color'      => '#4caf50',
				),
				array(
					'icon_value' => 'fa-diamond',
					'title'      => __( 'Pixel Perfect', 'fargo' ),
					'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'fargo' ),
					'link'       => '#',
					'color'      => '#0072bc',
				),
						) );
			}
					
		$wp_customize->add_control( new Fargo_Repeater( $wp_customize, 'fargo_features_general_content', array(
						'label'                             => esc_html__( 'Features Content', 'fargo' ),
						'section'                           => 'fargo_features_general_section',
						'add_field_label'                   => esc_html__( 'Add Feature', 'fargo' ),
						'item_name'                         => esc_html__( 'Feature', 'fargo' ),
						'customizer_repeater_icon_control'  => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text_control'  => true,
						'customizer_repeater_link_control'  => true,
						'customizer_repeater_color_control' => true,
							'priority'    => 19,
					
					) ) );

		function features_general_content_callback() {
			$features_general_content = get_theme_mod( 'fargo_features_general_content' );
			features_general_content( $features_general_content, true );
		}

		/**
		 * SETTINGS
		 */
		$wp_customize->add_section( 'fargo_features_settings_section', array(
			'title'    => __( 'Settings', 'fargo' ),
			'priority' => 1,
			'panel'    => 'fargo_features_panel',
		) );

		/**
		 * Title
		 */
		$wp_customize->add_setting( 'fargo_features_settings_id', array(
			'transport'             => 'postMessage',
			'sanitize_callback'     => 'sanitize_text_field',
			'default'               => esc_html__( 'features', 'fargo' ),
		) );
			
		$wp_customize->add_control( 'fargo_features_settings_id', array(
			'label'                 => esc_html__( 'Section ID', 'fargo' ),
			'section'               => 'fargo_features_settings_section',
			'settings'              => 'fargo_features_settings_id',
		) );

		/**
		 * Style Icon Heading
		 */
		$wp_customize->add_setting( 'fargo_features_settings_section_heading', array(
			'sanitize_callback' 	=> 'wp_kses',
		) );

		$wp_customize->add_control( new Fargo_Customizer_Heading_Control( $wp_customize, 'fargo_features_settings_section_heading', array(
			'label'    				=> esc_html__( 'Layout', 'fargo' ),
			'section'               => 'fargo_features_settings_section',
			'styles'                => 'fargo_features_styles_icon_heading',
		) ) );

		/**
		 * Layout
		 */
		$wp_customize->add_setting( 'fargo_features_settings_section_layout', array(
			'sanitize_callback'     => 'sanitize_text_field',
			'default'               => 3,
		) );

		$wp_customize->add_control( 'fargo_features_settings_section_layout', array(
			'label'                 => esc_html__( 'Layout', 'fargo' ),
			'type'                  => 'select',
			'section'               => 'fargo_features_settings_section',
			'settings'              => 'fargo_features_settings_section_layout',
			'choices'               => array(
				6                   => esc_html__( '2 Columns', 'fargo' ),
				4                   => esc_html__( '3 Columns', 'fargo' ),
				3                   => esc_html__( '4 Columns', 'fargo' ),
			),
		) );

		/**
		 * Full Width
		 */
		$wp_customize->add_setting( 'fargo_features_settings_section_width', array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'fargo_sanitize_checkbox',
			'default'           => 0,
		) );
			
		$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, 'fargo_features_settings_section_width', array(
			'type'                  => 'mte-toggle',
			'label'                 => esc_html__( 'Full Width', 'fargo' ),
			'section'               => 'fargo_features_settings_section',
			'settings'              => 'fargo_features_settings_section_width',
		) ) );

		/**
		 * Section Padding
		 */
		$wp_customize->add_setting( 'fargo_features_settings_section_padding', array(
			'transport'        		=> 'postMessage',
			'default'               => 25,
		) );

		$wp_customize->add_control( new Fargo_Customizer_Range_Control( $wp_customize, 'fargo_features_settings_section_padding', array(
			'label'                 => esc_html__( 'Section Item Padding', 'fargo' ),
			'section'               => 'fargo_features_settings_section',
			'settings'              => 'fargo_features_settings_section_padding',
			'choices'               => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
		) ) );

		/**
		 * Font Size Heading
		 */
		$wp_customize->add_setting( 'fargo_features_settings_font_heading', array(
			'sanitize_callback' 	=> 'wp_kses',
		) );

		$wp_customize->add_control( new Fargo_Customizer_Heading_Control( $wp_customize, 'fargo_features_settings_font_heading', array(
			'label'    				=> esc_html__( 'Font Size', 'fargo' ),
			'section'               => 'fargo_features_settings_section',
			'styles'                => 'fargo_features_settings_font_heading',
		) ) );

		/**
		 * Font Size Title
		 */
		$wp_customize->add_setting( 'fargo_features_settings_section_font_title', array(
			'transport'        		=> 'postMessage',
			'default'               => 15,
		) );

		$wp_customize->add_control( new Fargo_Customizer_Range_Control( $wp_customize, 'fargo_features_settings_section_font_title', array(
			'label'                 => esc_html__( 'Font Size Title', 'fargo' ),
			'section'               => 'fargo_features_settings_section',
			'settings'              => 'fargo_features_settings_section_font_title',
			'choices'               => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
		) ) );

		/**
		 * Font Size Description
		 */
		$wp_customize->add_setting( 'fargo_features_settings_section_font_description', array(
			'transport'        		=> 'postMessage',
			'default'               => 15,
		) );

		$wp_customize->add_control( new Fargo_Customizer_Range_Control( $wp_customize, 'fargo_features_settings_section_font_description', array(
			'label'                 => esc_html__( 'Font Size Description', 'fargo' ),
			'section'               => 'fargo_features_settings_section',
			'settings'              => 'fargo_features_settings_section_font_description',
			'choices'               => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
		) ) );

		/**
		 * STYLES
		 */
		$wp_customize->add_section( 'fargo_features_styles_section', array(
			'title'    => __( 'Styles', 'fargo' ),
			'priority' => 3,
			'panel'    => 'fargo_features_panel',
		) );

		/**
		 * Style Icon Heading
		 */
		$wp_customize->add_setting( 'fargo_features_styles_icon_heading', array(
			'sanitize_callback' 	=> 'wp_kses',
		) );

		$wp_customize->add_control( new Fargo_Customizer_Heading_Control( $wp_customize, 'fargo_features_styles_icon_heading', array(
			'label'    				=> esc_html__( 'Icons Style', 'fargo' ),
			'section'               => 'fargo_features_styles_section',
			'settings'                => 'fargo_features_styles_icon_heading',
		) ) );
		 
		/**
		 * Style Icon
		 */
		$wp_customize->add_setting( 'fargo_features_styles_icon', array(
			'sanitize_callback'     => 'sanitize_text_field',
			'default'               => 1,
		) );

		$wp_customize->add_control( 'fargo_features_styles_icon', array(
			'label'                 => esc_html__( 'Icon Style', 'fargo' ),
			'type'                  => 'select',
			'section'               => 'fargo_features_styles_section',
			'settings'               => 'fargo_features_styles_icon',
			'choices'               => array(
				1                   => esc_html__( 'Default', 'fargo' ),
				2                   => esc_html__( 'Round', 'fargo' ),
				3                   => esc_html__( 'Round Border', 'fargo' ),
				4                   => esc_html__( 'Square', 'fargo' ),
				5                   => esc_html__( 'Square Border', 'fargo' ),
			),
		) );

		/**
		 * Icon Font Size
		 */
		$wp_customize->add_setting( 'fargo_features_styles_icon_font', array(
			'transport'        		=> 'postMessage',
			'default'               => 15,
		) );

		$wp_customize->add_control( new Fargo_Customizer_Range_Control( $wp_customize, 'fargo_features_styles_icon_font', array(
			'label'                 => esc_html__( 'Icon Font Size', 'fargo' ),
			'section'               => 'fargo_features_styles_section',
			'settings'              => 'fargo_features_styles_icon_font',
			'choices'               => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
		) ) );

		/**
		 * Icon Border Type
		 */
		$wp_customize->add_setting( 'fargo_features_styles_icon_border', array(
			'transport'        		=> 'postMessage',
			'sanitize_callback'     => 'sanitize_text_field',
			'default'               => 'solid',
		) );

		$wp_customize->add_control( 'fargo_features_styles_icon_border', array(
			'label'                 => esc_html__( 'Icon Border Type (px)', 'fargo' ),
			'type'                  => 'select',
			'section'               => 'fargo_features_styles_section',
			'settings'              => 'fargo_features_styles_icon_border',
			'active_callback'       => 'fargo_cac_has_icon_border',
			'choices'               => array(
				'solid'             => esc_html__( 'Solid', 'fargo' ),
				'double'            => esc_html__( 'Double', 'fargo' ),
				'dotted'            => esc_html__( 'Dotted', 'fargo' ),
				'dashed'            => esc_html__( 'Dashed', 'fargo' ),
			),
		) );

		/**
		 * Icon  Border Padding
		 */
		$wp_customize->add_setting( 'fargo_features_styles_icon_border_padding', array(
			'transport'        		=> 'postMessage',
			'default'               => 25,
		) );

		$wp_customize->add_control( new Fargo_Customizer_Range_Control( $wp_customize, 'fargo_features_styles_icon_border_padding', array(
			'label'                 => esc_html__( 'Icon Border Padding (px)', 'fargo' ),
			'section'               => 'fargo_features_styles_section',
			'settings'              => 'fargo_features_styles_icon_border_padding',
			'active_callback'       => 'fargo_cac_has_icon_borders',
			'choices'               => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
		) ) );

		/**
		 * Style Icon Border With
		 */
		$wp_customize->add_setting( 'fargo_features_styles_icon_border_width', array(
			'transport'        		=> 'postMessage',
			'default'               => 25,
		) );

		$wp_customize->add_control( new Fargo_Customizer_Range_Control( $wp_customize, 'fargo_features_styles_icon_border_width', array(
			'label'                 => esc_html__( 'Icon Border Width (px)', 'fargo' ),
			'section'               => 'fargo_features_styles_section',
			'settings'              => 'fargo_features_styles_icon_border_width',
			'active_callback'       => 'fargo_cac_has_icon_border',
			'choices'               => array(
				'min'  => 1,
				'max'  => 25,
				'step' => 1,
			),
		) ) );
		 
		 
		/**
		 * Style Icon Heading
		 */
		$wp_customize->add_setting( 'fargo_features_styles_button_heading', array(
			'sanitize_callback' 	=> 'wp_kses',
		) );

		$wp_customize->add_control( new Fargo_Customizer_Heading_Control( $wp_customize, 'fargo_features_styles_button_heading', array(
			'label'    				=> esc_html__( 'Buttons Style', 'fargo' ),
			'section'               => 'fargo_features_styles_section',
			'settings'              => 'fargo_features_styles_button_heading',
		) ) );

		/**
		 * Style Button
		 */
		$wp_customize->add_setting( 'fargo_features_styles_button', array(
			'sanitize_callback'     => 'sanitize_text_field',
			'default'               => 1,
		) );

		$wp_customize->add_control( 'fargo_features_styles_button', array(
			'label'                 => esc_html__( 'Button Style', 'fargo' ),
			'type'                  => 'select',
			'section'               => 'fargo_features_styles_section',
			'settings'              => 'fargo_features_styles_button',
			'choices'               => array(
				1                   => esc_html__( 'Default', 'fargo' ),
				2                   => esc_html__( 'No Background', 'fargo' ),
				3                   => esc_html__( 'Border', 'fargo' ),
			),
		) );

		/**
		 * Style Button Font Size
		 */
		$wp_customize->add_setting( 'fargo_features_styles_button_font', array(
			'transport'        		=> 'postMessage',
			'default'               => 15,
		) );

		$wp_customize->add_control( new Fargo_Customizer_Range_Control( $wp_customize, 'fargo_features_styles_button_font', array(
			'label'                 => esc_html__( 'Button Font Size (px)', 'fargo' ),
			'section'               => 'fargo_features_styles_section',
			'settings'              => 'fargo_features_styles_button_font',
			'choices'               => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
		) ) );

		/**
		 * Icon Border Style
		 */
		$wp_customize->add_setting( 'fargo_features_style_button_border', array(
			'transport'        		=> 'postMessage',
			'sanitize_callback'     => 'sanitize_text_field',
			'default'               => 'solid',
		) );

		$wp_customize->add_control( 'fargo_features_style_button_border', array(
			'label'                 => esc_html__( 'Button Border Type', 'fargo' ),
			'type'                  => 'select',
			'section'               => 'fargo_features_styles_section',
			'settings'              => 'fargo_features_style_button_border',
			'active_callback'       => 'fargo_cac_has_button_border',
			'choices'               => array(
				'solid'             => esc_html__( 'Solid', 'fargo' ),
				'double'            => esc_html__( 'Double', 'fargo' ),
				'dotted'            => esc_html__( 'Dotted', 'fargo' ),
				'dashed'            => esc_html__( 'Dashed', 'fargo' ),
			),
		) );

		/**
		 * Style Button Padding
		 */
		$wp_customize->add_setting( 'fargo_features_styles_button_border_padding', array(
			'transport'        		=> 'postMessage',
			'default'               => 25,
		) );

		$wp_customize->add_control( new Fargo_Customizer_Range_Control( $wp_customize, 'fargo_features_styles_button_border_padding', array(
			'label'                 => esc_html__( 'Button Border Padding (px)', 'fargo' ),
			'section'               => 'fargo_features_styles_section',
			'settings'              => 'fargo_features_styles_button_border_padding',
			'active_callback'       => 'fargo_cac_has_button_border',
			'choices'               => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
		) ) );

		/**
		 * Style Button Border With
		 */
		$wp_customize->add_setting( 'fargo_features_styles_button_border_width', array(
			'transport'        		=> 'postMessage',
			'default'               => 25,
		) );

		$wp_customize->add_control( new Fargo_Customizer_Range_Control( $wp_customize, 'fargo_features_styles_button_border_width', array(
			'label'                 => esc_html__( 'Button Border Width (px)', 'fargo' ),
			'section'               => 'fargo_features_styles_section',
			'settings'              => 'fargo_features_styles_button_border_width',
			'active_callback'       => 'fargo_cac_has_button_border',
			'choices'               => array(
				'min'  => 1,
				'max'  => 25,
				'step' => 1,
			),
		) ) );

		/**
		 * COLORS
		 */
		$wp_customize->add_section( 'fargo_features_colors_section', array(
			'title'    => __( 'Colors', 'fargo' ),
			'priority' => 4,
			'panel'    => 'fargo_features_panel',
		) );

		/**
		 * Background Colors
		 */
		$wp_customize->add_setting( 'fargo_features_colors_background', array(
			'transport'             => 'postMessage',
			'sanitize_callback'     => 'fargo_sanitize_color',
			'default'               => '#ffffff',
		) );

		$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, 'fargo_features_colors_background', array(
			'label'                 => esc_html__( 'Background Color', 'fargo' ),
			'section'               => 'fargo_features_colors_section',
			'settings'              => 'fargo_features_colors_background',
		) ) );

		/**
		 * Heading
		 */
		$wp_customize->add_setting( 'fargo_features_colors_heading', array(
			'sanitize_callback' 	=> 'wp_kses',
		) );

		$wp_customize->add_control( new Fargo_Customizer_Heading_Control( $wp_customize, 'fargo_features_colors_heading', array(
			'label'    				=> esc_html__( 'Heading', 'fargo' ),
			'section'               => 'fargo_features_colors_section',
			'settings'              => 'fargo_features_colors_heading',
		) ) );

		/**
		 * Title Colors
		 */
		$wp_customize->add_setting( 'fargo_features_colors_title', array(
			'transport'             => 'postMessage',
			'sanitize_callback'     => 'fargo_sanitize_color',
			'default'               => '#ffffff',
		) );

		$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, 'fargo_features_colors_title', array(
			'label'                 => esc_html__( 'Title Color', 'fargo' ),
			'section'               => 'fargo_features_colors_section',
			'settings'              => 'fargo_features_colors_title',
		) ) );

		/**
		 * Sub Title Colors
		 */
		$wp_customize->add_setting( 'fargo_features_colors_subtitle', array(
			'transport'             => 'postMessage',
			'sanitize_callback'     => 'fargo_sanitize_color',
			'default'               => '#ffffff',
		) );

		$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, 'fargo_features_colors_subtitle', array(
			'label'                 => esc_html__( 'Subtitle Color', 'fargo' ),
			'section'               => 'fargo_features_colors_section',
			'settings'              => 'fargo_features_colors_subtitle',
		) ) );


		/**
		 * Content Heading
		 */
		$wp_customize->add_setting( 'fargo_features_colors_content_heading', array(
			'sanitize_callback' 	=> 'wp_kses',
		) );

		$wp_customize->add_control( new Fargo_Customizer_Heading_Control( $wp_customize, 'fargo_features_colors_content_heading', array(
			'label'    				=> esc_html__( 'Content', 'fargo' ),
			'section'               => 'fargo_features_colors_section',
			'settings'              => 'fargo_features_colors_content_heading',
		) ) );

		/**
		 * Content Title Colors
		 */
		$wp_customize->add_setting( 'fargo_features_colors_content_title', array(
			'transport'             => 'postMessage',
			'sanitize_callback'     => 'fargo_sanitize_color',
			'default'               => '#ffffff',
		) );

		$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, 'fargo_features_colors_content_title', array(
			'label'   			    => esc_html__( 'Content Title Color', 'fargo' ),
			'section'               => 'fargo_features_colors_section',
			'settings'              => 'fargo_features_colors_content_title',
		) ) );

		/**
		 * Content Text Colors
		 */
		$wp_customize->add_setting( 'fargo_features_colors_content_text', array(
			'transport'             => 'postMessage',
			'sanitize_callback'     => 'fargo_sanitize_color',
			'default'               => '#ffffff',
		) );

		$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, 'fargo_features_colors_content_text', array(
			'label'                 => esc_html__( 'Content Text Color', 'fargo' ),
			'section'               => 'fargo_features_colors_section',
			'settings'              => 'fargo_features_colors_content_text',
		) ) );

		/**
		 * Content Background Color
		 */
		$wp_customize->add_setting( 'fargo_features_colors_content_background', array(
			'transport'             => 'postMessage',
			'sanitize_callback'     => 'fargo_sanitize_color',
			'default'               => '#ffffff',
		) );

		$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, 'fargo_features_colors_content_background', array(
			'label'                 => esc_html__( 'Content Background Color', 'fargo' ),
			'section'               => 'fargo_features_colors_section',
			'settings'              => 'fargo_features_colors_content_background',
		) ) );
			
		/**
		 * BACKGROUNDS
		 */
		$wp_customize->add_section( 'fargo_features_backgrounds_section', array(
			'title'    => __( 'Backgrounds', 'fargo' ),
			'priority' => 5,
			'panel'    => 'fargo_features_panel',
		) );

		/**
		 * Background Image
		 */
		$wp_customize->add_setting( 'fargo_features_backgrounds_image', array(
			'transport'             => 'postMessage',
			'sanitize_callback'     => 'esc_url',
			'default'               => '',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fargo_features_backgrounds_image', array(
			'label'                 => esc_html__( 'Background Image', 'fargo' ),
			'section'               => 'fargo_features_backgrounds_section',
			'settings'              => 'fargo_features_backgrounds_image',
		) ) );

		/**
		 * Background Position
		 */
		$wp_customize->add_setting( 'fargo_features_backgrounds_position', array(
			'transport'             => 'postMessage',
			'sanitize_callback'     => 'sanitize_text_field',
			'default'               => 'initial',
		) );

		$wp_customize->add_control( 'fargo_features_backgrounds_position', array(
			'label'                 => esc_html__( 'Background Position', 'fargo' ),
			'type'                  => 'select',
			'section'               => 'fargo_features_backgrounds_section',
			'settings'              => 'fargo_features_backgrounds_position',
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
		$wp_customize->add_setting( 'fargo_features_backgrounds_size', array(
			'transport'             => 'postMessage',
			'sanitize_callback'     => 'sanitize_text_field',
			'default'               => 'auto',
		) );

		$wp_customize->add_control( 'fargo_features_backgrounds_size', array(
			'label'      		    => esc_html__( 'Background Size', 'fargo' ),
			'type'                  => 'select',
			'section'               => 'fargo_features_backgrounds_section',
			'settings'              => 'fargo_features_backgrounds_size',
			'choices'               => array(
				'auto'              => esc_html__( 'Default', 'fargo' ),
				'contain'           => esc_html__( 'Fit to Screen', 'fargo' ),
				'cover'             => esc_html__( 'Fill Screen', 'fargo' ),
			),
		) );

		/**
		 * Background Repeat
		 */
		$wp_customize->add_setting( 'fargo_features_backgrounds_repeat', array(
			'transport'             => 'postMessage',
			'sanitize_callback'     => 'sanitize_text_field',
			'default'               => 'initial',
		) );

		$wp_customize->add_control( 'fargo_features_backgrounds_repeat', array(
			'label'     		    => esc_html__( 'Background Repeat', 'fargo' ),
			'type'                  => 'select',
			'section'               => 'fargo_features_backgrounds_section',
			'settings'              => 'fargo_features_backgrounds_repeat',
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
		$wp_customize->add_setting( 'fargo_features_backgrounds_attachment', array(
			'transport'        		=> 'postMessage',
			'sanitize_callback' 	=> 'sanitize_text_field',
			'default'               => 'initial',
		) );

		$wp_customize->add_control( 'fargo_features_backgrounds_attachment', array(
			'label'                 => esc_html__( 'Background Attachment', 'fargo' ),
			'type'                  => 'select',
			'section'               => 'fargo_features_backgrounds_section',
			'settings'              => 'fargo_features_backgrounds_attachment',
			'choices'               => array(
				'initial'         	=> esc_html__( 'Default', 'fargo' ),
				'scroll' 	        => esc_html__( 'Scroll', 'fargo' ),
				'fixed' 	        => esc_html__( 'Fixed', 'fargo' )
			),
		) );

		/**
		 * Background Overlay Enable
		 */
		$wp_customize->add_setting( 'fargo_features_backgrounds_overlay', array(
			'transport'             => 'postMessage',
			'sanitize_callback'     => 'fargo_sanitize_checkbox',
			'default'               => 0,
		) );
			
		$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, 'fargo_features_backgrounds_overlay', array(
			'label'                 => esc_html__( 'Overlay Enable', 'fargo' ),
			'type'                  => 'mte-toggle',
			'section'               => 'fargo_features_backgrounds_section',
			'settings'              => 'fargo_features_backgrounds_overlay',
		) ) );

		/**
		 * Background Overlay Color
		 */
		$wp_customize->add_setting( 'fargo_features_backgrounds_overlay_color', array(
			'transport'             => 'postMessage',
			'sanitize_callback'     => 'fargo_sanitize_color',
			'default'               => '#ffffff',		
		) );

		$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, 'fargo_features_backgrounds_overlay_color', array(
			'label'                 => esc_html__( 'Overlay Color', 'fargo' ),
			'section'               => 'fargo_features_backgrounds_section',
			'settings'              => 'fargo_features_backgrounds_overlay_color',
		) ) );
	}

	/**
	 * Get CSS
	 *
	 * @since 1.0.0
	 */
	public static function head_css( $output ) {
		
		//Get Colors
		$fargo_features_colors_background = get_theme_mod( 'fargo_features_colors_background' );
		$fargo_features_colors_title      = get_theme_mod( 'fargo_features_colors_title' );
		$fargo_features_colors_subtitle   = get_theme_mod( 'fargo_features_colors_subtitle' );

		//Get Backgrounds
		$fargo_features_backgrounds_image      = get_theme_mod( 'fargo_features_backgrounds_image' );
		$fargo_features_backgrounds_position   = get_theme_mod( 'fargo_features_backgrounds_position' );
		$fargo_features_backgrounds_size       = get_theme_mod( 'fargo_features_backgrounds_size' );
		$fargo_features_backgrounds_repeat     = get_theme_mod( 'fargo_features_backgrounds_repeat' );
		$fargo_features_backgrounds_attachment = get_theme_mod( 'fargo_features_backgrounds_attachment' );

		//CSS
		
		$css = '';

		if ( $fargo_features_colors_background ) {
			$css .= '#features {background-color:' . $fargo_features_colors_background . ';}';
		}
		
		if ( $fargo_features_colors_title ) {
			$css .= '#features .section-header h3 {color:' . $fargo_features_colors_title . ';}';
		}
		
		if ( $fargo_features_colors_subtitle ) {
			$css .= '#features .section-header .section-description {color:' . $fargo_features_colors_subtitle . ';}';
		}
		
		//BACKGROUNDS

		if ( $fargo_features_backgrounds_image ) {
			$css .= '#features {background-image: url(' . $fargo_features_backgrounds_image . ');}';
		}
		
		if ( $fargo_features_backgrounds_position ) {
			$css .= '#features {background-position:' . $fargo_features_backgrounds_position . ';}';
		}
		
		if ( $fargo_features_backgrounds_size ) {
			$css .= '#features {background-size: ' . $fargo_features_backgrounds_size . ';}';
		}
		
		if ( $fargo_features_backgrounds_repeat ) {
			$css .= '#features {background-repeat:' . $fargo_features_backgrounds_repeat . ';}';
		}
		
		if ( $fargo_features_backgrounds_attachment ) {
			$css .= '#features {background-attachment:' . $fargo_features_backgrounds_attachment . ';}';
		}
		
		return $css;
	}

}

return new Fargo_Features_Customizer();	