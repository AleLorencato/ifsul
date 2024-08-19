<?php
include "conecta.php";
include "logica.php";

?>
<section>
    <h1>Buscar Produto</h1><br>
    <form action="logica.php" method="post">
        <p>Nome: <input type="text" name="nome"></p>
        <button type="submit" name="buscarprod" value="editar"> Buscar Produto </button>
    </form>
</section>

<a href='index.php'>Voltar</a>