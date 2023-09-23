<?php

//Scope - kā un kad var piekļut variable, function utt
//1. global variable
$test = 'Dagnis';// global variable

//2. local variable

$testTwo = 'Hello Test'; //šim mēs arī funkcijā nevaram piekļūt, tas ir jādefinē iekšā,
// vai jāieliek kā parametrs: function myFunction($testTwo) un izsaucot arī jāpievieno: echo myFunction($testTwo)
function myFunction()
{
    //Define local variable, cant access outside the function
    $localVar = 'Hello World';
    return $GLOBALS['testTwo']; //šādi arī mēs varam piekļūt mainīgajam, kas ir ārpus funkcijas,
    // bet tas nebūtu pareizi 99% vajag ienest iekšā elementus
}
echo myFunction();

//3. Static scope

function myFunctionTwo()
{
    //Declare static variable
    static $staticVar = 0;//ja izmanto static, tad, ja jaunā vietā izsauks (echo) šo funkciju, tad
    // pirmajā reizē būs 1 un tad 2, tad 3, jo katru reizi piesakita klāt un dēļ static izmantošanas
    // iepriekšējā vērtība paliks (ja ir echo, echo, echo vairāki pēc kārtas)

    //Increment the static variable
    $staticVar++;

    //use static variable
    return $staticVar;
}

echo myFunctionTwo(); // attēlos 1
echo myFunctionTwo();// attēlos 2
echo myFunctionTwo(); // attēlos 3

//4. class scope - ārpus cless mēs nevaram piekļūt class variables vai functions