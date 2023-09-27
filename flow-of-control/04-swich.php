<?php
/*Write a program which prints “Sunday”, “Monday”, ... “Saturday” if the int variable "dayNumber" is 0, 1, ..., 6, respectively. Otherwise, it shall print "Not a valid day".
Use:
    a "nested-if" statement
    a "switch-case-default" statement.
 */

$dayNumber = readline("Enter a day number (0-6): ");

if (is_numeric($dayNumber) && ctype_digit($dayNumber)) {
    $dayNumber = intval($dayNumber); //readline input string is converted to number, otherwise program wont work

    if ($dayNumber >= 0 && $dayNumber <= 6) {
        switch ($dayNumber) {
            case 0:
                echo "Sunday";
                break;
            case 1:
                echo "Monday";
                break;
            case 2:
                echo "Tuesday";
                break;
            case 3:
                echo "Wednesday";
                break;
            case 4:
                echo "Thursday";
                break;
            case 5:
                echo "Friday";
                break;
            case 6:
                echo "Saturday";
                break;
        }
    } else {
        echo "Not a valid day";
    }
} else {
    echo "Invalid input. Please enter a valid day number (0-6).";
}
