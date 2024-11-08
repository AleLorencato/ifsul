<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Motos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <h1>Lista de Motos</h1>
        <a href="{{ url('/motos/form') }}" class="btn btn-primary mb-3">Adicionar Nova Moto</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($motos as $moto)
                    <tr>
                        <td>{{ $moto->id }}</td>
                        <td>{{ $moto->marca }}</td>
                        <td>{{ $moto->modelo }}</td>
                        <td>R$ {{ number_format($moto->preco, 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ url('/motos/' . $moto->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ url('/motos/' . $moto->id . '/edit') }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ url('/motos/' . $moto->id . '/destroy') }}" method="GET"
                                style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Tem certeza que deseja remover esta moto?')">Remover</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>