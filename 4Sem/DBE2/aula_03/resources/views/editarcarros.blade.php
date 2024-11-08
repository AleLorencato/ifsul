<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Edite o Carro</h1>

    <form action="{{route('update', $carro->id)}}" method="POST">
        @csrf
        <label for="modelo">Modelo</label>
        <input type="text" name="modelo" id="modelo" value="{{$carro->modelo}}" />

        <label for="marca">Marca</label>
        <input type="text" name="marca" id="marca" value="{{$carro->marca}}" />

        <label for="preco">Preço</label>
        <input type="text" name="preco" id="preco" value="{{$carro->preco}}" />

        <label for="ano">Ano</label>
        <input type="text" name="ano" id="ano" value="{{$carro->ano}}" />

        <input type="submit" value="Salvar" />
        <a href="/carros"><button form=cancel>Cancelar</button></a>

    </form>


</body>

</html>