<?php

function getWeatherData($location) {
    $base_uri = 'api.openweathermap.org/data/2.5/';
    global $api_key_weather;
    $lang = 'nl';
    $units = 'metric';

    $uri = $base_uri.'weather?q='.$location.'&appid='.$api_key_weather.'&lang='.$lang.'&units='.$units;

    $curl = curl_init();
    // Will return the response, if false it print the response
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_URL, $uri);
    $response = curl_exec($curl);
    curl_close($curl);

    $weatherData = json_decode($response, true);
    $beschrijving = $weatherData["weather"][0]["description"];
    $temperatuur = round($weatherData["main"]["temp"]);
    $vochtigheid = $weatherData["main"]["humidity"];

    return 'Weer: ' . $beschrijving . ', ' . $temperatuur . '°C, vochtigheid ' . $vochtigheid . '%';
}
