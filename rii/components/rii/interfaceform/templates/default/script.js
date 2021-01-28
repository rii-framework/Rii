$(document).ready(function () {
    $(".form--wrapp").on('submit', function (e) {
        let data = new FormData(this);
        data.append('ajax', 'yes');
        e.preventDefault();
        $.ajax({
            url: this.action,
            cache: false,
            processData: false,
            contentType: false,
            type: 'POST',
            data: data,
            dataType: 'JSON',
            success: function (data) {
                if (data.succes) {
                    $('.pop-up--item').removeClass("active");
                    $('.pop-up--list, .pop-up--accepted').addClass('active');
                    $('.message').text(data.succes);
                }
                if (data.failed) {
                    $('.pop-up--item').removeClass("active");
                    $('.pop-up--list, .pop-up--error').addClass('active');
                    $('.message').text(data.failed);
                }
            }
        })
    })
})