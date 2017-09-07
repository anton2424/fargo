<?php
/**
 * Map Section
 *
 * @since 1.0.0
 */

/**
 * Options
 */ 
$title             = get_theme_mod( 'fargo_map_general_title');
$subtitle          = get_theme_mod( 'fargo_map_general_subtitle');
$entry             = get_theme_mod( 'fargo_map_general_entry',__( '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2043.1761393268857!2d13.375044318395059!3d52.483488242594355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sru!4v1502351236014" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', 'fargo' ) );

 if ( $title || $subtitle || $entry != '' ) { ?>
<section id="map" class="front-page-section">
	<?php if( $title || $subtitle ): ?>
	<div class="section-header">
	    <div class="container">
		    <div class="row">
		        <?php if( $title ): ?>
	            <div class="col-sm-12">
		        <h2><?php echo esc_html( $title ); ?></h2>
		        </div><!--/.col-sm-12-->
		        <?php endif; ?>
		        <?php if( $subtitle ): ?>
			    <div class="col-sm-12">
		        <h6><?php echo esc_html( $subtitle ); ?></h6>
			    </div><!--/.col-sm-12-->
		        <?php endif; ?>
		    </div><!--/.row-->
		</div><!--/.container-->
	</div><!--/.section-header-->
	<?php endif; ?>
	<?php if ( $entry != '') : ?>
	<div class="section-content">
		<div class="containe">
		    <div class="row"> 
			<?php if( $entry != '' ): ?>
		    <div class="col-lg-6 col-sm-6">
			<?php echo do_shortcode(wp_kses_post( $entry )); ?>
		    </div><!--/.col-lg-6 .col-sm-6-->
			<?php endif; ?>>
		    </div><!--/.row-->
		</div><!--/.container-->
	</div><!--/.section-content-->
	<?php endif; ?>	
</section><!--/#about.front-page-section-->
<?php } ?>