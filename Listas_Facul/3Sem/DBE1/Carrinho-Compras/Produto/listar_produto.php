<?php
include "conecta.php";
session_start();

function getProdutos($conexao)
{
    $stmt = $conexao->prepare("SELECT * FROM produto ORDER BY codproduto");
    $stmt->execute();
    return $stmt->get_result();
}

$resultado = getProdutos($conexao);

while ($linha = $resultado->fetch_assoc()) {
    ?>
    <section>
        <form action="./logica.php" method="post">
            <p>ID: <?php echo htmlspecialchars($linha['codproduto']); ?></p>
            <input type="hidden" name="codproduto" value="<?php echo htmlspecialchars($linha['codproduto']) ?>">
            <p>Nome: <input type="text" name="nome" value="<?php echo htmlspecialchars($linha['nomeprod']) ?>"></p>
            <p>Descrição:<input type="text" name="desc" value="<?php echo htmlspecialchars($linha['descprod']) ?>"></p>
            <p>Preço: <input type="number" name="preco" value="<?php echo htmlspecialchars($linha['preco']) ?>"></p>
            <p>Quantidade: <input type="number" name="quantidade" value="1"></p>
            <button type="submit" name="adicionar" value="adicionar">Adicionar</button>
            <button type="submit" name="alterar" value="editar">Editar</button>
            <button type="submit" name="excluir" value="excluir">Deletar</button>
        </form>
    </section>
    <?php
}
?>
<h4>Carrinho</h4>
<form action="./logica.php" method="post">
    <button type="submit" name="limpar" value="limpar">Limpar Carrinho</button>
</form>
<?php
if (isset($_SESSION['carrinho'])) {
    $carrinho = $_SESSION['carrinho'];
    foreach ($carrinho as $item) {
        echo "<p>Item: " . htmlspecialchars($item['nome']) . "</p>";
        echo "<p>Quantidade: " . htmlspecialchars($item['quantidade']) . "</p>";
        echo "<p>Preço: R$ " . htmlspecialchars($item['preco']) . "</p>";

    }
    echo "<h2>Total: R$ " . htmlspecialchars($_SESSION['total_carrinho']) . "</h2>";
} else {
    echo "<p>Carrinho vazio</p>";
}
?>

<a href="buscar_produto.php">Buscar Produto</a><br>
<a href="cadastro_produto.php">Cadastrar Produto</a><br>
<a href="../Usuario/listagem_usuario.php">Voltar</a>