<?php
/**
 *	Custom Control: Contact Form 7
 */
/**
 *  Custom Control: Text
 */
if( !class_exists( 'Fargo_Text_Custom_Control' ) ) {
    class Fargo_Text_Custom_Control extends WP_Customize_Control {
        public function render_content() {
            $output = '';

            $output .= '<span class="customize-control-title">'. esc_html( $this->label ) .'</span>';
            $output .= '<span class="description customize-control-description">'. $this->description .'</span>';

            echo $output;
        }
    }
}

		class Fargo_WP_Customize_Panel extends WP_Customize_Panel {

			public $panel;

			public $type = 'fargo_panel';

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

























if ( class_exists( 'WP_Customize_Control' ) ) {
    /**
     * Slider control
     *
     * @since  1.0.0
     * @access public
     *
     */
    class Epsilon_Control_Slider extends WP_Customize_Control {
        /**
         * The type of customize control being rendered.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $type = 'mte-slider';
        /**
         * Enqueue scripts/styles.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function enqueue() {
            wp_enqueue_script( 'jquery-ui' );
            wp_enqueue_script( 'jquery-ui-slider' );
        }
        /**
         * Displays the control content.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function render_content() { ?>
            <label>

                <span class="customize-control-title">
                    <?php echo esc_attr( $this->label ); ?>
                    <?php if ( !empty($this->description) ): ?>
                        <i class="dashicons dashicons-editor-help" style="vertical-align: text-bottom; position: relative;">
                        <span class="mte-tooltip"><?php echo wp_kses_post( $this->description ); ?></span>
                    </i>
                    <?php endif; ?>
                </span>

                <input disabled type="text" class="rl-slider" id="input_<?php echo $this->id; ?>"
                       value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?>/>

            </label>

            <div id="slider_<?php echo $this->id; ?>" class="ss-slider"></div>
            <script>
                jQuery(document).ready(function ($) {
                    $('[id="slider_<?php echo $this->id; ?>"]').slider({
                        value: <?php echo esc_attr( $this->value() ); ?>,
                        range: 'min',
                        min  : <?php echo $this->choices['min']; ?>,
                        max  : <?php echo $this->choices['max']; ?>,
                        step : <?php echo $this->choices['step']; ?>,
                        slide: function (event, ui) {
                            $('[id="input_<?php echo $this->id; ?>"]').val(ui.value).keyup();
                        }
                    });
                    $('[id="input_<?php echo $this->id; ?>"]').val($('[id="slider_<?php echo $this->id; ?>"]').slider("value"));
                    $('[id="input_<?php echo $this->id; ?>"]').change(function () {
                        $('[id="slider_<?php echo $this->id; ?>"]').slider({
                            value: $(this).val()
                        });
                    });
                });
            </script>
            <?php
        }
    }
}
if ( ! class_exists( 'Epsilon_Control_Button' ) ):
    class Epsilon_Control_Button extends WP_Customize_Control {
        public $type = 'epsilon-button';
        public $text = '';
        public $section_id = '';
        public $icon = '';
        public function __construct( WP_Customize_Manager $manager, $id, array $args ) {
            parent::__construct( $manager, $id, $args );
        }
        public function to_json() {
            parent::to_json();
            $this->json['text']  = $this->text;
            $this->json['section_id']  = $this->section_id;
            $this->json['icon']  = $this->icon;
        }

        public function content_template() { ?>
            <div class="epsilon-button">
                <# if ( data.section_id ) { #>
                    <a href="#" class="epsilon-button" data-section="{{ data.section_id }}">
                        <# if ( data.icon ) { #>
                            <span class="dashicons {{ data.icon }}"></span>
                        <# } #>
                        {{ data.text }}</a>
                <# } #>
            </div>
        <?php }
    }
endif;

    class Epsilon_Editor_Custom_Control extends WP_Customize_Control {

        public $type = 'wp_editor';

        public $mod;
        public function render_content() {
            $this->mod = strtolower( $this->mod );
            if( ! $this->mod = 'html' ) {
                $this->mod = 'tmce';
            }
            ?>
            <div class="wp-js-editor">
                <label>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                </label>
                <textarea class="wp-js-editor-textarea large-text" data-editor-mod="<?php echo esc_attr( $this->mod ); ?>" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
                <p class="description"><?php echo $this->description ?></p>
            </div>
        <?php
        }
}