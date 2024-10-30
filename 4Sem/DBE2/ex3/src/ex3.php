<?php

require "../vendor/autoload.php";

use Alexa\Ex3\classes\Atleta;
use Alexa\Ex3\classes\iFuncionario;
use Alexa\Ex3\classes\IMC;
use Alexa\Ex3\classes\Relatorio;
use Alexa\Ex3\classes\Medico;

$medico = new Medico('Dr. José', '123456', 'Cardiologista', 40, 1.70, 70);


$atleta = new Atleta('Alexandre', 20, 1.67, 65);

IMC::calc($atleta);
IMC::calc($medico);


echo "\n Atleta" . (($atleta instanceof iFuncionario) ? " implementa " : " não implementa ") . "a interface\n";

echo "\n Medico" . (($medico instanceof iFuncionario) ? " implementa " : " não implementa ") . "a interface\n";

$relatorio = new Relatorio();

$relatorio->add($atleta);
$relatorio->add($medico);

$relatorio->imprime();


echo "O/A " . $atleta->nome . " Na escala IMC Está: " . IMC::classificar($atleta) . IMC::isNormal($atleta);
