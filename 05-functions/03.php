<?php
//Create a person object with name, surname and age. Create a function that will determine if the person
// has reached 18 years of age. Print out if the person has reached age of 18 or not.

function createPerson(string $name, string $surname, int $age): stdClass
{
    $person = new stdClass();
    $person->name = $name;
    $person->surname = $surname;
    $person->age = $age;

    return $person;
}

$persons = [
    createPerson('John', 'Doe', '30'),
    createPerson('Jane', 'Kane', '16'),
];

foreach ($persons as $person)
{
    return $person;
}

echo $person();

