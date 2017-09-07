<?php
/**
 * Theme functions and definitions.
 *
 * Sets up the theme and provides some helper functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package Fargo WordPress theme
 */

// Core Constants
define( 'FARGO_THEME_DIR', get_template_directory() );
define( 'FARGO_THEME_URI', get_template_directory_uri() );

class FARGO_Theme_Class {
	
	/**
	 * Main Theme Class Constructor
	 *
	 * @since   1.0.1
	 */
	public function __construct() {
		
		// Define constants
		add_action( 'after_setup_theme', array( 'FARGO_Theme_Class', 'constants' ), 0 );

		// Load all core theme function files
		add_action( 'after_setup_theme', array( 'FARGO_Theme_Class', 'include_functions' ), 1 );
		
		// Setup theme => add_theme_support, register_nav_menus, load_theme_textdomain, etc
		add_action( 'after_setup_theme', array( 'FARGO_Theme_Class', 'theme_setup' ), 1); 
		
		// Load theme CSS
		add_action( 'wp_enqueue_scripts', array( 'FARGO_Theme_Class', 'theme_css' ) );
		
		// Load theme js
		add_action(' wp_enqueue_scripts', array( 'FARGO_Theme_Class', 'theme_js' ) );
		
		// Register sidebar widget areas
		add_action( 'widgets_init', array( 'FARGO_Theme_Class','register_sidebars'), 1 );
		
		add_action('fargo_after_content_above_footer', array('Fargo_Theme_Class','fargo_pagination'), 1);
		
	}
	
	/**
	 * Define Constants
	 *
	 * @since   1.0.0
	 */
	public static function constants() {
	
		$version = self::theme_version();
	
		// Theme version
		define( 'FARGO_THEME_VERSION', $version );
		
		// Include Paths
		define( 'FARGO_INC_DIR', FARGO_THEME_DIR .'/inc/' );
		define( 'FARGO_INC_DIR_URI', FARGO_THEME_URI .'/inc/' );
		
		// Javascript and CSS Paths
		define( 'FARGO_JS_DIR_URI', FARGO_THEME_URI .'/assets/js/' );
		define( 'FARGO_CSS_DIR_URI', FARGO_THEME_URI .'/assets/css/' );
		
		// Check if plugins are active
		define( 'FARGO_WOOCOMMERCE_ACTIVE', class_exists( 'WooCommerce' ) );
		
	}

	/**
	 * Returns current theme version
	 *
	 * @since   1.0.0
	 */
	public static function theme_version() {

		// Get theme data
		$theme = wp_get_theme();

		// Return theme version
		return $theme->get( 'Version' );

	}
	
	/**
	 * Load all core theme function files
	 *
	 * @since 1.0.0
	 */
	public static function include_functions() {
		
		$dir = FARGO_INC_DIR;
/* 		require_once ( $dir .'extras.php' );
		require_once ( $dir .'back-compatible.php' ); */
		require_once ( $dir .'customizer/customizer.php' );		
		
	}
	
