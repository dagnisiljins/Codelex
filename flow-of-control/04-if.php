<?php
/*Write a program which prints “Sunday”, “Monday”, ... “Saturday” if the int variable "dayNumber" is 0, 1, ..., 6, respectively. Otherwise, it shall print "Not a valid day".
Use:
    a "nested-if" statement
    a "switch-case-default" statement.
 */


$dayNumber = readline('Please enter a day number from 0-6 (0 is sunday): '); // Change this value to test different day numbers

if ($dayNumber >= 0 && $dayNumber <= 6) {

    $dayNumber = intval($dayNumber); //readline input string is converted to number, otherwise program wont work

    if ($dayNumber === 0) {
        echo "Sunday";
    } elseif ($dayNumber === 1) {
        echo "Monday";
    } elseif ($dayNumber === 2) {
        echo "Tuesday";
    } elseif ($dayNumber === 3) {
        echo "Wednesday";
    } elseif ($dayNumber === 4) {
        echo "Thursday";
    } elseif ($dayNumber === 5) {
        echo "Friday";
    } else {
        echo "Saturday";
    }
} else {
    echo "Not a valid day";
}
