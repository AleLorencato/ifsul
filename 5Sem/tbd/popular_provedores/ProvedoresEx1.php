<?php

require 'vendor/autoload.php';
use Google\Cloud\Firestore\FirestoreClient;
require './key.php';

$configParams;

$db = new FirestoreClient($configParams);
$collecRef = $db->collection('Provedores');

$selectedDate = $_GET['date'] ?? null;

$data_prov = [];
if ($selectedDate) {
    $data_prov = $collecRef->where('mensuracao', '=', $selectedDate)->orderBy('empresa')->documents();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Visualizar Acessos - Pelotas</title>
</head>

<body>
    <h1>Visualizar Acessos em Pelotas</h1>

    <form method="GET" action="">
        <label for="date">Selecione uma data:</label>
        <select name="date" id="date" required>
            <option value="">-- Escolha uma data --</option>
            <?php
            for ($i = 2007; $i <= 2023; $i++) {
                $date = "$i-09-01";
                echo "<option value='$date'" . ($selectedDate == $date ? ' selected' : '') . ">$date</option>";
            }
            ?>
        </select>
        <button type="submit">Filtrar</button>
    </form>
    <?php if ($selectedDate): ?>
        <h2>Dados de Acessos em Pelotas para <?= $selectedDate ?></h2>
        <table style="border: 2px solid; border-collapse: collapse;">
            <tr>
                <th>Empresa</th>
                <th>Quantidade</th>
                <th>Tecnologia</th>
                <th>T Produto</th>
                <th>Velocidade</th>
            </tr>
            <?php foreach ($data_prov as $reg_prov): ?>
                <tr>
                    <td><?= $reg_prov['empresa']; ?></td>
                    <td><?= $reg_prov['qt']; ?></td>
                    <td><?= $reg_prov['tecnologia']; ?></td>
                    <td><?= $reg_prov['tproduto']; ?></td>
                    <td><?= $reg_prov['velocidade']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>

</html>