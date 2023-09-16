<?php
// Write a program to accept two integers and return true if the either one is 15 or if their sum or difference is 15.
function diff(int $a, int $b): bool
{
    if ($a =15 || $b = 15){
        return true;
    }
    if (($a + $b) == 15 || ($a-$b == 15)){
        return true;
    }
    return false;
}

$a = readline("Enter A: ");
$b = readline("Enter B: ");

if (diff($a, $b))
{
    echo 'Statement is true.';
} else {
    echo 'Statement is false.';
}
