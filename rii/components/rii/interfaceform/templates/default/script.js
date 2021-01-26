$(document).ready(function () {
    $(".form--wrapp").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: 'rii/components/rii/interfaceform/templates/default/email.php',
            cache: false,
            processData: false,
            contentType: false,
            type: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            success: function (data) {
                if (data != 'success') {
                    if (data.mailSend) {
                        $('.pop-up--item').removeClass('active');
                        $('.pop-up--list, .pop-up--accepted').addClass('active');
                        $('#messagePlace').text(data.mailSend);
                    } else {
                        $('.pop-up--item').removeClass("active");
                        $('.pop-up--list, .pop-up--error').addClass('active');
                        data.nameError ? $('#nameError').text(data.nameError) : $('#nameError').text('');
                        data.numberError ? $('#numberError').text(data.numberError) : $('#numberError').text('');
                    }
                }
            }
        })
    })
})