<?php
//Create a function that accepts 2 integer arguments. First argument is a base value and the second one is a value its
// been multiplied by. For example, given argument 10 and 5 prints out 50

$number = readline('Give a number:');
$multiplier = readline('Give amultiplier:');

function multiply (int $number, int $multiplier): int
{
    return $number * $multiplier;
}

echo multiply($number, $multiplier);
