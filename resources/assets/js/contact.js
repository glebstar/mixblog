$(document).ready(function(){
    $('#contactForm').on('submit', function(){
        if($('#inputName').val() == '') {
            alert('Введите ваше имя');
            $('#inputName').focus();
            return false;
        }

        if ($('#inputBody').val() == '') {
            alert('Введите сообщение');
            $('#inputBody').focus();
            return false;
        }

        return true;
    });
});