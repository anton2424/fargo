<?php
/**
 * Team Section Customizer Options
 *
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 

/**
 * Variable
 */
$panel  = 'fargo_panel_team';
$prefix = 'fargo';

/**
 * Panel
 */
$wp_customize->add_section( $panel, array(
    'priority'              => fargo_get_section_position($panel),
    'capability'            => 'edit_theme_options',
    'theme_supports'        => '',
    'title'                 => esc_html__( 'Team', 'fargo' ),
    'panel'                 => 'fargo_frontpage_panel'
) );

/**
 * Tabs
 */
$wp_customize->add_setting( $prefix . '_team_tab', array(
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_kses_post'
) );

$wp_customize->add_control( new Fargo_Customizer_Tab_Control( $wp_customize, $prefix . '_team_tab', array(
    'type'                  => 'epsilon-tab',
    'section'               => $panel,
    'buttons'               => array(
		array(
            'name'          => esc_html__( 'General', 'fargo' ),
            'fields'        => array(
                $prefix . '_team_general_enable',
                $prefix . '_team_general_title',
		      	$prefix . '_team_general_subtitle',
				$prefix . '_team_general_content',
            ),
            'active'        => true
        ),
        array(
			'name'          => esc_html__( 'Settings', 'fargo' ),
            'fields'        => array(
			    $prefix . '_team_settings_width',
			    $prefix . '_team_settings_layout',
            ),
        ),
		array(
            'name'          => esc_html__( 'Colors', 'fargo' ),
            'fields'        => array(
		        $prefix . '_team_colors_background',
                $prefix . '_team_colors_title',
                $prefix . '_team_colors_subtitle',
			    $prefix . '_team_colors_content_name',
			    $prefix . '_team_colors_content_text',
            ),
        ),
        array(
            'name'          => esc_html__( 'Backgrounds', 'fargo' ),
            'fields'        => array(
                $prefix . '_team_backgrounds_image',   
				$prefix . '_team_backgrounds_position',
                $prefix . '_team_backgrounds_size',
                $prefix . '_team_backgrounds_repeat',
                $prefix . '_team_backgrounds_attachment',
				$prefix . '_team_backgrounds_overlay',
				$prefix . '_team_backgrounds_overlay_color', 					
            ),
        ),
    ),
) ) );

/**
 * GENERAL
 */

/**
 * Section Enable
 */
$wp_customize->add_setting( $prefix . '_team_general_enable', array(
    'sanitize_callback'     => 'fargo_sanitize_checkbox',
    'default'               => 1,
) );

$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_team_general_enable', array(
	'type'              => 'mte-toggle',
	'label'             => esc_html__( 'Section Enable', 'fargo' ),
	'section'           => $panel,
	'settings'          => $prefix . '_team_general_enable',
) ) );

/**
 * Title
 */
$wp_customize->add_setting( $prefix .'_team_general_title', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_html',
    'default'               => esc_html__( 'TEAM', 'fargo' ),
) );

$wp_customize->add_control( $prefix .'_team_general_title', array(
    'label'                 => esc_html__( 'Title', 'fargo' ),
    'section'               => $panel,
	'settings'              => $prefix . '_team_general_title',
) );

$wp_customize->selective_refresh->add_partial( $prefix .'_team_general_title', array(
    'selector'              => '#team .section-header h2',
) );

/**
 * Sub Title
 */
$wp_customize->add_setting( $prefix .'_team_general_subtitle', array(
	'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_html',
    'default'               => esc_html__( 'This is a description for the Team section. You can set it up in the Customizer > Front Page Sections > Team and add items by clicking on Add or edit Team.', 'fargo' ),
) );

$wp_customize->add_control( $prefix .'_team_general_subtitle', array(
    'label'                 => esc_html__( 'Subtitle', 'fargo' ),
    'section'               => $panel,
	'settings'              => $prefix . '_team_general_subtitle',
) );

$wp_customize->selective_refresh->add_partial( $prefix .'_team_general_subtitle', array(
    'selector'              => '#team .section-header h5',
) );

/**
 * General Content
 */		
$wp_customize->add_setting( $prefix . '_team_general_content', array(
	'transport'             => $selective_refresh ? 'postMessage' : 'refresh',
) );

