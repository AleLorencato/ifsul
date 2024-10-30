<?php
include_once 'classes/Pessoa.php';
include_once 'classes/IMC.php';

$pessoa = new Pessoa('Alexandre', 20, 1.67, 65);

IMC::calc($pessoa);

var_dump($pessoa);

echo "O/A " . $pessoa->nome . " Na escala IMC Está: " . IMC::classificar($pessoa);
