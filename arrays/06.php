<?php
// Write a program to play a word-guessing game like Hangman.
//
//    It must randomly choose a word from a list of words.
//    It must stop when all the letters are guessed.
//    It must give them limited tries and stop after they run out.
//    It must display letters they have already guessed (either only the incorrect guesses or all guesses).

$words = ["codelex", "computer", "programming", "hangman", "learning"]; // List of words to choose from

while (true) {
    $chosenWord = $words[array_rand($words)]; // Randomly choose a word from the list
    $wordLength = strlen($chosenWord); //checks length of chosen word
    $attempts = 6; // Number of allowed wrong answers

    $guessedWord = str_repeat("_ ", $wordLength); // Initialize the guessed word with underscores
    $missedLetters = "";

    echo "Word: $guessedWord\n";

    $gameWon = false; // Flag to track if the game was won

    while ($attempts > 0) {
        $guess = readline("Guess a letter: ");

        if (strlen($guess) !== 1 || !ctype_alpha($guess)) { //Checks if entered 1 character and if its alphabetic character (letter)
            echo "Please enter a single letter.\n";
            continue;
        }

        if (strpos($chosenWord, $guess) !== false) {
            for ($i = 0; $i < $wordLength; $i++) {
                if ($chosenWord[$i] === $guess) {
                    $guessedWord[$i * 2] = $guess;
                }
            }
        } else {
            $missedLetters .= $guess;
            $attempts--;
        }

        echo "\nWord: $guessedWord\n";
        echo "Misses: $missedLetters\n";

        if (str_replace(' ', '', $guessedWord) === $chosenWord) { //space between words are removed
            // str_replace function, then string can be compered
            echo "\nYOU GOT IT!\n";
            $gameWon = true; // Set the gameWon flag to true
            break;
        }

        if ($attempts === 0) {
            echo "\nYou've run out of attempts. The word was '$chosenWord'.\n";
            break;
        }
    }

    $playAgain = strtolower(readline("Play 'again' or 'quit'? "));
    if ($playAgain !== "again") {
        echo "Goodbye!\n";
        break; // End the script if the player chooses to quit
    }

    if (!$gameWon) {
        echo "Restarting the game...\n";
    }
}
