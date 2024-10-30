<?php
include "../logic/conecta.php";
include "../logic/logica-produto.php";
?>
<section>
    <form method="POST" action="../logic/logica-produto.php">
        <input type="text" name="nome" placeholder="Nome do Produto">
        <button type="submit" name="pesquisar">Pesquisar</button>
    </form>
</section>

<a href="cadastro-categoria.php">Cadastrar Categoria</a><br>
<a href="cadastro-produto.php">Cadastrar Produto</a><br>
<a href="editar-produto.php">Editar Produto</a>
<a href="../usuario/editar-perfil.php">Editar Perfil</a>