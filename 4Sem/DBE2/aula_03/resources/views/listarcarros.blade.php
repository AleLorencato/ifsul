<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListarVeiculos</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    @foreach ($users as $user)
        <h1>Bom dia
            {{$user->name}}
    </h1>@endforeach <h1>Listagem dos Carros</h1>
    <table>
        <tr>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Ano</th>
            <th>Preço</th>
        </tr>
        @foreach($carros as $carro)
            <tr>
                <td>{{ $carro->marca }}</td>
                <td>{{ $carro->modelo }}</td>
                <td>{{ $carro->ano }}</td>
                <td>{{ $carro->preco }}</td>
        </tr>@endforeach
    </table>
    <h1>Listagem das Motos</h1>
    <table>
        <tr>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Ano</th>
            <th>Preço</th>
            @foreach ($motos as $moto)
                <tr>
                    <td>{{ $moto->marca }}</td>
                    <td>{{ $moto->modelo }}</td>
                    <td>{{ $moto->ano }}</td>
            <td>{{ $moto->preco }}</td>@endforeach
    </table>
</body>

</html>