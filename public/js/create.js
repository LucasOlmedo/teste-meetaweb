$(document).ready(function () {
    $('input[name=cpf]').mask("999.999.999-99");
    $('.tel-original').mask('(00) 0000-0000');
    $('form[name="novo-usuario"]').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            data: $(this).serialize(),
            url: '/usuarios/store',
            success: function (callback) {
                alert(callback.message);

                if (!callback.error) {
                    window.location = '/';
                }
            }
        });
    });

    $('.add-tel').on('click', function () {
        var inputVal = $('.tel-original').val();
        var html = '<div>' + inputVal + '</div><input type="hidden" name="telefone[]" value="' + inputVal + '"><br>';
        $('.tel-added').append(html);
        $('.tel-original').val('');
    });
});