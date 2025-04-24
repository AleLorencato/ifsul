<?php

require __DIR__ . '/vendor/autoload.php';
use Dotenv\Dotenv;
use Kreait\Firebase\Factory;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


$factory = (new Factory)
  ->withServiceAccount($_ENV['CREDENTIALS_PATH'])
  ->withDatabaseUri($_ENV['FIREBASE_URL']);

$database = $factory->withDatabaseAuthVariableOverride(null)->createDatabase();
$reference = $database->getReference('users');




// $data = array(
//   'email' => 'Aline@gmail.com',
//   'username' => 'Aline',
// );

// $curl = curl_init($_ENV['FIREBASE_URL']);
// curl_setopt_array($curl, array(
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_POST => true,
//   CURLOPT_POSTFIELDS => json_encode($data),
//   CURLOPT_HTTPHEADER => array(
//     'cache-control: no-cache',
//     'Content-Type: application/json',
//     'Content-Length: ' . strlen(json_encode($data))
//   ),
//   CURLOPT_SSL_VERIFYPEER => false
// ));

// $response = curl_exec($curl);

// $err = curl_error($curl);
// if ($err) {
//   echo 'cURL Error #:' . $err;
// } else {
//   echo 'Response: ' . $response;
// }

// curl_close($curl);
