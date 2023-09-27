<?php
//Write a program that reads an positive integer and count the number of digits the number has.

echo "Enter a positive integer: ";
$number = intval(readline());

if ($number < 0) {
    echo "Please enter a positive integer.\n";
} else {
    $digitCount = strlen((string)$number);
    echo "Number of digits: $digitCount\n";
}