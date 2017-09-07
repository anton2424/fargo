<?php
/**
 * Counter Section
 *
 * @since 1.0.0
 */

/**
 * Options
 */ 

$title             = get_theme_mod( 'fargo_counter_general_title', __( false, 'fargo' ) );
$subtitle          = get_theme_mod( 'fargo_counter_general_subtitle', __( false, 'fargo' ) );
$general_content   = get_theme_mod( 'fargo_counter_general_content', fargo_get_counter_default()); 
$width             = get_theme_mod( 'fargo_counter_settings_width', null);
$overlay           = get_theme_mod( 'fargo_counter_backgrounds_overlay', null);

/**
 * Default Values 
 */	
function fargo_get_counter_default() {
	return apply_filters( 'fargo_counter_default_content', json_encode( array(
		array(
			'icon_value' => 'fa-wechat',
			'title'      => __( '185567', 'fargo' ),
			'text'       => __( 'Lines Of Code', 'fargo' ),
			'color'      => '#fff',
		),
		array(
			'icon_value' => 'fa-check',
			'title'      => __( '360', 'fargo' ),
			'text'       => __( 'Cups Of Coffee', 'fargo' ),
			'color'      => '#fff',
		),
		array(
			'icon_value' => 'fa-support',
			'title'      => __( '80', 'fargo' ),
			'text'       => __( 'Years In Business', 'fargo' ),
			'color'      => '#fff',
		),
		array(
			'icon_value' => 'fa-wechat',
			'title'      => __( '90', 'fargo' ),
			'text'       => __( 'Customer Satisfaction', 'fargo' ),
			'color'      => '#fff',
		),
	) ) );
}	
?>
<?php if ( $title || $subtitle || $general_content ) { ?>
<section id="counter" class="front-page-section">
    <?php if ( $overlay) :?>
	<div class="overlay"></div>
    <?php endif; ?>   
	<div class="<?php if ( $width ) { ?>container-fluid<?php } else {?>container<?php } ?>">
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
			<?php /**
 * Content Function
 */	
	$allowed_html = array(
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'b'      => array(),
		'i'      => array(),
		);
	$general_content = json_decode( $general_content );
	foreach ( $general_content as $counter_item ) :
		$icon   = ! empty( $counter_item->icon_value ) ? apply_filters( 'fargo_translate_single_string', $counter_item->icon_value, 'counter section' ) : '';
		$title  = ! empty( $counter_item->title ) ? apply_filters( 'fargo_translate_single_string', $counter_item->title, 'counter section' ) : '';
		$text   = ! empty( $counter_item->text ) ? apply_filters( 'fargo_translate_single_string', $counter_item->text, 'counter section' ) : '';
        $color = '';
			if (!empty( $counter_item->color ) ) {
				$color = $counter_item->color;
			}
			?>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="counter-box">
				<?php if ( ! empty( $icon ) ) : ?>
					<div class="icon" <?php if ( ! empty( $color ) ) { echo 'style="color:' . $color . '"'; } ?>>
					<i class="fa <?php echo esc_html( $icon ); ?>"></i>
					</div><!--/.icon-->
				<?php endif; ?>
				<?php if ( ! empty( $title ) ) : ?>
					<div class="title"><?php echo esc_html( $title ); ?></div>
				<?php endif; ?>
				<?php if ( ! empty( $text ) ) : ?>
					<div class="description"><?php echo wp_kses( html_entity_decode( $text ), $allowed_html ); ?></div>
				<?php endif; ?>
				</div><!--/.counter-box-->
			</div><!--/.col-md-4-->
			<?php
	endforeach;
	?>
			</div><!--/.section-content-->
			</div><!--/.row-->
		<?php endif; ?>	
	</div><!--/.container-->>
</section><!--/#counter.front-page-section-->
<?php } ?>