<?php

function createPerson(string $name, string $surname): stdClass
{
    $person = new stdClass();
    $person->name = $name;
    $person->surname = $surname;

    return $person;
}

$persons = [
    createPerson('John', 'Doe'),
    createPerson('Jane', 'Kane'),
];

foreach ($persons as $person)
{
    echo $person->name . ' '. $person->surname . PHP_EOL;
}