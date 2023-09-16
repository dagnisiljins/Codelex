<?php
$personBasket = []; // uztaisam masīvu jau sākumā

$personA = new stdClass();
$personA->name = 'Dagnis';
$personA->surName = 'Iljins';
$personA->age = 31;
$personA->birthDay = '20/08/1992';

$personBasket[] = $personA; // masīvam pievienojam objektu personA

$personB = new stdClass();
$personB->name = 'Janis';
$personB->surName = 'Krautmanis';
$personB->age = 50;
$personB->birthDay = '24/09/1987';

$personBasket[] = $personB; // pievienojam objektu personB

//$personBasket = [$personA, $personB]; // Mājās pēc tam ieliku masīvā

foreach ($personBasket as $item)
{
    echo 'Name: ' . $item->name . PHP_EOL;
    echo 'Surname: ' . $item->surName . PHP_EOL;
    echo 'Age: ' . $item->age . PHP_EOL;
    echo 'Birthday: ' . $item->birthDay . PHP_EOL;
}


