//1
let inputs = document.querySelectorAll('.chBox')  // querySelectorAll – Обращение к нужному элементу
let a = 0
for (let i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('click', function (event) {    // addEventListener – добавление "смотрящего" за действием по параметру
        if (this.checked) {
            a++
        } else {
            a--
        }
        if (a >= 3) {
            this.checked = false;
            a = 2
        }
    })
}

//2
let allLinks = document.querySelectorAll('a')
let arr = Array.from(allLinks)                          // Array.from – создание массива из элемента
arr.forEach(function (item) {
    if (item.href == 'https://vk.com/ilya_chernetckiy') {
        item.target = '_blank'
    }
})

//3
let width = document.getElementById('w')
let height = document.getElementById('h')
let block = document.getElementById('block')
width.addEventListener('input', function () {
    block.style.width = width.value + 'px'
})     //   addEventListener(type, listener[, options]);
height.addEventListener('input', function () {
    block.style.height = height.value + 'px'
}) // Type – на что тригер, Listener – что будет реагировать, Option – как отреагирует

//4
let nameSize = document.getElementById('longName')
nameSize.oninput = function () {                                      // oninput – обновление данных при каждом новом символе в поле ввода
    let b = 50;
    let resetLine = document.getElementById('reset')
    for (let i = 0; i <= nameSize.value.length; i++) {
        if (i <= b) {
            resetLine.innerHTML = 'Оставшееся количество символов: ' + (b - i)
        }
        else {
            resetLine.innerHTML = 'Привышен лимит на: ' + (i - b)
        }
    }
}

//php4
$(document).ready(function () {
    $("#shortNameTask").submit(function (event) {
        let coolName = document.getElementById('longName').value
        event.preventDefault()
        $.ajax({
            url: 'tasks/task4.php',
            type: 'POST',
            cache: false,
            data: {'coolName': coolName},
            success: function (data) {
                if (data != 'success') {
                    let shortName = document.getElementById('shortNamePlace')
                    shortName.innerHTML = 'Ваши данные: ' + data
                }
            }
        })
    })
})

//php4_1
$(document).ready(function () {
    $("#shortNameTask").submit(function (event) {
        let coolNum = document.getElementById('cancel').value
        event.preventDefault()
        $.ajax({
            url: 'tasks/task4_1.php',
            type: 'POST',
            cache: false,
            data: {'coolNum': coolNum},
            success: function (data) {
                if (data != 'success') {
                    let shortNum = document.getElementById('shortNumPlace')
                    shortNum.innerHTML = ' , ' + data
                }
            }
        })
    })
})

//5
let colors = ['red', 'green', 'black', 'brown', 'purple', 'grey', 'orange', 'blue', 'yellow']
element = document.getElementById('colors')

function rand() {
    return Math.floor(Math.random() * colors.length)
}

symbol = element.innerHTML
let anyColor = colors.length
let sameCheck = 0
let result = ''
for (let i = 0; i < symbol.length; i++) {
    anyColor = rand()
    if (anyColor === sameCheck) {
        while (anyColor === sameCheck) {
            anyColor = rand()
        }
    }
    result += '<span style = "color: ' + colors[anyColor] + '">' + symbol[i] + '</span>'   // span – просто позволяет всталять что угодно где угодно
    sameCheck = anyColor
}
element.innerHTML = result

//js6/php0
$(document).ready(function () {
    $("#task6").submit(function (event) {
        let num = document.getElementById('inputNumber').value
        event.preventDefault()
        $.ajax({
            url: 'tasks/task0.php',
            type: 'POST',
            cache: false,
            data: {'number': num},
            success: function (data) {
                if (data != 'success') {
                    let carsString = document.getElementById('cars')
                    carsString.innerHTML = 'Ваши варианты: ' + data
                }
            }
        })
    })
})

//7
let gradik = document.getElementById('gradik')
gradEl = gradik.innerHTML
let fin = ''
for (let i = 0; i < gradEl.length; i++) {
    fin += '<span style="color: rgb(255,' + (i * 35) + ',180)">' + gradEl[i] + '</span>'
}
gradik.innerHTML = fin

//8
let letterCancel = document.getElementById('cancel')
letterCancel.addEventListener("keydown", function (event) {
    if (event.keyCode == 111 || event.keyCode == 106 || event.keyCode == 109 || event.keyCode == 189 || event.keyCode == 187)
        event.preventDefault()
})

//9
let prank = document.getElementById('prank')
let prankString = document.getElementById('prankString')

let timerId = setInterval(function () {
    s = prank.innerHTML
    s--
    prank.innerHTML = s
    if (s == 0) {
        clearInterval(timerId)
        prankString.innerHTML = 'Время вышло!'
    }
}, 1000)

//10
let clickCount = document.getElementById('clickCount')
n = clickCount.innerHTML
window.addEventListener('click', function () {
    n++
    clickCount.innerHTML = n
})

//php1
$(document).ready(function () {
    $("#numSum").submit(function (event) {
        let col = 0
        let numSum = document.getElementById('numSumInput').value
        event.preventDefault()
        $.ajax({
            url: 'tasks/task1.php',
            type: 'POST',
            cache: false,
            data: {'numberSum': numSum, 'numOfNum': col},
            success: function (data) {
                if (data != 'success') {
                    let stringNumSum = document.getElementById('stringNumSum')
                    stringNumSum.innerHTML = 'Результат: ' + data
                }
            }
        })
    })
})

//php5
$(document).ready(function () {
    $("#minuteTask").submit(function (event) {
        let col = 0
        let minute = document.getElementById('minuteInput').value
        event.preventDefault()
        $.ajax({
            url: 'tasks/task5.php',
            type: 'POST',
            cache: false,
            data: {'minute': minute},
            success: function (data) {
                if (data != 'success') {
                    let trafficLights = document.getElementById('trafficLights')
                    trafficLights.innerHTML = '<span style="color:' + data + ' ">этим цветом.</span>'
                }
            }
        })
    })
})

//php7
function rollFunc() {
    $.ajax({
        url: 'tasks/task7.php',
        type: 'POST',
        cache: false,
        success: function (data) {
            let rollRes = document.getElementById('cardPlace')
            rollRes.innerHTML = data
        }
    })
}

//php8
$(document).ready(function () {
    $("#yearTask").submit(function (event) {
        let year = document.getElementById('yearInput').value
        event.preventDefault()
        $.ajax({
            url: 'tasks/task8.php',
            type: 'POST',
            cache: false,
            data: {'inYear': year},
            success: function (data) {
                if (data != 'success') {
                    let animalPlace = document.getElementById('animalPlace')
                    animalPlace.innerHTML = 'Год под знаком: ' + data
                }
            }
        })
    })
})

//Автор
$('.VKpage').click(function () {
    document.location.href = "https://vk.com/ilya_chernetckiy";
});