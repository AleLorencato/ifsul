<?php
require_once 'query.php';
require_once './conecta.php';

function iniciarSessao($usuario)
{
    session_start();
    $_SESSION['logado'] = true;
    $_SESSION['cod_pessoa'] = $usuario['codusuario'];
    $_SESSION['nome'] = $usuario['nome'];
}

if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $array = array($nome, $email, $senha);
    inserirUsuario($pdo, $array);
    $array = array($email, $senha);
    $usuario = acessarUsuario($pdo, $array);
    iniciarSessao($usuario);
    header('location:../produto/pesquisar-produto.php');
}

if (isset($_POST['entrar'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $array = array($email, $senha);
    $usuario = acessarUsuario($pdo, $array);

    if ($usuario) {
        iniciarSessao($usuario);
        header('location:../produto/pesquisar-produto.php');
    } else {
        header('location:../index.php');
    }
}

if (isset($_POST['sair'])) {
    session_start();
    session_destroy();
    header('location:../../Auth/index.php');
}

if (isset($_POST['deletar-conta'])) {
    $codusuario = $_POST['deletar-conta'];
    $array = array($codusuario);
    deletarUsuario($pdo, $array);
    session_start();
    session_destroy();
    header('location:../../Auth/login.php');
}


function inserirUsuario($pdo, $array)
{
    $query = "insert into usuario (nome, email, senha) values (?, ?, ?)";
    return queryexecute($pdo, $query, $array);
}


function alterarUsuario($pdo, $array)
{
    $query = "update usuario set nome= ?, email = ?, senha= ? where codusuario = ?";
    return queryexecute($pdo, $query, $array);
}

function deletarUsuario($pdo, $array)
{
    $query = "delete from usuario where codusuario = ?";
    return queryexecute($pdo, $query, $array);
}


function acessarUsuario($pdo, $array)
{
    $query = "select * from usuario where email=? and senha=?";
    return queryFetch($pdo, $query, $array);
}


function listarUsuario($pdo)
{
    $query = "select * from usuario";
    return queryAll($pdo, $query);
}