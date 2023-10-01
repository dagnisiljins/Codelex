<?php
// Write a program that asks the user to enter two words. The program then prints out both words on one line.
// The words will be separated by enough dots so that the total line length is 30:

echo "Enter first word: ";
$firstWord = readline();

echo "Enter second word: ";
$secondWord = readline();


$totalLength = 30;
$dotCount = $totalLength - strlen($firstWord) - strlen($secondWord);


$line = $firstWord;
for ($i = 0; $i < $dotCount; $i++) {
    $line .= "."; //adding dots
}
$line .= $secondWord;

echo $line . PHP_EOL;
echo 'Total line length is: ' . strlen($line); //to test
