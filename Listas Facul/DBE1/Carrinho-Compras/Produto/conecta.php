<?php
$conexao = mysqli_connect('localhost', 'root', '', 'carrinho');
mysqli_set_charset($conexao, "utf8");

if (!$conexao) {
    die('Não foi possível conectar: ' . mysqli_connect_error());
}

