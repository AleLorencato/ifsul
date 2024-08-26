<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php
    include_once("../../includes/componentes/cabecalho.php");
    include_once('../../includes/Funcoes/funcoes_veiculo.php');
    include_once("../../includes/conecta.php");
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Veículos</title>
    <link rel="stylesheet" href="../../Styles/pages.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>

<body>
    <?php require('../../Includes/componentes/menu_vend.php'); ?>
    <main id="main">
        <div class="container">
            <h3> Listagem de Veículos </h3>
            <?php
            $carros = listarCarro($conexao);
            if (empty($carros)) {
            ?>
                <section>
                    <p>Não há veículos cadastrados.</p>
                </section>
                <?php
            } else {
                foreach ($carros as $carro) {
                ?>
                    <section class="cd-sec">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">
                                    <?php echo $carro['marca']; ?>
                                </span>
                                <p>
                                    <?php echo $carro['modelo']; ?>
                                </p>
                                <p>Preço: R$
                                    <?php echo $carro['preco']; ?>
                                </p>
                            </div>
                            <div class="card-action">
                                <form action="../../includes/logica/logica_veiculo.php" method="post">
                                    <button type="submit" class="btn btn-primary" name="editar-carro" value="<?php echo $carro['codveiculo']; ?>">Editar</button>
                                    <button type="submit" class="btn btn-danger" name="deletar-carro" value="<?php echo $carro['codveiculo']; ?>" onclick="return confirma_excluir()">Deletar</button>
                                </form>
                            </div>
                        </div>
                    </section>
            <?php
                }
            }
            ?>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>