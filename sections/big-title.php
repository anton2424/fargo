<?php
/**
 * Big-Title Section
 *
 * @since 1.0.0
 */
 
/**
 * Options
 */
$title                 = get_theme_mod( 'fargo_big_title_general_title', __( 'ONE PAGE BISSNESS THEME', 'fargo' ) );
$subtitle              = get_theme_mod( 'fargo_big_title_general_subtitle', __( 'Fargo is a great one-page theme. Try it now!', 'fargo' ) );
$first_button_title    = get_theme_mod( 'fargo_big_title_general_first_button_title', __( 'FEATURES', 'fargo' ) );
$first_button_url      = get_theme_mod( 'fargo_big_title_general_first_button_url', esc_url( '#features' ) );
$first_button_window   = get_theme_mod( 'fargo_big_title_settings_first_window', 0);
$second_button_title   = get_theme_mod( 'fargo_big_title_general_second_button_title', __( 'DOWNLOAD', 'fargo' ) );
$second_button_url     = get_theme_mod( 'fargo_big_title_general_second_button_url', esc_url( '#ribbon' ) );
$second_button_window  = get_theme_mod( 'fargo_big_title_settings_second_window', 0);
$overlay               = get_theme_mod( 'fargo_big_title_backgrounds_overlay', 1);
$width                 = get_theme_mod( 'fargo_big_title_settings_settings_width', 0 );
/**
 * Content
 */
if ( $title || $subtitle || $first_button_title || $second_button_title ) :
?>
<section id="big-title" class="front-page-section">
    <?php if ( $overlay) :?>
	<div class="overlay"></div>
    <?php endif; ?>
	<div class="<?php if ( $width ) { ?>container-fluid<?php } else {?>container<?php } ?>">
		<div class="row">
			<div class="col-md-12 text-center">
			<?php if ( $title ): ?>
			<h1 class="fargo-title">
			<?php echo esc_html ($title); ?>
			</h1><!--/h1.fargo-title-->
			<?php endif; ?>
			<?php if ( $subtitle ): ?>
			<span class="sub-title">
			<?php echo esc_html ($subtitle); ?>
			</span><!--/span.subtitle-->
			<?php endif; ?>
			<?php if ( $first_button_title || $second_button_title ): ?>
			<div>
			<?php if ( $first_button_title ): ?>
			<a href="<?php echo esc_url( $first_button_url ); ?>" <?php if ( $first_button_window ):?> target="_blank" <?php endif; ?> title="<?php echo esc_attr( $first_button_title ); ?>" class="btn btn-custom btn-one"><?php echo esc_html( $first_button_title ); ?></a>
			<?php endif; ?>
			<?php if ( $second_button_title ): ?>
			<a href="<?php echo esc_url( $second_button_url ); ?>" <?php if ( $second_button_window ):?> target="_blank" <?php endif; ?> title="<?php echo esc_attr( $second_button_title ); ?>" class="btn btn-custom btn-two"><?php echo esc_html( $second_button_title ); ?></a>
			<?php endif; ?>
			</div>
			<?php endif; ?>	
			</div><!--/.col-md-12.text-center-->
		</div><!--/.row-->
	</div><!--/.container-->
</section><!--/#big-title.front-page-section-->
<?php endif; ?>