$team_content_control = $wp_customize->get_setting( $prefix .'_team_general_content' );
		if ( ! empty( $team_content_control ) ) {
			$team_content_control->default = json_encode( array(
				array(
				'image_url'       => get_template_directory_uri() . '/assets/img/1.jpg',
				'title'           => esc_html__( 'Desmond Purpleson', 'themeisle-companion' ),
				'subtitle'        => esc_html__( 'CEO', 'themeisle-companion' ),
				'text'            => esc_html__( 'Locavore pinterest chambray affogato art party, forage coloring book typewriter. Bitters cold selfies, retro celiac sartorial mustache.', 'themeisle-companion' ),
				'id'              => 'customizer_repeater_56d7ea7f40c56',
				'social_repeater' => json_encode( array(
					array(
						'id'   => 'customizer-repeater-social-repeater-57fb908674e06',
						'link' => 'facebook.com',
						'icon' => 'fa-facebook',
					),
					array(
						'id'   => 'customizer-repeater-social-repeater-57fb9148530ft',
						'link' => 'plus.google.com',
						'icon' => 'fa-google-plus',
					),
					array(
						'id'   => 'customizer-repeater-social-repeater-57fb9148530fc',
						'link' => 'twitter.com',
						'icon' => 'fa-twitter',
					),
					array(
						'id'   => 'customizer-repeater-social-repeater-57fb9150e1e89',
						'link' => 'linkedin.com',
						'icon' => 'fa-linkedin',
					),
				) ),
				),
				array(
				'image_url'       => get_template_directory_uri() . '/assets/img/2.jpg',
				'title'           => esc_html__( 'Parsley Pepperspray', 'themeisle-companion' ),
				'subtitle'        => esc_html__( 'Marketing Specialist', 'themeisle-companion' ),
				'text'            => esc_html__( 'Craft beer salvia celiac mlkshk. Pinterest celiac tumblr, portland salvia skateboard cliche thundercats. Tattooed chia austin hell.', 'themeisle-companion' ),
				'id'              => 'customizer_repeater_56d7ea7f40c66',
				'social_repeater' => json_encode( array(
					array(
						'id'   => 'customizer-repeater-social-repeater-57fb9155a1072',
						'link' => 'facebook.com',
						'icon' => 'fa-facebook',
					),
					array(
						'id'   => 'customizer-repeater-social-repeater-57fb9160ab683',
						'link' => 'twitter.com',
						'icon' => 'fa-twitter',
					),
					array(
						'id'   => 'customizer-repeater-social-repeater-57fb9160ab484',
						'link' => 'pinterest.com',
						'icon' => 'fa-pinterest',
					),
					array(
						'id'   => 'customizer-repeater-social-repeater-57fb916ddffc9',
						'link' => 'linkedin.com',
						'icon' => 'fa-linkedin',
					),
				) ),
				),
				array(
				'image_url'       => get_template_directory_uri() . '/assets/img/3.jpg',
				'title'           => esc_html__( 'Desmond Eagle', 'themeisle-companion' ),
				'subtitle'        => esc_html__( 'Graphic Designer', 'themeisle-companion' ),
				'text'            => esc_html__( 'Pok pok direct trade godard street art, poutine fam typewriter food truck narwhal kombucha wolf cardigan butcher whatever pickled you.', 'themeisle-companion' ),
				'id'              => 'customizer_repeater_56d7ea7f40c76',
				'social_repeater' => json_encode( array(
					array(
						'id'   => 'customizer-repeater-social-repeater-57fb917e4c69e',
						'link' => 'facebook.com',
						'icon' => 'fa-facebook',
					),
					array(
						'id'   => 'customizer-repeater-social-repeater-57fb91830825c',
						'link' => 'twitter.com',
						'icon' => 'fa-twitter',
					),
					array(
						'id'   => 'customizer-repeater-social-repeater-57fb918d65f2e',
						'link' => 'linkedin.com',
						'icon' => 'fa-linkedin',
					),
					array(
						'id'   => 'customizer-repeater-social-repeater-57fb918d65f2x',
						'link' => 'dribbble.com',
						'icon' => 'fa-dribbble',
					),
				) ),
				),
				array(
				'image_url'       => get_template_directory_uri() . '/assets/img/4.jpg',
				'title'           => esc_html__( 'Ruby Von Rails', 'themeisle-companion' ),
				'subtitle'        => esc_html__( 'Lead Developer', 'themeisle-companion' ),
				'text'            => esc_html__( 'Small batch vexillologist 90\'s blue bottle stumptown bespoke. Pok pok tilde fixie chartreuse, VHS gluten-free selfies wolf hot.', 'themeisle-companion' ),
				'id'              => 'customizer_repeater_56d7ea7f40c86',
				'social_repeater' => json_encode( array(
					array(
						'id'   => 'customizer-repeater-social-repeater-57fb925cedcg5',
						'link' => 'github.com',
						'icon' => 'fa-github-square',
					),
					array(
						'id'   => 'customizer-repeater-social-repeater-57fb925cedcb2',
						'link' => 'facebook.com',
						'icon' => 'fa-facebook',
					),
					array(
						'id'   => 'customizer-repeater-social-repeater-57fb92615f030',
						'link' => 'twitter.com',
						'icon' => 'fa-twitter',
					),
					array(
						'id'   => 'customizer-repeater-social-repeater-57fb9266c223a',
						'link' => 'linkedin.com',
						'icon' => 'fa-linkedin',
					),
				) ),
				),
			) );
		}
	
