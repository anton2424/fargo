<?php
/**
 *    The template for dispalying the content.
 *
 * @package    WordPress
 * @subpackage fargo
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="blog-post-title"><?php the_title(); ?></a>
	<?php if ( has_post_thumbnail() ){ ?>
		<div class="blog-post-image">
			<a href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail( 'fargo-blog-list' ); ?></a>
		</div><!--/.blog-post-image-->
	<?php }elseif ( get_theme_mod( 'fargo_disable_random_featured_image' ) ) { ?>
		<div class="blog-post-image">
			<a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo fargo_get_random_featured_image(); ?>"></a>
		</div><!--/.blog-post-image-->
	<?php } ?>
	<?php do_action( 'fargo_archive_meta_content' ); ?>
	<div class="blog-post-entry">
		<?php the_excerpt(); ?>
	</div><!--/.blog-post-entry-->
	<a href="<?php the_permalink(); ?>" title="<?php _e( 'Read more', 'fargo' ); ?>" class="blog-post-button"><?php _e( 'Read more', 'fargo' ); ?></a>
</article><!--/#post-<?php the_ID(); ?>.blog-post-->