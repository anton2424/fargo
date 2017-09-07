<?php
/**
 * Ribbon Two Section
 *
 * @since 1.0.0
 */

/**
 * Options
 */ 
$description      = get_theme_mod( 'fargo_ribbon_two_general_description', __( 'This is a description for the ribbon_two section. You can set it up in the Customizer > Front Page Sections > ribbon_two.', 'fargo' ) );
$button_title     = get_theme_mod( 'fargo_ribbon_two_general_button_title',__( 'DOWNLOAD', 'fargo' ) );
$button_title_url = get_theme_mod( 'fargo_ribbon_two_general_button_title',__( '#', 'fargo' ) );
$full_width       = get_theme_mod( 'fargo_ribbon_settings_width', 0 );
$overlay          = get_theme_mod( 'fargo_ribbon_backgrounds_overlay', 1);
?>

<?php if ( $description|| $button_title ) : ?>
<section id="ribbon-two" class="front-page-section">
    <?php if ( $overlay) :?>
	<div class="overlay"></div>
    <?php endif; ?>   
    <div class="<?php if ( $full_width ) { ?>container-fluid<?php } else {?>container<?php } ?>">
		<div class="row">
		<?php if( $description): ?>
		<div class="col-md-9">
			<h3 class="title">
			<?php echo do_shortcode(wp_kses_post( $description )); ?>
			</h3><!--/h3-->
		</div><!--/.col-md-9-->
		<?php endif; ?>
		<?php if ( $button_title ) : ?>
		<div class="col-md-3">
			<div class="ribbon-two-box">
			<a href="<?php echo esc_url( $button_title_url ); ?>" title="<?php echo esc_attr( $button_title ); ?>" class="btn btn-custom btn-ribbon-two"><?php echo esc_html( $button_title ); ?></a>
			</div><!--/.ribbon_two-box-->
		</div><!--/.col-md-3-->
		<?php endif; ?>	
		</div><!--/.row-->
	</div><!--/.container&fluid-->
</section><!--/#ribbon-two.front-page-section-->
<?php endif; ?>