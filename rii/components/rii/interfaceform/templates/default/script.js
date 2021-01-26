$(document).ready(function () {
    $(".form--wrapp").submit(function (event) {
        let customerName = document.getElementById("customerName").value;
        let customerNumber = document.getElementById("customerNumber").value;
        console.log(customerName, customerNumber);
        event.preventDefault();
        $.ajax({
            url: 'rii/components/rii/interfaceform/templates/default/email.php',
            cache: false,
            type: 'POST',
            data: {'customerName': customerName, 'customerNumber': customerNumber},
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