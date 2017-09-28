var current_id = 0;

$(document).ready(function(){
    $('.edit-item').on('click', function() {
        current_id = $(this).closest('.menu-tr').attr('data-item-id');

        $.msgbox("<div id='box-form'>" + $('#save-form').html() + "</div>", {
            type: "confirm",
            buttons : [
                {type: "submit", value: "Сохранить"},
                {type: "cancel", value: "Отмена"}
            ]
        }, function(result) {
            if(result == 'Сохранить') {
                return saveMenu();
            }
        });

        $('#box-form .menu-save-path').val($(this).closest('.menu-tr').find('.path').html());
        $('#box-form .menu-save-title').val($(this).closest('.menu-tr').find('.title').html());
        $('#box-form .menu-save-sort').val($(this).closest('.menu-tr').find('.sort').html());

        return false;
    });
});

function saveMenu() {
    var submitdata = {
        _token: _token,
        id: current_id,
        path: $('#box-form .menu-save-path').val(),
        title: $('#box-form .menu-save-title').val(),
        sort: $('#box-form .menu-save-sort').val()
    };

    $.post('/admin/menu/save', submitdata, function(data) {
        location.reload();
    });

    return false;
}
