jQuery(document).on( 'click', '.fargo-error-update .notice-dismiss', function() {

    jQuery.ajax({
        url: ajaxurl,
        method: "POST",
        data: {
            action: 'fargo_remove_upate_notice'
        }
    })

})