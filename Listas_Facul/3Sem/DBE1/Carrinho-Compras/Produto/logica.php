<?php
include "conecta.php";
session_start();

if (isset($_POST['cadprod'])) {
    $nomeprod = $_POST['nome'];
    $descprod = $_POST['desc'];
    $preco = $_POST['preco'];
    $sql = "INSERT INTO produto (nomeprod, descprod, preco) VALUES ('$nomeprod', '$descprod', '$preco')";
    $resultado = mysqli_query($conexao, $sql);
    header('Location: ./listar_produto.php');
}

if (isset($_POST['alterar'])) {
    $nomeprod = $_POST['nome'];
    $descprod = $_POST['desc'];
    $codproduto = $_POST['codproduto'];
    $preco = $_POST['preco'];
    $sql = "UPDATE produto SET nomeprod='$nomeprod', descprod='$descprod', preco = '$preco' WHERE codproduto='$codproduto'";
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
    $preco = $_POST['preco'];

    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = array();
        $_SESSION['total_carrinho'] = 0;
    }
    $encontrado = false;
    foreach ($_SESSION['carrinho'] as &$item) {
        if ($item['codigo'] == $codproduto) {
            $item['quantidade'] += $quantidade;
            $item['preco'] = $preco;
            $item['total'] = $item['quantidade'] * $preco;
            $encontrado = true;
            break;
        }
    }
    if (!$encontrado) {
        $produto = array(
            'nome' => $nomeprod,
            'codigo' => $codproduto,
            'quantidade' => $quantidade,
            'preco' => $preco,
            'total' => $quantidade * $preco
        );
        $_SESSION['carrinho'][] = $produto;
    }
    // Recalcular o total do carrinho
    $_SESSION['total_carrinho'] = 0;
    foreach ($_SESSION['carrinho'] as $item2) {
        $_SESSION['total_carrinho'] += $item2['total'];
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