<?
require_once "php/database.php";
require_once "php/functions.php";
$result1 = mysqli_query($link, "SELECT * FROM `автор`");
$result1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
$result2 = mysqli_query($link, "SELECT * FROM `книга`");
$result2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href='style.css'/>
    <title>Перечень авторов</title>
    <link rel="shortcut icon" href="img/favicon.ico">
</head>

<body>

<div id="top" class="row">
    <nav class="nav">
        <div class="col-6">
            <div class="row justify-content-start">
                <a class="navigation" href="index.html">Главная</a>
                <a class="navigationActive" href="bookwriter.php">Авторы</a>
                <a class="navigation" href="books.php">Книги</a>
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

<div class="row justify-content-center">Авторы</div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <? foreach ($result1 as $author) { ?>
            <div class="col-md-5" id="authorBlock">
                <div class="row">
                    <div class="col-6 col-md-5"><img
                                src="<? echo $author['PhotoPath'] . ' "alt=" ' . $author['Fullname'] ?>" width="300"
                                height="400">
                    </div>
                    <div class="col-6 col-md-7" id="authorBookHistory"><p><? echo $author['Fullname']; ?></p>
                        <ul>
                            <?
                            foreach ($result2 as $book)
                                if ($author['Fullname'] == $book['author']) {
                                    echo '<li>' . $book['BookName'] . '</li>';
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        <? } ?>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-3">
        <button class="buttonBackToMainPage">Перейти к покупке</button>
    </div>
</div>

<script src="JavaScript/jquery-3.5.1.js"></script>
<script src="JavaScript/appBookwriter.js"></script>
<script src="JavaScript/topButton.js"></script>

</body>