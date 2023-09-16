<?php
//Create an non-associative array with 5 elements where 3 are integers, 1 float and 1 string.
// Create a for loop that iterates non-associative array using php in-built function
// that determines count of elements in the array. Create a function that doubles the integer number.
// Within the loop using php in-built function print out the double of the number value
// (using your custom function)

// Create a non-associative array with mixed data types
$array = [5, 8, 10, 3.5, "Hello"];

// Function to double an integer
function doubleInteger($number)
{
    if (is_int($number)) {
        return $number * 2;
    } else {
        return $number; // Return unchanged for non-integer values
    }
}

// Get the count of elements in the array
$arrayCount = count($array);

// Loop through the array
for ($i = 0; $i < $arrayCount; $i++) {
    $element = $array[$i];
    $doubledElement = doubleInteger($element);
    echo "Element at index $i: $doubledElement" . PHP_EOL;
}
