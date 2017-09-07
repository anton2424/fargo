<?php
/**
 * Customizer Control: Fargo-Tab
 *
 * @package     Fargo WordPress theme
 * @subpackage  Controls
 * @since       1.0
 */
 
 
class Fargo_Customizer_Tab_Control extends WP_Customize_Control {
	
	public $type = 'epsilon-tab';
	
	public $buttons = '';
	public function __construct( WP_Customize_Manager $manager, $id, array $args ) {
		parent::__construct( $manager, $id, $args );
	}
	
	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 */
	public function enqueue() {
		wp_enqueue_style( 'fargo-tab', get_template_directory_uri() .'/inc/customizer/controls/tab/css/tab.min.css', null);
	}
	
	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();
		$first = true;
		$formatted_buttons = array();
		foreach ($this->buttons as $button) {
			$fields = array();
			$active = isset($button['active']) ? $button['active'] : false;
			if ( $active && $first ) {
				$first = false;
			}elseif ( $active && !$first ) {
				$active = false;
			}

			foreach ($button['fields'] as $field) {
				$fields[] = '#customize-control-'.$field;
			}
			$formatted_buttons[] = array(
					'name'      => $button['name'],
					'fields'    => implode(',',$fields),
					'active'    => $active
				);
		}
		$this->json['buttons']  = $formatted_buttons;
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
	public function content_template() { ?>
		<div class="epsilon-tabs">
			<# if ( data.buttons ) { #>
				<div class="tabs">
					<# for (button in data.buttons) { #>
						<a href="#" class="epsilon-tab <# if ( data.buttons[button].active ) { #> active <# } #>" data-fields="{{ data.buttons[button].fields }}">{{ data.buttons[button].name }}</a>
					<# } #>
				</div>

			<# } #>
		</div>
		 <div class="epsilon-after-tab"><div></div></div>
	<?php }
}