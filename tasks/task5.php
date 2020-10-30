<?php
$minute = $_POST['minute'];
while ($minute > 4) {
    $minute = $minute - 4;
}
if ($minute <=2) {
    echo 'green';
}
else echo 'red';