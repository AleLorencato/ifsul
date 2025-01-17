<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listar Usuário</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
  <div class="container">
    @if(isset($user))
    <h1>Detalhes do Usuário</h1>
    <table class="table table-bordered">
      <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
      </tr>
      </thead>
      <tbody>
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
        <a href="{{ url('/users/' . $user->id . '/edit') }}" class="btn btn-warning btn-sm">Editar</a>
        <form action="{{ url('/users/' . $user->id . '/destroy') }}" method="POST" style="display:inline-block;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm"
          onclick="return confirm('Tem certeza que deseja remover este usuário?')">Remover</button>
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