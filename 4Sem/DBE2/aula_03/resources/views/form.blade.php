<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
    </head>

    <body>
        <h1>Cadastro de veículo</h1>

        <form action="/carros" method="post">
            @csrf
            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" id="modelo" />

            <label for="marca">Marca</label>
            <input type="text" name="marca" id="marca" />

            <label for="preco">Preço</label>
            <input type="text" name="preco" id="preco" />

            <label for="ano">Ano</label>
            <input type="text" name="ano" id="ano" />

            <button type="submit">Cadastrar</button>
    </body>
</html>
