<?php

$numbers = [20, 30, 25, 35, -16, 60, -100];

//calculate an average value of the numbers
$average = round(array_sum($numbers) / count($numbers), 2);

echo $average;
