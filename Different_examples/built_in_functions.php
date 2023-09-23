<?php

// Biežāk lietotās buildin f-jas: www.exakat.io%2Fen%2Ftop-100-php-functions%2F&v=vxSkDk6x9-o

$string = 'Hello World';

echo strlen($string) . PHP_EOL; //F-ja kas pasaka cik simbolu ir stringā
echo strpos($string, 'Wo') . PHP_EOL; //funkcija, kas pasaka atrašanās vietu
echo str_replace('World', 'Dagnis', $string) . PHP_EOL ; //funkcija, kas aizstāj vārdus
echo strtolower($string) . PHP_EOL; //uz mazajiem burtiem
echo substr($string, 2, 3) . PHP_EOL; // no 2 indeksa 3 burtus parādīs, ja liek '-2' pie lenght,
// tad no otras puses skaita ar kuru elementu beidz attēlot
echo substr($string, 2, -2) . PHP_EOL;
print_r(explode(' ', $string)) . PHP_EOL; //paņems visas atstarpes un sadalīs vārdus 2 stringos

$number = -5.5;
echo abs($number) . PHP_EOL; // iegūsim absolūto vērtību, bez '-' zīmes
echo round($number) . PHP_EOL; //noapaļo
echo pow(2, 3) . PHP_EOL; // f-ja reizina rezultātu ar 2, piem. šeit 2*2=4*2=8
echo sqrt(16) . PHP_EOL; //parāda kura skaitļa kvadrātsakne ir 16
echo rand(1, 100) . PHP_EOL; // random skaitļu ģenerēšana

$array = ['apple', 'banana', 'orange'];
$arraytwo = ['kiwi', 'somethingelse'];
echo count($array) . PHP_EOL; //pārbaudām datu skaitu array, piemēram, datu skaits datubāzē
echo is_array($array) . PHP_EOL; // vai ir array, atgriezīs 0-false; 1-true
echo array_push($array, 'kiwi') . PHP_EOL; // pievienojam jaunu elementu array
echo array_pop($array) . PHP_EOL; //noņemam pēdējo elementu nost
print_r(array_reverse($array)) . PHP_EOL; // apgriež elementus vietām
print_r(array_merge($array, $arraytwo)) . PHP_EOL;//pie array tiek pievienota arraytwo

//Dates and Time
echo date('Y-m-d H:i:s') . PHP_EOL; //ierakstam formātu kā vēlamies iegūt datumu un laiku
$date = '2023-09-22 10:04:18';
echo strtotime($date) . PHP_EOL;//no defoult datuma (1970 gads) sekundes līdz šim datumam
echo time() . PHP_EOL; // no defoult datuma (1970 gads) sekundes līdz šim brīdim

