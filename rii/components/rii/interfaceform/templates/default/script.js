$(document).ready(function () {
    $(".form--wrapp").on('submit', function (e) {
        let data = new FormData(this);
        data.append('ajax', 'yes');
        e.preventDefault();
        $.ajax({
            url: this.action = '/',
            cache: false,
            processData: false,
            contentType: false,
            type: 'POST',
            data: data,
            dataType: 'JSON',
            success: function (data) {
                if (data != 'success') {

                    console.log('succes');

                    // if (data.mailSend) {
                    //     $('.pop-up--item').removeClass('active');
                    //     $('.pop-up--list, .pop-up--accepted').addClass('active');
                    //     $('#messagePlace').text(data.mailSend);
                    // } else {
                    //     $('.pop-up--item').removeClass("active");
                    //     $('.pop-up--list, .pop-up--error').addClass('active');
                    //     data.nameError ? $('#nameError').text(data.nameError) : $('#nameError').text('');
                    //     data.numberError ? $('#numberError').text(data.numberError) : $('#numberError').text('');
                    // }

                }
            }
        })
    })
})