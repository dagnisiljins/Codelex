<?php


$base = readline('Input base: ');

if ($base <= 0) {
    echo 'Enter possitive number';
} else {
    $exponent = readline('Enter base number: ');

    if ($exponent == 0) {
        echo 'Any number raised to the power of 0 is 1.';
    } else {
        for ($i = 1; $i <= $exponent; $i++) {
            $result = $base * $base;
        }
        echo 'Result is' . $result;
    }
}


