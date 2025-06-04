<?php

$mongo = new MongoDB\Driver\Manager("mongodb://localhost");
$query = new MongoDB\Driver\Query([], []);
$docs = $mongo->executeQuery('teste.empregos.municipios', $query);
foreach ($docs as $document) {
  $document = json_decode(json_encode($document), true);
  print_r($document);
}