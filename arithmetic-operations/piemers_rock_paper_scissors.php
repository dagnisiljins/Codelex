<?php

// rock paper scissors ++
$elements = [
    'rock', 'scissors', 'paper' //implode = join -> rock, scissors, paper'
];

$userSelection = readline('Enter element: '. implode(' , , ', $elements) . ': ');

if (in_array(strtolower($userSelection, $elements) === false))
{
    echo 'Invalid element selected';
    exit;
};
$computerSelection = $elements[array_rand($elements)];

if ($userSelection === $computerSelection)
{
    echo 'Its a tie';
    exit;
}

if ($userSelection === 'paper' && $computerSelection === 'rock')
{
    echo 'User wins';
    exit;
}
if ($userSelection === 'scissors' && $computerSelection === 'paper')
{
    echo 'User wins';
    exit;
}
if ($userSelection === 'rock' && $computerSelection === 'scissors')
{
    echo 'User wins';
    exit;
}
echo 'Computer wins';
