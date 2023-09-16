<?php

// 3 cikli: foreach -iet katram elementam cauri;
// for (i=0; i<10; i++ -> i +=1) -sākumā nosaka masīvu no līdz (0-10) un tad iet ik pa 1 cauri
// while/do-wile -tikai uz nosacījumu bāzes darbojas

$numbers = [2, 3, 7, 10];

foreach ($numbers as $number) // ejam cauri numbers 'as' apzīmē ar ko aizstāj, number
{
    echo $number . PHP_EOL;
}

