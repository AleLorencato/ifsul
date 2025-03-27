<?php

$curl = curl_init("https://tsi-tbd-ale-default-rtdb.firebaseio.com/.json");
curl_setopt_array($curl, array(
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_POST => true,
  CURLOPT_POSTFIELDS => '',

  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'cache-control: no-cache',
    'Content-Type: application/json',
    'Content-Length: ' . strlen(json_encode($data))
  ),
));
$response = curl_exec($curl);

curl_close($curl);

echo $response;