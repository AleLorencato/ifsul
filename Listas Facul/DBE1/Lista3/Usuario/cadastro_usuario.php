<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$senha = $_POST['senha'];

include "conecta.php";

$sql = "insert into pessoa (nome,email,cpf,senha) values ('$nome','$email','$cpf','$senha')";

$resultado = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_array($resultado);
$_SESSION['codpessoa'] = $dados['codpessoa'];

if ($resultado) {
   echo "Cadastro Efetuado com sucesso";
} else {
   echo 'Código de erro:' . mysqli_errno($conexao) . '<br>';
   echo 'Mensagem de erro:' . mysqli_error($conexao) . '<br>';
}

?>
<br><a href='../index.php'>Voltar </a>