<?php
// API key
$apiKey = '7fd721dcb1e380f1092d7e8300f3857d';

$city = readline("Enter the city name: ");

$apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey";

// Initialize cURL session
$ch = curl_init($apiUrl);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_CAINFO, 'C:/CA certificates/cacert.pem'); //I entered manual without I receive an error

// Execute the cURL request
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'cURL Error: ' . curl_error($ch);
} else {
    // Decode the JSON response
    $data = json_decode($response);

    // Check if the API request was successful
    if ($data->cod === 200) {
        // Extract weather and humidity information
        $weatherDescription = $data->weather[0]->description;
        $humidity = $data->main->humidity;

        // Display the weather and humidity information
        echo "Weather in $city: $weatherDescription\n";
        echo "Humidity: $humidity%\n";
    } else {
        echo "City not found or API request failed.";
    }
}

// Close cURL session
curl_close($ch);
