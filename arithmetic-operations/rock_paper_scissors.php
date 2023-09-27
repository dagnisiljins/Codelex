<?php
// The keys of the associative array ('rock,' 'scissors,' and 'paper') represent the player's choice.
//The values associated with each key are arrays containing the choices that the key can defeat.
$elements = [
    'children' => ['ghostbuster'],
    'pumpkin' => ['ghost'],
    'ghost' => ['children'],
    'ghostbuster' => ['ghost', 'pumpkin']
]; //

//array_keys is used to dynamically generate the list of valid elements for user selection
$userSelection = readline('Enter element: ' . implode(', ', array_keys($elements)) . ': '); //with php function implode() it is possible to concatenate (join) elements of an array into a single string, with each element separated by a specified delimiter.

$userSelection = strtolower($userSelection);//convert input to lowercase

if (!array_key_exists($userSelection, $elements)) { // checking if element is valid (In array)
    echo 'Invalid element selected';
    exit;
}

$computerSelection = array_rand($elements);

echo in_array($computerSelection, $elements[$userSelection]);

//if for example $computerSelection is 'pumpkin' and in array $elements under element with key 'children' (which is users selected element) is element 'pumpkin',then function returns 'true' and echo 'User wins'

if ($userSelection === $computerSelection) {
    echo 'It\'s a tie!' . PHP_EOL ;
    echo 'Computer selected: ' . $computerSelection;
} elseif (in_array($computerSelection, $elements[$userSelection])) {
    echo 'User wins!' . PHP_EOL;
    echo 'Computer selected: ' . $computerSelection;
} else {
    echo 'Computer wins' . PHP_EOL;
    echo 'Computer selected: ' . $computerSelection;
}

