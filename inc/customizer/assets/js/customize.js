/**
 * File customizer.js.
 *
 */

 jQuery(document).on( 'wp-plugin-update-success', function( evt, response ){
    location.reload();
});

( function( api ) {

	// Extends our custom "fargo-pro-section" section.
	api.sectionConstructor['fargo-pro-section'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );
	// Extends our custom "fargo-pro-section" section.
	api.sectionConstructor['fargo-recomended-section'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );

/**
 * WP EDITOR plugin
 */
(function ( $ ) {

    window._wpEditor = {
        init: function( id , content, settings ){
            var _id = '__wp_mce_editor__';
            var _tpl =  $( '#_wp-mce-editor-tpl').html();
            if (  typeof content === "undefined"  ){
                content = '';
            }

            if (  typeof window.tinyMCEPreInit.mceInit[ _id ]  !== "undefined" ) {

                var tmceInit = _.clone( window.tinyMCEPreInit.mceInit[_id] );
                var qtInit = _.clone( window.tinyMCEPreInit.qtInit[_id] );

                tmceInit = $.extend( tmceInit , settings.tinymce );
                qtInit   = $.extend( qtInit , settings.qtag );

                var tpl = _tpl.replace( new RegExp(_id,"g"), id );
                var template =  $( tpl );
                template.find( 'textarea').removeAttr( 'rows').removeAttr( 'cols' );
                $( "#"+id ).replaceWith( template );
                // set content
                $( '#'+id ).val( content );

                $wrap = tinymce.$( '#wp-' + id + '-wrap' );

                tmceInit.body_class = tmceInit.body_class.replace(new RegExp(_id,"g"), id );
                tmceInit.selector   = tmceInit.selector.replace(new RegExp(_id,"g"), id );
                tmceInit.cache_suffix   = '';

                $wrap.removeClass( 'html-active').addClass( 'tmce-active' );

                tmceInit.init_instance_callback = function( editor ){
                    if (  typeof settings === 'object' ) {
                        if ( typeof settings.mod === 'string' && settings.mod === 'html' ){
                            //console.log( settings.mod  );
                            switchEditors.go( id, settings.mod );
                        }
                        // editor.theme.resizeTo('100%', 500);
                        if( typeof settings.init_instance_callback === "function" ) {
                            settings.init_instance_callback( editor );
                        }

                        if (settings.sync_id !== '') {
                            if (typeof settings.sync_id === 'string') {
                                editor.on('keyup change', function (e) {
                                    var html = editor.getContent( { format: 'raw' } );
                                    html = _wpEditor.removep( html );
                                    $('#' + settings.sync_id).val( html ).trigger('change');
                                });
                            } else {
                                editor.on('keyup change', function (e) {
                                    var html = editor.getContent( { format: 'raw' } );
                                    html = _wpEditor.removep( html );
                                    settings.sync_id.val( html ).trigger('change');
                                });
                            }

                            $( 'textarea#'+id ).on( 'keyup change', function(){
                                var v =  $( this).val();
                                if ( typeof settings.sync_id === 'string' ) {
                                    $('#' + settings.sync_id).val( v ).trigger('change');
                                } else {
                                    settings.sync_id.val( v ).trigger('change');
                                }
                            } );

                        }
                    }
                };

                tmceInit.plugins = tmceInit.plugins.replace('fullscreen,', '');
                tinyMCEPreInit.mceInit[ id ] = tmceInit;

                qtInit.id = id;
                tinyMCEPreInit.qtInit[ id ] = qtInit;

                if ( $wrap.hasClass( 'tmce-active' ) || ! tinyMCEPreInit.qtInit.hasOwnProperty( id )  ) {
                    tinymce.init( tmceInit );
                    if ( ! window.wpActiveEditor ) {
                        window.wpActiveEditor = id;
                    }
                }

                if ( typeof quicktags !== 'undefined' ) {

                    /**
                     * Reset quicktags
                     * This is crazy condition
                     * Maybe this is a bug ?
                     * see wp-includes/js/quicktags.js line 252
                     */
                    if( QTags.instances['0'] ) {
                        QTags.instances['0'] =  false;
                    }
                    quicktags( qtInit );
                    if ( ! window.wpActiveEditor ) {
                        window.wpActiveEditor = id;
                    }

                }

            }
        },

        /**
         * Replace paragraphs with double line breaks
         * @see wp-admin/js/editor.js
         */
        removep: function ( html ) {
            return window.switchEditors._wp_Nop( html );
        },

        sync: function(){
            //
        },

        remove: function( id ){
            var content = '';
            var editor = false;
            if ( editor = tinymce.get(id) ) {
                content = editor.getContent( { format: 'raw' } );
                content = _wpEditor.removep( content );
                editor.remove();
            } else {
                content = $( '#'+id ).val();
            }

            if ( $( '#wp-' + id + '-wrap').length > 0 ) {
                window._wpEditorBackUp = window._wpEditorBackUp || {};
                if (  typeof window._wpEditorBackUp[ id ] !== "undefined" ) {
                    $( '#wp-' + id + '-wrap').replaceWith( window._wpEditorBackUp[ id ] );
                }
            }

            $( '#'+id ).val( content );
        }

    };


    $.fn.wp_js_editor = function( options ) {

        // This is the easiest way to have default options.
        if ( options !== 'remove' ) {
            options = $.extend({
                sync_id: "", // sync to another text area
                tinymce: {}, // tinymce setting
                qtag:    {}, // quick tag settings
                mod:    '', // quick tag settings
                init_instance_callback: function(){} // quick tag settings
            }, options );
        } else{
            options =  'remove';
        }

        return this.each( function( ) {
            var edit_area  =  $( this );

            edit_area.uniqueId();
            // Make sure edit area have a id attribute
            var id =  edit_area.attr( 'id' ) || '';
            if ( id === '' ){
                return ;
            }

            if ( 'remove' !== options ) {
                if ( ! options.mod  ){
                    options.mod = edit_area.attr( 'data-editor-mod' ) || '';
                }
                window._wpEditorBackUp = window._wpEditorBackUp || {};
                window._wpEditorBackUp[ id ] =  edit_area;
                window._wpEditor.init( id, edit_area.val(), options );
            } else {
                window._wpEditor.remove( id );
            }

        });

    };

}( jQuery ));

 jQuery( document ).ready( function( $ ) {

 	function fargo_sections_order( container ){
 		var sections = $('#sub-accordion-panel-fargo_frontpage_panel').sortable('toArray');
 		var s_ordered = [];
 		$.each(sections, function( index, s_id ) {
 			s_id = s_id.replace( "accordion-panel-", "");
 			s_ordered.push(s_id);
		});

 		$.ajax({
			url: FargoCustomizer.ajax_url,
			type: 'post',
			dataType: 'html',
			data: {
				'action': 'fargo_order_sections',
				'panel': s_ordered,
			}
		})
		.done( function( data ) {
			wp.customize.previewer.refresh();
		});

 	}

 	$('.recomended-actions_container').on( 'actions_complete', function( evt,  element ){
 		if ( $(element).next( '.epsilon-recommeded-actions-container' ).length > 0 ) {
 			var nex_actions = $(element).next( '.epsilon-recommeded-actions-container' );
 			var next_index = nex_actions.data('index');
 			$('.control-section-fargo-recomended-section .fargo-actions-count .current-index').text( next_index );
 			$(element).remove();
 		}else{
 			$(element).remove();
 			$('.control-section-fargo-recomended-section .fargo-actions-count').remove();
 			$('.control-section-fargo-recomended-section .accordion-section-title .section-title').text( $('.control-section-fargo-recomended-section .accordion-section-title .section-title').data('succes') )
 			$('.recomended-actions_container .succes').show();
 		}

 	});

	wp.customize.section.each( function ( section ) {

		var sectionID = '#sub-accordion-section-'+section.id;
		if ( $(sectionID).find('.epsilon-tabs').length > 0 ) {
			var current_tab = $(sectionID).find('.epsilon-tabs a.epsilon-tab.active');
			var current_control = current_tab.parent().parent().parent();
			var current_controlID = current_control.attr('id');
			$(sectionID+' #'+current_controlID).nextAll().hide().addClass('tab-element');
			var fields = current_tab.data('fields');
			$(sectionID).find(fields).show();
			
			$(sectionID).find('.epsilon-tabs a.epsilon-tab').click(function(evt){
				evt.preventDefault();

				var section = $(this).parent().parent().parent().parent();
				var sectionID = section.attr('id');
				section.find('.epsilon-tabs a').removeClass('active');
				$(this).addClass('active');
				var field = $(this).parent().parent().parent();
				var fieldID = field.attr('id');
				$('#'+sectionID+' #'+fieldID).nextAll().hide();
				var fields = $(this).data('fields');
				section.find(fields).show();
			});
		}

	});

	$('#sub-accordion-panel-fargo_frontpage_panel').sortable({
		helper: 'clone',
		cancel: 'li.ui-sortable-handle.open',
		delay: 150,
		update: function( event, ui ) {

			fargo_sections_order( $('#sub-accordion-panel-fargo_frontpage_panel') );

		},

	});

	// Textarea editor

	function _the_editor( container ){
        var _editor = {
            ready: function( container ) {

                var control = this;
                control.container = container;
                control.container.addClass( 'fargo-editor-added' );
                control.editing_area = $( 'textarea' , control.container );
                if ( control.editing_area.hasClass( 'wp-editor-added' ) ) {
                    return false;
                }

                control.editing_area.uniqueId();
                control.editing_area.addClass('wp-editor-added');
                control.editing_id = control.editing_area.attr( 'id' ) || false;
                if ( ! control.editing_id ) {
                    return false;
                }
                control.editor_id = 'wpe-for-'+control.editing_id;
                control.preview = $( '<div id="preview-'+control.editing_id+'" class="wp-js-editor-preview"></div>');
                control.editing_editor = $( '<div id="wrap-'+control.editing_id+'" class="modal-wp-js-editor"><textarea id="'+control.editor_id+'"></textarea></div>');
                var content = control.editing_area.val();
                // Load default value
                $( 'textarea', control.editing_editor).val( content );
                try {
                    control.preview.html( window.switchEditors._wp_Autop( content ) );
                } catch ( e ) {

                }

                $( 'body' ).on( 'click', '#customize-controls, .customize-section-back', function( e ) {
                    if ( ! $( e.target ).is( control.preview ) ) {
                        /// e.preventDefault(); // Keep this AFTER the key filter above
                        control.editing_editor.removeClass( 'wpe-active' );
                        $( '.wp-js-editor-preview').removeClass( 'wpe-focus');
                    }
                } );

                control._init();

                $( window ) .on( 'resize', function(){
                    control._resize();
                } );

            },

            _init: function(  ){

                var control = this;
                $( 'body .wp-full-overlay').append( control.editing_editor );

                $( 'textarea',  control.editing_editor).attr(  'data-editor-mod', ( control.editing_area.attr( 'data-editor-mod' ) || '' ) ) .wp_js_editor( {
                    sync_id: control.editing_area,
                    init_instance_callback: function( editor ) {
                        var w =  $( '#wp-'+control.editor_id+ '-wrap' );
                        $( '.wp-editor-tabs', w).append( '<button class="wp-switch-editor fullscreen-wp-editor"  type="button"><span class="dashicons"></span></button>' );
                        $( '.wp-editor-tabs', w).append( '<button class="wp-switch-editor preview-wp-editor"  type="button"><span class="dashicons dashicons-visibility"></span></button>' );
                        $( '.wp-editor-tabs', w).append( '<button class="wp-switch-editor close-wp-editor"  type="button"><span class="dashicons dashicons-no-alt"></span></button>' );
                        w.on( 'click', '.close-wp-editor', function( e ) {
                            e.preventDefault();
                            control.editing_editor.removeClass( 'wpe-active' );
                            $( '.wp-js-editor-preview').removeClass( 'wpe-focus');
                        } );
                        $( '.preview-wp-editor', w ).hover( function(){
                            w.closest( '.modal-wp-js-editor').css( { opacity: 0 } );
                        }, function(){
                            w.closest( '.modal-wp-js-editor').css( { opacity: 1 } );
                        } );
                        w.on( 'click', '.fullscreen-wp-editor', function( e ) {
                            e.preventDefault();
                            w.closest( '.modal-wp-js-editor').toggleClass( 'fullscreen' );
                            setTimeout( function(){
                                $( window ).resize();
                            }, 600 );
                        } );
                    }
                } );


                control.editing_area.on( 'change', function() {
                    control.preview.html( window.switchEditors._wp_Autop( $( this).val() ) );
                });

                control.preview.on( 'click', function( e ){
                    $( '.modal-wp-js-editor').removeClass( 'wpe-active' );
                    control.editing_editor.toggleClass( 'wpe-active' );
                    tinyMCE.get( control.editor_id ).focus();
                    control.preview.addClass( 'wpe-focus' );
                    control._resize();
                    return false;
                } );

                control.editing_area.on( 'focus', function( e ){
                    console.log('asdasdsad');
                    $( '.modal-wp-js-editor').removeClass( 'wpe-active' );
                    control.editing_editor.toggleClass( 'wpe-active' );
                    tinyMCE.get( control.editor_id ).focus();
                    control.preview.addClass( 'wpe-focus' );
                    control._resize();
                    return false;
                } );



                control.container.find( '.wp-js-editor').addClass( 'wp-js-editor-active' );
                control.preview.insertBefore( control.editing_area );
                control.container.on( 'click', '.wp-js-editor-preview', function( e ){
                    e.preventDefault();
                } );

            },

            _resize: function(){
                var control = this;
                var w =  $( '#wp-'+control.editor_id+ '-wrap');
                var height = w.innerHeight();
                var tb_h = w.find( '.mce-toolbar-grp' ).eq( 0 ).height();
                tb_h += w.find( '.wp-editor-tools' ).eq( 0 ).height();
                tb_h += 50;
                //var width = $( window ).width();
                var editor = tinymce.get( control.editor_id );
                control.editing_editor.width( '' );
                editor.theme.resizeTo( '100%', height - tb_h );
                w.find( 'textarea.wp-editor-area').height( height - tb_h  );
            }

        };

        _editor.ready( container );

    }

    function _remove_editor( $context ){
        $( 'textarea', $context ).each( function(){
            var id = $(this).attr( 'id' ) || '';
            var editor_id = 'wpe-for-'+id;
            try {
                var editor = tinymce.get( editor_id );
                if ( editor ) {
                    editor.remove();
                }
                $( '#wrap-'+editor_id ).remove();
                $( '#wrap-'+id ).remove();

                if ( typeof tinyMCEPreInit.mceInit[ editor_id ] !== "undefined"  ) {
                    delete  tinyMCEPreInit.mceInit[ editor_id ];
                }

                if ( typeof tinyMCEPreInit.qtInit[ editor_id ] !== "undefined"  ) {
                    delete  tinyMCEPreInit.qtInit[ editor_id ];
                }

            } catch (e) {

            }

        } );
    }

    var _is_init_editors = {};

    $( 'body' ).on( 'click', '#customize-theme-controls .accordion-section', function( e ){
        //e.preventDefault();
        var section = $( this );
        var id = section.attr( 'id' ) || '';
        if ( id ) {
            if ( typeof _is_init_editors[ id ] === "undefined" ) {
                _is_init_editors[ id ] = true;

                setTimeout( function() {
                    if ( $( '.wp-js-editor', section ).length > 0 ) {
                        $( '.wp-js-editor', section ).each( function(){
                            _the_editor( $( this ) );
                        } );
                    }
                }, 10 );

            }
        }
    } );

    if ( _wpCustomizeSettings.autofocus ) {
        if ( _wpCustomizeSettings.autofocus.section ) {
        	console.log('focus');
            var id = "sub-accordion-section-"+_wpCustomizeSettings.autofocus.section ;
            _is_init_editors[ id ] = true;
            var section = $( '#'+id );
            setTimeout( function(){
            	console.log('before check');
                if ( $( '.wp-js-editor', section ).length > 0 ) {
                	console.log('exist');
                    $( '.wp-js-editor', section ).each( function(){
                        _the_editor( $( this ) );
                    } );
                }
            }, 1000 );

        } else if ( _wpCustomizeSettings.autofocus.panel ) {

        }
    }

});


jQuery(document).ready(function(){

    jQuery(".fargo-dismiss-required-action").click(function () {

        var id = jQuery(this).attr('id'),
            action = jQuery(this).attr('data-action');
        jQuery.ajax({
            type: "GET",
            data: { action: 'fargo_dismiss_required_action', id: id, todo: action },
            dataType: "html",
            url: FargoCustomizer.ajax_url,
            beforeSend: function (data, settings) {
                jQuery('#' + id).parent().append('<div id="temp_load" style="text-align:center"><img src="' + FargoCustomizer.template_directory + '/inc/admin/welcome-screen/img/ajax-loader.gif" /></div>');
            },
            success: function (data) {
                var container = jQuery('#' + data).parent().parent();
                var index = container.next().data('index');
                jQuery('.fargo-actions-count .current-index').text(index);
                container.slideToggle().remove();
                if ( jQuery('.recomended-actions_container > .epsilon-required-actions').length == 0 ) {
                    
                    jQuery('#accordion-section-fargo-recomended-section .fargo-actions-count').remove();

                    if ( jQuery('.recomended-actions_container > .epsilon-recommended-plugins').length == 0 ) {
                        jQuery('.recomended-actions_container .succes').removeClass('hide');
                        jQuery('#accordion-section-fargo-recomended-section .section-title').text(jQuery('#accordion-section-fargo-recomended-section .section-title').data('social'));
                    }else{
                        jQuery('#accordion-section-fargo-recomended-section .section-title').text(jQuery('#accordion-section-fargo-recomended-section .section-title').data('plugin_text'));
                    }
                    
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    });

    jQuery(".fargo-recommended-plugin-button").click(function () {

        var id = jQuery(this).attr('id'),
            action = jQuery(this).attr('data-action');
        jQuery.ajax({
            type: "GET",
            data: { action: 'fargo_dismiss_recommended_plugins', id: id, todo: action },
            dataType: "html",
            url: FargoCustomizer.ajax_url,
            beforeSend: function (data, settings) {
                jQuery('#' + id).parent().append('<div id="temp_load" style="text-align:center"><img src="' + FargoCustomizer.template_directory + '/inc/admin/welcome-screen/img/ajax-loader.gif" /></div>');
            },
            success: function (data) {
                var container = jQuery('#' + data).parent().parent();
                var index = container.next().data('index');
                jQuery('.fargo-actions-count .current-index').text(index);
                container.slideToggle().remove();

                if ( jQuery('.recomended-actions_container > .epsilon-recommended-plugins').length == 0 ) {
                    jQuery('.recomended-actions_container .succes').removeClass('hide');
                    jQuery('#accordion-section-fargo-recomended-section .section-title').text(jQuery('#accordion-section-fargo-recomended-section .section-title').data('social'));
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    });
});

( function( $ ) {

    /* Multi-level panels in customizer */

    var api = wp.customize;

    api.bind( 'pane-contents-reflowed', function() {

        // Reflow sections
        var sections = [];

        api.section.each( function( section ) {

            if (
                'fargo_section' !== section.params.type ||
                'undefined' === typeof section.params.section
            ) {

                return;

            }

            sections.push( section );

        });

        sections.sort( api.utils.prioritySort ).reverse();

        $.each( sections, function( i, section ) {

            var parentContainer = $( '#sub-accordion-section-' + section.params.section );

            parentContainer.children( '.section-meta' ).after( section.headContainer );

        });

        // Reflow panels
        var panels = [];

        api.panel.each( function( panel ) {

            if (
                'fargo_panel' !== panel.params.type ||
                'undefined' === typeof panel.params.panel
            ) {

                return;

            }

            panels.push( panel );

        });

        panels.sort( api.utils.prioritySort ).reverse();

        $.each( panels, function( i, panel ) {

            var parentContainer = $( '#sub-accordion-panel-' + panel.params.panel );

            parentContainer.children( '.panel-meta' ).after( panel.headContainer );

        });

    });

    // Extend Panel
    var _panelEmbed = wp.customize.Panel.prototype.embed;
    var _panelIsContextuallyActive = wp.customize.Panel.prototype.isContextuallyActive;
    var _panelAttachEvents = wp.customize.Panel.prototype.attachEvents;

    wp.customize.Panel = wp.customize.Panel.extend({
        attachEvents: function() {

            if (
                'fargo_panel' !== this.params.type ||
                'undefined' === typeof this.params.panel
            ) {

                _panelAttachEvents.call( this );

                return;

            }

            _panelAttachEvents.call( this );

            var panel = this;

            panel.expanded.bind( function( expanded ) {

                var parent = api.panel( panel.params.panel );

                if ( expanded ) {

                    parent.contentContainer.addClass( 'current-panel-parent' );

                } else {

                    parent.contentContainer.removeClass( 'current-panel-parent' );

                }

            });

            panel.container.find( '.customize-panel-back' )
                .off( 'click keydown' )
                .on( 'click keydown', function( event ) {

                    if ( api.utils.isKeydownButNotEnterEvent( event ) ) {

                        return;

                    }

                    event.preventDefault(); // Keep this AFTER the key filter above

                    if ( panel.expanded() ) {

                        api.panel( panel.params.panel ).expand();

                    }

                });

        },
        embed: function() {

            if (
                'fargo_panel' !== this.params.type ||
                'undefined' === typeof this.params.panel
            ) {

                _panelEmbed.call( this );

                return;

            }

            _panelEmbed.call( this );

            var panel = this;
            var parentContainer = $( '#sub-accordion-panel-' + this.params.panel );

            parentContainer.append( panel.headContainer );

        },
        isContextuallyActive: function() {

            if (
                'fargo_panel' !== this.params.type
            ) {

                return _panelIsContextuallyActive.call( this );

            }

            var panel = this;
            var children = this._children( 'panel', 'section' );

            api.panel.each( function( child ) {

                if ( ! child.params.panel ) {

                    return;

                }

                if ( child.params.panel !== panel.id ) {

                    return;

                }

                children.push( child );

            });

            children.sort( api.utils.prioritySort );

            var activeCount = 0;

            _( children ).each( function ( child ) {

                if ( child.active() && child.isContextuallyActive() ) {

                    activeCount += 1;

                }

            });

            return ( activeCount !== 0 );

        }

    });

    // Extend Section
    var _sectionEmbed = wp.customize.Section.prototype.embed;
    var _sectionIsContextuallyActive = wp.customize.Section.prototype.isContextuallyActive;
    var _sectionAttachEvents = wp.customize.Section.prototype.attachEvents;

    wp.customize.Section = wp.customize.Section.extend({
        attachEvents: function() {

            if (
                'fargo_section' !== this.params.type ||
                'undefined' === typeof this.params.section
            ) {

                _sectionAttachEvents.call( this );

                return;

            }

            _sectionAttachEvents.call( this );

            var section = this;

            section.expanded.bind( function( expanded ) {

                var parent = api.section( section.params.section );

                if ( expanded ) {

                    parent.contentContainer.addClass( 'current-section-parent' );

                } else {

                    parent.contentContainer.removeClass( 'current-section-parent' );

                }

            });

            section.container.find( '.customize-section-back' )
                .off( 'click keydown' )
                .on( 'click keydown', function( event ) {

                    if ( api.utils.isKeydownButNotEnterEvent( event ) ) {

                        return;

                    }

                    event.preventDefault(); // Keep this AFTER the key filter above

                    if ( section.expanded() ) {

                        api.section( section.params.section ).expand();

                    }

                });

        },
        embed: function() {

            if (
                'fargo_section' !== this.params.type ||
                'undefined' === typeof this.params.section
            ) {

                _sectionEmbed.call( this );

                return;

            }

            _sectionEmbed.call( this );

            var section = this;
            var parentContainer = $( '#sub-accordion-section-' + this.params.section );

            parentContainer.append( section.headContainer );

        },
        isContextuallyActive: function() {

            if (
                'fargo_section' !== this.params.type
            ) {

                return _sectionIsContextuallyActive.call( this );

            }

            var section = this;
            var children = this._children( 'section', 'control' );

            api.section.each( function( child ) {

                if ( ! child.params.section ) {

                    return;

                }

                if ( child.params.section !== section.id ) {

                    return;

                }

                children.push( child );

            });

            children.sort( api.utils.prioritySort );

            var activeCount = 0;

            _( children ).each( function ( child ) {

                if ( 'undefined' !== typeof child.isContextuallyActive ) {

                    if ( child.active() && child.isContextuallyActive() ) {

                        activeCount += 1;

                    }

                } else {

                    if ( child.active() ) {

                        activeCount += 1;

                    }

                }

            });

            return ( activeCount !== 0 );

        }

    });

})( jQuery );