<?php
include "conecta.php";


if (isset ($_POST['cadastro'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    $sql = "insert into pessoa (nome,email,cpf,senha) values ('$nome','$email','$cpf','$senha')";
    $resultado = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_array($resultado);
    session_start();
    $_SESSION['codpessoa'] = $dados['codpessoa'];
    header('location:./listagem_usuario.php');
}

if (isset ($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $sql = "select * from pessoa where email='$email' and senha='$senha'";
    $resultado = mysqli_query($conexao, $sql);
    if (mysqli_num_rows($resultado) == 1) {
        $dados = mysqli_fetch_array($resultado);
        session_start();
        $_SESSION['codpessoa'] = $dados['codpessoa'];
        $_SESSION["logado"] = true;
        header("Location:./listagem_usuario.php");
    } else {
        header("Location:../index.php");
    }
}

if (isset ($_POST['alterar'])) {
    $codpessoa = $_POST['codpessoa'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    $SQL = "update pessoa set nome='$nome', email='$email', cpf='$cpf', senha='$senha'  where codpessoa = '$codpessoa'";

    $resultado = mysqli_query($conexao, $SQL);
    if ($resultado) {
        echo "Alteração Efetuada com sucesso";
    } else {
        echo 'Código de erro:' . mysqli_errno($conexao) . '<br>';
        echo 'Mensagem de erro:' . mysqli_error($conexao) . '<br>';
    }
    header('location: ./listagem_usuario.php');
}

if (isset ($_POST['excluir'])) {
    if ($_POST['acao'] == 'excluir') {

        $codpessoa = $_POST['codpessoa'];

        $SQL = "delete from pessoa where codpessoa = '$codpessoa'";

        $resultado = mysqli_query($conexao, $SQL);

        if ($resultado) {
            echo "Exclusão Efetuada com sucesso";
        } else {
            echo 'Código de erro:' . mysqli_errno($conexao) . '<br>';
            echo 'Mensagem de erro:' . mysqli_error($conexao) . '<br>';
        }

    }
    header('location: ./listagem_usuario.php');
}
if (isset ($_POST['buscarusuario'])) {
    $nome = $_POST['nome'];
    $usuario = buscarUsuario($conexao, $nome);
    if ($usuario != false) {
        require_once ('./mostra_usuario.php');
    } else {
        header('location: ./listagem_usuario.php');
    }
}
function buscarUsuario($conexao, $nome)
{
    $query = "select * from pessoa where nome like '%$nome%'";
    if ($resultado = mysqli_query($conexao, $query)) {
        return $resultado;
    } else {
        return false;
    }

}