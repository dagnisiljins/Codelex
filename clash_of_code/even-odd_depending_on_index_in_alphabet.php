<?php
//Vārdu spēle, katram burtam ir savs indekss 0=>A ... 25=>Z, jāuztaisa aprēķins, kurā even numbers - odd numbers,
// atkarībā no pozīcijas alfabētā, burta indekss jāiedala even un odd numuros un jāaprēķina starpība.

$words = [
    'JARDEL',
    'Dagnis',
    'maija'
];

// Define the alphabet
$alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

// Initialize variables to store the sums of even and odd indices
$evenSum = 0;
$oddSum = 0;

// Iterate through the characters in the input string
foreach ($words as $word) {
    $evenSum = 0;
    $oddSum = 0;

    for ($i = 0; $i < strlen($word); $i++) {
        $char = strtoupper($word[$i]); // Convert to uppercase to handle both cases

        // Check if the character is a letter
        if (strpos($alphabet, $char) !== false) {
            $index = strpos($alphabet, $char); // Get the index of the letter

            // Check if the index is even or odd
            if ($index % 2 == 0) {
                $evenSum += $index;
            } else {
                $oddSum += $index;
            }
        }
    }
    $difference = $evenSum - $oddSum;
    echo($difference . "\n");

}

