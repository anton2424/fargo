<?php
/**
 *	The template for displaying the portfolio section in front page.
 *
 *	@package WordPress
 *	@subpackage fargo
 */
?>
<?php
if ( current_user_can( 'edit_theme_options' ) ) {
	$title    = get_theme_mod( 'fargo_portfolio_general_title', __( 'PORTFOLIO', 'fargo' ) );
	$subtitle = get_theme_mod( 'fargo_portfolio_general_subtitle', __( 'This is a description for the Portfolio section. You can set it up in the Customizer > Front Page Sections > Portfolio and add items by clicking on Add or edit Portfolio.', 'fargo' ) );
}else{
	$title    = get_theme_mod( 'fargo_portfolio_general_title', __( 'PORTFOLIO', 'fargo' ) );
	$subtitle = get_theme_mod( 'fargo_portfolio_general_subtitle', __( 'This is a description for the Portfolio section. You can set it up in the Customizer > Front Page Sections > Portfolio and add items by clicking on Add or edit Portfolio.', 'fargo' ) );
}

?>

<?php if ( $title || $subtitle ) { ?>

<section id="portfolio" class="front-page-section">
	<?php if( $title || $subtitle ): ?>
		<div class="section-header">
			<div class="container">
				<div class="row">
				<?php if( $title ): ?>
				<div class="col-sm-12">
				<h2><?php echo esc_html ( $title ); ?></h2>
				</div><!--/.col-sm-12-->
				<?php endif; ?>
				<?php if( $subtitle ): ?>
				<div class="col-sm-12">
				<h6><?php echo esc_html ( $subtitle ); ?></h6>
				</div><!--/.col-sm-12-->
				<?php endif; ?>
				</div><!--/.row-->
			</div><!--/.container-->
		</div><!--/.section-header-->
	<?php endif; ?>
	<div class="section-content">
		<div class="container">
			<div class="row inline-columns">
				<?php
				if( is_active_sidebar( 'front-page-portfolio-sidebar' ) ):
					dynamic_sidebar( 'front-page-portfolio-sidebar' );
				elseif( current_user_can( 'edit_theme_options' ) & defined("ILLDY_COMPANION") ):
					$the_widget_args = array(
						'before_widget'	=> '<div class="col-sm-3 col-xs-6 no-padding widget_fargo_project">',
						'after_widget'	=> '</div>',
						'before_title'	=> '',
						'after_title'	=> ''
					);
					the_widget( 'Fargo_Widget_Project', 'title='. __( 'Project 1', 'fargo' ) .'&image='. get_template_directory_uri().esc_url( '/layout/images/front-page/front-page-project-1.png' ) .'&url='. esc_url( '#' ), $the_widget_args );
					the_widget( 'Fargo_Widget_Project', 'title='. __( 'Project 2', 'fargo' ) .'&image='. get_template_directory_uri().esc_url( '/layout/images/front-page/front-page-project-2.png' ) .'&url='. esc_url( '#' ), $the_widget_args );
					the_widget( 'Fargo_Widget_Project', 'title='. __( 'Project 3', 'fargo' ) .'&image='. get_template_directory_uri().esc_url( '/layout/images/front-page/front-page-project-3.png' ) .'&url='. esc_url( '#' ), $the_widget_args );
					the_widget( 'Fargo_Widget_Project', 'title='. __( 'Project 4', 'fargo' ) .'&image='. get_template_directory_uri().esc_url( '/layout/images/front-page/front-page-project-4.png' ) .'&url='. esc_url( '#' ), $the_widget_args );
				endif;
				?>
			</div><!--/.row-->
		</div><!--/.container-fluid-->
	</div><!--/.section-content-->
</section><!--/#portfolio.front-page-section-->

<?php } ?>