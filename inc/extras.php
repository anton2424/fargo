<?php

/**
 *	Adds custom classes to the array of body classes.
 */
function fargo_body_classes( $classes ) {
    
	// Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'group-blog';
    }

    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }
        return $classes;
} 

add_filter( 'body_class', 'fargo_body_classes' );

/**
 *  Comment
 */
function fargo_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
    ?>
        <li class="post pingback">
        <p><?php _e( 'Pingback:', 'fargo' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'fargo' ), ' ' ); ?></p>
    <?php
    break;
    default :
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
    <div id="comment-<?php comment_ID(); ?>">
        <div class="row">
            <div class="col-sm-2 clearfix">
                <div class="comment-gravatar">
                        <?php echo get_avatar( $comment, 84 ); ?>
                </div><!--/.comment-gravatar-->
            </div><!--/.col-sm-2-->
            <div class="col-sm-10">
                <?php printf( __( '%s', 'fargo' ), sprintf( '%s', get_comment_author_link() ) ); ?>
                <time class="comment-time" datetime="<?php printf( '%s-%s-%s', get_the_date( 'Y' ), get_the_date( 'm' ), get_the_date( 'd' ) ); ?>"><?php printf( __( '%1$s at %2$s', 'fargo' ), get_comment_date(), get_comment_time() ); ?></time>
                    <div class="comment-entry markup-format">
                        <?php comment_text(); ?>
                        <?php
                        if(  $comment->comment_approved == '0' ):
                            _e( 'Your comment is awaiting moderation.', 'fargo' );
                        endif;
                        ?>
                    </div><!--/.comment-entry.markup-format-->
                <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div><!--/.col-sm-10-->
        </div><!--/.row-->
    </div><!--/#comment-<?php comment_ID(); ?>.row-->
    <?php
    break;
    endswitch;
}

/**
 *  Move comment field to bottom
 */
function fargo_move_comment_field_to_bottom( $fields ) {
	
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter( 'comment_form_fields', 'fargo_move_comment_field_to_bottom' );

/**
 *  Get image ID from Image URL
 */
function fargo_get_image_id_from_image_url( $image_url ) {
	
    global $wpdb;
    $attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ) );
    if( $attachment ) {
        return $attachment[0];
    }
}

/**
 *  Sections order
 */
function fargo_sections_order( $section ) {

    $controls = array(
		'fargo_panel_big_title'    => 'fargo_big_title_general_enable',
		'fargo_panel_features'     => 'fargo_features_general_enable',
        'fargo_panel_about'        => 'fargo_about_general_enable',
        'fargo_panel_portfolio'    => 'fargo_portfolio_general_enable',
        'fargo_panel_testimonials' => 'fargo_testimonials_general_enable',
        'fargo_panel_blog'         => 'fargo_blog_general_enable',
        'fargo_panel_counter'      => 'fargo_counter_general_enable',
        'fargo_panel_team'         => 'fargo_team_general_enable',
        'fargo_panel_contact'      => 'fargo_contact_general_enable',
	    'fargo_panel_clients'      => 'fargo_clients_general_enable',
	    'fargo_panel_map'          => 'fargo_map_general_enable',
		'fargo_panel_ribbon'       => 'fargo_ribbon_general_enable',
		'fargo_panel_ribbon_two'   => 'fargo_ribbon_two_general_enable',
		'fargo_panel_price'        => 'fargo_price_general_enable',
    );

    if ( array_key_exists( $section , $controls) ) {
        return get_theme_mod( $controls[$section], 1 );
    } else {
    return true;
    }
}

function fargo_sections() {

    $templates = array(
		'fargo_panel_blog'         => 'blog',	
		'fargo_panel_big_title'    => 'big-title',
        'fargo_panel_about'        => 'about',
        'fargo_panel_portfolio'    => 'portfolio',
        'fargo_panel_testimonials' => 'testimonials',
        'fargo_panel_features'     => 'features',
	    'fargo_panel_price'        => 'price',
        'fargo_panel_counter'      => 'counter',
        'fargo_panel_team'         => 'team',
        'fargo_panel_contact'      => 'contact',
	    'fargo_panel_clients'      => 'clients',
		'fargo_panel_map'          => 'map',
		'fargo_panel_ribbon'       => 'ribbon',
		'fargo_panel_ribbon_two'   => 'ribbon-two',
    );

    $sections = fargo_get_sections_position();

    foreach ( $sections as $s_id ) {
        if ( fargo_sections_order($s_id) ) {
            get_template_part( 'sections/'.$templates[$s_id] );
        }
    }
}