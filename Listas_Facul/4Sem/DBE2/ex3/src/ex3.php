<?php

require "../vendor/autoload.php";

use Alexa\Ex3\classes\Atleta;
use Alexa\Ex3\classes\IMC;


$pessoa = new Atleta('Alexandre', 20, 1.67, 65);

IMC::calc($pessoa);



var_dump($pessoa);




echo "O/A " . $pessoa->nome . " Na escala IMC Está: " . IMC::classificar($pessoa) . IMC::isNormal($pessoa);


