/*!
 * BusinessX JS
 */
;( function( $, window, document, undefined )
	{
		'use strict';

		// Selectors
		var $window			= $( window ),
			$body			= $( 'body' ),
			$document		= $( document ),
			$header			= $( '.main-header' ),
			$fixed_menu		= $( '.mh-fixed' ),
			$logo_wrap		= $fixed_menu.find( '.logo-wrap' );

		// Test mobile
		var ac_TestMobile = function() {
			if( (/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i).test(navigator.userAgent || navigator.vendor || window.opera) ) { return true; } else { return false; }
		}


		// Sticky header/menu
		var ac_FixedMenu = function() {
			var hidden_class  = 'mh-hidden',
				transp_class  = 'mh-transparent',
				moving_class  = 'mh-moving',
				sticky_logo   = 'sticky-logo',
				wHeight, wScrollCurrent, wScrollBefore, wScrollDiff, dHeight = 0;

			if( $fixed_menu.length ) {
				var dHeight  = $document.height(),
					wHeight  = $window.height(),
					didScroll;

					$window.on( 'scroll', function() {
						didScroll = true;
					});

					var hasScrolled = function() {
						var wScrollCurrent = $window.scrollTop();
						var wScrollDiff    = wScrollBefore - wScrollCurrent;

						if( wScrollCurrent <= 0 ) {
							if( ! $body.hasClass(sticky_logo) ) {
								$logo_wrap.fadeIn(100).css('display','');
							}
							if( $body.hasClass( 'menu-ff' ) ) {
								$fixed_menu.removeClass( moving_class );
							} else if( $body.hasClass( 'menu-tf' ) ) {
								$fixed_menu.addClass( transp_class ).removeClass( moving_class );
							};

						} else if( wScrollDiff < 0 ) {
							if( $body.hasClass( 'menu-tf' ) ) {
								$fixed_menu.removeClass( transp_class ).addClass( moving_class );
								if( ! $body.hasClass(sticky_logo) ) {
									$logo_wrap.fadeOut(0);
								}
							} else {
								if( ! $body.hasClass(sticky_logo) ) {
									$logo_wrap.fadeOut(100);
								}
								$fixed_menu.addClass( moving_class );
							}
						}

						wScrollBefore = wScrollCurrent;
					}

					hasScrolled();

					setInterval(function () {
						if (didScroll) {
							hasScrolled();
							didScroll = false;
						}
					}, 0);

					if( $body.hasClass(sticky_logo) && $window.scrollTop() > 0 ) {
						$fixed_menu.addClass( moving_class );
						$header.removeClass( transp_class );
					} else if( $window.scrollTop() > 0 ) {
						$fixed_menu.addClass( moving_class );
						$header.removeClass( transp_class );
					};

			}
		} // Sticky menu
		ac_FixedMenu();


		// Setup menu placeholder
		var ac_MenuHeight = function() {
			if( $body.hasClass( 'menu-ff' ) ) {
				$('.mh-placeholder').css( 'height', $fixed_menu.outerHeight() );
			}
		}
		ac_MenuHeight();


		// Add some simple animations
		var ac_AnimateElements = function() {
			var fader		= $('.fader'),
				fader_quick = $('.faderquick'),
				offset		= '75%',
				offset_q	= '95%',
				dir_up		= 'up',
				dir_down	= 'down',
				fader_on 	= 'fader-on',
				fader_reset	= 'fader-reset';

			// Normal speed
			fader.waypoint(function(direction) {
				if (direction === dir_up && $body.hasClass(fader_reset)) {
					$(this.element).removeClass( fader_on ); }
			}, { offset: offset });

			fader.waypoint(function(direction) {
				if (direction === dir_down) {
				  $(this.element).addClass( fader_on ); }
			}, { offset: offset });

			// Faster speed
			fader_quick.waypoint(function(direction) {
				if (direction === dir_up && $body.hasClass(fader_reset)) {
					$(this.element).removeClass( fader_on ); }
			}, { offset: offset_q });

			fader_quick.waypoint(function(direction) {
				if (direction === dir_down) {
					$(this.element).addClass( fader_on ); }
			}, { offset: offset_q });
		}
		ac_AnimateElements();


		// Search form
		var ac_SearchAction = function() {
			var search_wrap 	= $('div.search-wrap'),
				search_field 	= search_wrap.find('.search-field'),
				search_trigger 	= $('#big-search-trigger'),
				search_close 	= $('#big-search-close'),
				search_big		= 'big-search';

			search_close.on('touchend click', function( event ){
				event.preventDefault();
				if($body.hasClass(search_big)){
					$body.removeClass(search_big);
					setTimeout(function(){
						search_field.blur();
					}, 100);
				}
			});

			search_trigger.on( 'touchend click', function( event ){
				event.preventDefault();
				event.stopPropagation();
				$body.addClass(search_big);
				setTimeout(function(){
					search_field.focus();
				}, 100);
				search_field.attr('placeholder', businessx_scripts_data['search_placeholder'] );
			});

			search_field.on('touchend click', function( event ){
				event.stopPropagation();
			});
		}
		ac_SearchAction();


		// Prevent default on click
		$document.on( 'click', '.testimonial-button a', function( event ) {
			if( $(this).attr( 'href' ) == '#' || $(this).attr( 'href' ) == '' ) {
			event.preventDefault(); }
		} );


		// Scroll to id
		var ac_ScrollTo = function( acTheHref ) {
			var the_href	= $( acTheHref ).attr( 'href' ),
				id_target	= $( the_href ),
				home_url    = businessx_scripts_data[ 'home_url' ];

			if( id_target.length ) {
				var	bar         = $( '#wpadminbar' ),
					ttop        = id_target.offset().top,
					hheight     = $header.innerHeight(),
					hheight_t   = hheight - ( parseInt( $header.css( 'paddingTop' ) ) / 2 ),
					bheight     = bar.innerHeight(),
					fromtop, goto;

				if( $header.hasClass('mh-fixed mh-transparent') ) {
					fromtop = bar.length ? ttop - ( hheight_t + bheight ) : ttop - hheight_t;
				} else if ( $header.hasClass('mh-fixed') ) {
					fromtop = bar.length ? ttop - ( hheight + bheight ) : ttop - hheight;
				} else {
					fromtop = bar.length ? ttop - bheight : ttop;
				}

				goto = fromtop < 32 ? 0 : fromtop;

				$( 'body, html' ).animate({
					scrollTop: goto,
				}, 500);
			} else if( home_url.length ) {
				window.location.href = home_url + the_href;
			} else {
				return;
			}
		}

		$document.on( 'click', 'body:not(.nav-open) .gotosection > a', function( event ) {
			ac_ScrollTo( this );
			event.preventDefault();
		});


		// Adjust Section Height
		var ac_SectionHeight = function() {
			var selected_items	= $( '.sec-hero, .sec-slider-slide, .heading-full-height' ),
				smaller_heigh	= $( '.heading-full-width' ),
				no_height_adj	= 'no-height-adj',
				new_height		= ( $body.hasClass( 'menu-ff' ) || $body.hasClass( 'menu-nn' ) ) ? $window.height() - $header.outerHeight() : $window.height(),
				padding_top		= $header.not('.mh-moving').outerHeight();

			if( ! ac_TestMobile() ) {
				// Desktop
				selected_items.css({
					'height' : new_height
				});
			} else { /* Mobile */ }

			// Pages height
			if( ! ( $body.hasClass( 'menu-ff' ) || $body.hasClass( 'menu-nn' ) ) ) {
				smaller_heigh.css({
					'paddingTop' : padding_top
				});
			}
		};
		ac_SectionHeight();


		// Add some padding-top to the first section
		var ac_SectionPadding = function() {
			var first_section 	= $('section[class*=sec-]').first(),
				menu_height		= $header.not('.mh-moving').outerHeight() - 40;

			if( ! $header.length || ( $body.hasClass( 'menu-ff' ) || $body.hasClass( 'menu-nn' ) ) )
				return;

			first_section.not('.sec-slider, .sec-hero').css('paddingTop', menu_height);
		};
		ac_SectionPadding();


		// Fade headings when scrolling
		var ac_FadeDown = function() {
			$window.scroll( function() {
			var	apply_to		= $('.heading-full-height, .heading-full-width');

			if( ! apply_to.length || ac_TestMobile() )
					return;

			var top_value 		= apply_to.offset().top,
				element_height 	= apply_to.outerHeight(),
				scroll_position = $window.scrollTop(),
				fading_elements = $('.sec-hs-elements, .info-full');

				if( scroll_position >= top_value ) {
					if( element_height > scroll_position )
					fading_elements.css({
						  'opacity' : ( 1 - (scroll_position/500) )
					});
				} else {
					fading_elements.css({ 'opacity' : 1 });
				}
			});
		};
		ac_FadeDown();


		// Mobile Menu
		var ac_MobileMenu = function() {
			var menu            = 'main-menu',
				menu_select     = $('.' + menu),
				opened_menu     = 'nav-open',
				mobile_menu     = 'mobile-menu',
				mobile_arrow    = '.mobile-arrow',
				parent_opened   = 'parent-opened',
				opened          = 'opened',
				actions_menu    = 'actions-menu',
				actions_select  = $('.' + actions_menu );

			if( $body.hasClass('menu-ff') || $body.hasClass('menu-nn') ) {
				$('.sec-hero .sec-hs-elements').css('top','50%');
			}

			if( ! menu_select.length &&  ! actions_select.length )
				return;

			$document.on('touchend click', '.ac-btn-mobile-menu', function( event ) {
				event.preventDefault();
				menu_select.detach().prependTo('body').addClass(mobile_menu).addClass('menu-m').removeClass(menu).fadeIn(300);
				$('.'+mobile_menu).find('li.menu-item-has-children > a').after('<a href="#" class="mobile-arrow"></a>');
				$body.toggleClass(opened_menu);
			});

			$document.on('touchend click', '.ac-btn-mobile-actions-menu', function( event ) {
				event.preventDefault();
				actions_select.detach().prependTo('body').addClass(mobile_menu).addClass('menu-a').removeClass(actions_menu).fadeIn(300);

				$body.toggleClass(opened_menu);
			});

			$document.on('touchend click', '.ac-btn-mobile-close, .nav-open .menu-m .gotosection', function( event ){
				event.preventDefault();
				$('.'+mobile_menu).prependTo('.main-menu-wrap').removeClass(mobile_menu).removeClass('menu-m').addClass(menu);
				menu_select.find(mobile_arrow).remove();
				menu_select.find('.'+parent_opened).removeClass(parent_opened);
				menu_select.find('.'+opened).removeClass(opened);
				$body.removeClass(opened_menu);
				if( $( event.currentTarget ).hasClass('gotosection') ) {
					ac_ScrollTo( $( event.currentTarget ).find('a') );
				}
			});

			$document.on('touchend click', '.ac-btn-mobile-act-close, .nav-open .menu-a .gotosection', function( event ){
				event.preventDefault();
				$('.'+mobile_menu).prependTo('.main-header-right').addClass(actions_menu).removeClass('menu-a').removeClass(mobile_menu);
				$body.removeClass(opened_menu);
				if( $( event.currentTarget ).hasClass('gotosection') ) {
					ac_ScrollTo( $( event.currentTarget ).find('a') );
				}
			});

			$document.on('touchend click', mobile_arrow, function( event ){
				event.preventDefault();
				$( event.target ).parent().toggleClass(parent_opened);
				$( event.target ).next('ul').toggleClass(opened);
			});
		};
		ac_MobileMenu();


		// Fitvids
		 $('.post, .widget').fitVids();


		// On Window Resize
		$window.resize( function() {
			ac_SectionHeight();
			ac_MenuHeight();
			ac_SectionPadding();
			$window.trigger('resize.px.parallax');
		});


		// On Window Load
		$window.load(function(){
			$('#bx-preloader').fadeOut('slow',function(){$(this).remove();});
		});


})( jQuery, window, document );