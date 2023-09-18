<?php
// Write a program that picks a random number from 1-100. Give the user a chance to guess it. If they get it right,
// tell them so. If their guess is higher than the number, say "Too high." If their guess is lower than the number,
// say "Too low." Then quit. (They don't get any more guesses for now.)

$randomNumber = rand(1, 100);

$guess = readline("Enter a random number between 1 and 100: ");

if ($guess == $randomNumber) {
    echo "Congratulations! You guessed it right. The number was $randomNumber." . PHP_EOL;
} elseif ($guess > $randomNumber) {
    echo "Too high. The number is lower than your guess." . PHP_EOL;
} else {
    echo "Too low. The number is higher than your guess." . PHP_EOL;
}

