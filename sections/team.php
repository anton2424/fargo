<?php
/**
 * Team Section
 *
 * @since 1.0.0
 */

/**
 * Options
 */ 

$title          = get_theme_mod( 'fargo_team_general_title', __( 'TEAM', 'fargo' ) );
$subtitle       = get_theme_mod( 'fargo_team_general_subtitle', __( 'This is a description for the Team section. You can set it up in the Customizer > Front Page Sections > Team and add items by clicking on Add or edit Team.', 'fargo' ) );
$team_content   = get_theme_mod( 'fargo_team_general_content', fargo_get_team_default()); 

/**
 * Default Values 
 */	
function fargo_get_team_default() {
	return apply_filters( 'hestia_team_default_content', json_encode( array(
		array(
			'image_url'       => get_template_directory_uri() . '/assets/images/front-page/team-1.png',
			'title'           => esc_html__( 'Desmond Purpleson', 'themeisle-companion' ),
			'subtitle'        => esc_html__( 'CEO', 'themeisle-companion' ),
			'text'            => esc_html__( 'Locavore pinterest chambray affogato art party, forage coloring book typewriter. Bitters cold selfies, retro celiac sartorial mustache.', 'themeisle-companion' ),
			'color'      => '#e91e63',
			'id'              => 'customizer_repeater_56d7ea7f40c56',
			'social_repeater' => json_encode( array(
				array(
					'id'   => 'customizer-repeater-social-repeater-57fb908674e06',
					'link' => 'facebook.com',
					'icon' => 'fa-facebook',
				),
				array(
					'id'   => 'customizer-repeater-social-repeater-57fb9148530ft',
					'link' => 'plus.google.com',
					'icon' => 'fa-google-plus',
				),
				array(
					'id'   => 'customizer-repeater-social-repeater-57fb9148530fc',
					'link' => 'twitter.com',
					'icon' => 'fa-twitter',
				),
				array(
					'id'   => 'customizer-repeater-social-repeater-57fb9150e1e89',
					'link' => 'linkedin.com',
					'icon' => 'fa-linkedin',
				),
			) ),
		),
		array(
			'image_url'       => get_template_directory_uri() . '/assets/images/front-page/team-2.png',
			'title'           => esc_html__( 'Parsley Pepperspray', 'themeisle-companion' ),
			'subtitle'        => esc_html__( 'Marketing Specialist', 'themeisle-companion' ),
			'text'            => esc_html__( 'Craft beer salvia celiac mlkshk. Pinterest celiac tumblr, portland salvia skateboard cliche thundercats. Tattooed chia austin hell.', 'themeisle-companion' ),
			'color'      => '#00bcd4',
			'id'              => 'customizer_repeater_56d7ea7f40c66',
			'social_repeater' => json_encode( array(
				array(
					'id'   => 'customizer-repeater-social-repeater-57fb9155a1072',
					'link' => 'facebook.com',
					'icon' => 'fa-facebook',
				),
				array(
					'id'   => 'customizer-repeater-social-repeater-57fb9160ab683',
					'link' => 'twitter.com',
					'icon' => 'fa-twitter',
				),
				array(
					'id'   => 'customizer-repeater-social-repeater-57fb9160ab484',
					'link' => 'pinterest.com',
					'icon' => 'fa-pinterest',
				),
				array(
					'id'   => 'customizer-repeater-social-repeater-57fb916ddffc9',
					'link' => 'linkedin.com',
					'icon' => 'fa-linkedin',
				),
			) ),
		),
		array(
			'image_url'       => get_template_directory_uri() . '/assets/images/front-page/team-4.png',
			'title'           => esc_html__( 'Desmond Eagle', 'themeisle-companion' ),
			'subtitle'        => esc_html__( 'Graphic Designer', 'themeisle-companion' ),
			'text'            => esc_html__( 'Pok pok direct trade godard street art, poutine fam typewriter food truck narwhal kombucha wolf cardigan butcher whatever pickled you.', 'themeisle-companion' ),
			'color'      => '#4caf50',
			'id'              => 'customizer_repeater_56d7ea7f40c76',
			'social_repeater' => json_encode( array(
				array(
					'id'   => 'customizer-repeater-social-repeater-57fb917e4c69e',
					'link' => 'facebook.com',
					'icon' => 'fa-facebook',
				),
				array(
					'id'   => 'customizer-repeater-social-repeater-57fb91830825c',
					'link' => 'twitter.com',
					'icon' => 'fa-twitter',
				),
				array(
					'id'   => 'customizer-repeater-social-repeater-57fb918d65f2e',
					'link' => 'linkedin.com',
					'icon' => 'fa-linkedin',
				),
				array(
					'id'   => 'customizer-repeater-social-repeater-57fb918d65f2x',
					'link' => 'dribbble.com',
					'icon' => 'fa-dribbble',
				),
			) ),
		),
		array(
			'image_url'       => get_template_directory_uri() . '/assets/images/front-page/team-4.png',
			'title'           => esc_html__( 'Ruby Von Rails', 'themeisle-companion' ),
			'subtitle'        => esc_html__( 'Lead Developer', 'themeisle-companion' ),
			'text'            => esc_html__( 'Small batch vexillologist 90\'s blue bottle stumptown bespoke. Pok pok tilde fixie chartreuse, VHS gluten-free selfies wolf hot.', 'themeisle-companion' ),
			'color'      => '#0072bc',
			'id'              => 'customizer_repeater_56d7ea7f40c86',
			'social_repeater' => json_encode( array(
				array(
					'id'   => 'customizer-repeater-social-repeater-57fb925cedcg5',
					'link' => 'github.com',
					'icon' => 'fa-github-square',
				),
				array(
					'id'   => 'customizer-repeater-social-repeater-57fb925cedcb2',
					'link' => 'facebook.com',
					'icon' => 'fa-facebook',
				),
				array(
					'id'   => 'customizer-repeater-social-repeater-57fb92615f030',
					'link' => 'twitter.com',
					'icon' => 'fa-twitter',
				),
				array(
					'id'   => 'customizer-repeater-social-repeater-57fb9266c223a',
					'link' => 'linkedin.com',
					'icon' => 'fa-linkedin',
				),
			) ),
		),
	) ) );
}



