<?php

$link = new Mysqli('127.0.0.1', 'root', 'root', 'library');

$title = $_POST['title'];
$author = $_POST['author'];
$cover = $_POST['cover'];

$query = $link->query("INSERT INTO `рассмотрение` VALUES(NULL,'$title','$author','$cover')");
