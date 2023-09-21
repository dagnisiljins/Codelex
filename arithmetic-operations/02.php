<?php
//Write a program called CheckOddEven which prints "Odd Number" if the int variable “number” is odd,
// or “Even Number” otherwise. The program shall always print “bye!” before exiting.

function CheckEven(int $number): bool
{
    return $number % 2 == 0;
}

$number = readline('Enter a number: ');

//Ternary operator

echo CheckEven($number) ? 'Even number' : 'Odd number';

