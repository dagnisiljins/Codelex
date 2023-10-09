<?php


//Uzdevums aprēķināt 2D array kurš elements (a,b,c) ir vistuvāk *


$heightOfPlayground = 3; //number of rows
$playground = [
    '      *    ',
    ' a c       ',
    '   b       ',
];

// Define the position of the asterisk (*).
$myX = -1; //Define with -1, it means we dont know a possition.
$myY = -1;

// Find the position of the asterisk in the playground
foreach ($playground as $y => $row) {
    $pos = strpos($row, '*');
    if ($pos !== false) { //ejot cauri katrai rindai, ja atrod meklēto elementu tad izmet true un piefiksē koordinātes
        $myX = $pos; //elements rindā, vai kollonas nr var arī tā pieņemt
        $myY = $y; //rinda
        break;
    }
}

// Initialize variables to keep track of the closest kid and their distance
$closestKid = '';
$minDistance = PHP_INT_MAX;

// Iterate through the playground to find the closest kid
foreach ($playground as $y => $row) {
    foreach (str_split($row) as $x => $cell) {
        // Skip if it's the asterisk (*) or an empty space
        if ($cell === '*' || $cell === ' ') {
            continue;
        }

        // Calculate the Euclidean distance
        $distance = sqrt(pow($x - $myX, 2) + pow($y - $myY, 2)); //In a two-dimensional Euclidean space
        //(such as a plane), the Euclidean distance between two points, often denoted as (x1, y1) and
        //(x2, y2), is calculated using the Pythagorean theorem

        // Update the closest kid if this kid is closer
        if ($distance < $minDistance) {
            $closestKid = $cell;
            $minDistance = $distance;
        }
    }
}

// Output the closest kid
echo($closestKid . "\n");
