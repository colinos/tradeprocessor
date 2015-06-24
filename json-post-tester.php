<?php

//API Url
//$url = 'http://localhost/tradeprocessor/messages.php';
$url = 'http://www.bodconstruction.ie/colintemp/tradeprocessor/messages.php';

//Initiate cURL.
$ch = curl_init($url);

//The JSON data.
// {"userId": "134256", "currencyFrom": "EUR", "currencyTo": "GBP", "amountSell": 1000, "amountBuy": 747.10, "rate": 0.7471, "timePlaced" : "24-JAN-15 10:27:44", "originatingCountry" : "FR"}
$jsonData = array(
    'userId' => '134256',
    'currencyFrom' => 'EUR',
    'currencyTo' => 'GBP',
    'amountSell' => 1000,
    'amountBuy' => 747.10,
    'rate' => 0.7471,
    'timePlaced' => '24-JAN-15 10:27:44',
    'originatingCountry' => 'FR'
);

//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);

//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 

//Execute the request
$result = curl_exec($ch);

curl_close($ch);

echo $result;
