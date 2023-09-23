<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2165, 1457, 2456
];

echo "Original numeric array: ";
echo implode(', ', $numbers); // Display the original numeric array
echo PHP_EOL; // Add a line break for clarity

sort($numbers); // Sort the numeric array

echo "Sorted numeric array: ";
echo implode(', ', $numbers); // Display the sorted numeric array
echo PHP_EOL; // Add a line break for clarity

$words = [
    "Java",
    "Python",
    "PHP",
    "C#",
    "C Programming",
    "C++"
];

echo "Original string array: ";
echo implode(', ', $words); // Display the original string array
echo PHP_EOL; // Add a line break for clarity

sort($words); // Sort the string array

echo "Sorted string array: ";
echo implode(', ', $words); // Display the sorted string array
echo PHP_EOL; // Add a line break for clarity
