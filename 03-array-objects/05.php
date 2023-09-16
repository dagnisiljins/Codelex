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

$hesName = $items[0][0]['name'];
$hersName = $items[0][1]['name'];
$surname = $items[0][0]['surname'];

echo $hesName.' & '.$hersName.' '.$surname.'`s';