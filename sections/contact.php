<?php
/**
 * Contact Section
 *
 * @since 1.0.1
 */

/**
 * Options
 */ 
$title                     = get_theme_mod( 'fargo_contact_general_title', __( 'CONTACT', 'fargo' ) );
$subtitle                  = get_theme_mod( 'fargo_contact_general_subtitle', __( 'This is a description for the Contact section. You can set it up in the Customizer > Front Page Sections > Contact.', 'fargo' ) );
$general_contact_form_7    = get_theme_mod( 'fargo_contact_general_contact_form_7' );
$width                     = get_theme_mod( 'fargo_contact_settings_width', null );
$overlay                   = get_theme_mod( 'fargo_contact_backgrounds_overlay', null ); 
?>


<?php if ( $title || $subtitle || $general_contact_form_7 != null && $general_contact_form_7 != 'default' ) { ?>
<section id="contact" class="front-page-section">
    <?php if ( $overlay) :?>
	<div class="overlay"></div>
    <?php endif; ?> 	
	<div class="<?php if ( $width ) { ?>container-fluid<?php } else {?>container<?php } ?>">
	<div class="row">
	<?php if ( $title || $subtitle ): ?>
    <div class="section-header">
		<?php if ( $title ): ?>
		<div class="col-sm-12">
			<h2 class="title">
			<?php echo esc_html( $title ); ?>
			</h2><!--/h2.title-->
		</div><!--/.col-sm-12-->
		<?php endif; ?>
		<?php if ( $subtitle ): ?>
		<div class="col-sm-12">
			<h5 class="subtitle">
			<?php echo esc_html ( $subtitle ); ?>
			</h5><!--/h5.subtitle-->
		</div><!--/.col-sm-12-->
		<?php endif; ?>
	</div><!--/.section-header-->
	<?php endif; ?>
	        <div class="section-content">
				<div class="col-sm-12">
				<?php if ( class_exists( 'WPCF7' ) && $general_contact_form_7 != null && $general_contact_form_7 != 'default' && get_post($general_contact_form_7) ): ?>
				<?php $shortcode = '[contact-form-7 id="' . esc_html( $general_contact_form_7 ) . '"]'; ?>
				<?php echo do_shortcode( $shortcode ); ?>
				<?php endif; ?>
				</div><!--/.col-sm-12-->
			</div><!--/.section-content-->
		</div><!--/.row-->
	</div><!--/.container-->
</section><!--/#contact-us.front-page-section-->

<?php } ?>