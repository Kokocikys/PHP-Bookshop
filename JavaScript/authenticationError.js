$(document).ready(function () {
    $("#authenticationForm").submit(function (e) {
        let login = $('input.login').val();
        let password = $('input.password').val();
        e.preventDefault();
        $.ajax({
            url: 'php/authentication.php',
            type: 'POST',
            cache: false,
            data: {'login': login, 'password': password},
            success: function (data) {
                if (data != 'success') {
                    let warning = document.getElementById('authenticationError');
                    warning.innerHTML = data;
                }
            }
        })
    })
})