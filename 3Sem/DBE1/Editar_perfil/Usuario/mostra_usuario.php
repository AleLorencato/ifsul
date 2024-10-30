<?php
include_once "conecta.php";
while ($linha = mysqli_fetch_assoc($usuario)) {
    ?>
    <section>
        <form action="logica.php" method="post" enctype="multipart/form-data">
            <p>ID:
                <?php echo $linha['codpessoa']; ?>
            </p>
            <input type="hidden" name="codpessoa" value="<?php echo $linha['codpessoa'] ?>">
            <p>Nome: <input type="text" name="nome" value="<?php echo $linha['nome'] ?>"></p>
            <p>Email:<input type="text" name="email" value="<?php echo $linha['email'] ?>"></p>
            <p>CPF: <input type="text" name="cpf" value="<?php echo $linha['cpf'] ?>" ?></p>
            <p>Senha: <input type="password" name="senha" value="<?php echo $linha['senha'] ?>" ?></p>
            <p>Foto: <img src="./imagens/<?php echo $linha['imagem']; ?>" width='100px' height='100px' /></p>
            <p>Editar Foto: <input type="file" name="arquivo"></p>
            <button type="submit" name="alterar" value="alterar"> Editar </button>
            <button type="submit" name="excluir" value="excluir" onclick="return confirma_excluir()"> Deletar </button>
        </form>
    </section>
    <?php
}
?>
<a href="listagem_usuario.php">Listagem de usuários</a>
<a href='buscar_usuario.php'>Voltar </a>