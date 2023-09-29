<?php
// Lekciju laikā izveidotais variants - īsais variants
// Šeit izmantota php funkcija file_get_contents, šai metodei ir mīnuss, ka, ja neizpildās pieprasījums, tad netiek sūtīts atpakaļ info, kādi bugi jālabo


$episodes = json_decode(file_get_contents('https://rickandmortyapi.com/api/episode'));

foreach ($episodes->results as $episode) {
    echo "Episode Name: " . $episode->name . PHP_EOL;
}