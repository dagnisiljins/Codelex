<?php

$numbers = [4, 6, 10, 12, 15, 18, 21, 20, 27, 31, 33];

foreach ($numbers as $number)
{
    if ($number % 3 === 0) {
        echo $number . PHP_EOL;
    }
}