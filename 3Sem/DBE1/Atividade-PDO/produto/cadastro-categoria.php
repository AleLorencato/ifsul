<?php
include "../logic/conecta.php";
?>

<form action="../logic/logica-categoria.php" method="POST">
  Nome : <input type="text" name="nome">
  <input type="reset" name="reset" value="Limpar">
  <input type="submit" name="cadastro" value="Enviar">
</form>


<a href='./pesquisar-produto.php'>Pesquisar Produtos</a> <br>