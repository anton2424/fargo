<?php
/**
 * Clients Section
 *
 * @since 1.0.1
 */

/**
 * Options
 */ 
$title             = get_theme_mod( 'fargo_clients_general_title');
$subtitle          = get_theme_mod( 'fargo_clients_general_subtitle');
$general_content   = get_theme_mod( 'fargo_clients_general_content', fargo_get_clients_default()); 
$width             = get_theme_mod( 'fargo_clients_settings_width', null );
$overlay           = get_theme_mod( 'fargo_clients_backgrounds_overlay', null ); 
?>

<?php
/**
 * Default Values 
 */	
function fargo_get_clients_default() {
	return apply_filters( 'fargo_clients_default_content', json_encode( array(
		array(
			'image_url'  => get_template_directory_uri() . '/assets/images/front-page/brand-1.png',
			'title'      => __( 'Responsive', 'fargo' ),
			'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'fargo' ),
			'link'       => '#',
			'color'      => '#e91e63',
		),
		array(
			'image_url'  => get_template_directory_uri() . '/assets/images/front-page/brand-2.png',
			'title'      => __( 'Quality', 'fargo' ),
			'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'fargo' ),
			'link'       => '#',
			'color'      => '#00bcd4',
		),
		array(
			'image_url'  => get_template_directory_uri() . '/assets/images/front-page/brand-3.png',
			'title'      => __( 'Support', 'fargo' ),
			'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'fargo' ),
			'link'       => '#',
			'color'      => '#4caf50',
		),
		array(
			'image_url'  => get_template_directory_uri() . '/assets/images/front-page/brand-2.png',
			'title'      => __( 'Responsive', 'fargo' ),
			'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'fargo' ),
			'link'       => '#',
			'color'      => '#e91e63',
		),
		array(
			'image_url'  => get_template_directory_uri() . '/assets/images/front-page/brand-1.png',
			'title'      => __( 'Responsive', 'fargo' ),
			'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'fargo' ),
			'link'       => '#',
			'color'      => '#e91e63',
		),
		array(
			'image_url'  => get_template_directory_uri() . '/assets/images/front-page/brand-1.png',
			'title'      => __( 'Responsive', 'fargo' ),
			'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'fargo' ),
			'link'       => '#',
			'color'      => '#e91e63',
		),
	) ) );
}



/**
 * Content Function
 */	
function clients_content( $general_content, $is_callback = false ) {
if ( ! empty( $general_content ) ) :
	$allowed_html = array(
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'b'      => array(),
		'i'      => array(),
		);
	$general_content = json_decode( $general_content );
	foreach ( $general_content as $clients_item ) :
		$image = ! empty( $clients_item->image_url ) ? apply_filters( 'hestia_translate_single_string', $clients_item->image_url, 'Testimonials section' ) : '';
		$title  = ! empty( $clients_item->title ) ? apply_filters( 'fargo_translate_single_string', $clients_item->title, 'Features section' ) : '';
		$text   = ! empty( $clients_item->text ) ? apply_filters( 'fargo_translate_single_string', $clients_item->text, 'Features section' ) : '';
		$link   = ! empty( $clients_item->link ) ? apply_filters( 'fargo_translate_single_string', $clients_item->link, 'Features section' ) : '';
        $color = '';
			if (!empty( $clients_item->color ) ) {
				$color = $clients_item->color;
			}
			?>
		
			<div class="col-lg-2 col-md-4 col-sm-6">
			<div class="client-box">
			<?php if ( ! empty( $image ) ) : ?>
			<div class="card-avatar">
			<?php if ( ! empty( $link ) ) : ?>
			<a href="<?php echo esc_url( $link ); ?>">
			<?php endif; ?>
			<img class="img" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_html( $title ); ?>" <?php endif; ?> src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
			<?php if ( ! empty( $link ) ) : ?>
				</a>
			<?php endif; ?>
					</div>
					<?php endif; ?>
			<?php if ( ! empty( $link ) ) : ?>
			</a>
			<?php endif; ?>
		    </div><!--/.content-->
			</div><!--/.col-md-4-->
			<?php
	endforeach;
endif;
?>
<?php 
} 
?>
<?php if ( $title || $subtitle || $general_content ) { ?>
<section id="clients" class="front-page-section">
    <?php if ( $overlay) :?>
	<div class="overlay"></div>
    <?php endif; ?> 	    
	<div class="<?php if ( $width ) { ?>container-fluid<?php } else {?>container<?php } ?>">
	<?php if( $title || $subtitle ): ?>
		<div class="section-header">
			<div class="row">
			<?php if( $title ): ?>
			<div class="col-sm-12">
				<h2 class="title">
				<?php echo esc_html( $title ); ?>
				</h2><!--/h2.title-->
			</div><!--/.col-sm-12-->
			<?php endif; ?>
			<?php if( $subtitle ): ?>
			<div class="col-sm-12">
				<h5 class="subtitle">
				<?php echo esc_html( $subtitle ); ?>
				</h5><!--/h5.subtitle-->
			</div><!--/.col-sm-12-->
			<?php endif; ?>
			</div><!--/.row-->
		</div><!--/.section-header-->
	<?php endif; ?>
		<?php if( $general_content ): ?>
        <div class="section-content">
	        <div class="row">
	        <?php clients_content( $general_content ); ?>
	        </div><!--/.row-->
        </div><!--/.section-content-->	
		<?php endif; ?>
    </div><!--/.container-->
</section><!--/#clients.front-page-section-->
<?php } ?>