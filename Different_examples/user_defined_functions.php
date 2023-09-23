<?php

function sayHello($name = 'Tests') {// deklarējam default vērtību 'Tests'
    return 'Hello ' . $name . '!';
}
$name = 'Dagnis';
$test = sayHello(); //ja šeit neiekļaujam nevienu vārdu, tad funkcija paņems defoult name = 'Tests'
echo $test;