$wp_customize->add_control( new Fargo_Repeater( $wp_customize, $prefix . '_team_general_content', array(
	'label'                             => esc_html__( 'Team Content', 'fargo' ),
	'section'                           => $panel,
	'add_field_label'                   => esc_html__( 'Add Team', 'fargo' ),
	'item_name'                         => esc_html__( 'Team Member', 'fargo' ),
	'customizer_repeater_image_control'    => true,
	'customizer_repeater_title_control'    => true,
	'customizer_repeater_subtitle_control' => true,
	'customizer_repeater_text_control'     => true,
	'customizer_repeater_link_control'     => true,
	'customizer_repeater_repeater_control' => true,
	
) ) );
			
function hestia_team_content_callback() {
	$team_content_control = get_theme_mod( $prefix . '_team_general_content' );
	hestia_team_content( $team_content_control, true );
}

/**
 * SETTINGS
 */

/**
 * Full Width
 */
$wp_customize->add_setting( $prefix . '_team_settings_width', array(
	'transport'             => 'postMessage',
	'sanitize_callback'     => 'fargo_sanitize_checkbox',
	'default'               => 0,
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_team_settings_width', array(
	'type'                  => 'mte-toggle',
	'label'                 => esc_html__( 'Full Width', 'fargo' ),
	'section'               => $panel,
	'settings'              => $prefix . '_team_settings_width',
) ) );
 
/**
 * Layout
 */
$wp_customize->add_setting( $prefix .'_team_settings_layout', array(
    'default'               => 3,
) );

$wp_customize->add_control( new Fargo_Customizer_Range_Control( $wp_customize, $prefix .'_team_settings_layout', array(
    'label'                 => esc_html__( 'Layouts', 'fargo' ),
	'section'               => $panel,
	'settings'              => $prefix . '_team_settings_layout',
    'choices'               => array(
        'min'               => 1,
        'max'               => 5,
        'step'              => 1,
    ),
) ) );

/**
 * COLORS
 */

/**
 * Background Color
 */
$wp_customize->add_setting( $prefix . '_team_colors_background', array(
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#fff',
    'transport'             => 'postMessage',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_team_colors_background', array(
    'label'                 => esc_html__( 'Background Color', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_team_colors_background',
) ) );

/**
 * Title Color
 */
$wp_customize->add_setting( $prefix . '_team_colors_title', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_team_colors_title', array(
    'label'                 => esc_html__( 'Title Color', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_team_colors_title',
) ) );

/**
 * Sub Title Color
 */
$wp_customize->add_setting( $prefix . '_team_colors_subtitle', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_team_colors_subtitle', array(
    'label'                 => esc_html__( 'Subtitle Color', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_team_colors_subtitle',
) ) );

/**
 * Content Name Color
 */
$wp_customize->add_setting( $prefix . '_team_colors_content_name', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_team_colors_content_name', array(
    'label'                 => esc_html__( 'Content Name Color', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_team_colors_content_name',
) ) );

/**
 * Content Text Color
 */
$wp_customize->add_setting( $prefix . '_team_colors_content_text', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'fargo_sanitize_color',
    'default'               => '#ffffff',
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_team_colors_content_text', array(
    'label'                 => esc_html__( 'Content Text Color', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_team_colors_content_text',
) ) );

