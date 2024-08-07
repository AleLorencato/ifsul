<?php
include "../logic/conecta.php";
session_start();

// Verificação e depuração da sessão
if (!isset($_SESSION['produtos'])) {
  echo "Nenhum produto encontrado na sessão.";
  $_SESSION['produtos'] = []; // Inicializa a sessão com um array vazio se não estiver definido
} else {
  echo "Produtos encontrados na sessão.<br>";
  echo "Conteúdo da sessão:<br>";
  print_r($_SESSION['produtos']); // Adicionado para depuração
}

$produtos = $_SESSION['produtos'];
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Lista de Produtos</title>
</head>

<body>
  <h1>Lista de Produtos</h1>
  <ul id="lista-produtos">
    <?php if (empty($produtos)): ?>
      <li>Nenhum produto disponível.</li>
    <?php else: ?>
      <?php if (isset($produtos[0]) && is_array($produtos[0])): ?>
        <?php foreach ($produtos as $produto): ?>
          <li><?php echo htmlspecialchars($produto['nome']) . ' - ' . htmlspecialchars($produto['descricao']); ?></li>
        <?php endforeach; ?>
      <?php else: ?>
        <li><?php echo htmlspecialchars($produtos['nome']) . ' - ' . htmlspecialchars($produtos['descricao']); ?></li>
      <?php endif; ?>
    <?php endif; ?>
  </ul>

  <a href="cadastro-categoria.php">Cadastrar Categoria</a><br>
  <a href="cadastro-produto.php">Cadastrar Produto</a><br>
</body>

</html>