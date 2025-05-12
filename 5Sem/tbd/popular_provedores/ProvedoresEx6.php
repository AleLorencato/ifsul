<?php

require 'vendor/autoload.php';
use Google\Cloud\Firestore\FirestoreClient;
require './key.php';

$configParams;

try {
  $db = new FirestoreClient($configParams);
  $docs = $db->collection('Provedores')->limit(1000)->documents();

  $seen = [];
  $duplicates = [];

  foreach ($docs as $doc) {
    $data = $doc->data();
    $id = $doc->id();

    $key = implode('|', [
      $data['empresa'],
      $data['grupo'],
      $data['tecnologia'],
      $data['qt'],
      $data['velocidade'],
    ]);

    if (!isset($seen[$key])) {
      $seen[$key] = $id;
    } else {
      $duplicates[] = ['id' => $id] + $data;
    }
  }

  echo "<h1>Duplicatas Encontradas</h1>";
  if (count($duplicates)) {
    echo "<table border='1' cellpadding='5'>
            <tr>
             <th>ID</th><th>Empresa</th><th>Grupo</th>
             <th>Tecnologia</th><th>Quantidade</th><th>Velocidade</th>
            </tr>";
    foreach ($duplicates as $dup) {
      echo "<tr>
              <td>{$dup['id']}</td>
              <td>{$dup['empresa']}</td>
              <td>{$dup['grupo']}</td>
              <td>{$dup['tecnologia']}</td>
              <td>{$dup['qt']}</td>
              <td>{$dup['velocidade']}</td>
            </tr>";
      $db->collection('Provedores')->document($dup['id'])->delete();
    }
    echo "</table>";
  } else {
    echo "<p>Nenhuma duplicata encontrada.</p>";
  }

} catch (Exception $e) {
  echo "Erro: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    table {
      border: 2px solid;
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
      border: 1px solid;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>


</body>

</html>