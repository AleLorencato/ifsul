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
    <h1>Listagem dos Carros</h1>
    <a href="{{ url('/carros/form') }}">Adicionar Novo Carro</a>
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
                <td>
                    <a href="{{route('carro.edit', $carro->id)}}" title="Editar">Editar</a>
                </td>
                <td>
                    <form action="{{ url('/carros/' . $carro->id . '/destroy') }}" method="POST"
                        style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Tem certeza que deseja remover este carro?')">Remover</button>
                    </form>
                </td>
        </tr>@endforeach
    </table>
</body>

</html>