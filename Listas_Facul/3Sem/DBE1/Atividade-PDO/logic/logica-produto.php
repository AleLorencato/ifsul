<?php
session_start();
include "conecta.php";
include "query.php";

function iniciarSessao($usuario)
{
  $_SESSION['logado'] = true;
  $_SESSION['codusuario'] = $usuario['codusuario'];
  $_SESSION['nome'] = $usuario['nome'];
}

if (isset($_POST['cadastro'])) {
  $nome = $_POST['nome'];
  $descricao = $_POST['descricao'];
  $quantidade = $_POST['quantidade'];
  $idcategoria = $_POST['idcategoria'];
  $array = array($nome, $descricao, $quantidade, $idcategoria);
  cadastrarProduto($pdo, $array);
  header('Location: ../produto/pesquisar-produto.php');
}

if (isset($_POST['pesquisar'])) {
  $nome = $_POST['nome'];
  $array = array($nome);
  $produtos = buscarProduto($pdo, $nome);
  $_SESSION['produtos'] = $produtos;
  header('Location: ../produto/listar-produto.php');
}

if (isset($_POST['alterar'])) {
  $nome = $_POST['nome'];
  $descricao = $_POST['descricao'];
  $idproduto = $_POST['idproduto'];
  $quantidade = $_POST['quantidade'];
  $idcategoria = $_POST['idcategoria'];
  $array = array($nome, $descricao, $quantidade, $idcategoria, $idproduto);
  alterarProduto($pdo, $array);
  header('Location: ../produto/editar-produto.php');
}

if (isset($_POST['excluir'])) {
  $idproduto = $_POST['idproduto'];
  $array = array($idproduto);
  excluirProduto($pdo, $array);
  header('Location: ../produto/editar-produto.php');
}




function listarProdutos($pdo)
{
  $query = "SELECT * FROM produto";
  $produtos = queryFetchAll($pdo, $query);
  return $produtos;
}

function buscarProduto($pdo, $nome)
{
  $query = "SELECT * FROM produto WHERE nome LIKE ?";
  $array = array("%$nome%");
  $result = queryFetch($pdo, $query, $array);
  return $result;
}

function cadastrarProduto($pdo, $array)
{
  $query = "INSERT INTO produto (nome, descricao, quantidade, idcategoria) VALUES (?, ?, ?, ?)";
  return queryExecute($pdo, $query, $array);
}

function alterarProduto($pdo, $array)
{
  $query = "UPDATE produto SET nome=?, descricao=?, quantidade=?, idcategoria=? WHERE idproduto=?";
  return queryExecute($pdo, $query, $array);
}

function excluirProduto($pdo, $array)
{
  $query = "DELETE FROM produto WHERE idproduto=?";
  return queryExecute($pdo, $query, $array);
}