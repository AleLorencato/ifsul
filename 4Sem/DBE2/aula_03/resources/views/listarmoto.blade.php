<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listar Moto</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
  <div class="container">
    @if(isset($moto))
    <h1>Detalhes da Moto</h1>
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
      <tr>
        <td>{{ $moto->id }}</td>
        <td>{{ $moto->marca }}</td>
        <td>{{ $moto->modelo }}</td>
        <td>R$ {{ number_format($moto->preco, 2, ',', '.') }}</td>
        <td>
        <a href="{{ url('/motos/' . $moto->id . '/edit') }}" class="btn btn-warning btn-sm">Editar</a>
        <form action="{{ url('/motos/' . $moto->id . '/destroy') }}" method="POST" style="display:inline-block;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm"
          onclick="return confirm('Tem certeza que deseja remover esta moto?')">Remover</button>
        </form>
        </td>
      </tr>
      </tbody>
    </table>
  @endif

    @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif
  </div>
</body>

</html>