<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <h1>Editar Usuário</h1>
        <form action="{{ url('/users/' . $user->id . '/update') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}"
                    required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control"
                    value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Atualizar Usuário</button>
            <a href="{{ url('/users') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>

</html>