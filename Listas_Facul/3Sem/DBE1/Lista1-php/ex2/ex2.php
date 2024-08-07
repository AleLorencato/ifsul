<?php
$nome = $_POST['nome'];
$idade = $_POST['idade'];
$cidade = $_POST['cidade'];

if ($idade < 18) {
    echo "Inscrição Inválida";
} else {
    if ($cidade == 0 || $cidade == 1) {
        echo "$nome Inscrição para a Zona Sul";
    } else {
        echo "$nome Inscrição para a Capital";
    }
}


?>