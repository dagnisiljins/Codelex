<?php

function fetchEpisodeNames($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {
        $episodeData = json_decode($response, true);
        $episodeNames = array_column($episodeData['results'], 'name');
        return [$episodeNames, $episodeData['info']['next']];
    } else {
        echo "Failed to fetch data from URL: $url\n";
        return [null, null];
    }
}

$apiUrl = "https://rickandmortyapi.com/api/episode";
$allEpisodeNames = [];

while ($apiUrl) {
    [$episodeNames, $apiUrl] = fetchEpisodeNames($apiUrl);

    if ($episodeNames) {
        $allEpisodeNames = array_merge($allEpisodeNames, $episodeNames);
    } else {
        break;
    }
}

foreach ($allEpisodeNames as $episodeName) {
    echo "Episode Name: $episodeName <br>";
}