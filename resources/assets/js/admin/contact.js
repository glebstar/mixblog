$(document).ready(function(){
    $('.open-mess').on('click', function () {
        var mess = $(this).attr('data-message');

        $.msgbox("<textarea>" + mess + "</textarea>", {
            type: "info",
            buttons : [
                {type: "cancel", value: "Закрыть"}
            ]
        });
    });
});