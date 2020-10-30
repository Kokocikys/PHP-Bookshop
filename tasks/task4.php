<?php
$splitDot= '.';
$split= ' ';
$coolName = $_POST['coolName'];
$nameParts = explode(" ", $coolName);
echo $nameParts[0].$split;
for ($i = 1; $i < count($nameParts); $i++){
$word = $nameParts[$i];
$word = preg_split('//u',$word,-1,PREG_SPLIT_NO_EMPTY);
echo $word[0].$splitDot;}
