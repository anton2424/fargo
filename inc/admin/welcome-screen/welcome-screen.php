<?php

/**
 * Welcome Screen Class
 */
class Fargo_Welcome {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {
		/* create dashbord page */
		add_action( 'admin_menu', array( $this, 'fargo_welcome_register_menu' ) );

		/* activation notice */
		add_action( 'load-themes.php', array( $this, 'fargo_activation_admin_notice' ) );

		/* enqueue script and style for welcome screen */
		add_action( 'admin_enqueue_scripts', array( $this, 'fargo_welcome_style_and_scripts' ) );

		/* enqueue script for customizer */
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'fargo_welcome_scripts_for_customizer' ) );

		/* ajax callback for dismissable required actions */
		add_action( 'wp_ajax_fargo_dismiss_required_action', array(
			$this,
			'fargo_dismiss_required_action_callback'
		) );
		add_action( 'wp_ajax_fargo_dismiss_recommended_plugins', array(
			$this,
			'fargo_dismiss_recommended_plugins_callback'
		) );

		add_action( 'admin_init', array( $this, 'fargo_activate_plugin' ) );
		add_action( 'admin_init', array( $this, 'fargo_deactivate_plugin' ) );
		add_action( 'admin_init', array( $this, 'fargo_set_pages' ) );
	}

	public function fargo_set_pages() {
		if ( ! empty( $_GET ) ) {
			/**
			 * Check action
			 */
			if ( ! empty( $_GET['action'] ) && $_GET['action'] === 'set_page_automatic' ) {
				$active_tab = $_GET['tab'];
				$about      = get_page_by_title( 'Homepage' );
				update_option( 'page_on_front', $about->ID );
				update_option( 'show_on_front', 'page' );

				// Set the blog page
				$blog = get_page_by_title( 'Blog' );
				update_option( 'page_for_posts', $blog->ID );

				wp_redirect( self_admin_url( 'themes.php?page=fargo-welcome&tab=' . $active_tab ) );
			}
		}
	}

	


	public function fargo_activate_plugin() {
		if ( ! empty( $_GET ) ) {
			/**
			 * Check action
			 */
			if ( ! empty( $_GET['action'] ) && ! empty( $_GET['plugin'] ) && $_GET['action'] === 'activate_plugin' ) {
				$active_tab = $_GET['tab'];
				$url        = self_admin_url( 'themes.php?page=fargo-welcome&tab=' . $active_tab );
				activate_plugin( $_GET['plugin'], $url );
			}
		}
	}

	public function fargo_deactivate_plugin() {
		if ( ! empty( $_GET ) ) {
			/**
			 * Check action
			 */
			if ( ! empty( $_GET['action'] ) && ! empty( $_GET['plugin'] ) && $_GET['action'] === 'deactivate_plugin' ) {
				$active_tab = $_GET['tab'];
				$url        = self_admin_url( 'themes.php?page=fargo-welcome&tab=' . $active_tab );
				$current    = get_option( 'active_plugins', array() );
				$search     = array_search( $_GET['plugin'], $current );
				if ( array_key_exists( $search, $current ) ) {
					unset( $current[ $search ] );
				}
				update_option( 'active_plugins', $current );
			}
		}
	}

	/**
	 * Creates the dashboard page
	 *
	 * @see   add_theme_page()
	 * @since 1.8.2.4
	 */
	public function fargo_welcome_register_menu() {
		$action_count = $this->count_actions();
		$title        = $action_count > 0 ? 'About Fargo <span class="badge-action-count">' . esc_html( $action_count ) . '</span>' : 'About Fargo';

		add_theme_page( 'About Fargo', $title, 'edit_theme_options', 'fargo-welcome', array(
			$this,
			'fargo_welcome_screen'
		) );
	}

	/**
	 * Adds an admin notice upon successful activation.
	 *
	 * @since 1.8.2.4
	 */
	public function fargo_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ( 'themes.php' == $pagenow ) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'fargo_welcome_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 *
	 * @since 1.8.2.4
	 */
	public function fargo_welcome_admin_notice() {
		?>
		<div class="updated notice is-dismissible">
			<p><?php echo sprintf( esc_html__( 'Welcome! Thank you for choosing Fargo! To fully take advantage of the best our theme can offer please make sure you visit our %swelcome page%s.', 'fargo' ), '<a href="' . esc_url( admin_url( 'themes.php?page=fargo-welcome' ) ) . '">', '</a>' ); ?></p>
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=fargo-welcome' ) ); ?>" class="button"
			      style="text-decoration: none;"><?php _e( 'Get started with Fargo', 'fargo' ); ?></a></p>
		</div>
		<?php
	}

	/**
	 * Load welcome screen css and javascript
	 *
	 * @since  1.8.2.4
	 */
	public function fargo_welcome_style_and_scripts( $hook_suffix ) {

		wp_enqueue_style( 'fargo-welcome-screen-css', get_template_directory_uri() . '/inc/admin/welcome-screen/css/welcome.css' );
		
		$screen = get_current_screen();
		if ( $screen->base != 'appearance_page_fargo-welcome' ) {
			return;
		}
		
		wp_enqueue_script( 'fargo-welcome-screen-js', get_template_directory_uri() . '/inc/admin/welcome-screen/js/welcome.js', array( 'jquery' ) );

		wp_localize_script( 'fargo-welcome-screen-js', 'fargoWelcomeScreenObject', array(
			'nr_actions_required'      => $this->count_actions(),
			'ajaxurl'                  => admin_url( 'admin-ajax.php' ),
			'template_directory'       => get_template_directory_uri(),
			'no_required_actions_text' => __( 'Hooray! There are no required actions for you right now.', 'fargo' )
		) );

	}

	/**
	 * Load scripts for customizer page
	 *
	 * @since  1.8.2.4
	 */
	public function fargo_welcome_scripts_for_customizer() {

		wp_enqueue_style( 'fargo-welcome-screen-customizer-css', get_template_directory_uri() . '/inc/admin/welcome-screen/css/welcome_customizer.css' );
		
	}

	/**
	 * Dismiss required actions
	 *
	 * @since 1.8.2.4
	 */
	public function fargo_dismiss_required_action_callback() {

		global $fargo_required_actions;

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

		echo $action_id; /* this is needed and it's the id of the dismissable required action */

		if ( ! empty( $action_id ) ):

			/* if the option exists, update the record for the specified id */
			if ( get_option( 'fargo_show_required_actions' ) ):

				$fargo_show_required_actions = get_option( 'fargo_show_required_actions' );

				switch($_GET['todo']){
					case 'add';
						$fargo_show_required_actions[ $action_id ] = true;
						break;
					case 'dismiss';
						$fargo_show_required_actions[ $action_id ] = false;
						break;
				}

				update_option( 'fargo_show_required_actions', $fargo_show_required_actions );

			/* create the new option,with false for the specified id */
			else:

				$fargo_show_required_actions_new = array();

				if ( ! empty( $fargo_required_actions ) ):

					foreach ( $fargo_required_actions as $fargo_required_action ):

						if ( $fargo_required_action['id'] == $action_id ):
							$fargo_show_required_actions_new[ $fargo_required_action['id'] ] = false;
						else:
							$fargo_show_required_actions_new[ $fargo_required_action['id'] ] = true;
						endif;

					endforeach;

					update_option( 'fargo_show_required_actions', $fargo_show_required_actions_new );

				endif;

			endif;

		endif;

		die(); // this is required to return a proper result
	}

	public function fargo_dismiss_recommended_plugins_callback() {
		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;
		echo $action_id; /* this is needed and it's the id of the dismissable required action */
		if ( ! empty( $action_id ) ):
			/* if the option exists, update the record for the specified id */
			$fargo_show_recommended_plugins = get_option( 'fargo_show_recommended_plugins' );
				
				switch ( $_GET['todo'] ) {
					case 'add';
						$fargo_show_recommended_plugins[ $action_id ] = false;
						break;
					case 'dismiss';
						$fargo_show_recommended_plugins[ $action_id ] = true;
						break;
				}
				update_option( 'fargo_show_recommended_plugins', $fargo_show_recommended_plugins );
			/* create the new option,with false for the specified id */
		endif;
		die(); // this is required to return a proper result
	}

	/**
	 *
	 */
	public function count_actions() {
		global $fargo_required_actions;

		$fargo_show_required_actions = get_option( 'fargo_show_required_actions' );
		if ( ! $fargo_show_required_actions ) {
			$fargo_show_required_actions = array();
		}

		$i = 0;
		foreach ( $fargo_required_actions as $action ) {
			$true      = false;
			$dismissed = false;

			if ( ! $action['check'] ) {
				$true = true;
			}

			if ( ! empty( $fargo_show_required_actions ) && isset( $fargo_show_required_actions[ $action['id'] ] ) && ! $fargo_show_required_actions[ $action['id'] ] ) {
				$true = false;
			}

			if ( $true ) {
				$i ++;
			}
		}


		return $i;
	}

	public function call_plugin_api( $slug ) {
		include_once( ABSPATH . 'wp-admin/includes/plugin-install.php' );

		if ( false === ( $call_api = get_transient( 'fargo_plugin_information_transient_' . $slug ) ) ) {
			$call_api = plugins_api( 'plugin_information', array(
				'slug'   => $slug,
				'fields' => array(
					'downloaded'        => false,
					'rating'            => false,
					'description'       => false,
					'short_description' => true,
					'donate_link'       => false,
					'tags'              => false,
					'sections'          => true,
					'homepage'          => true,
					'added'             => false,
					'last_updated'      => false,
					'compatibility'     => false,
					'tested'            => false,
					'requires'          => false,
					'downloadlink'      => false,
					'icons'             => true
				)
			) );
			set_transient( 'fargo_plugin_information_transient_' . $slug, $call_api, 30 * MINUTE_IN_SECONDS );
		}

		return $call_api;
	}

	public function check_active( $slug ) {
		$plugin_path = MT_Notify_System::_get_plugin_basename_from_slug( $slug );
		if ( file_exists( ABSPATH . 'wp-content/plugins/' . $plugin_path ) ) {
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

			$needs = is_plugin_active( $plugin_path ) ? 'deactivate' : 'activate';

			return array( 'status' => is_plugin_active( $plugin_path ), 'needs' => $needs, 'plugin_path' => $plugin_path );
		}

		return array( 'status' => false, 'needs' => 'install' );
	}

	public function check_for_icon( $arr ) {
		if ( ! empty( $arr['svg'] ) ) {
			$plugin_icon_url = $arr['svg'];
		} elseif ( ! empty( $arr['2x'] ) ) {
			$plugin_icon_url = $arr['2x'];
		} elseif ( ! empty( $arr['1x'] ) ) {
			$plugin_icon_url = $arr['1x'];
		} else {
			$plugin_icon_url = $arr['default'];
		}

		return $plugin_icon_url;
	}

	public function create_action_link( $state, $slug, $plugin_path = '' ) {
		if ( $plugin_path == '' ) {
			$plugin_path = $slug . '/' . $slug . '.php';
		}
		switch ( $state ) {
			case 'install':
				return wp_nonce_url(
					add_query_arg(
						array(
							'action' => 'install-plugin',
							'plugin' => $slug
						),
						network_admin_url( 'update.php' )
					),
					'install-plugin_' . $slug
				);
				break;
			case 'deactivate':
				return add_query_arg( array(
					                      'action'        => 'deactivate',
					                      'plugin'        => rawurlencode( $plugin_path ),
					                      'plugin_status' => 'all',
					                      'paged'         => '1',
					                      '_wpnonce'      => wp_create_nonce( 'deactivate-plugin_' . $plugin_path ),
				                      ), network_admin_url( 'plugins.php' ) );
				break;
			case 'activate':
				return add_query_arg( array(
					                      'action'        => 'activate',
					                      'plugin'        => rawurlencode( $plugin_path ),
					                      'plugin_status' => 'all',
					                      'paged'         => '1',
					                      '_wpnonce'      => wp_create_nonce( 'activate-plugin_' . $plugin_path ),
				                      ), network_admin_url( 'plugins.php' ) );
				break;
			case 'update':
				return wp_nonce_url(
					add_query_arg(
						array(
							'action' => 'upgrade-plugin',
							'plugin' => rawurlencode( $plugin_path )
						),
						network_admin_url( 'update.php' )
					),
					'upgrade-plugin_' . $plugin_path
				);
				break;
		}
	}

	/**
	 * Welcome screen content
	 *
	 * @since 1.8.2.4
	 */
	public function fargo_welcome_screen() {
		require_once( ABSPATH . 'wp-load.php' );
		require_once( ABSPATH . 'wp-admin/admin.php' );
		require_once( ABSPATH . 'wp-admin/admin-header.php' );

		$fargo      = wp_get_theme();
		$active_tab   = isset( $_GET['tab'] ) ? $_GET['tab'] : 'getting_started';
		$action_count = $this->count_actions();

		?>

		<div class="wrap about-wrap epsilon-wrap">

			<h1><?php echo __( 'Welcome to Fargo! - Version ', 'fargo' ) . $fargo['Version']; ?></h1>

			<div class="about-text">
				<?php esc_html_e( 'Our most popular free one page WordPress theme, Fargo!','fargo'); ?><br>
				<?php esc_html_e( 'We want to make sure you have the best experience using Fargo and that is why we gathered here all the necessary information for you. We hope you will enjoy using Fargo, as much as we enjoy creating great products.', 'fargo' ); ?>
			</div>

			<div class="wp-badge epsilon-welcome-logo"></div>


			<h2 class="nav-tab-wrapper wp-clearfix">
				<a href="<?php echo admin_url( 'themes.php?page=fargo-welcome&tab=getting_started' ); ?>"
				   class="nav-tab <?php echo $active_tab == 'getting_started' ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__( 'Getting Started', 'fargo' ); ?></a>
				<a href="<?php echo admin_url( 'themes.php?page=fargo-welcome&tab=recommended_actions' ); ?>"
				   class="nav-tab <?php echo $active_tab == 'recommended_actions' ? 'nav-tab-active' : ''; ?> "><?php echo esc_html__( 'Recommended Actions', 'fargo' ); ?>
					<?php echo $action_count > 0 ? '<span class="badge-action-count">' . esc_html( $action_count ) . '</span>' : '' ?></a>
				<a href="<?php echo admin_url( 'themes.php?page=fargo-welcome&tab=recommended_plugins' ); ?>"
				   class="nav-tab <?php echo $active_tab == 'recommended_plugins' ? 'nav-tab-active' : ''; ?> "><?php echo esc_html__( 'Recommended Plugins', 'fargo' ); ?></a>
				<a href="<?php echo admin_url( 'themes.php?page=fargo-welcome&tab=support' ); ?>"
				   class="nav-tab <?php echo $active_tab == 'support' ? 'nav-tab-active' : ''; ?> "><?php echo esc_html__( 'Free vs PRO', 'fargo' ); ?></a>
			</h2>

			<?php
			switch ( $active_tab ) {
				case 'getting_started':
					require_once get_template_directory() . '/inc/admin/welcome-screen/sections/getting-started.php';
					break;
				case 'recommended_actions':
					require_once get_template_directory() . '/inc/admin/welcome-screen/sections/actions-required.php';
					break;
				case 'recommended_plugins':
					require_once get_template_directory() . '/inc/admin/welcome-screen/sections/recommended-plugins.php';
					break;
				case 'support':
					require_once get_template_directory() . '/inc/admin/welcome-screen/sections/support.php';
					break;
				default:
					require_once get_template_directory() . '/inc/admin/welcome-screen/sections/getting-started.php';
					break;
			}
			?>


		</div><!--/.wrap.about-wrap-->

		<?php
	}
}

new Fargo_Welcome();
