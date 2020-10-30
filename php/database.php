<?php

$server = '127.0.0.1';
$login = 'root';
$pass = 'root';
$name_db = 'library';

$data = [$server, $login, $pass, $name_db];

$link = mysqli_connect($server, $login, $pass, $name_db);