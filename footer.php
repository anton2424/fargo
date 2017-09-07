<?php
/**
 *    The template for dispalying the footer.
 *
 * @package    WordPress
 * @subpackage fargo
 */
?>
<?php

if ( current_user_can( 'edit_theme_options' ) ) {
	$footer_copyright  = get_theme_mod( 'fargo_footer_copyright', __( '&copy; Copyright 2016. All Rights Reserved.', 'fargo' ) );
} else {
	$footer_copyright  = get_theme_mod( 'fargo_footer_copyright' );
	
}
$footer_widget_enable = get_theme_mod ( 'fargo_footer_widget_general_enable', 1);
$footer_bottom_enable = get_theme_mod ( 'fargo_footer_bottom_general_enable', 1);
?>
<footer id="footer">
    <?php if ($footer_widget_enable) { ?>
    <div class="footer-widget">
	    <div class="container">
		    <div class="row">
			<?php
			$the_widget_args = array(
				'before_widget' => '<div class="widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widget-title"><h5>',
				'after_title'   => '</h5></div>',
			);
			?>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<?php
				if ( is_active_sidebar( 'footer-1' ) ):
					dynamic_sidebar( 'footer-1' );
				elseif ( current_user_can( 'edit_theme_options' ) ):
					the_widget( 'WP_Widget_Text', 'title=' . __( 'Products', 'fargo' ) . '&text=<ul><li><a href="' . esc_url( '#' ) . '" title="' . __( 'Our work', 'fargo' ) . '">' . __( 'Our work', 'fargo' ) . '</a></li><li><a href="' . esc_url( '#' ) . '" title="' . __( 'Club', 'fargo' ) . '">' . __( 'Club', 'fargo' ) . '</a></li><li><a href="' . esc_url( '#' ) . '" title="' . __( 'News', 'fargo' ) . '">' . __( 'News', 'fargo' ) . '</a></li><li><a href="' . esc_url( '#' ) . '" title="' . __( 'Announcement', 'fargo' ) . '">' . __( 'Announcement', 'fargo' ) . '</a></li></ul>', $the_widget_args );
				endif;
				?>
			</div><!--/.col-sm-3-->
			<div class="col-md-3 col-sm-6 col-xs-12">
				<?php
				if ( is_active_sidebar( 'footer-2' ) ):
					dynamic_sidebar( 'footer-2' );
				elseif ( current_user_can( 'edit_theme_options' ) ):
					the_widget( 'WP_Widget_Text', 'title=' . __( 'Information', 'fargo' ) . '&text=<ul><li><a href="' . esc_url( '#' ) . '" title="' . __( 'Pricing', 'fargo' ) . '">' . __( 'Pricing', 'fargo' ) . '</a></li><li><a href="' . esc_url( '#' ) . '" title="' . __( 'Terms', 'fargo' ) . '">' . __( 'Terms', 'fargo' ) . '</a></li><li><a href="' . esc_url( '#' ) . '" title="' . __( 'Affiliates', 'fargo' ) . '">' . __( 'Affiliates', 'fargo' ) . '</a></li><li><a href="' . esc_url( '#' ) . '" title="' . __( 'Blog', 'fargo' ) . '">' . __( 'Blog', 'fargo' ) . '</a></li></ul>', $the_widget_args );
				endif;
				?>
			</div><!--/.col-sm-3-->
			<div class="col-md-3 col-sm-6 col-xs-12">
				<?php
				if ( is_active_sidebar( 'footer-3' ) ):
					dynamic_sidebar( 'footer-3' );
				endif;
				?>
			</div><!--/.col-sm-3-->
			<div class="col-md-3 col-sm-6 col-xs-12">
				<?php
				if ( is_active_sidebar( 'footer-4' ) ):
					dynamic_sidebar( 'footer-4' );
				endif;
				?>
			    </div><!--/.col-sm-3-->
		    </div><!--/.row-->
	    </div><!--/.container-->
	</div><!--/.footer-widget-->
	<?php } ?>
	<?php if ($footer_bottom_enable) { ?>
	<div class="footer-bottom">
		<div class="container">
		    <div class="row">
			    <p class="copyright">
				<span class="bottom-copyright"></span>
			    </p><!--/.copyright-->
			</div><!--/.row-->
		</div><!--/.container-->
	</div><!--/.footer-bottom-->
	<?php } ?>
</footer><!--/#footer-->

<?php wp_footer(); ?>
</body>
</html>