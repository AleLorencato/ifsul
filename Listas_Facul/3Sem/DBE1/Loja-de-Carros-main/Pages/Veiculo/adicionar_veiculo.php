<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  include_once ("../../Includes/componentes/cabecalho.php");
  ?>
  <title>Cadastro</title>
  <link rel="stylesheet" href="../../Styles/pages.css">
</head>

<body>
  <header>
    <h1>Anunciar Veículo</h1>
  </header>
  <form id="cadastro" action="../../Includes/logica/logica_veiculo.php" method="post" class="form-container">
    <select name="marca" id="marca">
      <option value="Volkswagen">Volkswagen</option>
      <option value="Fiat">Fiat</option>
      <option value="Renault">Renault</option>
      <option value="Chevrolet">Chevrolet</option>
      <option value="Bmw">Bmw</option>
      <option value="Ford">Ford</option>
      <option value="Mercedes">Mercedes</option>
      <option value="Hyundai">Hyundai</option>
    </select>
    <input class="input" type="text" id="modelo" name="modelo" placeholder="Digite o Modelo do Veículo" />
    <input class="input" id="preco" type="number" name="preco" placeholder="Digite o preco do Veículo" />
    <p>Cotação do Dólar:</p>
    <p id="exchange-rate"></p>
    <button type="button" id="get-exchange-rate" class="btn-primary">Obter Cotação do Dólar</button>
    <button type="submit" id='anunciar' name='anunciar' value="Anunciar" class="btn-primary"> Anunciar </button>
    <a href="../Vendedor/listarCarros-adm.php">
      <p>Voltar</p>
    </a>
  </form>
  <script>
    // Fetch API for Exchange Rate
    document.getElementById('get-exchange-rate').addEventListener('click', function() {
      fetch('https://api.exchangerate-api.com/v4/latest/USD')
        .then(response => response.json())
        .then(data => {
          const rate = data.rates.BRL;
          const preco = document.getElementById('preco').value;
          const precoEmDolares = (preco / rate).toFixed(2);
          document.getElementById('exchange-rate').textContent = `1 USD = ${rate} BRL | Preço em USD: $${precoEmDolares}`;
        })
        .catch(error => console.error('Erro ao obter cotação:', error));
    });
  </script>
</body>

</html>