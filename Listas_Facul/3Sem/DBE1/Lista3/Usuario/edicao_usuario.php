<?php
include "conecta.php";
if ($_POST['acao'] == 'editar') {

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

} else {


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
}
?>
<br><a href='./listagem_usuario.php'>Voltar </a>