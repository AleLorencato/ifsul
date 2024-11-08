<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Moto</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <h1>Editar Moto</h1>
        <form action="{{ url('/motos/' . $moto->id . '/update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" name="marca" id="marca" class="form-control" value="{{ old('marca', $moto->marca) }}"
                    required>
            </div>

            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" name="modelo" id="modelo" class="form-control"
                    value="{{ old('modelo', $moto->modelo) }}" required>
            </div>

            <div class="form-group">
                <label for="preco">Preço:</label>
                <input type="number" name="preco" id="preco" class="form-control"
                    value="{{ old('preco', $moto->preco) }}" step="0.01" required>
            </div>

            <button type="submit" class="btn btn-success">Atualizar Moto</button>
            <a href="{{ url('/motos') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>

</html>