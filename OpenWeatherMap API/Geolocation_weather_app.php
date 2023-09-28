<?php
//Use just for Latvian cities or change $country = code


    $city = readline('Enter your city: ');
    $state = null; // Optional state code (only for the US)
    $country = 'lv'; // (use ISO 3166 country codes)
    $apiKey = '7fd721dcb1e380f1092d7e8300f3857d';

    // Geocoding API to fetch coordinates
    $geoUrl = "http://api.openweathermap.org/geo/1.0/direct?q=$city,$state,$country&limit=5&appid=$apiKey";
    $geoResponse = file_get_contents($geoUrl);

    if ($geoResponse) {
        $geoData = json_decode($geoResponse);

        // Check if there's at least one result
        if (!empty($geoData)) {
            // Extract coordinates
            $latitude = $geoData[0]->lat;
            $longitude = $geoData[0]->lon;

            // API request
            //$exclude = 'minutely,hourly,daily,alerts';
            $oneCallUrl = "https://api.openweathermap.org/data/2.5/weather?lat=$latitude&lon=$longitude&appid=$apiKey";
            $oneCallResponse = file_get_contents($oneCallUrl);

            if ($oneCallResponse) {
                $data = json_decode($oneCallResponse);
                //var_dump($data); // For incoming data test

                if (isset($data->weather[0])) {
                    $weather = $data->weather[0];

                    $weatherMain = $weather->main; // Main weather condition (e.g., "Rain")
                    $weatherDescription = $weather->description; // Weather description (e.g., "moderate rain")
                    $weatherIcon = $weather->icon; // Weather icon code (e.g., "10d")

                    // This is made for localhost
                    $weatherSymbols = [
                        "clear sky" => "☀️",
                        "few clouds" => "🌤️",
                        "scattered clouds" => "⛅",
                        "broken clouds" => "🌥️",
                        "clouds" => "☁️",
                        "rain" => "🌧️",
                        "thunderstorm" => "⛈️",
                        "snow" => "🌨️",
                        "mist" => "🌫️",
                    ];

                    $weatherSymbol = $weatherSymbols[strtolower($weatherMain)] ?? "";

                    echo $weatherMain . PHP_EOL;

                    //echo "Description: $weatherDescription<br>";
                    //echo "Icon: $weatherIcon<br>";
                }

                if (isset($data->main)) {
                    $main = $data->main;

                    $temperature = $main->temp; // Temperature in Kelvin
                    $feelsLike = $main->feels_like; // Feels like temperature in Kelvin
                    $tempMin = $main->temp_min; // Minimum temperature in Kelvin
                    $tempMax = $main->temp_max; // Maximum temperature in Kelvin
                    $pressure = $main->pressure; // Atmospheric pressure in hPa
                    $humidity = $main->humidity; // Humidity percentage

                    echo "Temperature: " . round($temperature - 273.15, 2) . "°C\n";
                    echo "Feels Like: " . round($feelsLike - 273.15, 2) . "°C\n";
                    echo "Min Temperature: " . round($tempMin - 273.15, 2) . "°C\n";
                    echo "Max Temperature: " . round($tempMax - 273.15, 2) . "°C\n";
                    echo "Pressure: $pressure hPa\n";
                    echo "Humidity: $humidity %\n";
                }



                if (isset($data->wind)) {
                    $wind = $data->wind;

                    $windSpeed = $wind->speed; // Wind speed in meters per second
                    $windDirection = $wind->deg; // Wind direction in degrees

                    echo "Wind Speed: $windSpeed m/s\n";
                    echo "Wind Direction: $windDirection °\n";
                }

                if (isset($data->clouds)) {
                    $clouds = $data->clouds;

                    $cloudCover = $clouds->all; // Cloud cover percentage

                    echo "Cloud Cover: $cloudCover%\n";
                }

                if (isset($data->visibility)) {
                    $visibility = $data->visibility; // Visibility in meters

                    echo "Visibility: $visibility meters\n";

                } else {
                    echo "API request failed or location not found.\n";
                }
            } else {
                echo "One Call API request failed.\n";
            }
        } else {
            echo "City not found or no results from Geocoding API.\n";
        }
    } else {
        echo "Geocoding API request failed.\n";
    }


