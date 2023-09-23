<?php

//Izstrādāt spēli, kur iespējams definēt elementus, spēles palaišas brīdī
// izdrukājas laukums, kas veido uzvaras stāvokli.(3x4 elementi)
//Develop a game where it is possible to define elements, at the moment of starting the game the area that forms the winning state is printed. (3x4 elements)
/* Winning option (A):
A A A 0
0 0 0 A
0 0 0 0

Points for winning combinantion should be counted by letter (Sum of all letters):
A - 1 point;
Z - 2 points;
X - 3 points;
Y - 4 points;

 */
$row = 0;
$column = 0;
$maxRows = 3;
$maxColums = 4;


$elements = [
    'x', 'y', 'a', 'z'
];

$board = [
    [],
    [],
    []
];

for ($row = 0; $row < $maxRows; $row++)
{
    for ($column = 0; $column < $maxColums; $column++)
    {
        $board[$row[$column]] = $elements[array_rand($elements)];
    }
}
function displayBoard(array $board)
{
    foreach ($board as $row);
    {
        foreach ($row as $colum => $element) {
            echo '[$element]';
        }
        echo PHP_EOL;
    }
}
//1-4 un 6 masīvos uzdevumi


