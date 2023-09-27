<?php

function getWeatherData($city) {
    $apiKey = '7fd721dcb1e380f1092d7e8300f3857d';
    $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric";

    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_CAINFO, 'C:/CA certificates/cacert.pem'); //manuāli jāpievieno norāde uz cacert.pem citādi metas error

    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {
        $weatherData = json_decode($response);

        if ($weatherData->cod === 200) {
            $weather = $weatherData->weather[0]->description;
            $temperature = $weatherData->main->temp;
            $humidity = $weatherData->main->humidity;
            $pressure = $weatherData->main->pressure;
            //$dewPoint = $weatherData->main->dew_point;
            $clouds = $weatherData->clouds->all;
            $visibility = $weatherData->visibility;
            $windSpeed = $weatherData->wind->speed;
            $windDirection = $weatherData->wind->deg;

            echo "Weather in $city: $weather" . PHP_EOL;
            echo "Temperature: $temperature °C" . PHP_EOL;
            echo "Humidity: $humidity%" . PHP_EOL;
            echo "Pressure: $pressure hPa" . PHP_EOL;
            //echo "Dew Point: $dewPoint °C" . PHP_EOL;
            echo "Cloud Cover: $clouds%" . PHP_EOL;
            echo "Visibility: $visibility meters" . PHP_EOL;
            echo "Wind Speed: $windSpeed m/s" . PHP_EOL;
            echo "Wind Direction: $windDirection °" . PHP_EOL;
        } else {
            echo "City not found or API request failed." . PHP_EOL;
        }
    } else {
        echo "Failed to fetch data from OpenWeatherMap API." . PHP_EOL;
    }
}

echo "Enter the city name: ";
$city = readline();
getWeatherData($city);