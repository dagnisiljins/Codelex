<?php

function fetchEpisodeData($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// nākamā rinda ar curl_setop ir ielikta manuāli, lai norādītu kur pieejams fails cacer.pem
    curl_setopt($ch, CURLOPT_CAINFO, 'C:/CA certificates/cacert.pem'); // sertifikātu /cacert.pem es manuāli ieliku un tad aizgāja

    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {
        return json_decode($response, true);
    } else {
        echo "Failed to fetch data from URL: $url" . PHP_EOL;
        return null;
    }
}

function printEpisodeDetails($episode) {
    echo "Episode Name: " . $episode['name'] . PHP_EOL;
    echo "Air Date: " . $episode['air_date'] . PHP_EOL;
    echo "Characters:<br>";

    foreach ($episode['characters'] as $characterUrl) {
        $characterData = fetchEpisodeData($characterUrl);
        if ($characterData) {
            echo "- " . $characterData['name'] . PHP_EOL;
        }
    }
}

$apiUrl = "https://rickandmortyapi.com/api/episode";
while ($apiUrl) {
    $episodeData = fetchEpisodeData($apiUrl);

    if ($episodeData) {
        $episodes = $episodeData['results'];
        foreach ($episodes as $episode) {
            printEpisodeDetails($episode);
        }

        $apiUrl = $episodeData['info']['next'];
    } else {
        break;
    }
}
