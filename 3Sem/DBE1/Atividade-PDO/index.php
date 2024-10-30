<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./login.css">
  <title>Login</title>
</head>

<body>
  <main>
    <div class="login-wrapper">
      <section class="login-container">
        <form action="./logic/logica-usuario.php" method="post" id="form">
          <p><label for="email"></label><input type="email" name="email" id="email" placeholder="E-mail" class="input">
          </p>
          <p><label for="senha"></label><input type="password" name="senha" id="senha" placeholder="Senha"
              class="input"></p>
          <p><button type="submit" id='entrar' name='entrar' value="Entrar" class="btn-primary"> Entrar
            </button> </p>
        </form>
        <h2>Esta é a sua primeira vez aqui?</h2>
        <p>Para ter acesso completo a este site, você primeiro precisa criar uma conta.</p>
        <a href="./auth/cadastro.php">
          <p><button id='cad' name='cad' class="btn-secondary" style="margin-top: 1.5rem;"> Criar Conta </button>
          </p>
        </a>
      </section>
    </div>
    <div class="msg" id="text"></div>
  </main>
</body>

</html>