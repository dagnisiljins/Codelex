<?php

function convertToPhoneKeyPad($inputString)
{
    $inputString = strtoupper($inputString);
    $output = '';

    for ($i = 0; $i < strlen($inputString); $i++) {
        $char = $inputString[$i];

        switch ($char) {
            case 'A':
            case 'B':
            case 'C':
                $digit = '2';
                $repeat = ord($char) - ord('A') + 1;
                break;
            case 'D':
            case 'E':
            case 'F':
                $digit = '3';
                $repeat = ord($char) - ord('D') + 1;
                break;
            case 'G':
            case 'H':
            case 'I':
                $digit = '4';
                $repeat = ord($char) - ord('G') + 1;
                break;
            case 'J':
            case 'K':
            case 'L':
                $digit = '5';
                $repeat = ord($char) - ord('J') + 1;
                break;
            case 'M':
            case 'N':
            case 'O':
                $digit = '6';
                $repeat = ord($char) - ord('M') + 1;
                break;
            case 'P':
            case 'Q':
            case 'R':
            case 'S':
                $digit = '7';
                $repeat = ord($char) - ord('P') + 1;
                break;
            case 'T':
            case 'U':
            case 'V':
                $digit = '8';
                $repeat = ord($char) - ord('T') + 1;
                break;
            case 'W':
            case 'X':
            case 'Y':
            case 'Z':
                $digit = '9';
                $repeat = ord($char) - ord('W') + 1;
                break;
            default:
                $digit = $char; // other characters
                $repeat = 1;
                break;
        }

        if ($i > 0 && $digit === $output[strlen($output) - 1]) {
            $output .= ' '; // separate different digits
        }

        $output .= str_repeat($digit, $repeat);
    }

    return $output;
}


echo "Enter a string to convert to phone keypad digits: ";
$userInput = readline();

$result = convertToPhoneKeyPad($userInput);
echo "Phone keypad sequence: $result\n";