/**
 * Content Function
 */	
function team_content( $team_content) {
	if ( ! empty( $team_content ) ) :
		$allowed_html = array(
			'br'     => array(),
			'em'     => array(),
			'strong' => array(),
			'b'      => array(),
			'i'      => array(),
		);
		$team_content = json_decode( $team_content );
	    if ( empty( $team_content ) ) {
		    return;
	    }
            foreach ( $team_content as $team_item ) :
		    $image = ! empty( $team_item->image_url ) ? apply_filters( 'hestia_translate_single_string', $team_item->image_url, 'Team section' ) : '';
			$title = ! empty( $team_item->title ) ? apply_filters( 'hestia_translate_single_string', $team_item->title, 'Team section' ) : '';
			$subtitle = ! empty( $team_item->subtitle ) ? apply_filters( 'hestia_translate_single_string', $team_item->subtitle, 'Team section' ) : '';
			$text = ! empty( $team_item->text ) ? apply_filters( 'hestia_translate_single_string', $team_item->text, 'Team section' ) : '';
			$link = ! empty( $team_item->link ) ? apply_filters( 'hestia_translate_single_string', $team_item->link, 'Team section' ) : '';
			        $color = '';
			if (!empty( $team_item->color ) ) {
				$color = $team_item->color;
			}
			?>
			<div class="col-lg-3 col-md-4 col-sm-6">
			<div class="team-box">
					<div class="card-image">
					<?php if ( ! empty( $image ) ) : ?>
					<?php if ( ! empty( $link ) ) : ?>
					<a href="<?php echo esc_url( $link ); ?>">
					<?php endif; ?>
					<img class="img" src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
					<?php if ( ! empty( $link ) ) : ?>
					</a>
					<?php endif; ?>
					<?php endif; ?>
				    </div>
					<div class="content">
					<?php if ( ! empty( $title ) ) : ?>
					<div <?php if ( ! empty( $color ) ) { echo 'style="background-color:' . $color . '"'; } ?> class="header">
					<h4 class="title"><?php echo esc_html( $title ); ?></h4>
					</div>
					<?php endif; ?>
					<?php if ( ! empty( $subtitle ) ) : ?>
					<h6 class="category text-muted" style="display:none;"><?php echo esc_html( $subtitle ); ?></h6>
					<?php endif; ?>
					<?php if ( ! empty( $text ) ) : ?>
				    <p class="card-description" style="display:none;"><?php echo wp_kses( html_entity_decode( $text ), $allowed_html ); ?></p>
				    <?php endif; ?>
				    <?php
					if ( ! empty( $team_item->social_repeater ) ) :
						$icons = html_entity_decode( $team_item->social_repeater );
						$icons_decoded = json_decode( $icons, true );
							if ( ! empty( $icons_decoded ) ) :
							?>
								<div class="footer">
								<?php 
								    foreach ( $icons_decoded as $value ) :
								    $social_icon = ! empty( $value['icon'] ) ? apply_filters( 'hestia_translate_single_string', $value['icon'], 'Team section' ) : '';
								    $social_link = ! empty( $value['link'] ) ? apply_filters( 'hestia_translate_single_string', $value['link'], 'Team section' ) : '';
									?>
									<?php 
									if ( ! empty( $social_icon ) ) : ?>
										<a href="<?php echo esc_url( $social_link ); ?>" class="btn btn-just-icon btn-simple">
												<i class="fa <?php echo esc_attr( $social_icon ); ?>"></i>
										</a>
									<?php endif; ?>
									<?php endforeach; ?>
								</div>
									<?php
								endif;
							endif;
								?>
					</div>
					</div>
			</div>
				<?php
		endforeach;
	endif;
}
?>
<?php if ( $title || $subtitle || $team_content ) { ?>
<section id="team" class="front-page-section">
    <?php if ( $overlay==1) :?>
	<div class="overlay"></div>
    <?php endif; ?> 
	<div class="<?php if ( $full_width == 0 ) { ?>container<?php } else {?>container-fluid<?php } ?>">
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
	<?php if( $team_content ): ?>
	<div class="section-content">
	    <div class="row">
	    <?php team_content( $team_content ); ?>
	    </div><!--/.row-->
	</div><!--/.section-content-->
	<?php endif; ?>	
	</div><!--/.container-->
</section><!--/#team.front-page-section-->
<?php } ?>