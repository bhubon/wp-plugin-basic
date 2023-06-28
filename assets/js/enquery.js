; (function ($) {

    $("#wedevs-enquiry-form form").on('submit', function (e) {
        e.preventDefault();

        let data = $(this).serialize();

        $.post(weDevsAcademy.ajaxurl, data, function (respose) {
            if(respose.success){
                
            }else{
                alert(respose.data.message);
            }
        })
            .fail(function (error) {
                alert(weDevsAcademy.error)
            })
    });
})(jQuery);