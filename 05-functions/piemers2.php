<?php

function createPerson(string $name, string $surname, int $age, string $birthday): stdClass
{
    $person = new stdClass();
    $person->name = $name;
    $person->surname = $surname;
    $person->age = $age;
    $person->birthday = $birthday;

    return $person;
}

$persons = [
    createPerson('John', 'Doe', '30', '12-08-1993'),
    createPerson('Jane', 'Kane', '29', '30-06-1994'),
];

foreach ($persons as $person)
{
    echo $person->name . ' '. $person->surname . ' ' . $person->age . ' | ' . $person->birthday . PHP_EOL;
}