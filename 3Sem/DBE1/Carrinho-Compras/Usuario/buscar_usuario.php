<?php
include "conecta.php";
?>
<section>
    <h1>Buscar Usuário</h1><br>
    <form action="logica.php" method="post">
        <p>Nome: <input type="text" name="nome"></p>
        <button type="submit" name="buscarusuario" value="editar"> Buscar Usuario </button>
    </form>
</section>

<a href='listagem_usuario.php'>Voltar</a>