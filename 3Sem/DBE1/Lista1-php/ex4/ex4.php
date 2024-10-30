<?php
$numero = $_POST['numero'];


if ($numero < 0) {
    $soma = $numero + 1;
    $numero++;
    for ($i = $numero; $i < 0; $i++) {
        $numero++;
        $soma = $soma + $numero;
    }
} else {
    $soma = $numero - 1;
    $numero--;
    for ($i = $numero; $i > 0; $i--) {
        $numero--;
        $soma = $soma + $numero;
    }
}
echo "A soma de todos os número menores que o número lido é $soma";


