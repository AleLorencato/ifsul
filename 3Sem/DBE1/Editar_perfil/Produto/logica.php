<?php
include "conecta.php";

if (isset ($_POST['cadprod'])) {
    $nomeprod = $_POST['nome'];
    $descprod = $_POST['desc'];
    $codproduto = $_POST['codproduto'];
    $sql = "insert into produto (nomeprod,descprod) values ('$nomeprod','$descprod')";
    $resultado = mysqli_query($conexao, $sql);
    header('location: ./listar_produto.php');
}
if (isset ($_POST['alterar'])) {
    $nomeprod = $_POST['nome'];
    $descprod = $_POST['desc'];
    $codproduto = $_POST['codproduto'];
    $sql = "update produto set nomeprod='$nomeprod', descprod='$descprod' where codproduto = '$codproduto'";
    $resultado = mysqli_query($conexao, $sql);
    header('location: ./listar_produto.php');
}

if (isset ($_POST['excluir'])) {
    $nomeprod = $_POST['nome'];
    $descprod = $_POST['desc'];
    $codproduto = $_POST['codproduto'];
    $sql = "delete from produto where codproduto = '$codproduto'";
    $resultado = mysqli_query($conexao, $sql);
    header('location: ./listar_produto.php');
}
if (isset ($_POST['buscarprod'])) {
    $nomeprod = $_POST['nome'];
    $produto = buscarProduto($conexao, $nomeprod);
    if ($produto != false) {
        require_once ('./mostra_produto.php');
    } else {
        header('location: ./listar_produto.php');
    }
}

function buscarProduto($conexao, $nomeprod)
{
    $query = "select * from produto where nomeprod like '%$nomeprod%'";
    if ($resultado = mysqli_query($conexao, $query)) {
        return $resultado;
    } else {
        return false;
    }

}

