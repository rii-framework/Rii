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
                alert('+');
                $('.pop-up--item').removeClass('active');
                $('.pop-up--list').addClass('active').text(data);
            }
        })
    })
})