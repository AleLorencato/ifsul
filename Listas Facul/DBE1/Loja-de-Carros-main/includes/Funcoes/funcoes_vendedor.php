<?php
require_once 'query.php';
function inserirVendedor($conexao, $array)
{
  $query = "insert into vendedor (nome, email, cpf, senha) values (?, ?, ?, ?)";
  return queryexecute($conexao, $query, $array);
}


function buscarVend($conexao, $array)
{
  $query = "select * from vendedor where codvendedor=?";
  return queryFetch($conexao, $query, $array);
}

function acessarVendedor($conexao, $array)
{
  $query = "select * from vendedor where email=? and senha=?";
  return queryFetch($conexao, $query, $array);
}

function listarVendedor($conexao)
{
  $query = "select * from vendedor";
  return queryAll($conexao, $query);
}

function alterarVendedor($conexao, $array)
{
  $query = "update vendedor set nome= ?, email = ?, cpf = ?, senha= ? where codvendedor = ?";
  return queryexecute($conexao, $query, $array);
}