<?php

require 'vendor/autoload.php';
use Google\Cloud\Firestore\FirestoreClient;
require './key.php';

$configParams;

$db = new FirestoreClient($configParams);
$collecRef = $db->collection('Provedores');

$docs = $collecRef
    ->where('mensuracao', '=', '2010-09-01')
    ->where('qt', '>', 20)
    ->documents();


foreach ($docs as $doc) {
    if ($doc->exists()) {
        $qtAtual = $doc['qt'];
        $collecRef->document($doc->id())->update([
            ['path' => 'qt', 'value' => $qtAtual + 1],
        ]);
        printf("Documento %s corrigido: qt atualizado para %d\n", $doc->id(), $qtAtual + 1);
    } else {
        printf("Documento %s não existe!\n", $doc->id());
    }
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
    <h1>Dados Alterados:</h1>

    <table style="border: 2px solid; border-collapse: collapse;">
        <tr>
            <th>Empresa</th>
            <th>Quantidade</th>
            <th>Tecnologia</th>
            <th>T Produto</th>
            <th>Velocidade</th>
        </tr>
        <?php foreach ($docs as $doc): ?>
            <tr>
                <td><?= $doc['empresa']; ?></td>
                <td><?= $doc['qt']; ?></td>
                <td><?= $doc['tecnologia']; ?></td>
                <td><?= $doc['tproduto']; ?></td>
                <td><?= $doc['velocidade']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>