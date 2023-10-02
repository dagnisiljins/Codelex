<?php
// complete loop to multiply i with itself n times, it is NOT allowed to use built-in pow() function

$base = readline('Input base: ');

if ($base <= 0) {
    echo 'Enter positive number';
} else {
    $exponent = readline('Enter a exponent: ');
    $result = 1;
    if ($exponent == 0) {
        echo 'Any number raised to the power of 0 is 1.';
    } else {
        for ($i = 1; $i <= $exponent; $i++) {
            $result *= $base; //$base multiply $exponent times
        }
        echo 'Result is ' . $result;
    }
}


