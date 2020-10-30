<?php
$s = $_POST['numberSum'];
$arr = str_split($s);
$sum = 0;
$col = 0;
for ($i = 0; $i < count($arr); $i++){
    $sum += $arr[$i];
    if ($arr[$i] == 3) {$col++;}
}
echo $sum;
//echo $col;