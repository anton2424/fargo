/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
( function( $ ) {
	/* Company text logo */
	wp.customize( 'fargo_text_logo', function( value ) {
		value.bind( function( newval ) {
			if( wp.customize._value.fargo_img_logo() == '' ) {
				$( '#header .top-header .header-logo' ).html( newval );
			}
		} );
	} );

	/* Company image logo */
	wp.customize( 'fargo_img_logo', function( value ) {
		value.bind( function( newval ) {
			if( newval !== '' ) {
				$( '#header .top-header .header-logo' ).empty();
				$( '#header .top-header .header-logo' ).prepend( '<img src="" alt="'+ wp.customize._value.fargo_text_logo +'" title="'+ wp.customize._value.fargo_text_logo +'" />' );
				$( '#header .top-header .header-logo img' ).attr( 'src', newval );
			} else {
				$( '#header .top-header .header-logo' ).text( wp.customize._value.fargo_text_logo() );
			}
		} );
	} );

	/* Posted on on single blog posts */
	wp.customize( 'fargo_enable_post_posted_on_blog_posts', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( 'body.single #blog .blog-post .blog-post-meta' ).addClass( 'customizer-display-none' );
			} else if( newval == true ) {
				$( 'body.single #blog .blog-post .blog-post-meta' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	/* Post Tags on single blog posts */
	wp.customize( 'fargo_enable_post_tags_blog_posts', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( 'body.single #blog .blog-post .blog-post-tags' ).addClass( 'customizer-display-none' );
			} else if( newval == true ) {
				$( 'body.single #blog .blog-post .blog-post-tags' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	/* Post Comments on single blog posts */
	wp.customize( 'fargo_enable_post_comments_blog_posts', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( 'body.single #blog .blog-post .blog-post-meta .post-meta-comments' ).addClass( 'customizer-display-none' );
			} else if( newval == true ) {
				$( 'body.single #blog .blog-post .blog-post-meta .post-meta-comments' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	/* Author Info Box on single blog posts */
	wp.customize( 'fargo_enable_author_box_blog_posts', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( 'body.single #blog .blog-post .blog-post-author' ).addClass( 'customizer-display-none' );
			} else if( newval == true ) {
				$( 'body.single #blog .blog-post .blog-post-author' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	/* Current header */
	wp.customize( 'header_image', function( value ) {
		value.bind( function( newval ) {
			if( newval == 'remove-header' ) {
				$( '#header.header-blog' ).removeAttr( 'style' );
			} else if( newval == 'random-uploaded-image' ) {
				// $( '#header.header-blog' ).removeAttr( 'style' );
			} else if( newval == 'random-default-image' ) {
				// $( '#header.header-blog' ).removeAttr( 'style' );
			} else {
				$( '#header.header-blog' ).css( 'background-image', 'url('+ newval +')' );
			}
		} );
	} );
	
	/**
	 * BIG TITLE SECTION
	 */	
	 
    // Show this section
	wp.customize( 'fargo_big_title_general_show', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '#big-title.front-page-section' ).addClass( 'customizer-display-none' );
			} else if( newval == true ) {
				$( '#big-title.front-page-section' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );
	
	// Title
	wp.customize( 'fargo_big_title_general_title', function( value ) {
		value.bind( function( newval ) {
			$( '#big-title.front-page-section h1' ).html( newval );
		} );
	} );

	// Subtitle
	wp.customize( 'fargo_big_title_general_subtitle', function( value ) {
		value.bind( function( newval ) {
			$( '#big-title.front-page-section .section-description' ).html( newval );
		} );
	} );
	
	// First Button Title
	wp.customize( 'fargo_big_title_general_first_button_title', function( value ) {
		value.bind( function( newval ) {
			$( '#big-title.front-page-section .header-button-one' ).html( newval );
		} );
	} );
	
	// First Button URL
	wp.customize( 'fargo_big_title_general_first_button_title_url', function( value ) {
		value.bind( function( newval ) {
			$( '#big-title.front-page-section .header-button-one' ).attr( 'href', newval );
		} );
	} );
	
	// Second Button Title
	wp.customize( 'fargo_big_title_general_Second_button_title', function( value ) {
		value.bind( function( newval ) {
			$( '#big-title.front-page-section .header-button-two' ).html( newval );
		} );
	} );
	
	// Second Button Title URL
	wp.customize( 'fargo_big_title_general_Second_button_title_url', function( value ) {
		value.bind( function( newval ) {
			$( '#big-title.front-page-section .header-button-two' ).attr( 'href', newval );
		} );
	} );
	
	// Background Color
	wp.customize( 'fargo_big_title_colors_background', function( value ) {
		value.bind( function( newval ) {
			$( '#big-title.front-page-section' ).css( 'background-color', newval );
		} );
	} );
	
	// Title Color
	wp.customize( 'fargo_big_title_colors_title', function( value ) {
		value.bind( function( newval ) {
			$( '#big-title.front-page-section h1' ).css( 'color', newval );
		} );
	} );
	
	// Subtitle Colors
	wp.customize( 'fargo_big_title_colors_subtitle', function( value ) {
		value.bind( function( newval ) {
			$( '#big-title.front-page-section .section-description' ).css( 'color', newval );
		} );
	} );
	
	// First Button Background Color
	wp.customize( 'fargo_big_title_colors_first_button', function( value ) {
		value.bind( function( newval ) {
			$( '#big-title.front-page-section .header-button-one' ).css( 'background-color', newval );
		} );
	} );
	
	// First Button Background Color Hover !!
	wp.customize( 'fargo_big_title_colors_first_button_hover', function( value ) {
		value.bind( function( newval ) {
			$( '#big-title.front-page-section .header-button-one:hover' ).css( 'background-color', newval );
		} );
	} );
	
	// First Button Text Color
	wp.customize( 'fargo_big_title_colors_first_button_text', function( value ) {
		value.bind( function( newval ) {
			$( '#big-title.front-page-section .header-button-one' ).css( 'color', newval );
		} );
	} );
	
	// First Button Text Color Hover !!
	wp.customize( 'fargo_big_title_colors_first_button_text_hover', function( value ) {
	value.bind( function( newval ) {
			$( '#big-title.front-page-section .header-button-one:hover' ).css( 'color', newval );
		} );
	} );
	
	// Second Button Background Color
	wp.customize( 'fargo_big_title_colors_second_button', function( value ) {
		value.bind( function( newval ) {
			$( '#big-title.front-page-section .header-button-two' ).css( 'background-color', newval );
		} );
	} );
	
	// Second Button Background Color Hover !!
	wp.customize( 'fargo_big_title_colors_second_button_hover', function( value ) {
		value.bind( function( newval ) {
			$( '#big-title.front-page-section .header-button-two:hover' ).css( 'background-color', newval );
		} );
	} );
	
	// Second Button Text Color
	wp.customize( 'fargo_big_title_colors_second_button_text', function( value ) {
		value.bind( function( newval ) {
			$( '#big-title.front-page-section .header-button-two' ).css( 'color', newval );
		} );
	} );
	
	// Second Button Text Color Hover !!
	wp.customize( 'fargo_big_title_colors_second_button_text_hover', function( value ) {
	value.bind( function( newval ) {
			$( '#big-title.front-page-section .header-button-two:hover' ).css( 'color', newval );
		} );
	} );
	
	// Background Image
	wp.customize( 'fargo_big_title_backgrounds_image', function( value ) {
		value.bind( function( newval ) {
			if( newval == '' ) {
				$( '#big-title.front-page-section' ).css( 'background-image', 'none' );
			} else {
				$( '#big-title.front-page-section' ).css( 'background-image', 'url('+ newval +')' );
			}
		} );
	} );
	
	// Background Position
	wp.customize( 'fargo_big_title_backgrounds_position', function( value ) {
		value.bind( function( newval ) {
			$( '#big-title.front-page-section' ).css( 'background-position',  newval  );
		} );
	} );
	
	// Background Size
	wp.customize( 'fargo_big_title_backgrounds_size', function( value ) {
		value.bind( function( newval ) {
			$( '#big-title.front-page-section' ).css( 'background-size',  newval   );
		} );
	} );
	
	// Background Repeat
	wp.customize( 'fargo_big_title_backgrounds_repeat', function( value ) {
		value.bind( function( newval ) {
			$( '#big-title.front-page-section' ).css( 'background-repeat',  newval  );
		} );
	} );
	
	// Background Attachment
	wp.customize( 'fargo_big_title_backgrounds_attachment', function( value ) {
		value.bind( function( newval ) {
			$( '#big-title.front-page-section' ).css( 'background-attachment',  newval );
		} );
	} );

	/**
	 * FEATURES SECTION
	 */
	
	// Show this section
	wp.customize( 'fargo_features_general_show', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '#features' ).addClass( 'customizer-display-none' );
			} else if( newval == true ) {
				$( '#features' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	// Title
	wp.customize( 'fargo_features_general_title', function( value ) {
		value.bind( function( newval ) {
			$( '#features.front-page-section .section-header h2' ).html( newval );
		} );
	} );

	// Subtitle
	wp.customize( 'fargo_features_general_subtitle', function( value ) {
		value.bind( function( newval ) {
			$( '#features.front-page-section .section-header h6' ).html( newval );
		} );
	} );
	
	// Full Width
	wp.customize( 'fargo_features_settings_section_width', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
			$('#features .container-fluid').removeClass('container-fluid').addClass('container');
			} else if( newval == true ) {
	        $('#features .container').removeClass('container').addClass('container-fluid');
			}
		} );
	} );
		
	// Font Size Title
	wp.customize( 'fargo_features_settings_section_font_title', function( value ) {
		value.bind( function( newval ) {
		$( '#features.front-page-section .features-box h4.title-box' ).css( 'font-size', newval+'px' );
		} );
	} );
	
	// Font Size Description
	wp.customize( 'fargo_features_settings_section_font_description', function( value ) {
		value.bind( function( newval ) {
		$( '#features.front-page-section .features-box .description-box' ).css( 'font-size', newval+'px' );
		} );
	} );
	
	// Icon Font Size
	wp.customize( 'fargo_features_styles_icon_font', function( value ) {
		value.bind( function( newval ) {
		$( '#features.front-page-section .features-box i' ).css( 'font-size', newval+'px' );
		} );
	} );
	
	// Icon Border Style
	wp.customize( 'fargo_features_styles_icon_border', function( value ) {
		value.bind( function( newval ) {
		$( '#features.front-page-section .features-box i' ).css( 'border-style', newval );
		} );
	} );
	
	// Icon Border Padding
	wp.customize( 'fargo_features_styles_icon_border_padding', function( value ) {
		value.bind( function( newval ) {
		$( '#features.front-page-section .features-box i' ).css( 'padding', newval+'px' );
		} );
	} );
	
	// Icon Border Width
	wp.customize( 'fargo_features_styles_icon_border_width', function( value ) {
		value.bind( function( newval ) {
		$( '#features.front-page-section .features-box i' ).css( 'border-width', newval+'px' );
		} );
	} );
	
	// Button Font Size
	wp.customize( 'fargo_features_styles_button_font', function( value ) {
		value.bind( function( newval ) {
		$( '#features.front-page-section .features-box .btn' ).css( 'font-size', newval+'px' );
		} );
	} );
	
	// Button Border Style
	wp.customize( 'fargo_features_style_button_border', function( value ) {
		value.bind( function( newval ) {
		$( '#features.front-page-section .features-box .btn' ).css( 'border-style', newval );
		} );
	} );
	
	// Button Border Padding
	wp.customize( 'fargo_features_styles_button_border_padding', function( value ) {
		value.bind( function( newval ) {
		$( '#features.front-page-section .features-box .btn' ).css( 'padding', newval+'px' );
		} );
	} );
	
	// Button Border Width
	wp.customize( 'fargo_features_styles_button_border_width', function( value ) {
		value.bind( function( newval ) {
		$( '#features.front-page-section .features-box .btn' ).css( 'border-width', newval+'px' );
		} );
	} );
	
	
	
	
	
	
	// Layouts
	wp.customize( 'fargo_features_colors_background', function( value ) {
		value.bind( function( newval ) {
			$( '#features.front-page-section' ).css( 'background-color', newval );
		} );
	} );
	
    // Background Colors
	wp.customize( 'fargo_features_colors_background', function( value ) {
		value.bind( function( newval ) {
			$( '#features.front-page-section' ).css( 'background-color', newval );
		} );
	} );
	
	// Title Color
	wp.customize( 'fargo_features_colors_title', function( value ) {
		value.bind( function( newval ) {
			$( '#features.front-page-section .section-header h2.section-title' ).css( 'color', newval );
		} );
	} );
	
	// Subtitle Color
	wp.customize( 'fargo_features_colors_subtitle', function( value ) {
		value.bind( function( newval ) {
			$( '#features.front-page-section .section-header h5.section-subtitle' ).css( 'color', newval );
		} );
	} );
	
	// Content Title Color
	wp.customize( 'fargo_features_colors_content_title', function( value ) {
		value.bind( function( newval ) {
			$( '#features.front-page-section .section-content h4.title-box' ).css( 'color', newval );
		} );
	} );
	
	// Content Text Color
	wp.customize( 'fargo_features_colors_content_text', function( value ) {
		value.bind( function( newval ) {
			$( '#features.front-page-section .section-content .description-box' ).css( 'color', newval );
		} );
	} );
	
    // Content Background Color
	wp.customize( 'fargo_features_colors_content_background', function( value ) {
		value.bind( function( newval ) {
			$( '#features.front-page-section .section-content .features-box' ).css( 'background-color', newval );
		} );
	} );
	

	// Background Image
	wp.customize( 'fargo_features_backgrounds_image', function( value ) {
		value.bind( function( newval ) {
			if( newval == '' ) {
				$( '#features.front-page-section' ).css( 'background-image', 'none' );
			} else {
				$( '#features.front-page-section' ).css( 'background-image', 'url('+ newval +')' );
			}
		} );
	} );
	
	// Background Position
	wp.customize( 'fargo_features_backgrounds_position', function( value ) {
		value.bind( function( newval ) {
			$( '#features.front-page-section' ).css( 'background-position',  newval  );
		} );
	} );
	
	// Background Size
	wp.customize( 'fargo_features_backgrounds_size', function( value ) {
		value.bind( function( newval ) {
			$( '#features.front-page-section' ).css( 'background-size',  newval   );
		} );
	} );
	
	// Background Repeat
	wp.customize( 'fargo_features_backgrounds_repeat', function( value ) {
		value.bind( function( newval ) {
			$( '#features.front-page-section' ).css( 'background-repeat',  newval  );
		} );
	} );
	
	// Background Attachment
	wp.customize( 'fargo_features_backgrounds_attachment', function( value ) {
		value.bind( function( newval ) {
			$( '#features.front-page-section' ).css( 'background-attachment',  newval );
		} );
	} );
	
	// Background Overlay Enable
	wp.customize( 'fargo_features_backgrounds_overlay', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
			$('#features > .overlay').remove();
			} else if( newval == true ) {
	        $('#features').prepend($( '<div class="overlay"></div>' ) );
			}
		} );
	} );
	
	// Background Overlay Color
	wp.customize( 'fargo_features_backgrounds_overlay_color', function( value ) {
		value.bind( function( newval ) {
			$( '#features.front-page-section .overlay' ).css( 'background-color', newval );
		} );
	} );

	/**
	 * ABOUT SECTION
	 */
	
	// Show this section
	wp.customize( 'fargo_about_general_show', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '#about' ).addClass( 'customizer-display-none' );
			} else if( newval == true ) {
				$( '#about' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	// Title
	wp.customize( 'fargo_about_general_title', function( value ) {
		value.bind( function( newval ) {
			$( '#about.front-page-section .section-header h2' ).html( newval );
		} );
	} );

	// Subtitle
	wp.customize( 'fargo_about_general_subtitle', function( value ) {
		value.bind( function( newval ) {
			$( '#about.front-page-section .section-header h6' ).html( newval );
		} );
	} );
	
	// Full Width
	wp.customize( 'fargo_about_style_width', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
			$('#about .container-fluid').removeClass('container-fluid').addClass('container');
			} else if( newval == true ) {
	        $('#about .container').removeClass('container').addClass('container-fluid');
			}
		} );
	} );
	
	// Layouts
	wp.customize( 'fargo_about_colors_background', function( value ) {
		value.bind( function( newval ) {
			$( '#about.front-page-section' ).css( 'background-color', newval );
		} );
	} );
	
    // Background Colors
	wp.customize( 'fargo_about_colors_background', function( value ) {
		value.bind( function( newval ) {
			$( '#about.front-page-section' ).css( 'background-color', newval );
		} );
	} );
	
	// Title Color
	wp.customize( 'fargo_about_colors_title', function( value ) {
		value.bind( function( newval ) {
			$( '#about.front-page-section .section-header h2' ).css( 'color', newval );
		} );
	} );
	
	// Subtitle Color
	wp.customize( 'fargo_about_colors_subtitle', function( value ) {
		value.bind( function( newval ) {
			$( '#about.front-page-section .section-header h6' ).css( 'color', newval );
		} );
	} );
	
	// Content Title Color
	wp.customize( 'fargo_about_colors_content_title', function( value ) {
		value.bind( function( newval ) {
			$( '#about.front-page-section .content a .title' ).css( 'color', newval );
		} );
	} );
	
	// Content Text Color
	wp.customize( 'fargo_about_colors_content_text', function( value ) {
		value.bind( function( newval ) {
			$( '#about.front-page-section .content .description' ).css( 'color', newval );
		} );
	} );

	// Background Image
	wp.customize( 'fargo_about_backgrounds_image', function( value ) {
		value.bind( function( newval ) {
			if( newval == '' ) {
				$( '#about.front-page-section' ).css( 'background-image', 'none' );
			} else {
				$( '#about.front-page-section' ).css( 'background-image', 'url('+ newval +')' );
			}
		} );
	} );
	
	// Background Position
	wp.customize( 'fargo_about_backgrounds_position', function( value ) {
		value.bind( function( newval ) {
			$( '#about.front-page-section' ).css( 'background-position',  newval  );
		} );
	} );
	
	// Background Size
	wp.customize( 'fargo_about_backgrounds_size', function( value ) {
		value.bind( function( newval ) {
			$( '#about.front-page-section' ).css( 'background-size',  newval   );
		} );
	} );
	
	// Background Repeat
	wp.customize( 'fargo_about_backgrounds_repeat', function( value ) {
		value.bind( function( newval ) {
			$( '#about.front-page-section' ).css( 'background-repeat',  newval  );
		} );
	} );
	
	// Background Attachment
	wp.customize( 'fargo_about_backgrounds_attachment', function( value ) {
		value.bind( function( newval ) {
			$( '#about.front-page-section' ).css( 'background-attachment',  newval );
		} );
	} );
	
    /**
	* PORTFOLIO SECTION
	*/
	
	// Show this section
	wp.customize( 'fargo_portfolio_general_show', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '#portfolio' ).addClass( 'customizer-display-none' );
			} else if( newval == true ) {
				$( '#portfolio' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	// Title
	wp.customize( 'fargo_portfolio_general_title', function( value ) {
		value.bind( function( newval ) {
			$( '#portfolio.front-page-section .section-header h3' ).html( newval );
		} );
	} );

	// Subtitle
	wp.customize( 'fargo_portfolio_general_subtitle', function( value ) {
		value.bind( function( newval ) {
			$( '#portfolio.front-page-section .section-description' ).html( newval );
		} );
	} );
	
    // Background Colors
	wp.customize( 'fargo_portfolio_colors_background', function( value ) {
		value.bind( function( newval ) {
			$( '#portfolio.front-page-section' ).css( 'background-color', newval );
		} );
	} );
	
	// Title Colors
	wp.customize( 'fargo_portfolio_colors_title', function( value ) {
		value.bind( function( newval ) {
			$( '#portfolio.front-page-section .section-header h3' ).css( 'color', newval );
		} );
	} );
	
	// Subtitle Colors
	wp.customize( 'fargo_portfolio_colors_subtitle', function( value ) {
		value.bind( function( newval ) {
			$( '#portfolio.front-page-section .section-description' ).css( 'color', newval );
		} );
	} );
	
    // Background Image
	wp.customize( 'fargo_portfolio_backgrounds_image', function( value ) {
		value.bind( function( newval ) {
			if( newval == '' ) {
				$( '#portfolio.front-page-section' ).css( 'background-image', 'none' );
			} else {
				$( '#portfolio.front-page-section' ).css( 'background-image', 'url('+ newval +')' );
			}
		} );
	} );
	
	// Background Position
	wp.customize( 'fargo_portfolio_backgrounds_position', function( value ) {
		value.bind( function( newval ) {
			$( '#portfolio.front-page-section' ).css( 'background-position',  newval  );
		} );
	} );
	
	// Background Size
	wp.customize( 'fargo_portfolio_backgrounds_size', function( value ) {
		value.bind( function( newval ) {
			$( '#portfolio.front-page-section' ).css( 'background-size',  newval   );
		} );
	} );
	
	// Background Repeat
	wp.customize( 'fargo_portfolio_backgrounds_repeat', function( value ) {
		value.bind( function( newval ) {
			$( '#portfolio.front-page-section' ).css( 'background-repeat',  newval  );
		} );
	} );
	
	// Background Attachment
	wp.customize( 'fargo_portfolio_backgrounds_attachment', function( value ) {
		value.bind( function( newval ) {
			$( '#portfolio.front-page-section' ).css( 'background-attachment',  newval );
		} );
	} );
	
    /**
	 * TEAM SECTION
	 */
	
	// Show this section
	wp.customize( 'fargo_team_general_show', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '#team' ).addClass( 'customizer-display-none' );
			} else if( newval == true ) {
				$( '#team' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	// Title
	wp.customize( 'fargo_team_general_title', function( value ) {
		value.bind( function( newval ) {
			$( '#team.front-page-section .section-header h3' ).html( newval );
		} );
	} );

	// Subtitle
	wp.customize( 'fargo_team_general_subtitle', function( value ) {
		value.bind( function( newval ) {
			$( '#team.front-page-section .section-description' ).html( newval );
		} );
	} );
	
    // Background Colors
	wp.customize( 'fargo_team_colors_background', function( value ) {
		value.bind( function( newval ) {
			$( '#team.front-page-section' ).css( 'background-color', newval );
		} );
	} );
	
	// Title Colors
	wp.customize( 'fargo_team_colors_title', function( value ) {
		value.bind( function( newval ) {
			$( '#team.front-page-section .section-header h3' ).css( 'color', newval );
		} );
	} );
	
	// Subtitle Colors
	wp.customize( 'fargo_team_colors_subtitle', function( value ) {
		value.bind( function( newval ) {
			$( '#team.front-page-section .section-description' ).css( 'color', newval );
		} );
	} );
	
	// Content Title Color
	wp.customize( 'fargo_team_colors_content_title', function( value ) {
		value.bind( function( newval ) {
			$( '#team.front-page-section .section-description' ).css( 'color', newval );
		} );
	} );
	
	// Content Title Color
	wp.customize( 'fargo_team_colors_content_text', function( value ) {
		value.bind( function( newval ) {
			$( '#team.front-page-section .section-description' ).css( 'color', newval );
		} );
	} );
	
	wp.customize( 'fargo_team_style_width', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
			$('#team.front-page-section .container-fluid').removeClass('container-fluid').addClass('container');
			} else if( newval == true ) {
	        $('#team.front-page-section .container').removeClass('container').addClass('container-fluid');
			}
		} );
	} );
	
	// Background Image
	wp.customize( 'fargo_team_backgrounds_image', function( value ) {
		value.bind( function( newval ) {
			if( newval == '' ) {
				$( '#team.front-page-section' ).css( 'background-image', 'none' );
			} else {
				$( '#team.front-page-section' ).css( 'background-image', 'url('+ newval +')' );
			}
		} );
	} );
	
	// Background Position
	wp.customize( 'fargo_team_backgrounds_position', function( value ) {
		value.bind( function( newval ) {
			$( '#team.front-page-section' ).css( 'background-position',  newval  );
		} );
	} );
	
	// Background Size
	wp.customize( 'fargo_team_backgrounds_size', function( value ) {
		value.bind( function( newval ) {
			$( '#team.front-page-section' ).css( 'background-size',  newval   );
		} );
	} );
	
	// Background Repeat
	wp.customize( 'fargo_team_backgrounds_repeat', function( value ) {
		value.bind( function( newval ) {
			$( '#team.front-page-section' ).css( 'background-repeat',  newval  );
		} );
	} );
	
	// Background Attachment
	wp.customize( 'fargo_team_backgrounds_attachment', function( value ) {
		value.bind( function( newval ) {
			$( '#team.front-page-section' ).css( 'background-attachment',  newval );
		} );
	} );
	
    /**
	 * BLOG SECTION
	 */
	
	// Show this section
	wp.customize( 'fargo_blog_general_show', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '#blog' ).addClass( 'customizer-display-none' );
			} else if( newval == true ) {
				$( '#blog' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	// Title
	wp.customize( 'fargo_blog_general_title', function( value ) {
		value.bind( function( newval ) {
			$( '#blog.front-page-section .section-header h3' ).html( newval );
		} );
	} );

	// Subtitle
	wp.customize( 'fargo_blog_general_subtitle', function( value ) {
		value.bind( function( newval ) {
			$( '#blog.front-page-section .section-description' ).html( newval );
		} );
	} );
	
    // Background Colors
	wp.customize( 'fargo_blog_colors_background', function( value ) {
		value.bind( function( newval ) {
			$( '#blog.front-page-section' ).css( 'background-color', newval );
		} );
	} );
	
	// Title Colors
	wp.customize( 'fargo_blog_colors_title', function( value ) {
		value.bind( function( newval ) {
			$( '#blog.front-page-section .section-header h3' ).css( 'color', newval );
		} );
	} );
	
	// Subtitle Colors
	wp.customize( 'fargo_blog_colors_subtitle', function( value ) {
		value.bind( function( newval ) {
			$( '#blog.front-page-section .section-description' ).css( 'color', newval );
		} );
	} );
	
	// Post Title Colors
	wp.customize( 'fargo_blog_colors_post_text', function( value ) {
		value.bind( function( newval ) {
			$( '#blog.front-page-section .section-content .post .post-title' ).css( 'color', newval );
		} );
	} );
	
	// Post Title Colors Hover !!
	wp.customize( 'fargo_blog_colors_post_text_hover', function( value ) {
		value.bind( function( newval ) {
			$( '#blog.front-page-section .section-content .post .post-title:hover' ).css( 'color', newval );
		} );
	} );
	
    // Post Content Text Color
	wp.customize( 'fargo_blog_colors_post_content', function( value ) {
		value.bind( function( newval ) {
			$( '#blog.front-page-section .section-content .post .post-entry' ).css( 'color', newval );
		} );
	} );
	
	// Post Box Background Color
	wp.customize( 'fargo_blog_colors_post_box', function( value ) {
		value.bind( function( newval ) {
			$( '#blog.front-page-section .section-content .post' ).css( 'background-color', newval );
		} );
	} );
	
	// Blog Button Background Color
	wp.customize( 'fargo_blog_colors_button', function( value ) {
		value.bind( function( newval ) {
			$( '#blog.front-page-section .section-content .post .post-button' ).css( 'background-color', newval );
		} );
	} );
	
	// Blog Button Background Color Hover !!
	wp.customize( 'fargo_blog_colors_button_hover', function( value ) {
		value.bind( function( newval ) {
			$( '#blog.front-page-section .section-content .post .post-button:hover' ).css( 'background-color', newval );
		} );
	} );
	
	// Blog Button Text Color
	wp.customize( 'fargo_blog_colors_button_text', function( value ) {
		value.bind( function( newval ) {
			$( '#blog.front-page-section .section-content .post .post-button' ).css( 'color', newval );
		} );
	} );
	
	// Blog Button Text Color Hover
	wp.customize( 'fargo_blog_colors_button_text_hover', function( value ) {
		value.bind( function( newval ) {
			$( '#blog.front-page-section .section-content .post .post-button:hover' ).css( 'color', newval );
		} );
	} );
	
	// Background Image
	wp.customize( 'fargo_blog_backgrounds_image', function( value ) {
		value.bind( function( newval ) {
			if( newval == '' ) {
				$( '#blog.front-page-section' ).css( 'background-image', 'none' );
			} else {
				$( '#blog.front-page-section' ).css( 'background-image', 'url('+ newval +')' );
			}
		} );
	} );
	
	// Background Position
	wp.customize( 'fargo_blog_backgrounds_position', function( value ) {
		value.bind( function( newval ) {
			$( '#blog.front-page-section' ).css( 'background-position',  newval  );
		} );
	} );
	
	// Background Size
	wp.customize( 'fargo_blog_backgrounds_size', function( value ) {
		value.bind( function( newval ) {
			$( '#blog.front-page-section' ).css( 'background-size',  newval   );
		} );
	} );
	
	// Background Repeat
	wp.customize( 'fargo_blog_backgrounds_repeat', function( value ) {
		value.bind( function( newval ) {
			$( '#blog.front-page-section' ).css( 'background-repeat',  newval  );
		} );
	} );
	
	// Background Attachment
	wp.customize( 'fargo_blog_backgrounds_attachment', function( value ) {
		value.bind( function( newval ) {
			$( '#blog.front-page-section' ).css( 'background-attachment',  newval );
		} );
	} );
	
    /**
	 * TESTIMONIALS SECTION
	 */
	
	// Show this section
	wp.customize( 'fargo_testimonials_general_show', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '#testimonials' ).addClass( 'customizer-display-none' );
			} else if( newval == true ) {
				$( '#testimonials' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	// Title
	wp.customize( 'fargo_testimonials_general_title', function( value ) {
		value.bind( function( newval ) {
			$( '#testimonials.front-page-section .section-header h3' ).html( newval );
		} );
	} );

	// Subtitle
	wp.customize( 'fargo_testimonials_general_subtitle', function( value ) {
		value.bind( function( newval ) {
			$( '#testimonials.front-page-section .section-description' ).html( newval );
		} );
	} );
	
    // Background Colors
	wp.customize( 'fargo_testimonials_colors_background', function( value ) {
		value.bind( function( newval ) {
			$( '#testimonials.front-page-section' ).css( 'background-color', newval );
		} );
	} );
	
	// Title Colors
	wp.customize( 'fargo_testimonials_colors_title', function( value ) {
		value.bind( function( newval ) {
			$( '#testimonials.front-page-section .section-header h3' ).css( 'color', newval );
		} );
	} );
	
	// Subtitle Colors
	wp.customize( 'fargo_testimonials_colors_subtitle', function( value ) {
		value.bind( function( newval ) {
			$( '#testimonials.front-page-section .section-description' ).css( 'color', newval );
		} );
	} );
	
	// Post Title Colors
	wp.customize( 'fargo_testimonials_colors_post_text', function( value ) {
		value.bind( function( newval ) {
			$( '#testimonials.front-page-section .section-content .post .post-title' ).css( 'color', newval );
		} );
	} );
	
	// Post Title Colors Hover !!
	wp.customize( 'fargo_testimonials_colors_post_text_hover', function( value ) {
		value.bind( function( newval ) {
			$( '#testimonials.front-page-section .section-content .post .post-title:hover' ).css( 'color', newval );
		} );
	} );
	
    // Post Content Text Color
	wp.customize( 'fargo_testimonials_colors_post_content', function( value ) {
		value.bind( function( newval ) {
			$( '#testimonials.front-page-section .section-content .post .post-entry' ).css( 'color', newval );
		} );
	} );
	
	// Post Box Background Color
	wp.customize( 'fargo_testimonials_colors_post_box', function( value ) {
		value.bind( function( newval ) {
			$( '#testimonials.front-page-section .section-content .post' ).css( 'background-color', newval );
		} );
	} );
	
	// Content Button Background Color
	wp.customize( 'fargo_testimonials_colors_button', function( value ) {
		value.bind( function( newval ) {
			$( '#testimonials.front-page-section .section-content .post .post-button' ).css( 'background-color', newval );
		} );
	} );
	
	// Content Button Background Color Hover !!
	wp.customize( 'fargo_testimonials_colors_button_hover', function( value ) {
		value.bind( function( newval ) {
			$( '#testimonials.front-page-section .section-content .post .post-button:hover' ).css( 'background-color', newval );
		} );
	} );
	
	// Content Button Text Color
	wp.customize( 'fargo_testimonials_colors_button_text', function( value ) {
		value.bind( function( newval ) {
			$( '#testimonials.front-page-section .section-content .post .post-button' ).css( 'color', newval );
		} );
	} );
	
	// Content Button Text Color Hover
	wp.customize( 'fargo_testimonials_colors_button_text_hover', function( value ) {
		value.bind( function( newval ) {
			$( '#testimonials.front-page-section .section-content .post .post-button:hover' ).css( 'color', newval );
		} );
	} );
	
	// Background Image
	wp.customize( 'fargo_testimonials_backgrounds_image', function( value ) {
		value.bind( function( newval ) {
			if( newval == '' ) {
				$( '#testimonials.front-page-section' ).css( 'background-image', 'none' );
			} else {
				$( '#testimonials.front-page-section' ).css( 'background-image', 'url('+ newval +')' );
			}
		} );
	} );
	
	// Background Position
	wp.customize( 'fargo_testimonials_backgrounds_position', function( value ) {
		value.bind( function( newval ) {
			$( '#testimonials.front-page-section' ).css( 'background-position',  newval  );
		} );
	} );
	
	// Background Size
	wp.customize( 'fargo_testimonials_backgrounds_size', function( value ) {
		value.bind( function( newval ) {
			$( '#testimonials.front-page-section' ).css( 'background-size',  newval   );
		} );
	} );
	
	// Background Repeat
	wp.customize( 'fargo_testimonials_backgrounds_repeat', function( value ) {
		value.bind( function( newval ) {
			$( '#testimonials.front-page-section' ).css( 'background-repeat',  newval  );
		} );
	} );
	
	// Background Attachment
	wp.customize( 'fargo_testimonials_backgrounds_attachment', function( value ) {
		value.bind( function( newval ) {
			$( '#testimonials.front-page-section' ).css( 'background-attachment',  newval );
		} );
	} );
	
	/**
	 * PRICE SECTION
	 */
	
	// Show this section
	wp.customize( 'fargo_price_general_show', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '#price' ).addClass( 'customizer-display-none' );
			} else if( newval == true ) {
				$( '#price' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	// Title
	wp.customize( 'fargo_price_general_title', function( value ) {
		value.bind( function( newval ) {
			$( '#price.front-page-section .section-header h3' ).html( newval );
		} );
	} );

	// Subtitle
	wp.customize( 'fargo_price_general_subtitle', function( value ) {
		value.bind( function( newval ) {
			$( '#price.front-page-section .section-description' ).html( newval );
		} );
	} );
	
    // Background Colors
	wp.customize( 'fargo_price_colors_background', function( value ) {
		value.bind( function( newval ) {
			$( '#price.front-page-section' ).css( 'background-color', newval );
		} );
	} );
	
	// Title Colors
	wp.customize( 'fargo_price_colors_title', function( value ) {
		value.bind( function( newval ) {
			$( '#price.front-page-section .section-header h3' ).css( 'color', newval );
		} );
	} );
	
	// Subtitle Colors
	wp.customize( 'fargo_price_colors_subtitle', function( value ) {
		value.bind( function( newval ) {
			$( '#price.front-page-section .section-description' ).css( 'color', newval );
		} );
	} );
	
	// Background Image
	wp.customize( 'fargo_price_backgrounds_image', function( value ) {
		value.bind( function( newval ) {
			if( newval == '' ) {
				$( '#price.front-page-section' ).css( 'background-image', 'none' );
			} else {
				$( '#price.front-page-section' ).css( 'background-image', 'url('+ newval +')' );
			}
		} );
	} );
	
	// Background Position
	wp.customize( 'fargo_price_backgrounds_position', function( value ) {
		value.bind( function( newval ) {
			$( '#price.front-page-section' ).css( 'background-position',  newval  );
		} );
	} );
	
	// Background Size
	wp.customize( 'fargo_price_backgrounds_size', function( value ) {
		value.bind( function( newval ) {
			$( '#price.front-page-section' ).css( 'background-size',  newval   );
		} );
	} );
	
	// Background Repeat
	wp.customize( 'fargo_price_backgrounds_repeat', function( value ) {
		value.bind( function( newval ) {
			$( '#price.front-page-section' ).css( 'background-repeat',  newval  );
		} );
	} );
	
	// Background Attachment
	wp.customize( 'fargo_price_backgrounds_attachment', function( value ) {
		value.bind( function( newval ) {
			$( '#price.front-page-section' ).css( 'background-attachment',  newval );
		} );
	} );
	
	/**
	 * COUNTER SECTION
	 */
	
	// Show this section
	wp.customize( 'fargo_counter_general_show', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '#counter' ).addClass( 'customizer-display-none' );
			} else if( newval == true ) {
				$( '#counter' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	// Title
	wp.customize( 'fargo_counter_general_title', function( value ) {
		value.bind( function( newval ) {
			$( '#counter.front-page-section .section-header h3' ).html( newval );
		} );
	} );

	// Subtitle
	wp.customize( 'fargo_counter_general_subtitle', function( value ) {
		value.bind( function( newval ) {
			$( '#counter.front-page-section .section-description' ).html( newval );
		} );
	} );
	
    // Background Colors
	wp.customize( 'fargo_counter_colors_background', function( value ) {
		value.bind( function( newval ) {
			$( '#counter.front-page-section' ).css( 'background-color', newval );
		} );
	} );
	
	// Title Colors
	wp.customize( 'fargo_counter_colors_title', function( value ) {
		value.bind( function( newval ) {
			$( '#counter.front-page-section .section-header h3' ).css( 'color', newval );
		} );
	} );
	
	// Subtitle Colors
	wp.customize( 'fargo_counter_colors_subtitle', function( value ) {
		value.bind( function( newval ) {
			$( '#counter.front-page-section .section-description' ).css( 'color', newval );
		} );
	} );
	
	// Background Image
	wp.customize( 'fargo_counter_backgrounds_image', function( value ) {
		value.bind( function( newval ) {
			if( newval == '' ) {
				$( '#counter.front-page-section' ).css( 'background-image', 'none' );
			} else {
				$( '#counter.front-page-section' ).css( 'background-image', 'url('+ newval +')' );
			}
		} );
	} );
	
	// Background Position
	wp.customize( 'fargo_counter_backgrounds_position', function( value ) {
		value.bind( function( newval ) {
			$( '#counter.front-page-section' ).css( 'background-position',  newval  );
		} );
	} );
	
	// Background Size
	wp.customize( 'fargo_counter_backgrounds_size', function( value ) {
		value.bind( function( newval ) {
			$( '#counter.front-page-section' ).css( 'background-size',  newval   );
		} );
	} );
	
	// Background Repeat
	wp.customize( 'fargo_counter_backgrounds_repeat', function( value ) {
		value.bind( function( newval ) {
			$( '#counter.front-page-section' ).css( 'background-repeat',  newval  );
		} );
	} );
	
	// Background Attachment
	wp.customize( 'fargo_counter_backgrounds_attachment', function( value ) {
		value.bind( function( newval ) {
			$( '#counter.front-page-section' ).css( 'background-attachment',  newval );
		} );
	} );
	
	/**
	 * CONTACT SECTION
	 */
	
	// Show this section
	wp.customize( 'fargo_contact_general_show', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '#contact' ).addClass( 'customizer-display-none' );
			} else if( newval == true ) {
				$( '#contact' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	// Title
	wp.customize( 'fargo_contact_general_title', function( value ) {
		value.bind( function( newval ) {
			$( '#contact.front-page-section .section-header h3' ).html( newval );
		} );
	} );

	// Subtitle
	wp.customize( 'fargo_contact_general_subtitle', function( value ) {
		value.bind( function( newval ) {
			$( '#contact.front-page-section .section-description' ).html( newval );
		} );
	} );
	
    // Background Colors
	wp.customize( 'fargo_contact_colors_background', function( value ) {
		value.bind( function( newval ) {
			$( '#contact.front-page-section' ).css( 'background-color', newval );
		} );
	} );
	
	// Title Colors
	wp.customize( 'fargo_contact_colors_title', function( value ) {
		value.bind( function( newval ) {
			$( '#contact.front-page-section .section-header h3' ).css( 'color', newval );
		} );
	} );
	
	// Subtitle Colors
	wp.customize( 'fargo_contact_colors_subtitle', function( value ) {
		value.bind( function( newval ) {
			$( '#contact.front-page-section .section-description' ).css( 'color', newval );
		} );
	} );
	
	// Background Image
	wp.customize( 'fargo_contact_backgrounds_image', function( value ) {
		value.bind( function( newval ) {
			if( newval == '' ) {
				$( '#contact.front-page-section' ).css( 'background-image', 'none' );
			} else {
				$( '#contact.front-page-section' ).css( 'background-image', 'url('+ newval +')' );
			}
		} );
	} );
	
	// Background Position
	wp.customize( 'fargo_contact_backgrounds_position', function( value ) {
		value.bind( function( newval ) {
			$( '#contact.front-page-section' ).css( 'background-position',  newval  );
		} );
	} );
	
	// Background Size
	wp.customize( 'fargo_contact_backgrounds_size', function( value ) {
		value.bind( function( newval ) {
			$( '#contact.front-page-section' ).css( 'background-size',  newval   );
		} );
	} );
	
	// Background Repeat
	wp.customize( 'fargo_contact_backgrounds_repeat', function( value ) {
		value.bind( function( newval ) {
			$( '#contact.front-page-section' ).css( 'background-repeat',  newval  );
		} );
	} );
	
	// Background Attachment
	wp.customize( 'fargo_contact_backgrounds_attachment', function( value ) {
		value.bind( function( newval ) {
			$( '#contact.front-page-section' ).css( 'background-attachment',  newval );
		} );
	} );
	
	/**
	 * HEADER MAIN MENU
	 */
	
	// Show this section
	wp.customize( 'fargo_header_main_general_show', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '#header' ).addClass( 'customizer-display-none' );
			} else if( newval == true ) {
				$( '#header' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );
	
	// Full Width
	wp.customize( 'fargo_header_main_general_width', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
			$('#header .container-fluid').removeClass('container-fluid').addClass('container');
			} else if( newval == true ) {
	        $('#header .container').removeClass('container').addClass('container-fluid');
			}
		} );
	} );
	
	// Background Color
	wp.customize( 'fargo_header_main_colors_background', function( value ) {
		value.bind( function( newval ) {
			$( '#header' ).css( 'background-color', newval );
		} );
	} );
	
	// Link Color
	wp.customize( 'fargo_header_main_colors_link', function( value ) {
		value.bind( function( newval ) {
			$( '#header .header-navigation a' ).css( 'color', newval );
		} );
	} );
	
	// Link Color Hover
	wp.customize( 'fargo_header_main_colors_link_hover', function( value ) {
		value.bind( function( newval ) {
			$( '#header .header-navigation a:hover' ).css( 'color', newval );
		} );
	} );
	
	/**
	 * FOOTER WIDGET
	 */

	// Show this section
	wp.customize( 'fargo_footer_widget_general_show', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '#footer .footer-widget' ).addClass( 'customizer-display-none' );
			} else if( newval == true ) {
				$( '#footer .footer-widget' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );
	
	// Background Color
	wp.customize( 'fargo_footer_widget_colors_background', function( value ) {
		value.bind( function( newval ) {
			$( '#footer .footer-widget' ).css( 'background-color', newval );
		} );
	} );
	
	// Title Color
	wp.customize( 'fargo_footer_widget_colors_title', function( value ) {
		value.bind( function( newval ) {
			$( '#footer .footer-widget h5' ).css( 'color', newval );
		} );
	} );
	
	// Link Colors
	wp.customize( 'fargo_footer_widget_colors_link', function( value ) {
		value.bind( function( newval ) {
			$( '#footer .footer-widget a' ).css( 'color', newval );
		} );
	} );
	
	/**
	 * FOOTER BOTTOM
	 */

	// Show this section
	wp.customize( 'fargo_footer_bottom_general_show', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '#footer .footer-bottom' ).addClass( 'customizer-display-none' );
			} else if( newval == true ) {
				$( '#footer .footer-bottom' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );
	
	// Background Position
	wp.customize( 'fargo_footer_bottom_general_position', function( value ) {
		value.bind( function( newval ) {
			$( '#footer .footer-bottom .copyright' ).css( 'text-align',  newval  );
		} );
	} );
	
	// Background Color
	wp.customize( 'fargo_footer_bottom_colors_background', function( value ) {
		value.bind( function( newval ) {
			$( '#footer .footer-bottom' ).css( 'background-color', newval );
		} );
	} );
	
	// Text Color
	wp.customize( 'fargo_footer_bottom_colors_text', function( value ) {
		value.bind( function( newval ) {
			$( '#footer .footer-bottom .bottom-copyright' ).css( 'color', newval );
		} );
	} );
	
	// Link Colors
	wp.customize( 'fargo_footer_bottom_colors_link', function( value ) {
		value.bind( function( newval ) {
			$( '#footer .footer-bottom a' ).css( 'color', newval );
		} );
	} );
	
	// Link Hover Colors
	wp.customize( 'fargo_footer_bottom_colors_link_hover', function( value ) {
		value.bind( function( newval ) {
			$( '#footer .footer-bottom a:hover' ).css( 'color', newval );
		} );
	} );
} )( jQuery );