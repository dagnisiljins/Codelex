<?php

function convertToPhoneKeyPad($inputString)
{
    $inputString = strtoupper($inputString);
    $output = '';

    for ($i = 0; $i < strlen($inputString); $i++) {
        $char = $inputString[$i];

        switch ($char) {
            case 'A':
                $digit = '2';
                break;
            case 'B':
                $digit = '22';
                break;
            case 'C':
                $digit = '222';
                break;
            case 'D':
                $digit = '3';
                break;
            case 'E':
                $digit = '33';
                break;
            case 'F':
                $digit = '333';
                break;
            case 'G':
                $digit = '4';
                break;
            case 'H':
                $digit = '44';
                break;
            case 'I':
                $digit = '444';
                break;
            case 'J':
                $digit = '5';
                break;
            case 'K':
                $digit = '55';
                break;
            case 'L':
                $digit = '555';
                break;
            case 'M':
                $digit = '6';
                break;
            case 'N':
                $digit = '66';
                break;
            case 'O':
                $digit = '666';
                break;
            case 'P':
                $digit = '7';
                break;
            case 'Q':
                $digit = '77';
                break;
            case 'R':
                $digit = '777';
                break;
            case 'S':
                $digit = '7777';
                break;
            case 'T':
                $digit = '8';
                break;
            case 'U':
                $digit = '88';
                break;
            case 'V':
                $digit = '888';
                break;
            case 'W':
                $digit = '9';
                break;
            case 'X':
                $digit = '99';
                break;
            case 'Y':
                $digit = '999';
                break;
            case 'Z':
                $digit = '9999';
                break;

            default:
                $digit = $char; // other characters

                break;
        }



        $output .= '->' . $digit;
    }

    return $output;
}


echo "Enter a string to convert to phone keypad digits: ";
$userInput = readline();

$result = convertToPhoneKeyPad($userInput);
echo "Phone keypad sequence: $result\n";
