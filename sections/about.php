<?php
/**
 * About Section
 *
 * @since 1.0.1
 */

/**
 * Options
 */ 
$title             = get_theme_mod( 'fargo_about_general_title');
$subtitle          = get_theme_mod( 'fargo_about_general_subtitle');
$entry             = get_theme_mod( 'fargo_about_general_entry',__( 'text', 'fargo' ) );
$general_content   = get_theme_mod( 'fargo_about_general_content', fargo_get_about_default()); 
$overlay           = get_theme_mod( 'fargo_big_title_backgrounds_overlay', null);
$full_width        = get_theme_mod( 'fargo_big_title_settings_settings_width', null);

/**
 * Default Values 
 */	
function fargo_get_about_default() {
	return apply_filters( 'fargo_about_default_content', json_encode( array(
		array(
			'icon_value' => 'fa-wechat',
			'title'      => __( 'Responsive', 'fargo' ),
			'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'fargo' ),
			'link'       => '#',
			'color'      => '#e91e63',
		),
		array(
			'icon_value' => 'fa-check',
			'title'      => __( 'Quality', 'fargo' ),
			'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'fargo' ),
			'link'       => '#',
			'color'      => '#00bcd4',
		),
		array(
			'icon_value' => 'fa-support',
			'title'      => __( 'Support', 'fargo' ),
			'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'fargo' ),
			'link'       => '#',
			'color'      => '#4caf50',
		),
		array(
			'icon_value' => 'fa-wechat',
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
function about_content( $general_content, $is_callback = false ) {
if ( ! empty( $general_content ) ) :
	$allowed_html = array(
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'b'      => array(),
		'i'      => array(),
		);
	$general_content = json_decode( $general_content );
	foreach ( $general_content as $about_item ) :
		$title  = ! empty( $about_item->title ) ? apply_filters( 'fargo_translate_single_string', $about_item->title, 'about section' ) : '';
		$text   = ! empty( $about_item->text ) ? apply_filters( 'fargo_translate_single_string', $about_item->text, 'about section' ) : '';
        $color = '';
			if (!empty( $about_item->color ) ) {
				$color = $about_item->color;
			}
			?>
			<div class="col-md-12">
			<?php if ( ! empty( $title ) ) : ?>
			<h4 class="title">
			<?php echo esc_html( $title ); ?>
			</h4>
			<?php endif; ?>
			<div class="progress">
				<div class="progress-bar" <?php if ( ! empty( $color ) ) { echo 'style="width:50%; background-color:' . $color . '"'; } ?> 
				role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%; background-color:#5cb85c"
				></div>
			</div>
		    </div><!--/.skill-->
			<?php
	endforeach;
endif;
} 
?>

<?php if ( $title || $subtitle || $general_content || $entry != '' ) { ?>
<section id="about" class="front-page-section">
	<?php if ( $overlay==1) :?>
	<div class="overlay"></div>
    <?php endif; ?>   
    <div class="<?php if ( $full_width ) { ?>container-fluid<?php } else {?>container<?php } ?>">
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
		<?php if ( $general_content || $entry != '') : ?>
		<div class="section-content">
			<div class="row"> 
			<?php if( $entry != '' ): ?>
			<div class="col-lg-6 col-sm-6">
				<div class="about-box">
				<?php echo do_shortcode(wp_kses_post( $entry )); ?>
				</div><!--/.about-box-->
			</div><!--/.col-lg-6 .col-sm-6-->
			<?php endif; ?>
			<?php if( $general_content ): ?>
			<div class="col-lg-6 col-sm-6">
				<div class="skill-box">
				<?php about_content( $general_content ); ?>
				</div><!--/.skill-box-->
			</div><!--/.col-lg-6 .col-sm-6-->	
			<?php endif; ?>
			</div><!--/.row-->
		</div><!--/.section-content-->
		<?php endif; ?>	
	</div><!--/.container-->
</section><!--/#about.front-page-section-->
<?php } ?>