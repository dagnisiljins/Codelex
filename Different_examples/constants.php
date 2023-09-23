<?php

define('PI', 3.14); //tiek nodefinēts elements ar vērtību, kuru nevar mainīt un ja maina ar define(), tad izmentās erorr
echo PI;

function test()
{
    echo PI; //konstanti, kas definēta ārpus funkcijas, varam to izsaukt funkcijā
}

test();