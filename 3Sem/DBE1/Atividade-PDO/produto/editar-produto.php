<?php
include "../logic/conecta.php";
include "../logic/logica-produto.php";
$resultado = listarProdutos($pdo);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Editar Produto</title>
</head>

<body>
  <h1>Editar Produto</h1>
  <?php
  foreach ($resultado as $produto) {
    ?>

    <form method="post" action="../logic/logica-produto.php">
      <input type="hidden" name="idproduto" value="<?php echo $produto['idproduto']; ?>">
      Nome: <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($produto['nome']); ?>"
        required><br>
      Descrição: <input type="text" id="descricao" name="descricao"
        value="<?php echo htmlspecialchars($produto['descricao']); ?>" required><br>
      Quantidade: <input type="number" id="quantidade" name="quantidade"
        value="<?php echo htmlspecialchars($produto['quantidade']); ?>" required><br>
      Categoria: <input type="number" id="idcategoria" name="idcategoria"
        value="<?php echo htmlspecialchars($produto['idcategoria']); ?>" required><br>

      <button type="submit" name="alterar">Editar</button>
      <button type="submit" name="excluir">Excluir</button>
    </form>
    <br>
    <br>
    <?php
  }
  ?>
  <br>
  <a href="pesquisar-produto.php">Voltar para a Pesquisa de Produtos</a>
</body>

</html>