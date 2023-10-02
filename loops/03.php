<?php
// Write a program that asks the user to enter two words. The program then prints out both words on one line.
// The words will be separated by enough dots so that the total line length is 30:


$firstWord = readline('Enter first word: ');
$secondWord = readline('Enter second word: ');

$totalLenght = readline('How long word you want: ');
$dotCount = $totalLenght - (strlen($firstWord) + strlen($secondWord));

$line = $firstWord;

for ($i = 0; $i < $dotCount; $i++) {
    $line .= '.';
}

echo $line . $secondWord . PHP_EOL;
echo strlen($line . $secondWord);
