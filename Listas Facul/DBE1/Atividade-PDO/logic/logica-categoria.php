<?php
session_start();
include "conecta.php";
include "query.php";

if (isset($_POST['cadastro'])) {
  $nome = $_POST['nome'];
  $array = array($nome);
  cadastrarCategoria($pdo, $array);
  header('Location: ../produto/pesquisar-produto.php');
}
function cadastrarCategoria($pdo, $array)
{
  $query = "INSERT INTO categoria (nome) VALUES (?)";
  return queryExecute($pdo, $query, $array);
}