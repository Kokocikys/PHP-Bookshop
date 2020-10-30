<?php
$split= ', ';
$max = 0;
$min = 100;
$mass = [];
for ($i = 0; $i < 10; $i++){
    $mass[$i] = rand(0,100);
    if ($mass[$i] > $max){
        $max = $mass[$i];
    }
    if ($mass[$i] < $min){
        $min = $mass[$i];
    }
}
echo $min.$split.$max;