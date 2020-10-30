<?php
$coolNum = $_POST['coolNum'];
$num = str_split($coolNum);
for ($i = 0; $i < count($num); $i++){
    if ($i >= 4) echo $num[$i];
}
