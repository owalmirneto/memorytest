/**
 * Application Scripts
 * Use it only for default methods around the website
 */
(function($){
    $(document).ready( function () {
        if ($("#user").html() == "") {
            $("#name").click();
        }
    });
})(jQuery);