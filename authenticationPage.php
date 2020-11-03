<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Авторизация</title>
    <link rel="stylesheet" type="text/css" href='style.css'/>
    <link rel="shortcut icon" href="img/favicon.ico">
</head>

<body>

<div id="top" class="row">
    <nav class="nav">
        <div class="col-6">
            <div class="row justify-content-start">
                <a class="navigation" href="index.html">Главная</a>
                <a class="navigation" href="bookwriter.php">Авторы</a>
                <a class="navigation" href="books.php">Книги</a>
            </div>
        </div>
        <div class="col-6">
            <div class="row justify-content-end">
                <a class="navigationActive"  href="authenticationPage.php">Мой кабинет</a>
                <a class="navigation" href="registrationPage.html">Создать личный кабинет</a>
            </div>
        </div>
    </nav>
</div>


<div class="authenticationBlock">
    <? if ($_COOKIE['user'] == ''): ?>
        <h2 style="font-size: 27px;">Аутентификация пользователя</h2>
            <form action="php/authentication.php" method="post" id="authenticationForm">
                <span>Введите ваш логин</span>
                <input required class="form-control" type='text' name='login' placeholder="Логин" class="login" id='login'><br>
                <span>Введите пароль</span>
                <input required class="form-control" type='password' name='password' placeholder="Пароль" class="password" id='password'>
                <span id="authenticationError" style="color: firebrick">.</span>
                <div class="row justify-content-between">
                    <div class="col-4">
                        <button type="submit" id="authentication">Отправить</button>
                    </div>
                    <div class="col-4">
                        <input class="form-check-input" type="checkbox" onclick="visibility()">Show Password<br>
                    </div>
                </div>
                <br>
                <a href="index.html">Назад</a>
            </form>
    <? else: ?>
        <p> Привет, <?= $_COOKIE['user'] ?>! Чтобы выйти из аккаунта, нажите <a href="php/exit.php">здесь</a>.</p>
    <? endif; ?>
</div>

<!--<script src="JavaScript\authenticationError.js"></script>-->
<script src="JavaScript/passwordVisibility.js"></script>
<script src="JavaScript/jquery-3.5.1.js"></script>

</body>