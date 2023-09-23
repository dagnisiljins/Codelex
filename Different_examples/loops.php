<?php

for ($i = 0; $i <= 3; $i++)
{
    echo 'This is iteration number' . $i . PHP_EOL;
}

$test = 10;
do {
    echo $test . PHP_EOL;
    $test++;
} while ($test < 10); // lai arī apakšējais statament ir false, tā pat cikls vienreiz izies, līdz nonāks līdz while argumentam

$fruits = ['apple'=>'red', 'banana'=>'yelow', 'orange'=>'black'];

foreach ($fruits as $fruit) {
    echo 'This is a ' . $fruit . PHP_EOL;
}

foreach ($fruits as $fruit => $color) { //šādi pielikot ir iespējams arī parādīt atslēgas nosaukumu
    echo 'This is a ' . $fruit . ', that has a color of ' . $color . PHP_EOL;
}