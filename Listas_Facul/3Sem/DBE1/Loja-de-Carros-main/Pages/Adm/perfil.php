<?php
include_once ("../../Includes/componentes/cabecalho.php");
include_once ("../../Includes/conecta.php");
include_once ('../../Includes/Funcoes/funcoes_cliente.php');
$codcliente = $_SESSION['cod_pessoa'];
$array = array($codcliente);
$pessoa = buscarCliente($conexao, $array);
?>
<!DOCTYPE html>
<html>

<head>
  <title>User Profile</title>
  <link rel="stylesheet" href="../../Styles/pages.css">
</head>

<body>
  <?php require ("../../Includes/componentes/menu.php"); ?>
  <section class="login-container">
    <h1>User Profile</h1>
    <div>
      <img src="" alt="Profile Picture">
    </div>
    <div>
      <p>Name:
        <?php echo $pessoa['nome']; ?>
      </p>
      <p>Email:
        <?php echo $pessoa['email']; ?>
      </p>
      <p>logout:</p>
      <form action="../../Includes/logica/logica_cliente.php" method="post">
        <button type="submit" name="sair" value="Sair" style="float: right;" class="btn-primary">Sair</button>
      </form>
    </div>
  </section>
</body>

</html>