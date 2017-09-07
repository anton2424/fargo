<?php 
/**
 * Customizer Control: Fargo-Toggle
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
 * Toggle control
 */
class Fargo_Customizer_Toggle_Control extends WP_Customize_Control {

	public $type = 'mte-toggle';

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 */
	public function enqueue() {
		wp_enqueue_style( 'fargo-toggle', get_template_directory_uri() .'/inc/customizer/controls/toggle/css/toggle.min.css', null );
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
		?>
		<div class="checkbox_switch">
			<span class="customize-control-title onoffswitch_label"><?php echo esc_html( $this->label ); ?>
				<?php if ( !empty($this->description) ): ?>
				<i class="dashicons dashicons-editor-help" style="vertical-align: text-bottom; position: relative;">
					<span class="mte-tooltip"><?php echo wp_kses_post( $this->description ); ?></span>
				</i>
				<?php endif; ?>
			</span>
			<div class="onoffswitch">
				<input type="checkbox" id="<?php echo esc_attr( $this->id ); ?>"
					   name="<?php echo esc_attr( $this->id ); ?>" class="onoffswitch-checkbox"
					   value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link();
				checked( $this->value() ); ?>>
				<label class="onoffswitch-label" for="<?php echo esc_attr( $this->id ); ?>"></label>
			</div>
		</div>
		<?php
	}
}