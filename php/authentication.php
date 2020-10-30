<?php

$mysql = new mysqli('127.0.0.1', 'root', 'root', 'library');

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$password = md5($password."qwerty123"); //Превращаем пароль в хэш

$result = $mysql -> query("SELECT * FROM `авторизация` WHERE `login` = '$login' AND `password` = '$password'");
$user = $result->fetch_assoc();

if($user == NULL){
    echo $warning = 'Логин или пароль введен неправильно!';
    exit();
}

setcookie('user',$user['login'], time() + 300,"/");
header('Location: /');