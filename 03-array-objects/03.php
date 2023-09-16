<?php

$person = new stdClass(); // jauns objekts 'person'
$person->name = "John";  // šeit name ir attiecināms tikai pret šo mainīgo 'person'
$person->surname = "Doe";
$person->age = 50; // ar bultiņu norādam kādu vērtību vēlamies

echo "Name: " . $person->name . "\n";
echo "Surname: " . $person->surname . "\n";
echo "Age: " . $person->age;
