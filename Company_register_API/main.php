<?php

$apiUrl = 'https://data.gov.lv/dati/lv/api/3/action/datastore_search?resource_id=25e80bf3-f107-4ab4-89ef-251b5b9374e9';

$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Parse the JSON response
$data = json_decode($response, true);
var_dump($data);
die;
// $data now contains the query results in an associative array

// Check if the API request was successful and data is available
if ($data && isset($data['result']) && isset($data['result']['records'])) {
    // Specify the path to the JSON file where you want to save the data
    $jsonFilePath = 'data.json';

    // Encode the data array to JSON format
    $jsonData = json_encode($data, JSON_PRETTY_PRINT);

    // Save the JSON data to a file
    if (file_put_contents($jsonFilePath, $jsonData)) {
        echo 'Data saved to ' . $jsonFilePath . PHP_EOL;
    } else {
        echo 'Failed to save data to ' . $jsonFilePath . PHP_EOL;
    }
} else {
    echo 'No data available to save.' . PHP_EOL;
}