<?php
include "conecta.php";
session_start();

if (isset($_POST['cadprod'])) {
    $nomeprod = $_POST['nome'];
    $descprod = $_POST['desc'];
    $sql = "INSERT INTO produto (nomeprod, descprod) VALUES ('$nomeprod', '$descprod')";
    $resultado = mysqli_query($conexao, $sql);
    header('Location: ./listar_produto.php');
}

if (isset($_POST['alterar'])) {
    $nomeprod = $_POST['nome'];
    $descprod = $_POST['desc'];
    $codproduto = $_POST['codproduto'];
    $sql = "UPDATE produto SET nomeprod='$nomeprod', descprod='$descprod' WHERE codproduto='$codproduto'";
    $resultado = mysqli_query($conexao, $sql);
    header('Location: ./listar_produto.php');
}

if (isset($_POST['excluir'])) {
    $codproduto = $_POST['codproduto'];
    $sql = "DELETE FROM produto WHERE codproduto='$codproduto'";
    $resultado = mysqli_query($conexao, $sql);
    header('Location: ./listar_produto.php');
}

if (isset($_POST['adicionar'])) {
    $nomeprod = $_POST['nome'];
    $codproduto = $_POST['codproduto'];
    $quantidade = $_POST['quantidade'];
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = array();
    }
    $encontrado = false;
    foreach ($_SESSION['carrinho'] as &$item) {
        if ($item['codigo'] == $codproduto) {
            $item['quantidade'] += $quantidade;
            $encontrado = true;
            break;
        }
    }
    if (!$encontrado) {
        $produto = array(
            'nome' => $nomeprod,
            'codigo' => $codproduto,
            'quantidade' => $quantidade
        );
        $_SESSION['carrinho'][] = $produto;
    }
    header('Location: ./listar_produto.php');
}
if (isset($_POST['limpar'])) {
    unset($_SESSION['carrinho']);
    header('Location: ./listar_produto.php');
}

function buscarProduto($conexao, $nomeprod)
{
    $query = "SELECT * FROM produto WHERE nomeprod LIKE '%$nomeprod%'";
    if ($resultado = mysqli_query($conexao, $query)) {
        return $resultado;
    } else {
        return false;
    }
}