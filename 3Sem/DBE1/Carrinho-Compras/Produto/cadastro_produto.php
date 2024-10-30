<?php
include "conecta.php";
?>

<form action="./logica.php" method="POST">
    <input type="hidden" name="codproduto">
    Nome : <input type="text" name="nome">
    Descrição: <input type="text" name="desc">
    Preço: <input type="number" name="preco">
    <input type="reset" name="reset" value="Limpar">
    <input type="submit" name="cadprod" value="Enviar">
</form>


<a href='listar_produto.php'>Listagem de produtos</a> <br>