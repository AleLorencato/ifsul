<?php

require 'vendor/autoload.php';
use Google\Cloud\Firestore\FirestoreClient;
require './key.php';

$configParams;

$db = new FirestoreClient($configParams);
$collecRef = $db->collection('Provedores');

$docs = $collecRef
  ->orderBy('mensuracao')
  ->limit(500)  // coloquei um limite de 500 para evitar estourar o limite de leitura do firebase
  ->documents();

$data_prov = [];

foreach ($docs as $doc) {
  if ($doc->exists()) {
    $mensuracao = substr($doc['mensuracao'], 0, 4);
    $porte = $doc['porte'];
    $qt = $doc['qt'];
    if (!isset($data_prov[$mensuracao])) {
      $data_prov[$mensuracao] = ['grande' => 0, 'pequeno' => 0];
    }
    switch ($porte) {
      case $porte == 2:
        $data_prov[$mensuracao]['grande'] += $qt;
        break;
      case $porte == 3:
        $data_prov[$mensuracao]['pequeno'] += $qt;
        break;
      default:
        printf("Porte %s não reconhecido!\n", $porte);
    }

  } else {
    printf("Documento %s não existe!\n", $doc->id());
  }
}

$data_table = [];

foreach ($data_prov as $mensuracao => $portes) {
  $grande = $portes['grande'];
  $pequeno = $portes['pequeno'];
  $total = $grande + $pequeno;

  $percentGrande = $total > 0 ? ($grande / $total) * 100 : 0;
  $percentPequeno = $total > 0 ? ($pequeno / $total) * 100 : 0;

  $data_table[] = [
    'mensuracao' => $mensuracao,
    'percentGrande' => $percentGrande,
    'percentPequeno' => $percentPequeno
  ];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Percentual de Clientes de Grande e Pequeno Porte por Ano</h1>
  <table border="1" cellpadding="10">
    <tr>
      <th>Ano</th>
      <th>Percentual de Clientes de Grande Porte</th>
      <th>Percentual de Clientes de Pequeno Porte</th>
    </tr>
    <?php foreach ($data_table as $row): ?>
      <tr>
        <td><?= $row['mensuracao']; ?></td>
        <td><?= number_format($row['percentGrande'], 2); ?>%</td>
        <td><?= number_format($row['percentPequeno'], 2); ?>%</td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>


</body>

</html>