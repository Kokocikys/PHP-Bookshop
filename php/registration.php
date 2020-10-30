<?php

$mysql = new Mysqli('127.0.0.1', 'root', 'root', 'library');

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

$password = md5($password."qwerty123"); //Превращаем пароль в хэш

$mysql -> query("INSERT INTO `авторизация` VALUES (NULL,'$login', '$email', '$password')");

header('Location: /');