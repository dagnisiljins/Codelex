<?php
/*On your phone keypad, the alphabets are mapped to digits as follows: ABC(2), DEF(3), GHI(4), JKL(5), MNO(6), PQRS(7), TUV(8), WXYZ(9).

Write a program called PhoneKeyPad, which prompts user for a String (case insensitive), and converts to a sequence of keypad digits.

Use:

    a "nested-if" statement
    a "switch-case-default" statement

Hint: In switch-case, you can handle multiple cases by omitting the break statement, e.g.,

 */

function convertToPhoneKeyPad($inputString) {
    $inputString = strtoupper($inputString);
    $output = '';

    // Define a mapping of letters to numbers
    $letterToNumber = [
        'A' => '2', 'B' => '2', 'C' => '2',
        'D' => '3', 'E' => '3', 'F' => '3',
        'G' => '4', 'H' => '4', 'I' => '4',
        'J' => '5', 'K' => '5', 'L' => '5',
        'M' => '6', 'N' => '6', 'O' => '6',
        'P' => '7', 'Q' => '7', 'R' => '7', 'S' => '7',
        'T' => '8', 'U' => '8', 'V' => '8',
        'W' => '9', 'X' => '9', 'Y' => '9', 'Z' => '9',
    ];

    for ($i = 0; $i < strlen($inputString); $i++) {
        $char = $inputString[$i];

        if (isset($letterToNumber[$char])) {
            $digit = $letterToNumber[$char];

            // Calculate the number of times to repeat the digit based on its position in the alphabet
            $repeat = ord($char) - ord('A') + 1;

            if ($i > 0 && $digit === $output[strlen($output) - 1]) {
                $output .= ' '; // Insert a space to separate different digits
            }

            $output .= str_repeat($digit, $repeat);
        } else {
            // Handle other characters, like spaces or numbers
            $output .= $char;
        }
    }

    return $output;
}

// Prompt the user for input
echo "Enter a string to convert to phone keypad digits: ";
$userInput = readline();

$result = convertToPhoneKeyPad($userInput);
echo "Phone keypad sequence: $result\n";