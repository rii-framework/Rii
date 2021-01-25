$(document).ready(function () {
    $("#form-callback").submit(function (event) {
        let customerName = document.getElementById("customerName").value;
        let customerEmail = document.getElementById("customerEmail").value;
        let customerNumber = document.getElementById("customerNumber").value;
        event.preventDefault();
        $.ajax({
            url: 'rii/components/rii/interfaceform/templates/default/email.php',
            cache: false,
            type: 'POST',
            data: {'customerName': customerName, 'customerEmail': customerEmail, 'customerNumber': customerNumber},
            dataType: 'JSON',
            success: function (data) {
                if (data != 'success') {
                    data.mailSend ? $('#messagePlace').text(data.mailSend) : $('#messagePlace').text(''); // Вместо отдельного <div id="messagePlace"></div> будет выделенное место в popup
                    data.nameError ? $('#nameError').text(data.nameError) : $('#nameError').text(''); // А тут в каждый <div class="form-group"> можно добавить <div id='errorname'> для вывода ошибок
                    data.emailError ? $('#emailError').text(data.emailError) : $('#emailError').text('');
                    data.numberError ? $('#numberError').text(data.numberError) : $('#numberError').text('');
                }
            }
        })
    })
})