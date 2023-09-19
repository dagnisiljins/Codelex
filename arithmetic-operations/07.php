<?php
//Modify the example program to compute the position of an object after falling for 10 seconds,
// outputting the position in meters.


$a = -9.81;       // Acceleration in m/s^2
$t = readline('Enter a fall time in seconds: ');          // Time in seconds
$Vi = 0;          // Initial velocity in m/s
$Xi = 0;          // Initial position in meters


$x = $Xi + ($Vi * $t) + (0.5 * $a * $t * $t);


echo "The position of the object after $t seconds is: $x meters" . PHP_EOL;