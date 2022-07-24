<?php

/*
String to float
*/

$number1 = "0";
$number2 = $number1 + 2;
var_dump($number1);
var_dump($number2);

echo "\n";

/*
Integer to float
*/

$number3 = 10;
$number4 = $number3 + 0.5;
var_dump($number3);
var_dump($number4);


$text = "15 some text";
$textModified = $text + 4; /* Warning: A non-numeric value encountered*/
echo $textModified; 

echo "\n";
