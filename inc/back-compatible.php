<?php

$theme = wp_get_theme();
if( version_compare( $theme->version, '1.0.17', '>' ) ) {

	$current_logo = get_theme_mod( 'fargo_img_logo', '' );
	$logo = get_custom_logo();
	if ( $current_logo != '' && !$logo ) {
		$logoID = attachment_url_to_postid($current_logo);
		if ( $logoID ) {
			set_theme_mod( 'custom_logo', $logoID );
			remove_theme_mod( 'fargo_img_logo' );
		}
	}

}

// Backward compatibility for sections ordering
if( version_compare( $theme->version, '1.0.36', '>=' ) ) {

	$defaults = array(
		'fargo_panel_big_title',
		'fargo_panel_blog',
		'fargo_panel_about',
		'fargo_panel_projects',
		'fargo_panel_testimonials',
		'fargo_panel_services',
		'fargo_panel_counter',
		'fargo_panel_team',
		'fargo_panel_contact',
		'fargo_panel_clients',
		'fargo_panel_ribbon',
		'fargo_panel_ribbon_two',
		);

	$old_order = array();
	$new_order = array();

	$old_order[] = get_theme_mod( 'fargo_general_sections_order_first_section' );
	$old_order[] = get_theme_mod( 'fargo_general_sections_order_second_section' );
	$old_order[] = get_theme_mod( 'fargo_general_sections_order_third_section' );
	$old_order[] = get_theme_mod( 'fargo_general_sections_order_fourth_section' );
	$old_order[] = get_theme_mod( 'fargo_general_sections_order_fifth_section' );
	$old_order[] = get_theme_mod( 'fargo_general_sections_order_sixth_section' );
	$old_order[] = get_theme_mod( 'fargo_general_sections_order_seventh_section' );
	$old_order[] = get_theme_mod( 'fargo_general_sections_order_eighth_section' );
	$old_order[] = get_theme_mod( 'fargo_general_sections_order_nine_section' );
	$old_order[] = get_theme_mod( 'fargo_general_sections_order_ten_section' );
	$old_order[] = get_theme_mod( 'fargo_general_sections_order_eleven_section' );
	$old_order[] = get_theme_mod( 'fargo_general_sections_order_twelve_section' );
	$old_order[] = get_theme_mod( 'fargo_general_sections_order_thirteen_section' );
	$old_order[] = get_theme_mod( 'fargo_general_sections_order_fourteen_section' );
	$old_order[] = get_theme_mod( 'fargo_general_sections_order_fifteen_section' );
	$old_order[] = get_theme_mod( 'fargo_general_sections_order_sixteen_section' );
	$old_order[] = get_theme_mod( 'fargo_general_sections_order_seventeen_section' );

	foreach ($old_order as $key) {
		if ( $key ) {
			$index = $key-1;
			$new_order[$index] = $defaults[$index];
			unset($defaults[$index]);
		}
	}

	if ( !empty($new_order) ) {
		$new_order = array_merge( $new_order, $defaults );
		set_theme_mod( 'fargo_frontpage_sections', $new_order );

		remove_theme_mod( 'fargo_general_sections_order_first_section');
		remove_theme_mod( 'fargo_general_sections_order_second_section');
		remove_theme_mod( 'fargo_general_sections_order_third_section');
		remove_theme_mod( 'fargo_general_sections_order_fourth_section');
		remove_theme_mod( 'fargo_general_sections_order_fifth_section');
		remove_theme_mod( 'fargo_general_sections_order_sixth_section');
		remove_theme_mod( 'fargo_general_sections_order_seventh_section');
		remove_theme_mod( 'fargo_general_sections_order_eighth_section');
		remove_theme_mod( 'fargo_general_sections_order_nine_section');
		remove_theme_mod( 'fargo_general_sections_order_ten_section');
		remove_theme_mod( 'fargo_general_sections_order_eleven_section');
		remove_theme_mod( 'fargo_general_sections_order_twelve_section');
		remove_theme_mod( 'fargo_general_sections_order_fourteen_section');
		remove_theme_mod( 'fargo_general_sections_order_thirteen_section');
		remove_theme_mod( 'fargo_general_sections_order_fourteen_section');
		remove_theme_mod( 'fargo_general_sections_order_fifteen_section');
		remove_theme_mod( 'fargo_general_sections_order_sixteen_section');
		remove_theme_mod( 'fargo_general_sections_order_seventeen_section');

	}	
}
