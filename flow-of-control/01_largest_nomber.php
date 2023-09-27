<?php


echo "Input the 1st number: ";
$number1 = floatval(readline());

echo "Input the 2nd number: ";
$number2 = floatval(readline());

echo "Input the 3rd number: ";
$number3 = floatval(readline());

$largestNumber = max($number1, $number2, $number3);

echo "The largest number is: $largestNumber\n";