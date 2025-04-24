<?php
require 'vendor/autoload.php';
use Google\Cloud\Core\Exception\GoogleException;
use Google\Cloud\Firestore\FirestoreClient;
// use Dotenv\Dotenv;
// $dotenv = Dotenv::createImmutable(__DIR__);
// $dotenv->load();
$configParams = [
    'keyFilePath' => __DIR__ . '/tbd-firestore-config.json',
    'projectId' => 'tsi-tbd-ale',
];
try {
    $db = new FirestoreClient($configParams);
    $collecRef = $db->collection('NomeDaColeção');
    $query = $collecRef->where('Idade', '<', 21);
    $documents = $query->documents();
    foreach ($documents as $doc) {
        if ($doc->exists()) {
            printf('Nome: %s' . PHP_EOL, $doc['nome']);
            printf('Idade: %s' . PHP_EOL, $doc['idade']);
        } else {
            echo "Documento não encontrado." . PHP_EOL;
        }
    }
} catch (GoogleException $e) {                                //Falha na instalação do gRPC
    echo "Falha na biblioteca gRPC" . $e;
} catch (InvalidArgumentException $e) {                       //Falha no arquivo ou na configuração
    echo "Erro nos parametros de conexão" . $e;
}
