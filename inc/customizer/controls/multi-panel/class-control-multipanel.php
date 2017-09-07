<?php
/**
 * Customizer Control: Fargo-multipanel.
 *
 * @package     Fargo WordPress theme
 * @subpackage  Controls
 * @since       1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Multipanel control
 */
class Fargo_Customizer_Multipanel_Control extends WP_Customize_Panel {

	public $panel;

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'fargo_panel';
	
	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 */
	public function enqueue() {
		wp_enqueue_script( 'fargo-multipanel', get_template_directory_uri() .'/inc/customizer/controls/multipanel/js/multipanel.min.js', array( 'jquery', 'customize-base' ), false, true );
	}
	
	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function json() {

		$array                   = wp_array_slice_assoc( (array) $this, array(
			'id',
			'description',
			'priority',
			'type',
			'panel',
		) );
		$array['title']          = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
		$array['content']        = $this->get_content();
		$array['active']         = $this->active();
		$array['instanceNumber'] = $this->instance_number;

		return $array;

	}
}