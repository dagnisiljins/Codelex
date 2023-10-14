<?php

// Function to search for a company by name or registration number
function searchCompany($searchTerm) {
    // Define the API endpoint
    $apiUrl = 'https://data.gov.lv/dati/lv/api/3/action/datastore_search?resource_id=25e80bf3-f107-4ab4-89ef-251b5b9374e9'; // . $searchTerm;&q=41203061920

    // Initialize cURL session
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CAINFO, 'C:/CA certificates/cacert.pem');

    // Execute the cURL request
    $response = curl_exec($ch);

    // Close cURL session
    curl_close($ch);

    // Parse the JSON response
    $data = json_decode($response, true);
    //var_dump($data);
    return $data;

}


// Usage example to search for a company by registration number
$searchTerm = ''; // Replace with a valid registration number
$searchResult = searchCompany($searchTerm);

// Print the search results
if ($searchResult && isset($searchResult['result']) && isset($searchResult['result']['records'])) {
    // Loop through the search results and process the data as needed
    foreach ($searchResult['result']['records'] as $record) {
        echo 'Company Name: ' . $record['name'] . PHP_EOL;
        echo 'Registration Number: ' . $record['regcode'] . PHP_EOL;
        // Add more fields as needed
        echo '--------------------------------------------------' . PHP_EOL;
    }
} else {
    echo 'No matching companies found.' . PHP_EOL;
}