<?php
/**
 * Features Section
 *
 * @since 1.0.1
 */

/**
 * Options
 */ 
$title             = get_theme_mod( 'fargo_features_general_title', __( 'FEATURES', 'fargo' ) );
$subtitle          = get_theme_mod( 'fargo_features_general_subtitle');
$general_content   = get_theme_mod( 'fargo_features_general_content', fargo_get_features_default()); 
$width             = get_theme_mod( 'fargo_features_settings_section_width', null );
$overlay           = get_theme_mod( 'fargo_features_backgrounds_overlay', null);
$layout            = get_theme_mod( 'fargo_features_settings_section_layout', 3);
$style_icon        = get_theme_mod( 'fargo_features_styles_icon', 1);
$style_button      = get_theme_mod( 'fargo_features_styles_button', 1);

/**
 * Default Values 
 */	
function fargo_get_features_default() {
	return apply_filters( 'fargo_features_default_content', json_encode( array(
		array(
			'icon_value' => 'fa-shopping-cart',
			'title'      => __( 'Woocomerce', 'fargo' ),
			'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'fargo' ),
			'link'       => '#',
			'color'      => '#e91e63',
		),
		array(
			'icon_value' => 'fa-desktop',
			'title'      => __( 'Responsive', 'fargo' ),
			'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'fargo' ),
			'link'       => '#',
			'color'      => '#00bcd4',
		),
		array(
			'icon_value' => 'fa-align-justify',
			'title'      => __( 'Content Bilder', 'fargo' ),
			'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'fargo' ),
			'link'       => '#',
			'color'      => '#4caf50',
		),
		array(
			'icon_value' => 'fa-photo',
			'title'      => __( 'Parallax Effect', 'fargo' ),
			'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'fargo' ),
			'link'       => '#',
			'color'      => '#a81ebd',
		),
	) ) );
}

/**
 * Content Function
 */	
?>

<?php if ( $title || $subtitle || $general_content ) : ?>
<section id="features" class="front-page-section">
    <?php if ( $overlay) :?>
	<div class="overlay"></div>
    <?php endif; ?>   
    <div class="<?php if ( $width) { ?>container-fluid<?php } else {?>container<?php } ?>">
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
				foreach ( $general_content as $features_item ) :
					$icon   = ! empty( $features_item->icon_value ) ? apply_filters( 'fargo_translate_single_string', $features_item->icon_value, 'Features section' ) : '';
					$title  = ! empty( $features_item->title ) ? apply_filters( 'fargo_translate_single_string', $features_item->title, 'Features section' ) : '';
					$text   = ! empty( $features_item->text ) ? apply_filters( 'fargo_translate_single_string', $features_item->text, 'Features section' ) : '';
					$link   = ! empty( $features_item->link ) ? apply_filters( 'fargo_translate_single_string', $features_item->link, 'Features section' ) : '';
					$color = '';
						if (!empty( $features_item->color ) ) {
							$color = $features_item->color;
						}
						?>
						<div class="col-md-<?php echo $layout; ?> col-sm-6 features-item">
							<div class="features-box <?php echo $style_section; ?>">
							<div class="header-box">
							<?php if ( ! empty( $icon ) ) : ?>
							
							<?php if ($style_icon==1) {?>
								<div class="icon si-1" <?php if ( ! empty( $color ) ) { echo 'style="color:' . $color . '"'; } ?>>
									<i class="fa <?php echo esc_html( $icon ); ?>"></i>
								</div><!--/.icon-->
							<?php } ?>
							<?php if ($style_icon==2) {?>
								<div class="icon is-2">
									<i <?php if ( ! empty( $color ) ) { echo 'style="background-color:' . $color . '"'; } ?> class="fa <?php echo esc_html( $icon ); ?>"></i>
								</div><!--/.icon-->
							<?php } ?>
							<?php if ($style_icon==3) {?>
								<div class="icon is-3">
									<i <?php if ( ! empty( $color ) ) { echo 'style="color:' . $color . ';border-color:' . $color . ';"'; } ?> class="fa <?php echo esc_html( $icon ); ?>"></i>
								</div><!--/.icon-->
							<?php } ?>
							<?php if ($style_icon==4) {?>
								<div class="icon is-4">
									<i <?php if ( ! empty( $color ) ) { echo 'style="background-color:' . $color . '"'; } ?> class="fa <?php echo esc_html( $icon ); ?>"></i>
								</div><!--/.icon-->
							<?php } ?>
							<?php if ($style_icon==5) {?>
								<div class="icon is-5">
									<i <?php if ( ! empty( $color ) ) { echo 'style="color:' . $color . ';border-color:' . $color . ';"'; } ?> class="fa <?php echo esc_html( $icon ); ?>"></i>
								</div><!--/.icon-->
							<?php } ?>
							</div>
							<?php endif; ?>
							<div class="content-box">
							<?php if ( ! empty( $title ) ) : ?>
							<h4 class="title-box">
							<?php echo esc_html( $title ); ?>
							</h4><!--/h4.title-box-->
							<?php endif; ?>
							<?php if ( ! empty( $link ) ) : ?>
							</a>
							<?php endif; ?>
							<?php if ( ! empty( $text ) ) : ?>
							<div class="description-box">
							<p><?php echo wp_kses( html_entity_decode( $text ), $allowed_html ); ?></p>
							</div><!--/.description-->
							<?php endif; ?>
							<?php if ( ! empty( $link ) ) : ?>
							<?php if ($style_button==1) {?>
							<a class="btn btn-features" <?php if ( ! empty( $color ) ) { echo 'style="background-color:' . $color . '"'; } ?>  href="<?php echo esc_url( $link ); ?>">	
						    More Information
							</a>
							<?php } ?>
							<?php if ($style_button==2) {?>
							<a class="btn sb-2" <?php if ( ! empty( $color ) ) { echo 'style="color:' . $color . '"'; } ?>  href="<?php echo esc_url( $link ); ?>">	
						    More Information
							</a>
							<?php } ?>
								<?php if ($style_button==3) {?>
							<a class="btn sb-3" onmouseover="this.style.backgroundColor='<?php echo $color; ?>';" onmouseout="this.style.backgroundColor='';" <?php if ( ! empty( $color ) ) { echo 'style="border-color:' . $color . '"'; } ?>  href="<?php echo esc_url( $link ); ?>">	
						    More Information
							</a>
							<?php } ?>
							<?php endif; ?>
								</div>
							</div><!--/.features-box-->
						</div><!--/.col-md-4-->
						<?php
				endforeach;
?>
				</div>
			</div><!--/.section-content-->	
			<?php endif; ?>
    </div><!--/.container-->
</section><!--/#features.front-page-section-->
<?php endif ?>