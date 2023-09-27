<?php

// visas epizodes - pievērst uzmanību curl_setopt - jāliek manuāli
function fetchEpisodeNames($url) {
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Specify the path to the CA bundle (you might need to adjust this path)
curl_setopt($ch, CURLOPT_CAINFO, 'C:/CA certificates/cacert.pem'); // sertifikātu /cacert.pem es manuāli ieliku un tad aizgāja

$response = curl_exec($ch);

if ($response === false) {
// Check for cURL error and display it
echo "cURL Error: " . curl_error($ch) . "\n";
curl_close($ch);
return [null, null];
}

curl_close($ch);

$episodeData = json_decode($response, true);

if ($episodeData && isset($episodeData['results'])) {
$episodeNames = array_column($episodeData['results'], 'name');
return [$episodeNames, $episodeData['info']['next']];
} else {
echo "Failed to decode JSON response\n";
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
echo "Episode Name: $episodeName \n";
}