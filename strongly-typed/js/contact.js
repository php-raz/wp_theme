//jQuery(document).ready(function ($) {
//    $("#contactForm_2").submit(function () {
//        var str = $(this).serialize();
//        $.ajax({
//            type: "POST",
//            url: "/wp-content/themes/strongly-typed/template-parts/services.php",
//            data: str,
//            success: function (msg) {
//                if (msg == 'OK') {
//                    result = '<div class="ok">Сообщение отправлено</div>';
//                    $("#fields_2").hide();
//                }
//                else {
//                    result = msg;
//                }
//                $('#note_2').html(result);
//            }
//        });
//        return false;
//    });
//});