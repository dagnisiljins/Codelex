<?php
// Lekciju laikā izveidotais variants - īsais variants

$episodes = json_decode(file_get_contents('https://rickandmortyapi.com/api/episode'));

foreach ($episodes->results as $episode) {
    echo "Episode Name: " . $episode->name . PHP_EOL;
}