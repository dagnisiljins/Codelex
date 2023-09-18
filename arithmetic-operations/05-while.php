<?php

$randomNumber = rand(1, 100);

while (true) {
    $guess = readline("Guess the number (or write 'codelex' to quit): ");

    if ($guess === 'codelex') {
        echo "Goodbye! The number was $randomNumber." . PHP_EOL;
        break; // Cikls tiek izbeigts.
    }

    if (!is_numeric($guess)) { //tiek pārbaudīts vai navievadīts skaitlis
        echo "Invalid input. Please enter a valid number or 'codelex' to quit." . PHP_EOL;
        continue; // Tiek izlaists cikls un sākts no sākuma.
    }

    //$guess = (int)$guess; // Ievadītā vērtība tiek nonvertēta uz integeru (int), jo readline ierakstītais ir strings
    // un lai salīdzinātu nepieciešams pārvērst par int.

    if ($guess == $randomNumber) {
        echo "Congratulations! You guessed it right. The number was $randomNumber." . PHP_EOL;
        break; // Cikls tiek izbeigts, ja skaitlis ir atminēts
    } elseif ($guess > $randomNumber) {
        echo "Too high. The number is lower than your guess." . PHP_EOL;
    } else {
        echo "Too low. The number is higher than your guess." . PHP_EOL;
    }
}