<?php
include "conecta.php";
?>
<?php
while ($linha = mysqli_fetch_assoc($produto)) {
    ?>
    <section>
        <form action="./logica.php" method="post">
            <p>ID:
                <?php echo htmlspecialchars($linha['codproduto']); ?>
            </p>
            <input type="hidden" name="codproduto" value="<?php echo htmlspecialchars($linha['codproduto']) ?>">
            <p>Nome: <input type="text" name="nome" value="<?php echo htmlspecialchars($linha['nomeprod']) ?>"></p>
            <p>Descrição:<input type="text" name="desc" value="<?php echo htmlspecialchars($linha['descprod']) ?>"></p>
            <button type="submit" name="alterar" value="editar"> Editar </button>
            <button type="submit" name="excluir" value="excluir"> Deletar </button>
        </form>
    </section>
    <?php
}
?>
<a href="buscar_produto.php">Buscar Produto</a>
<a href='/index.php'>Voltar </a>