pagenow = 'plugin-install'
jQuery(document).on( 'wp-plugin-update-success', function( evt, response ){
	location.reload();
});

jQuery(document).ready(function () {

	/* If there are required actions, add an icon with the number of required actions in the About fargo page -> Actions required tab */
	var fargo_nr_actions_required = fargoWelcomeScreenObject.nr_actions_required;

	if ( (typeof fargo_nr_actions_required !== 'undefined') && (fargo_nr_actions_required != '0') ) {
		jQuery('li.fargo-w-red-tab a').append('<span class="fargo-actions-count">' + fargo_nr_actions_required + '</span>');
	}

	/* Dismiss required actions */
	jQuery(".fargo-required-action-button").click(function () {

		var id = jQuery(this).attr('id'),
				action = jQuery(this).attr('data-action');
		jQuery.ajax({
			type      : "GET",
			data      : { action: 'fargo_dismiss_required_action', id: id, todo: action },
			dataType  : "html",
			url       : fargoWelcomeScreenObject.ajaxurl,
			beforeSend: function (data, settings) {
				jQuery('.fargo-tab-pane#actions_required h1').append('<div id="temp_load" style="text-align:center"><img src="' + fargoWelcomeScreenObject.template_directory + '/inc/admin/welcome-screen/img/ajax-loader.gif" /></div>');
			},
			success   : function (data) {
				location.reload();
				jQuery("#temp_load").remove();
				/* Remove loading gif */
			},
			error     : function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
			}
		});
	});

	/* Dismiss recommended plugins */
    jQuery(".fargo-recommended-plugin-button").click(function () {

        var id = jQuery(this).attr('id'),
            action = jQuery(this).attr('data-action');
        jQuery.ajax({
            type      : "GET",
            data      : { action: 'fargo_dismiss_recommended_plugins', id: id, todo: action },
            dataType  : "html",
            url       : fargoWelcomeScreenObject.ajaxurl,
            beforeSend: function (data, settings) {
                jQuery('.fargo-tab-pane#actions_required h1').append('<div id="temp_load" style="text-align:center"><img src="' + fargoWelcomeScreenObject.template_directory + '/inc/admin/welcome-screen/img/ajax-loader.gif" /></div>');
            },
            success   : function (data) {
                location.reload();
                jQuery("#temp_load").remove();
                /* Remove loading gif */
            },
            error     : function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    });

    

});
