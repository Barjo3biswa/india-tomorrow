<?php
use GuzzleHttp\Client;

function sentence_similarity($sent1, $sent2) {
    $words1 = explode(" ", $sent1);
    $words2 = explode(" ", $sent2);

    $intersection = array_intersect($words1, $words2);
    $union = array_unique(array_merge($words1, $words2));

    return count($intersection) / count($union);
}

function build_similarity_matrix($sentences) {
    $matrix = array();
    $n = count($sentences);
    // dump($n);
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            $matrix[$i][$j] = sentence_similarity($sentences[$i], $sentences[$j]);
        }
    }

    return $matrix;
}

function text_rank($text, $num_sentences = 2) {
    $sentences = preg_split('/(?<=[.?!])\s+(?=[a-zA-Z])/i', $text, -1, PREG_SPLIT_NO_EMPTY);
    $matrix = build_similarity_matrix($sentences);

    $scores = array_fill(0, count($sentences), 1);
    $damping_factor = 0.85;
    $max_iterations = 100;

    for ($i = 0; $i < $max_iterations; $i++) {
        $prev_scores = $scores;
        for ($j = 0; $j < count($sentences); $j++) {
            $new_score = 1 - $damping_factor;
            for ($k = 0; $k < count($sentences); $k++) {
                if ($j != $k) {
                    $new_score += $damping_factor * ($matrix[$k][$j] / array_sum($matrix[$k]));
                }
            }
            $scores[$j] = $new_score;
        }
        if ($scores == $prev_scores) {
            break;
        }
    }
    arsort($scores);
    $summary_sentences = array_slice($sentences, 0, $num_sentences);
    $summary = implode(" ", $summary_sentences);

    // Get the first 10 words from the summary
    $summary_words = explode(" ", $summary);
    $summary_first_10_words = implode(" ", array_slice($summary_words, 0, 20));

    return $summary_first_10_words;

}

function getCurrentWeather()
    {
        // $weatherData = fetchWeatherData();
        // $minTemperature = $weatherData['DailyForecasts'][0]['Temperature']['Minimum']['Value'];
        // $maxTemperature = $weatherData['DailyForecasts'][0]['Temperature']['Maximum']['Value'];
        // $data = (($minTemperature+$maxTemperature)/2).' <sup>0</sup> C';

        $data = ((27)).' <sup>0</sup> C';
        return $data;

    }

function fetchLocationData($ip)
    {
        $client = new Client();
        $response = $client->get("https://api.ipgeolocation.io/ipgeo?apiKey=YOUR_API_KEY&ip=$ip");
        return json_decode($response->getBody(), true);
    }

function fetchWeatherData()
    {
        $client = new Client();
        $response = $client->get("http://dataservice.accuweather.com/forecasts/v1/daily/1day/186893?apikey=A89ZobDuvybTTUOmy2KmcMdD93Tfs7vu&metric=true");
        return json_decode($response->getBody(), true);
    }

function extractCharacter($string, $length){
    $first_60_characters = substr($string, 0, $length);
    return $first_60_characters;
}


