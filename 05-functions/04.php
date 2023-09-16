<?php
// Create a array of objects that uses the function of exercise 3 but in
// loop printing out if the person has reached age of 18

function createPerson(string $name, string $surname, int $age): stdClass
{
    $person = new stdClass();
    $person->name = $name;
    $person->surname = $surname;
    $person->age = $age;

    return $person;
}

$personsData = [
    ['John', 'Doe', 30],
    ['Jane', 'Kane', 16],
    ['Alice', 'Smith', 21],
    ['Bob', 'Johnson', 17],
];

$persons = [];

foreach ($personsData as $data) {
    $person = createPerson($data[0], $data[1], $data[2]);
    $persons[] = $person;
}

foreach ($persons as $person) {
    if ($person->age >= 18) {
        echo $person->name . ' ' . $person->surname . ' ' . $person->age . PHP_EOL;
    }
}