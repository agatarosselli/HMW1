<?php

//mi faccio ritornare il json dell'api random users con il php 


header('Content-Type: application/json');

    $url = 'https://randomuser.me/api/?results=24&nat=us';

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $results = curl_exec($ch);

    # Impacchetto tutto in un JSON
    $json = json_decode($results, true);

    # Libero le risorse
    curl_close($ch);



    echo $results;

?>