<?php
include "../logic/conecta.php";
include "../logic/logica-usuario.php";
session_start();
$codusuario = $_SESSION['codusuario'];
$array = array($codusuario);
$linha = buscarUsuario($pdo, $array);
?>
<section>
  <form action="../logic/logica-usuario.php" method="post" enctype="multipart/form-data">
    <p>ID:
      <?php echo $linha['codusuario']; ?>
    </p>
    <input type="hidden" name="codusuario" value="<?php echo $linha['codusuario'] ?>">
    <p>Nome: <input type="text" name="nome" value="<?php echo $linha['nome'] ?>"></p>
    <p>Email:<input type="text" name="email" value="<?php echo $linha['email'] ?>"></p>
    <p>Senha: <input type="password" name="senha" value="<?php echo $linha['senha'] ?>" ?></p>
    <button type="submit" name="alterar" value="alterar"> Editar </button>
    <button type="submit" name="excluir" value="excluir" onclick="return confirma_excluir()"> Deletar </button>
  </form>
</section>



<a href="../produto/pesquisar-produto.php">Voltar</a> <br>