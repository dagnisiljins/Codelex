<?php

$items = [
    [
        [
            "name" => "John",
            "surname" => "Doe",
            "age" => 50
        ],
        [
            "name" => "Jane",
            "surname" => "Doe",
            "age" => 41
        ]
    ]
];

$name = $items[0][1]["name"];
$surname = $items[0][1]["surname"];
$age = $items[0][1]["age"];


echo $name . " " . $surname . " " . $age;