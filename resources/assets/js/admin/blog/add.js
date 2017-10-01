$(document).ready(function(){
    CKEDITOR.replace( 'inputBody',  {
        language: 'ru',
        uiColor: '#9AB8F3',
        height: 500,
        extraPlugins: 'filebrowser,popup',
        allowedContent: true
    });
});