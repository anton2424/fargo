<?php
/**
 * Price Section
 *
 * @since 1.0.0
 */

/**
 * Options
 */ 

$title             = get_theme_mod( 'fargo_price_general_title', __( 'PRICE', 'fargo' ) );
$subtitle          = get_theme_mod( 'fargo_price_general_subtitle', __( 'This is a description for the Price section. You can set it up in the Customizer > Front Page Sections > Price and add items by clicking on Add or edit Price.', 'fargo' ) );
$general_content   = get_theme_mod( 'fargo_price_general_content', fargo_get_price_default()); 
$full_width        = get_theme_mod( 'fargo_price_settings_width', 0 );
$overlay           = get_theme_mod( 'fargo_price_backgrounds_overlay', 1 ); 
/**
 * Default Values 
 */	
function fargo_get_price_default() {
	return apply_filters( 'fargo_price_default_content', json_encode( array(
		array(
			'title'      => __( 'BASIC', 'fargo' ),
			'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'fargo' ),
			'link'       => '#',
			'color'      => '#e91e63',
		),
		array(
			'title'      => __( 'STANDART', 'fargo' ),
			'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'fargo' ),
			'link'       => '#',
			'color'      => '#00bcd4',
		),
		array(
			'title'      => __( 'PREMIUM', 'fargo' ),
			'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'fargo' ),
			'link'       => '#',
			'color'      => '#4caf50',
		),
		array(
			'title'      => __( 'ULTIMATE', 'fargo' ),
			'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'fargo' ),
			'link'       => '#',
			'color'      => '#e91e63',
		),
	) ) );
}



/**
 * Content Function
 */	
function price_content( $general_content, $is_callback = false ) {
if ( ! empty( $general_content ) ) :
	$allowed_html = array(
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'b'      => array(),
		'i'      => array(),
		);
	$general_content = json_decode( $general_content );
	foreach ( $general_content as $price_item ) :
		$title  = ! empty( $price_item->title ) ? apply_filters( 'fargo_translate_single_string', $price_item->title, 'price section' ) : '';
		$text   = ! empty( $price_item->text ) ? apply_filters( 'fargo_translate_single_string', $price_item->text, 'price section' ) : '';
		$link   = ! empty( $price_item->link ) ? apply_filters( 'fargo_translate_single_string', $price_item->link, 'price section' ) : '';
        $color = '';
			if (!empty( $price_item->color ) ) {
				$color = $price_item->color;
			}
			?>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="price-box">
			<?php if ( ! empty( $title ) ) : ?>
			<div class="header" <?php if ( ! empty( $color ) ) { echo 'style="background-color:' . $color . '"'; } ?>>
			    <h4 class="title"><?php echo esc_html( $title ); ?></h4>
			</div><!--/.header-->
			<?php endif; ?>
			<?php if ( ! empty( $text ) ) : ?>
			<ul>
		<li>100GB Storage</li>
		<li>All Themes</li>
		<li>Access to Tutorials</li>
		<li>Auto Backup</li>
		<li>Extended Security</li>
		</ul>
			<?php endif; ?>
			<a <?php if ( ! empty( $link ) ) : ?>href="<?php echo esc_url( $link ); ?>"	<?php endif; ?> class="btn btn-custom btn-price" <?php if ( ! empty( $color ) ) { echo 'style="background-color:' . $color . '"'; } ?> href="">SIGN UP</a>
			
			
		        </div>
			</div><!--/.col-md-4-->
			
			<?php
	endforeach;
endif;
?>

<?php 
} 
?>

<?php if ( $title || $subtitle || $general_content  ) { ?>
<section id="price" class="front-page-section">
    <?php if ( $overlay==1) :?>
	<div class="overlay"></div>
    <?php endif; ?> 	    
	<div class="<?php if ( $full_width == 0 ) { ?>container<?php } else {?>container-fluid<?php } ?>">
	<?php if( $title || $subtitle ): ?>
		<div class="section-header">
			<div class="row">
			<?php if( $title ): ?>
			<div class="col-sm-12">
				<h2>
				<?php echo esc_html( $title ); ?>
				</h2><!--/h2-->
			</div><!--/.col-sm-12-->
			<?php endif; ?>
			<?php if( $subtitle ): ?>
			<div class="col-sm-12">
				<h5>
				<?php echo esc_html( $subtitle ); ?>
				</h5><!--/h5-->
			</div><!--/.col-sm-12-->
			<?php endif; ?>
			</div><!--/.row-->
		</div><!--/.section-header-->
	<?php endif; ?>
	<?php if( $general_content ): ?>
	<div class="section-content">
	    <div class="row">
	    <?php price_content( $general_content ); ?>
	    </div><!--/.row-->
	</div><!--/.section-content-->
	<?php endif; ?>	
	</div><!--/.container-->
</section><!--/#price.front-page-section-->
<?php } ?>