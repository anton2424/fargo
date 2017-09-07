<?php
/**
 * Blog Section
 *
 * @since 1.0.1
 */

$blog_page_id = get_option( 'page_for_posts' );
$button_url   = '#';
if ( $blog_page_id ) {
	$button_url = get_permalink( $blog_page_id );
}
if ( current_user_can( 'edit_theme_options' ) ) {
	$title           = get_theme_mod( 'fargo_blog_general_title', __( 'BLOG', 'fargo' ) );
	$subtitle        = get_theme_mod( 'fargo_blog_general_subtitle', __( 'This is a description for the Blog section. You can set it up in the Customizer > Front Page Sections > Blog.', 'fargo' ) );
	$number_of_posts = get_theme_mod( 'fargo_blog_general_number_posts', absint( 3 ) );
} else {
	$title           = get_theme_mod( 'fargo_blog_general_title', __( 'BLOG', 'fargo' ) );
	$subtitle        = get_theme_mod( 'fargo_blog_general_subtitle', __( 'This is a description for the Blog section. You can set it up in the Customizer > Front Page Sections > Blog.', 'fargo' ) );
	$number_of_posts = get_theme_mod( 'fargo_blog_general_number_posts', absint( 3 ) );
}

$number_of_words = get_theme_mod( 'fargo_blog_general_words_number', absint( 20 ));
$layout          = get_theme_mod( 'fargo_blog_settings_layout', 3 );
$width           = get_theme_mod( 'fargo_blog_settings_width', null );
$overlay         = get_theme_mod( 'fargo_blog_backgrounds_overlay', null);

$post_query_args = array(
	'post_type'              => array( 'post' ),
	'nopaging'               => false,
	'posts_per_page'         => absint( $number_of_posts ),
	'ignore_sticky_posts'    => true,
	'cache_results'          => true,
	'update_post_meta_cache' => true,
	'update_post_term_cache' => true,
);

$post_query = new WP_Query( $post_query_args );
if ( $post_query->have_posts() || $title || $subtitle ) {
?>
<section id="blog" class="front-page-section">
    <?php if ( $overlay==1) :?>
	<div class="overlay"></div>
    <?php endif; ?>
	<div class="<?php if ( $width ) { ?>container-fluid<?php } else {?>container<?php } ?>">	
	<?php if( $title || $subtitle ): ?>
		<div class="section-header">
			<div class="row">
			<?php if( $title ): ?>
			<div class="col-sm-12">
				<h2 class="title">
				<?php echo esc_html( $title ); ?>
				</h2><!--/h2.title-->
			</div><!--/.col-sm-12-->
			<?php endif; ?>
			<?php if( $subtitle ): ?>
			<div class="col-sm-12">
				<h5 class="sub-title">
				<?php echo esc_html( $subtitle ); ?>
				</h5><!--/h5.sub-title-->
			</div><!--/.col-sm-12-->
			<?php endif; ?>
			</div><!--/.row-->
		</div><!--/.section-header-->
	<?php endif; ?>
	<?php if ( $post_query->have_posts() ): ?>
	<div class="section-content">
			<div class="row">
			<?php $counter = 0; ?>
			<?php while ( $post_query->have_posts() ): ?>
			<?php $post_query->the_post(); ?>
			<?php $post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'fargo-front-page-latest-news' ); ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
			    <div class="post-box">
			    <?php if ( has_post_thumbnail() ){ ?>
				<div class="post-image" style="background-image: url('<?php echo esc_url( $post_thumbnail[0] ); ?>');"></div>
				<?php } ?>
				<div class="post-info">
				25 Jule
				</div>
				<h4 class="box-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
				<div class="post-entry">
				<?php echo wp_trim_words( get_the_content(), $number_of_words ); ?>
				</div><!--/.post-entry-->
				<a href="<?php the_permalink(); ?>" title="<?php _e( 'Read more', 'fargo' ); ?>" class="btn btn-custom btn-post-box"><?php _e( 'Read more', 'fargo' ); ?>
				</a>
				</div><!--/.post-box-->
			</div><!--/.col-sm-4-->
			<?php $counter ++; ?>
			<?php endwhile; ?>
			</div><!--/.row-->
		</div><!--/.section-content-->
		</div><!--/.container-->
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>
</section><!--/#latest-news.front-page-section-->
<?php } ?>