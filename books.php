<?
require_once "php/database.php";
require_once "php/functions.php";
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='style.css'>
    <title>Перечень произведений</title>
    <link rel="shortcut icon" href="img/favicon.ico">
</head>

<body>
<div id="top" class="row">
    <nav class="nav">
        <div class="col-6">
            <div class="row justify-content-start">
                <a class="navigation" href="index.html">Главная</a>
                <a class="navigation" href="bookwriter.php">Авторы</a>
                <a class="navigationActive" href="books.php">Книги</a>
            </div>
        </div>
        <div class="col-6">
            <div class="row justify-content-end">
                <a class="navigation" href="authenticationPage.php">Мой кабинет</a>
                <a class="navigation" href="registrationPage.html">Создать личный кабинет</a>
            </div>
        </div>
    </nav>
</div>

<button onclick="topFunction()" id="topButton" title="Go to top">&#5169;</button>

<div class="row justify-content-center">Произведения</div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <?
        $page = isset ($_GET['page']) ? $_GET['page'] : 1;

        $limit = 6;
        $offset = $limit * ($page - 1);

        $posts = get_positions($limit, $offset);
        foreach ($posts as $key => $post):{
            ?>
            <div class="col-md-5" id="bookBlock">
                <div class="row">
                    <div class="col-6 col-md-5">
                        <img src="<? echo $post['CoverPath'];} ?>" width="250" height="400">
                    </div>
                    <div class="col-6 col-md-7">
                        <div class="row" id="bookNameAndAuthor">
                            <? echo $post['BookName'] . ' – ' . $post['author'] ?>
                        </div>
                        <div class="bookInfo">
                            Литературу невозможно представить без классики. Словно эталон писательского мастерства,
                            напряженности сюжета, образов героев и идей, пронизывающих произведение, классическая литература
                            возвышается над прочими работами. Ей не страшны время и обстоятельства, ведь лучшие произведения
                            всегда найдут своего читателя.
                        </div>
                        <div class="row" id="bookOffer">
                            <button class="button" id="button">Заказать</button>
                        </div>
                    </div>
                </div>
            </div>
        <? endforeach; ?>
    </div>
</div>

<div id="pageChoose">Выберете страницу
    <select name="pageSelect" id="pageSelect">
        <? for ($i = 0; $i < $numberOfPages = numberOfPages($limit)[0]; $i++) {
            echo '<option value="', $i + 1, '">', $i + 1, '</option>';
        }?>
    </select>
</div>

<div class="row justify-content-between">
    <div class="col-4">
        <button class="buttonAddBook" id="buttonAddBook">Предложить книгу</button>
    </div>
    <div class="col-4">
        <button class="buttonBackToMainPage">Вернуться наверх</button>
    </div>
</div>

<div class="overlayAddBook">
    <div class="popup">
        <div id="bookName">
            <form method="post" name="formNameAddBook">
                <h3>Добавить книгу</h3>
                <p>Название книги: <br><input type="text" name="title" class="title"></p>
                <p>Автор книги: <br><input type="text" name="author" class="author"></p>
                <p>Обложка: <br><input type="text" name="cover" class="cover"><br></p><br>
                <button type="submit" id="sentBook">Предложить книгу</button>
            </form>
        </div>
        <div class="close-popup">X</div>
    </div>
</div>

<div class="overlay">
    <div class="popup">
        <div class="popupContent">
            <form method="post" name="bookOrder">
                <legend>Оформление заказа</legend>
                <span class="whichBook"></span>
                <p></p>
                <p><input type="text" name="username" placeholder="Ваше ФИО" required pattern="^[А-Яа-яЁё\s]+$"></p>
                <p><input type="email" name="email" placeholder="Ваш email" required id="emailCheck"></p>
                <p><input type="text" name="note" placeholder="Примечание"><br></p>
                <button type="submit">Отправить заказ</button>

            </form>
            <div class="close-popup" id="closeBookOrder">X</div>
        </div>
    </div>
</div>

<script src="JavaScript/jquery-3.5.1.js"></script>
<script src="JavaScript/appBooks.js"></script>
<script src="JavaScript/topButton.js"></script>

</body>