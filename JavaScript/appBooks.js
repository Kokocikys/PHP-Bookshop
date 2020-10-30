//добавление книги


$(document).ready(function () {
    $("#sentBook").click(function (e) {
        let title = $('input.title').val();
        let author = $('input.author').val();
        let cover = $('input.cover').val();
        e.preventDefault();
        $.ajax({
            url: 'php/bookadding.php',
            type: 'POST',
            data: {'title': title, 'author': author, 'cover': cover},
            success: function (data) {
                if (data != 'success') {
                    alert('Книга добавлена на рассмотрение');
                } else alert('Что-то пошло не так');
            }
        })
    })
})

//постраничность
function getUrlParameter(url, parameter) {
    parameter = parameter.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    let regex = new RegExp('[\\?|&]' + parameter.toLowerCase() + '=([^&#]*)');
    let results = regex.exec('?' + url.toLowerCase().split('?')[1]);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}

function setUrlParameter(url, key, value) {

    let baseUrl = url.split('?')[0],
        urlQueryString = '?' + url.split('?')[1],
        newParam = key + '=' + value,
        params = '?' + newParam;

    // If the "search" string exists, then build params from it
    if (urlQueryString) {
        let updateRegex = new RegExp('([\?&])' + key + '[^&]*');
        let removeRegex = new RegExp('([\?&])' + key + '=[^&;]+[&;]?');

        if (typeof value === 'undefined' || value === null || value === '') { // Remove param if value is empty
            params = urlQueryString.replace(removeRegex, "$1");
            params = params.replace(/[&;]$/, "");

        } else if (urlQueryString.match(updateRegex) !== null) { // If param exists already, update it
            params = urlQueryString.replace(updateRegex, "$1" + newParam);

        } else { // Otherwise, add it to end of query string
            params = urlQueryString + '&' + newParam;
        }
    }
    // no parameter was set so we don't need the question mark
    params = params === '?' ? '' : params;

    return baseUrl + params;
}

let pageSelect = document.getElementById('pageSelect');
let currentPage = getUrlParameter(window.location.href, 'page');

if (currentPage) {
    pageSelect.value = currentPage;
}

pageSelect.addEventListener('change', function (event) {
    let value = event.target.value;
    window.location.href = setUrlParameter(window.location.href, 'page', value);
});

//проверка вводимых данных popup
let emailValidCheck = document.getElementById("emailCheck");
emailValidCheck.addEventListener("input", function (event) {
    if (emailValidCheck.validity.typeMismatch) {
        emailValidCheck.setCustomValidity("Неправильно введен email");
    } else {
        emailValidCheck.setCustomValidity("");
    }
});

//popup заказ
$('.button').click(function () {
    $('.whichBook').html($(this).parents('#bookBlock').find('#bookNameAndAuthor').html());
    $('.overlay').fadeIn(200);
});
$('.close-popup').click(function () {
    $('.overlay').fadeOut();
});
$(document).mouseup(function (e) {
    let popup = $('.popup');
    if (e.target != popup[0] && popup.has(e.target).length === 0) {
        $('.overlay').fadeOut(200);
    }
});

$(document).ready(function () {
    $('[name="bookOrder"]').submit(function (e) {
        let title = $('input[name="username"]').val();
        let author = $('input[name="email"]').val();
        let cover = $('input[name="note"]').val();
        let bookName = $('.whichBook').html().trim();
        e.preventDefault();
        $.ajax({
            url: 'mail.php',
            type: 'POST',
            data: {username: title, email: author, note: cover, bookName: bookName},
            success: function (data) {
                if (data != 'success') {
                    $('#closeBookOrder').trigger("click");
                    $('input[name="username"]').val('');
                    $('input[name="email"]').val('');
                    $('input[name="note"]').val('');
                    $('.whichBook').html('');
                } else alert('Что-то пошло не так');
            }
        })
    })
})

//popup предложить товар
$('.buttonAddBook').click(function () {
    $('.overlayAddBook').fadeIn("fast");
});
$('.close-popup').click(function () {
    $('.overlayAddBook').fadeOut();
});
$(document).mouseup(function (e) {
    let popup = $('.popup');
    if (e.target != popup[0] && popup.has(e.target).length === 0) {
        $('.overlayAddBook').fadeOut("fast");
    }
});

$('.buttonBackToMainPage').click(function () {
    document.location.href = "books.php";
});

//отправка на email
function send(event, php) {
    event.preventDefault ? event.preventDefault() : event.returnValue = false;
    let req = new XMLHttpRequest();
    req.open('POST', php, true);
    req.onload = function () {
        if (req.status >= 200 && req.status < 400) {
            json = JSON.parse(this.response);
            console.log(json);
            if (json.result == "success") {
                alert("Сообщение отправлено");
            } else {
                alert("Ошибка. Сообщение не отправлено");
            }
        } else {
            alert("Ошибка сервера. Номер: " + req.status);
        }
    };
    req.onerror = function () {
        alert("Ошибка отправки запроса");
    };
    req.send(new FormData(event.target));
}