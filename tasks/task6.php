<?php
$yearCheck = $_POST['year'];
$divider = 4;
$fNum = fmod($yearCheck,$divider);
if ($fNum == 0) {
    echo 'Високосный';
}
else echo 'Невисокосный ';