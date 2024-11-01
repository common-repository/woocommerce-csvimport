jQuery(document).ready(function () {
    jQuery('#exportForm').submit(function (e) {
        var formData = jQuery(this).serialize();
        jQuery('#exportForm').toggle();
        jQuery('#progressBar').toggle();
        doAjaxExport(formData);
        e.preventDefault();
    });

    jQuery('a.delete').click(function (event) {
        event.preventDefault();
        var data = {
            type: "POST",
            action: 'delete_export_file',
            security: woocsvexport.security,
            filename: jQuery(this).data('file-name')
        };

        jQuery.post(ajaxurl, data, function (response) {
            if (response == 'done') {
                location.reload();
            }
        });
    });

});

function doAjaxExport(data) {

    jQuery.ajax(
        {
            type: "POST",
            url: ajaxurl,
            data: data,
            success: function (data) {

                console.log(data);

                if (data == 0) {
                    location.reload();
                    return;
                }

                jQuery('#progressBar').val(data);

                var newFormData = {};
                newFormData.action = 'woocsv_export';
                doAjaxExport(newFormData);
            },
            error: function (data) {
                console.log(data);
                alert(strings.error);
            }
        });

}