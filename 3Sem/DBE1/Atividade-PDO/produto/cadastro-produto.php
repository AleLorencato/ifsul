<?php
include "../logic/conecta.php";
include "../logic/query.php";
?>

<form action="../logic/logica-produto.php" method="POST">
  <input type="hidden" name="idproduto">
  Nome : <input type="text" name="nome">
  Descrição: <input type="text" name="descricao">
  Quantidade: <input type="text" name="quantidade">
  Categoria: <select name="categoria">
    <?php
    $query = "SELECT * FROM categoria";
    $categorias = queryFetchAll($pdo, $query);
    foreach ($categorias as $categoria) {
      echo "<option value='{$categoria['idcategoria']}'>{$categoria['nome']}</option>";
    }
    ?>
  </select>
  <input type="reset" name="reset" value="Limpar">
  <input type="submit" name="cadastro" value="Cadastrar">
</form>


<a href='./pesquisar-produto.php'>Voltar</a> <br>