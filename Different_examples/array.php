<?php

$fruits = ['apple', 'banana', 'cherry'];
$testArray = ['mango', 'strawberry'];

array_splice($fruits, 2,0,$testArray); // ar šo funkciju var izdzēst elementus, vai ievietot,
// ja lenght vietā liek '0', tad nākamajā var norādīt elementu vai array,
// kuru nepieciešams ievietot, bet ja liek piemēram '1',
// tad pēc elementa ar indeksu '2' tiks idzēsts 1 elements.

print_r($fruits); // tiek izprinēts viss array

$food = [
    'fruits' => ['apple', 'mango'],
    'meat' => ['chicken', 'fish'],
    'vegetables' => ['carrot', 'cucumber']
];