/**
 * BACKGROUNDS
 */

/**
 * Background Image
 */
$wp_customize->add_setting( $prefix . '_team_backgrounds_image', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'esc_url',
	'default'               => '',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $prefix . '_team_backgrounds_image', array(
    'label'                 => esc_html__( 'Background Image', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_team_backgrounds_image',
) ) );

/**
 * Background Position
 */
$wp_customize->add_setting( $prefix . '_team_backgrounds_position', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'sanitize_text_field',
	'default'               => 'initial',
) );

$wp_customize->add_control( $prefix . '_team_backgrounds_position', array(
    'label'                 => esc_html__( 'Background Position', 'fargo' ),
	'type'                  => 'select',
    'section'               => $panel,
	'settings'              => $prefix . '_team_backgrounds_position',
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
$wp_customize->add_setting( $prefix . '_team_backgrounds_size', array(
	'transport'             => 'postMessage',
    'sanitize_callback'     => 'sanitize_text_field',
	'default'               => 'auto',
) );

$wp_customize->add_control( $prefix . '_team_backgrounds_size', array(
    'label'      		    => esc_html__( 'Background Size', 'fargo' ),
	'type'                  => 'select',
    'section'               => $panel,
	'settings'              => $prefix . '_team_backgrounds_size',
    'choices'               => array(
        'auto'              => esc_html__( 'Default', 'fargo' ),
        'contain'           => esc_html__( 'Fit to Screen', 'fargo' ),
        'cover'             => esc_html__( 'Fill Screen', 'fargo' ),
    ),
) );

/**
 * Background Repeat
 */
$wp_customize->add_setting( $prefix . '_team_backgrounds_repeat', array(
    'transport'             => 'postMessage',
    'sanitize_callback'     => 'sanitize_text_field',
	'default'               => 'initial',
) );

$wp_customize->add_control( $prefix . '_team_backgrounds_repeat', array(
    'label'     		    => esc_html__( 'Background Repeat', 'fargo' ),
	'type'                  => 'select',
    'section'               => $panel,
	'settings'              => $prefix . '_team_backgrounds_repeat',
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
$wp_customize->add_setting( $prefix . '_team_backgrounds_attachment', array(
    'transport'        		=> 'postMessage',
    'sanitize_callback' 	=> 'sanitize_text_field',
	'default'               => 'initial',
) );

$wp_customize->add_control( $prefix . '_team_backgrounds_attachment', array(
    'label'                 => esc_html__( 'Background Attachment', 'fargo' ),
	'type'                  => 'select',
    'section'               => $panel,
	'settings'              => $prefix . '_team_backgrounds_attachment',
    'choices'               => array(
		'initial'         	=> esc_html__( 'Default', 'fargo' ),
		'scroll' 	        => esc_html__( 'Scroll', 'fargo' ),
		'fixed' 	        => esc_html__( 'Fixed', 'fargo' )
    ),
) );

/**
 * Background Overlay Enable
 */
$wp_customize->add_setting( $prefix . '_team_backgrounds_overlay', array(
    'transport'             => 'postMessage',
	'sanitize_callback'     => 'fargo_sanitize_checkbox',
	'default'               => 0,
) );
	
$wp_customize->add_control( new Fargo_Customizer_Toggle_Control( $wp_customize, $prefix . '_team_backgrounds_overlay', array(
	'label'                 => esc_html__( 'Overlay Enable', 'fargo' ),
	'type'                  => 'mte-toggle',
	'section'               => $panel,
	'settings'              => $prefix . '_team_backgrounds_overlay',
) ) );

/**
 * Background Overlay Color
 */
$wp_customize->add_setting( $prefix . '_team_backgrounds_overlay_color', array(
    'transport'             => 'postMessage',
	'sanitize_callback'     => 'fargo_sanitize_color',
	'default'               => '#ffffff',		
) );

$wp_customize->add_control( new Fargo_Customizer_Color_Control( $wp_customize, $prefix . '_team_backgrounds_overlay_color', array(
    'label'                 => esc_html__( 'Overlay Color', 'fargo' ),
    'section'               => $panel,
    'settings'              => $prefix . '_team_backgrounds_overlay_color',
) ) );