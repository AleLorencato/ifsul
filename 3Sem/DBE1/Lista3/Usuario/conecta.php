<?php
$conexao = mysqli_connect('localhost', 'root', '', 'aula');
mysqli_set_charset($conexao, "utf8");
session_start();
if (!$conexao) {
    die('Não foi possível conectar: ' . mysqli_connect_error());
}