<?php
/**
 * The template for displaying the header.
 *
 * @package    WordPress
 * @subpackage illdy
 */
 
$logo_id                   = get_theme_mod( 'custom_logo' );
$logo_image                = wp_get_attachment_image_src( $logo_id, 'full' );
$text_logo                 = get_theme_mod( 'illdy_text_logo', __( 'Fargo', 'illdy' ) );
$big_title_single_image    = get_theme_mod( 'illdy_big_title_enable_featured_image', false );
$big_title_parallax_enable = get_theme_mod( 'illdy_big_title_enable_parallax_effect', true );
$preloader_enable          = get_theme_mod( 'illdy_preloader_enable', 1 );
$top_bar_enable            = get_theme_mod( 'fargo_header_top_general_enable', 0);
$top_bar_width             = get_theme_mod( 'fargo_header_top_general_width', 0);
$menu_main_enable          = get_theme_mod( 'fargo_header_main_general_enable', 1);
$menu_main_width           = get_theme_mod( 'fargo_header_main_general_width', 0);
$menu_main_transparent     = get_theme_mod( 'fargo_header_main_general_transparent', 0);



?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
	    <meta charset="<?php bloginfo( 'charset' ); ?>" />
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	    <?php wp_head(); ?>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">  
    </head>
<body <?php body_class(); ?>>
<?php if ( $preloader_enable == 1 ): ?>
<div class="pace-overlay"></div>
<?php endif; ?>
<header id="header">
  <?php if ($top_bar_enable) : ?>
    <div class="top-bar">
        <div class="<?php if ( $top_bar_width ) { ?>container-fluid<?php } else {?>container<?php } ?>">
            <div class="col-md-12">
		    <?php
		    wp_nav_menu( array(
			    'theme_location' => 'topbar-menu',
		        'menu'           => '',
			    'container'      => false,
			    'menu_class'     => 'clearfix',
			    'menu_id'        => '',
		    ) );
		    ?>
            </div>
        </div>
    </div>
	<?php endif; ?>
	<?php if ($menu_main_enable) : ?>
	<div class="main-menu <?php if ($menu_main_transparent) {?>tm<?php } else {?>cm<?php } ?>">
		<div class="<?php if ( $menu_main_width ) { ?>container-fluid<?php } else {?>container<?php } ?>">
			<div class="main-menu-left">
				<?php if ( ! empty( $logo_image ) ) { ?>
				<?php echo '<a href="' . esc_url( home_url() ) . '"><img src="' . esc_url( $logo_image[0] ) . '" /></a>'; ?>
				<?php } else { ?>
				<?php if ( get_option( 'show_on_front' ) == 'page' ) { ?>
				<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( $text_logo ); ?>" class="header-logo"><?php echo esc_html( $text_logo ); ?></a>
				<?php } else { // front-page option ?>
				<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="header-logo"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
				<?php } ?>
				<?php } ?>
			</div><!--/.col-sm-2-->
			<div class="main-menu-right">
			<a href="#0" id="nav-toggle">Menu<span></span></a>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'main-menu',
					'container'      => false,
					'menu_class'     => 'main-navigation',
				) );
				?>
				</div>
			</div><!--/.col-sm-10-->
		</div><!--/.container-->

	</div>
	<?php endif; ?>
</header><!--/#header-->