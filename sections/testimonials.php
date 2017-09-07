<?php
/**
 * Testimonials Section
 *
 * @since 1.0.0
 */

/**
 * Options
 */ 

$title             = get_theme_mod( 'fargo_testimonials_general_title', __( 'TESTIMONIALS', 'fargo' ) );
$subtitle          = get_theme_mod( 'fargo_testimonials_general_subtitle', __( 'This is a description for the Testimonials section. You can set it up in the Customizer > Front Page Sections > Testimonials and add items by clicking on Add or edit Testimonials.', 'fargo' ) );
$general_content   = get_theme_mod( 'fargo_testimonials_general_content', fargo_get_testimonials_default());
$full_width        = get_theme_mod( 'fargo_testimonials_settings_width', 0 );
$overlay           = get_theme_mod( 'fargo_testimonials_backgrounds_overlay', 1 ); 
$layout            = get_theme_mod( 'fargo_testimonials_settings_section_layout', 3);

/**
 * Default Values 
 */	
function fargo_get_testimonials_default() {
	return apply_filters( 'fargo_testimonials_default_content', json_encode( array(
		array(
			'image_url'       => get_template_directory_uri() . '/assets/images/front-page/team-1.png',
			'title'     => esc_html__( 'Inverness McKenzie', 'fargo' ),
			'subtitle'  => esc_html__( 'Business Owner', 'fargo' ),
			'text'      => esc_html__( '"We have no regrets! After using your product my business skyrocketed! I made back the purchase price in just 48 hours! I couldn\'t have asked for more than this."', 'fargo' ),
		),	
		array(
			'image_url'       => get_template_directory_uri() . '/assets/images/front-page/team-2.png',
			'title'     => esc_html__( 'Inverness McKenzie', 'fargo' ),
			'subtitle'  => esc_html__( 'Business Owner', 'fargo' ),
			'text'      => esc_html__( '"We have no regrets! After using your product my business skyrocketed! I made back the purchase price in just 48 hours! I couldn\'t have asked for more than this."', 'fargo' ),
		),	
		array(
			'image_url'       => get_template_directory_uri() . '/assets/images/front-page/team-4.png',
			'title'     => esc_html__( 'Inverness McKenzie', 'fargo' ),
			'subtitle'  => esc_html__( 'Business Owner', 'fargo' ),
			'text'      => esc_html__( '"We have no regrets! After using your product my business skyrocketed! I made back the purchase price in just 48 hours! I couldn\'t have asked for more than this."', 'fargo' ),
		),	
	) ) );
}
?>

<?php if ( $title || $subtitle || $general_content ) { ?>
<section id="testimonials" class="front-page-section">
    <?php if ( $overlay==1) :?>
	<div class="overlay"></div>
    <?php endif; ?> 
	<div class="<?php if ( $full_width == 0 ) { ?>container<?php } else {?>container-fluid<?php } ?>">
		<div class="row">
			<?php if( $title || $subtitle ): ?>
				<div class="section-header">
					<?php if( $title ): ?>
						<h2 class="section-title">
						<?php echo esc_html( $title ); ?>
						</h2><!--/h2.section-title-->
					<?php endif; ?>
					<?php if( $subtitle ): ?>
						<h5 class="section-subtitle">
						<?php echo esc_html( $subtitle ); ?>
						</h5><!--/h5.section-subtitle-->
					<?php endif; ?>
				</div><!--/.section-header-->
			<?php endif; ?>
	<?php if( $general_content ): ?>
	<div class="section-content">
		<div class="row">
		<?php

		$allowed_html = array(
			'br'     => array(),
			'em'     => array(),
			'strong' => array(),
			'b'      => array(),
			'i'      => array(),
		);
	$general_content = json_decode( $general_content );
	foreach ( $general_content as $testimonial_item ) :
		$image = ! empty( $testimonial_item->image_url ) ? apply_filters( 'hestia_translate_single_string', $testimonial_item->image_url, 'Testimonials section' ) : '';
		$title = ! empty( $testimonial_item->title ) ? apply_filters( 'hestia_translate_single_string', $testimonial_item->title, 'Testimonials section' ) : '';
		$subtitle = ! empty( $testimonial_item->subtitle ) ? apply_filters( 'hestia_translate_single_string', $testimonial_item->subtitle, 'Testimonials section' ) : '';
		$text = ! empty( $testimonial_item->text ) ? apply_filters( 'hestia_translate_single_string', $testimonial_item->text, 'Testimonials section' ) : '';
		?>
		<div class="col-lg-4 col-md-4 col-sm-6">
			<div class="testimonials-box">
			<?php if ( ! empty( $text ) ) : ?>
			<p class="card-description"><?php echo wp_kses( html_entity_decode( $text ), $allowed_html ); ?></p>
			<?php endif; ?>
			<?php if ( ! empty( $image ) ) : ?>
			<div class="card-avatar">
			<img class="img" src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
			</div>
			<?php endif; ?>
			<?php if ( ! empty( $title ) ) : ?>
			<h4 class="title-box">
			<?php echo esc_html( $title ); ?>
			</h4><!--/h4.title-box-->
			<?php endif; ?>
			<?php if ( ! empty( $subtitle ) ) : ?>
			<h4 class="category text-muted"><?php echo esc_html( $subtitle ); ?></h4>
			<?php endif; ?>
			</div>
		</div>
			<?php
		endforeach;
	?>
		</div><!--/.row-->
	</div><!--/.section-content-->
	<?php endif; ?>
	</div><!--/.container-->
</section><!--/#testimonials.front-page-section-->
<?php } ?>