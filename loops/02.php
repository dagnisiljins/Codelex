<?php
// complete loop to multiply i with itself n times, it is NOT allowed to use built-in pow() function

echo "Input number of terms: ";
$terms = readline();

if ($terms <= 0) {
    echo "Please enter a positive integer.";
} else {
    echo "Enter the base number: ";
    $base = readline();
    $result = 1;

    if ($base == 0) {
        echo "Any number raised to the power of 0 is 1.";
    } else {
        for ($i = 1; $i <= $terms; $i++) {
            $result *= $base;
        }

        echo "$base raised to the power of $terms is: $result";
    }
}