<?php
$nome = $_POST['nome'];
$livro = $_POST['livro'];
$tipo = $_POST['tipo'];
$hoje = new dateTime();
$devolucao = $hoje;
if ($tipo == 1) {
    echo "Usuário: $nome Livro: $livro ";
    echo "Data: " . $hoje->format('d/m/y');
    $dias14 = new DateInterval('P14D');
    $devolucao->add($dias14);
    echo " Data de devolução: " . $devolucao->format('d/m/y');

} else if ($tipo == 2) {
    echo "Usuário: $nome Livro: $livro ";
    echo "Data: " . $hoje->format('d/m/y');
    $dias7 = new DateInterval('P7D');
    $devolucao->add($dias7);
    echo " Data de devolução: " . $devolucao->format('d/m/y');
}



