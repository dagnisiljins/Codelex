<?php
//Create a function that accepts any string and returns the same value with added "codelex"
// by the end of it. Print this value out.

$word = readline('Enter word:');

function addcodelex (string $word): string
{
    return $word . ' '. 'codelex';
}

echo addcodelex($word);