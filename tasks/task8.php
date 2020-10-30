<?php
$alarm = 'Неверно указано число';
$year = $_POST['inYear'];
if ($year >= 1924){
$minYear = 1924;
$divider = 12;
$chinaYear = ["Крыса","Бык","Тигр","Кролик","Дракон","Змея","Лошадь","Коза","Обезьяна","Петух","Собака","Свинья"];
echo $chinaYear[fmod($year - $minYear,$divider)];}
else echo $alarm;