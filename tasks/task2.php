<?php
$sum = 0;
$divider = 11;
for ($i = 0; $i <= 1000; $i++){
    $fNum = $i % $divider;
        if ($fNum == 0){
            $sum++;
        }
}
echo $sum;