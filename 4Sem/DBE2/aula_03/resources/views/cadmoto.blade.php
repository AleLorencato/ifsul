<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Moto</title>
</head>

<body>
    <div class="container">
        <h1>Cadastro de Moto</h1>
        <form action="{{ url('/motos') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" name="marca" id="marca" class="form-control" value="{{ old('marca') }}" required>
            </div>

            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" name="modelo" id="modelo" class="form-control" value="{{ old('modelo') }}" required>
            </div>

            <div class="form-group">
                <label for="preco">Preço:</label>
                <input type="number" name="preco" id="preco" class="form-control" value="{{ old('preco') }}" step="0.01"
                    required>
            </div>

            <button type="submit" class="btn btn-success">Cadastrar Moto</button>
            <a href="{{ url('/motos') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>

</html>