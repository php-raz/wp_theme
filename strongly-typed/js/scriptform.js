function myform_ajax_send(name, email, mess) {
    jQuery.ajax({
        type: 'POST',
        url: myform_Ajax.ajaxurl,
        dataType: 'json',
        data: {
            'contact_name': jQuery(name).val(),
            'contact_email': jQuery(email).val(),
            'contact_mess': jQuery(mess).val(),
            'contact_nonce': myform_Ajax.nonce,
            'action': 'myform_send_action'
        },
        success: function (data) {
            if (data.error == "") {
                alert(data.work);
            } else {
                alert(data.error);
            }
        },
        error: function () {
            alert("Ошибка соединения");
        }
    });
}