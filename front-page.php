<?php
/**
 *	The template for displaying the front page.
 *
 *	@package WordPress
 *	@subpackage fargo
 */


get_header();


if( get_option( 'show_on_front' ) == 'posts' ): ?>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-7">
				<section id="blog">
					<?php do_action( 'fargo_above_content_after_header' ); ?>
					<?php
					if( have_posts() ):
						while( have_posts() ):
							the_post();
							get_template_part( 'template-parts/content', get_post_format() );
						endwhile;
					else:
						get_template_part( 'template-parts/content', 'none' );
					endif;
					?>
					<?php do_action( 'fargo_after_content_above_footer' ); ?>
				</section><!--/#blog-->
			</div><!--/.col-sm-7-->
			<?php get_sidebar(); ?>
		</div><!--/.row-->
	</div><!--/.container-->

<?php
else:

	$sections_order_first_section       = get_theme_mod( 'fargo_general_sections_order_first_section',      1 );
	$sections_order_second_section      = get_theme_mod( 'fargo_general_sections_order_second_section',     2 );
	$sections_order_third_section       = get_theme_mod( 'fargo_general_sections_order_third_section',      3 );
	$sections_order_fourth_section      = get_theme_mod( 'fargo_general_sections_order_fourth_section',     4 );
	$sections_order_fifth_section       = get_theme_mod( 'fargo_general_sections_order_fifth_section',      5 );
	$sections_order_sixth_section       = get_theme_mod( 'fargo_general_sections_order_sixth_section',      6 );
	$sections_order_seventh_section     = get_theme_mod( 'fargo_general_sections_order_seventh_section',    7 );
	$sections_order_eighth_section      = get_theme_mod( 'fargo_general_sections_order_eighth_section',     8 );
	$sections_order_nine_section        = get_theme_mod( 'fargo_general_sections_order_nine_section',       9 );
	$sections_order_ten_section         = get_theme_mod( 'fargo_general_sections_order_ten_section',        10 );
	$sections_order_eleven_section      = get_theme_mod( 'fargo_general_sections_order_eleven_section',     11 );
	$sections_order_twelve_section      = get_theme_mod( 'fargo_general_sections_order_twelve_section',     12 );
	$sections_order_thirteen_section    = get_theme_mod( 'fargo_general_sections_order_thirteen_section',   13 );
	$sections_order_fourteen_section    = get_theme_mod( 'fargo_general_sections_order_fourteen_section',   14 );
	$sections_order_fifteen_section     = get_theme_mod( 'fargo_general_sections_order_fifteen_section',    15 );
	$sections_order_sixteen_section     = get_theme_mod( 'fargo_general_sections_order_sixteen_section',    16 );
	$sections_order_seventeen_section   = get_theme_mod( 'fargo_general_sections_order_seventeen_section',  17 );
	
	if( have_posts() ):
		while( have_posts() ): the_post();
			$static_page_content = get_the_content();
			if ( $static_page_content != '' ) : ?>
				<section class="front-page-section" id="static-page-content">
					<div class="section-header">
						<div class="container">
							<div class="row">
								<div class="col-sm-12">
									<h3><?php the_title(); ?></h3>
								</div><!--/.col-sm-12-->
							</div><!--/.row-->
						</div><!--/.container-->
					</div><!--/.section-header-->
					<div class="section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-10 col-sm-offset-1">
									<?php echo $static_page_content; ?>
								</div>
							</div>
						</div>
					</div>
				</section>
			<?php endif;
		endwhile;
	endif;

	fargo_sections();

endif;

get_footer(); ?>