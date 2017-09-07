<?php
/**
 * Fargo Customizer Class
 *
 * @package Fargo WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Fargo Customizer class
 */
class Fargo_Customizer {
	
	/**
	 * Setup class.
	 *
	 * @since 1.0
	 */
	public function __construct() {

		add_action( 'customize_register',					array( $this, 'custom_controls' ), 1 );
		add_action( 'customize_register',					array( $this, 'controls_helpers' ) );
		add_action( 'customize_register',					array( $this, 'customize_register' ), 11 );
		add_action( 'customize_register',					array( $this, 'multipanel' ), 2 );
		add_action( 'customize_preview_init', 				array( $this, 'customize_preview_init' ) );
		
		
		add_action( 'after_setup_theme',					array( $this, 'register_panel' ), 5 );
		add_action( 'customize_controls_enqueue_scripts', 	array( $this, 'custom_customize_enqueue' ) );
	}
	
	/**
	 * Adds custom controls
	 *
	 * @since 1.0.0
	 */
	public function custom_controls( $wp_customize ) {
		
		// Path
		$dir = FARGO_INC_DIR . 'customizer/controls/';
		
		// Load customize control classes
		require_once ( $dir . 'repeater/class/class-control-repeater.php' );
		require_once ( $dir . 'color/class-control-color.php'             );
		require_once ( $dir . 'toggle/class-control-toggle.php'           );
		require_once ( $dir . 'tab/class-control-tab.php'                 );
		require_once ( $dir . 'cf7/class-control-cf7.php'                 );
		require_once ( $dir . 'heading/class-control-heading.php'         );
		require_once ( $dir . 'range/class-control-range.php'             );
		require_once ( $dir . 'multipanel/class-control-multipanel.php'   );
		
		// Register JS Control Types
		$wp_customize->register_control_type( 'Fargo_Customizer_Tab_Control'      );
		$wp_customize->register_control_type( 'Fargo_Customizer_Range_Control'    );
		$wp_customize->register_control_type( 'Fargo_Customizer_Color_Control'    );
		$wp_customize->register_control_type( 'Fargo_Customizer_Heading_Control'  );
		
		// Register JS Panel Type
		$wp_customize->register_panel_type( 'Fargo_Customizer_Multipanel_Control' );
		
	}	
	
	/**
	 * Adds customizer helpers
	 *
	 * @since 1.0.0
	 */
	public function controls_helpers() {
		
		$dir = FARGO_INC_DIR . 'customizer/';
		
		// Custom Controls
		require_once  ( $dir . 'sanitization-callbacks.php' );
	}	
	
	/**
	 * Core modules
	 *
	 * @since 1.0.0
	 */
	public function customize_register( $wp_customize ) {
		
		// Tweak default controls
		$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
		
		// Move custom logo setting
		$wp_customize->get_control( 'custom_logo' )->section = 'fargo_general_section';	
	
	}
	
	public function multipanel( $wp_customize ) {
		
		$wp_customize->add_panel ( new Fargo_Customizer_Multipanel_Control( $wp_customize, 'fargo_frontpage_sections_panel', array(
		'title'    => esc_html__( 'Frontpage Sections', 'fargo' ),
		'priority' => 2,
		) ) );
}
	
	
	
	
	
	
	public function register_panel() {
		
		$dir = FARGO_INC_DIR .'customizer/panels/';
		
/* 		require_once $dir . 'big-title.php'; */
/* 		require_once $dir . 'general-options.php';
		require_once $dir . 'header.php';
		require_once $dir . 'footer.php';
		require_once $dir . 'blog-options.php';
		require_once $dir . 'about.php';
		require_once $dir . 'testimonials.php';
		require_once $dir . 'portfolio.php';
		require_once $dir . 'blog.php';
		require_once $dir . 'counter.php';
		require_once $dir . 'team.php';
		require_once $dir . 'price.php';
		require_once $dir . 'contact.php';
		require_once $dir . 'clients.php';
		require_once $dir . 'map.php';
		require_once $dir . 'ribbon.php';
		require_once $dir . 'ribbon-two.php'; */
		
		require_once $dir . 'features.php';

	}
	
	/**
	 * Loads js file for customizer preview
	 *
	 * @since 1.0.0
	 */
	public function customize_preview_init() {
		wp_enqueue_script( 'fargo-customize-preview', FARGO_INC_DIR_URI . 'customizer/assets/js/customize-preview.js', array( 'customize-preview' ), FARGO_THEME_VERSION, true );
	}
	
	public function custom_customize_enqueue() {
		wp_enqueue_script( 'fargo-customize', FARGO_INC_DIR_URI . 'customizer/assets/js/customize.js', false , FARGO_THEME_VERSION, true);
	}
	
	
	
	
}

return new Fargo_Customizer();