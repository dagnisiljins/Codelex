<?php

$surveyed = 0; //12467;
$purchased_energy_drinks = 0.14;
$prefer_citrus_drinks = 0.64;

function calculate_energy_drinkers(int $numberSurveyed)
{
    if ($numberSurveyed <= 0) {
        throw new LogicException('Number surveyed cannot be 0 or less!');
    }

    global $purchased_energy_drinks;
    return (int) ($numberSurveyed * $purchased_energy_drinks);
}

function calculate_prefer_citrus(int $numberSurveyed)
{
    if ($numberSurveyed <= 0) {
        throw new LogicException('Number surveyed cannot be 0 or less!');
    }

    global $prefer_citrus_drinks;
    return (int) ($numberSurveyed * $prefer_citrus_drinks);

}

try {
    echo "Total number of people surveyed " . $surveyed . PHP_EOL;
    echo "Approximately " . calculate_energy_drinkers($surveyed) . " bought at least one energy drink." . PHP_EOL;
    echo calculate_prefer_citrus($surveyed) . " of those " . "prefer citrus flavored energy drinks.";
} catch (LogicException $x) { //cna use $e and other letters.
    echo "ERROR " . $x->getMessage() . PHP_EOL;
}


