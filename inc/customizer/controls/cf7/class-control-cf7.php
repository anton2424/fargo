<?php 
/**
 * Customizer Control: Fargo-CF7
 *
 * Returns true / false if the plugin: Contact Form 7 is activated;
 *
 * @package     Fargo WordPress theme
 * @subpackage  Controls
 * @since       1.0
 */


class Fargo_Custumizer_CF7_Control extends WP_Customize_Control {
	
	public function active_callback( ) {

		if( class_exists( 'WPCF7' ) ) {
			return true;
		} else {
			return false;
		}
	}

	public function fargo_get_cf7_forms() {
		global $wpdb;

		// no more php warnings
		$contact_forms = array();

		// check if CF7 is activated
		if ( $this->active_callback()) {
			$cf7 = $wpdb->get_results("SELECT ID, post_title FROM $wpdb->posts WHERE post_type = 'wpcf7_contact_form' ");
			if ($cf7) {

				foreach ($cf7 as $cform) {
					$contact_forms[$cform->ID] = $cform->post_title;
				}
			} else {
				$contact_forms[0] = __('No contact forms found', 'fargo');
			}
		}
		return $contact_forms;
	}

	/**
	 * An Underscore (JS) template for this control's content (but not its container).
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
	 *
	 * @see WP_Customize_Control::print_template()
	 *
	 * @access protected
	 */
	public function render_content() {
		$fargo_forms = $this->fargo_get_cf7_forms();

		if ( !empty($fargo_forms ) ) { ?>
			<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
			<select <?php esc_url($this->link()); ?> style="width:100%;">
			<?php echo '<option value="default">'.__('Select your contact form', 'fargo').'</option>';
			foreach ($fargo_forms as $form_id => $form_title) {
				echo '<option value="' . sanitize_key( $form_id ). '" >' . esc_html( $form_title ). '</option>';
			}
			echo '</select>';
		}
	}
}