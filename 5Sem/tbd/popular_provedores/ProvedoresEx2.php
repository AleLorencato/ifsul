<?php

require 'vendor/autoload.php';
use Google\Cloud\Firestore\FirestoreClient;
require './key.php';

$configParams;

$db = new FirestoreClient($configParams);
$collecRef = $db->collection('Provedores');

$docs = $collecRef
    ->where('mensuracao', '=', '2010-09-01')
    ->where('qt', '>', '20')
    ->limit(10)
    ->documents();
?>

<http>

    <head>

    </head>

    <body>
        <table style="border: 2px solid;">
            <tr>
                <th>Empresa</th>
                <th>Quantidade</th>
            </tr>
            <?php
            foreach ($data_prov as $reg_prov) {
                if ($name_prov != $reg_prov['empresa']) {
                    if ($qt_clientes > 0) {
                        echo "<tr></tr><td>" . $name_prov . "</td>" . PHP_EOL;
                        echo "<td>" . $qt_clientes . "</td></tr>" . PHP_EOL;
                    }
                    $name_prov = $reg_prov['empresa'];
                    $qt_clientes = 0;
                } else { // ($name_prov == $reg_prov['empresa'])
                    $qt_clientes += $reg_prov['qt'];
                }
                ?>
                <?php
            }
            ?>
        </table>
    </body>
</http>