	public static function theme_setup() {
		
		//Load all core theme function files
		load_theme_textdomain( 'fargo', FARGO_THEME_DIR . '/languages');
		
		// Register Nav Menus
		register_nav_menus(array(
			'topbar-menu' => __('Top Bar', 'fargo'),
			'main-menu'   => __('Main Menu', 'fargo'),
		) );

		// Add Theme Support
		add_theme_support( 'woocommerce' );
		add_theme_support( 'post-formats', array( 'video', 'gallery', 'audio', 'quote', 'link' ) );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-logo', array(
			'height' => 75,
			'flex-height' => true,
			'flex-width' => true
		) );
		
		//Switch default core markup for search form, comment form, comments, galleries, captions and widgets  to output valid HTML5.
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) );

		// Add Image Size
		add_image_size( 'fargo-blog-list', 750, 500, true );
		add_image_size( 'fargo-widget-recent-posts', 70, 70, true );
		add_image_size( 'fargo-blog-post-related-articles', 240, 206, true );
		add_image_size( 'fargo-front-page-latest-news', 250, 213, true );
		add_image_size( 'fargo-front-page-testimonials', 127, 127, true );
		add_image_size( 'fargo-front-page-projects', 476, 476, true );
		add_image_size( 'fargo-front-page-team', 125, 125, true );
		
		// Welcome screen
		if ( is_admin() ) {
			require get_template_directory() . '/inc/notify-system-checks.php';
			global $fargo_required_actions, $fargo_recommended_plugins;
			$fargo_recommended_plugins = array(
					'contact-form-7' => array(
						'recommended' => false
					) ,
			);
			
		// Check Plugin	
		$fargo_required_actions = array( array(
			"id"          => 'fargo-req-ac-install-contact-form-7',
			"title"       => MT_Notify_System::create_plugin_requirement_title(__('Install: Contact Form 7', 'fargo') , __('Activate: Contact Form 7', 'fargo') , 'contact-form-7') ,
			"description" => __('It is highly recommended that you install the Contact Form 7.', 'fargo') ,
			"check"       => MT_Notify_System::has_import_plugin('contact-form-7') ,
			"type"        => 'plugin',
			"plugin_slug" => 'contact-form-7'
	) );
		
		$fargo_required_actions = apply_filters( 'fargo_required_actions', $fargo_required_actions);
		require get_template_directory() . '/inc/admin/welcome-screen/welcome-screen.php';
		}
	}

	/**
	 * Enqueue CSS
	 *
	 * @since 1.0.1
	 */
	public static function theme_css() {
		
		$dir = FARGO_CSS_DIR_URI;

		// WP Enqueue Style
		wp_enqueue_style( 'bootstrap', $dir . 'bootstrap.min.css', false, '4.0.0');
		wp_enqueue_style( 'font-awesome', $dir . 'font-awesome.min.css', false, '4.5.0');
		wp_enqueue_style( 'owl-carousel', $dir . 'owl-carousel.min.css', false, '2.0.0');
		wp_enqueue_style( 'fargo-style', get_stylesheet_uri(), false, '1.0.16');
		if (get_theme_mod( 'fargo_projects_lightbox', 0) == 1) {
			wp_enqueue_style( 'fargo-fancybox', $dir . 'jquery.fancybox.css', false, '');
		}
	}

	/**
	 * Enqueue JS
	 *
	 * @since 1.0.0
	 */
	public static function theme_js() {
		
		$dir = FARGO_JS_DIR_URI;
		
		if (get_theme_mod( 'preloader_enable', 1) == 1) {
			wp_enqueue_script( 'fpace', $dir . 'pace/pace.min.js', array( 'jquery' ) , '', false);
		}
		wp_enqueue_script( 'bootstrap', $dir . 'bootstrap/bootstrap.min.js', array( 'jquery' ), '4.0.0', true);
		wp_enqueue_script( 'owl-carousel', $dir . 'owl-carousel/owl-carousel.min.js', array( 'jquery' ), '2.0.0', true);
		wp_enqueue_script( 'count-to', $dir . 'count-to/count-to.min.js', array( 'jquery' ), '', true);
		wp_enqueue_script( 'visible', $dir . 'visible/visible.min.js', array( 'jquery' ), '', true);
		if (get_theme_mod( 'projects_lightbox', 0) == 1) {
			wp_enqueue_script('fancybox', $dir . 'jquery.fancybox.js', array( 'jquery' ), '', true);
			wp_add_inline_script('fancybox', 'jQuery(".fancybox").fancybox();'); 
		}
		wp_enqueue_script( 'parallax', $dir . 'parallax.min.js', array( 'jquery' ), '1.0.16', true);
		wp_enqueue_script( 'sticky', $dir . 'jquery.sticky.js', array( 'jquery' ), '1.0.16', true);
		wp_enqueue_script( 'plugins', $dir . 'plugins.min.js', array( 'jquery' ), '1.0.16', true);
		wp_enqueue_script( 'scripts', $dir . 'scripts.js', array( 'jquery' ), '1.0.16', true);
		if (get_theme_mod( 'header_main_general_sticky')) {
			wp_enqueue_script( 'fargo-menu-fix', $dir . 'core/header/mm-fix.min.js', array( 'jquery' ), '1.0.16', true);
		}
		if (is_front_page()) {
			wp_add_inline_script('fargo-scripts', 'if( jQuery(\'.blog-carousel > .fargo-blog-post\').length > 3 ){jQuery(\'.blog-carousel\').owlCarousel({\'items\': 3,\'loop\': true,\'dots\': false,\'nav\' : true, \'navText\':[\'<i class="fa fa-angle-left" aria-hidden="true"></i>\',\'<i class="fa fa-angle-right" aria-hidden="true"></i>\'], responsive : { 0 : { items : 1 }, 480 : { items : 2 }, 900 : { items : 3 } }});}');
		}
		if (is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
		}
	}

	/**
	 * Registers Sidebars
	 *
	 * @since   1.0.0
	 */
	public static function register_sidebars() {
		
		// Sidebar
		register_sidebar(array(
			'name'          => esc_html__( 'Sidebar', 'fargo' ) ,
			'id'            => 'sidebar',
			'description'   => esc_html__( 'Widgets in this area are used in the sidebar region.', 'fargo' ) ,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h4>',
			'after_title'   => '</h4></div>'
		) );

		// Footer Sidebar 1
		register_sidebar(array(
			'name'          => esc_html__( 'Footer 1', 'fargo' ) ,
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Widgets in this area are used in the first footer region.', 'fargo' ) ,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h4>',
			'after_title'   => '</h4></div>'
		) );

		// Footer Sidebar 2
		register_sidebar(array(
			'name'          => esc_html__( 'Footer 2', 'fargo' ) ,
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Widgets in this area are used in the second footer region.', 'fargo' ) ,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'ater_widget'   => '</div>',
			'before_title'  => '<div class="widget-title"><h4>',
			'after_title'   => '</h4></div>'
		) );

		// Footer Sidebar 3
		register_sidebar(array(
			'name'          => esc_html__( 'Footer 3', 'fargo' ) ,
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Widgets in this area are used in the third footer region', 'fargo' ) ,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h4>',
			'after_title'   => '</h4></div>'
		) );

		// Footer Sidebar 4
		register_sidebar(array(
			'name'          => esc_html__( 'Footer 4', 'fargo' ) ,
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Widgets in this area are used in the fourth footer region.', 'fargo' ) ,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h4>',
			'after_title'   => '</h4></div>'
		) );
	}

	/**
	 *  Checkbox helper function
	 */

	public static function fargo_value_checkbox_helper( $value ) {
		if ( $value == 1) {
			return 1;
		} else {
			return 0;
		}
	}

	public static function fargo_pagination() {
		the_posts_pagination(array(
			'prev_text' => '<i class="fa fa-angle-left"></i>',
			'next_text' => '<i class="fa fa-angle-right"></i>',
			'screen_reader_text' => ''
		) );
	}

	public static function fargo_get_recommended_actions_url() {
		return self_admin_url('themes.php?page=fargo-welcome&tab=recommended_actions');
	}

}

$fargo_theme_class = new FARGO_Theme_Class;
