<?php


function convertToPhoneKeyPadNestedIf($input)
{
    $input = strtoupper($input);

    $output = '';

    for ($i = 0; $i < strlen($input); $i++) {
        $char = $input[$i];

        if ($char >= 'A' && $char <= 'C') {
            $output .= '2';
        } elseif ($char >= 'D' && $char <= 'F') {
            $output .= '3';
        } elseif ($char >= 'G' && $char <= 'I') {
            $output .= '4';
        } elseif ($char >= 'J' && $char <= 'L') {
            $output .= '5';
        } elseif ($char >= 'M' && $char <= 'O') {
            $output .= '6';
        } elseif ($char >= 'P' && $char <= 'S') {
            $output .= '7';
        } elseif ($char >= 'T' && $char <= 'V') {
            $output .= '8';
        } elseif ($char >= 'W' && $char <= 'Z') {
            $output .= '9';
        } else {
            $output .= $char; // If the character is not a letter, keep it as is
        }
    }

    return $output;
}

$input = readline("Enter a string: ");


$resultNestedIf = convertToPhoneKeyPadNestedIf($input);

echo "Keypad digits: $resultNestedIf\n";
