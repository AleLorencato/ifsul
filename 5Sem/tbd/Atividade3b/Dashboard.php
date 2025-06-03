<?php

require 'vendor/autoload.php';
use Google\Cloud\Firestore\FirestoreClient;
require './key.php';

$configParams;
$data_chart = [];

try {
  $db = new FirestoreClient($configParams);
  $docsCollection = $db->collection('Provedores');
  $querySnapshot = $docsCollection->select(['mensuracao', 'qt', 'velocidade'])
    ->orderBy('mensuracao')
    ->limit(3000)
    ->documents();

  foreach ($querySnapshot as $doc) {
    if ($doc->exists()) {
      $mensuracao = $doc['mensuracao'];
      $qt_clientes = (int) $doc['qt'];
      $velocidade = $doc['velocidade'];

      if ($velocidade === null || $velocidade === '') {
        continue;
      }

      if (!isset($data_chart[$mensuracao])) {
        $data_chart[$mensuracao] = [];
      }
      if (!isset($data_chart[$mensuracao][(string) $velocidade])) {
        $data_chart[$mensuracao][(string) $velocidade] = 0;
      }
      $data_chart[$mensuracao][(string) $velocidade] += $qt_clientes;
    }
  }

  $anosUnicos = [];
  $todasVelocidadesUnicasRaw = [];
  $totalAssinantesGlobalPorVelocidade = [];
  $dadosAgrupadosPorAno = [];

  foreach ($data_chart as $mensuracaoCompleta => $velocidadesNaMensuracao) {
    $ano = substr($mensuracaoCompleta, 0, 4);
    if (!in_array($ano, $anosUnicos)) {
      $anosUnicos[] = $ano;
    }
    if (!isset($dadosAgrupadosPorAno[$ano])) {
      $dadosAgrupadosPorAno[$ano] = [];
    }

    foreach ($velocidadesNaMensuracao as $velocidadeItem => $qt_clientes) {
      $velocidadeString = (string) $velocidadeItem;
      if (!in_array($velocidadeString, $todasVelocidadesUnicasRaw)) {
        $todasVelocidadesUnicasRaw[] = $velocidadeString;
      }

      if (!isset($totalAssinantesGlobalPorVelocidade[$velocidadeString])) {
        $totalAssinantesGlobalPorVelocidade[$velocidadeString] = 0;
      }
      $totalAssinantesGlobalPorVelocidade[$velocidadeString] += $qt_clientes;

      if (!isset($dadosAgrupadosPorAno[$ano][$velocidadeString])) {
        $dadosAgrupadosPorAno[$ano][$velocidadeString] = 0;
      }
      $dadosAgrupadosPorAno[$ano][$velocidadeString] += $qt_clientes;
    }
  }
  sort($anosUnicos);

  $velocidadesParaSelect = [];
  foreach ($todasVelocidadesUnicasRaw as $vel) {
    if (isset($totalAssinantesGlobalPorVelocidade[$vel]) && $totalAssinantesGlobalPorVelocidade[$vel] >= 1000) {
      $velocidadesParaSelect[] = $vel;
    }
  }
  sort($velocidadesParaSelect, SORT_NATURAL);

  $velocidadesIniciaisVisiveisSet = [];
  if (!empty($dadosAgrupadosPorAno)) {
    foreach ($anosUnicos as $ano) {
      if (isset($dadosAgrupadosPorAno[$ano])) {
        $velocidadesDoAno = $dadosAgrupadosPorAno[$ano];

        $velocidadesDoAnoFiltradas = array_filter($velocidadesDoAno, function ($velKey) use ($velocidadesParaSelect) {
          return in_array($velKey, $velocidadesParaSelect);
        }, ARRAY_FILTER_USE_KEY);

        arsort($velocidadesDoAnoFiltradas);
        $top4EsteAno = array_slice(array_keys($velocidadesDoAnoFiltradas), 0, 4);
        foreach ($top4EsteAno as $velTop) {
          $velocidadesIniciaisVisiveisSet[$velTop] = true;
        }
      }
    }
  }
  $velocidadesIniciaisVisiveis = array_keys($velocidadesIniciaisVisiveisSet);
  sort($velocidadesIniciaisVisiveis, SORT_NATURAL);

  $dadosCompletosParaGrafico = [];
  if (!empty($anosUnicos) && !empty($velocidadesParaSelect)) {
    $header = ['Ano'];
    foreach ($velocidadesParaSelect as $vel) {
      $header[] = $vel;
    }
    $dadosCompletosParaGrafico[] = $header;

    foreach ($anosUnicos as $ano) {
      $linha = [$ano];
      foreach ($velocidadesParaSelect as $vel) {
        $linha[] = isset($dadosAgrupadosPorAno[$ano][$vel]) ? (int) $dadosAgrupadosPorAno[$ano][$vel] : 0;
      }
      $dadosCompletosParaGrafico[] = $linha;
    }
  }

} catch (Exception $e) {
  echo "Erro no processamento PHP: " . htmlspecialchars($e->getMessage());
  $dadosCompletosParaGrafico = [['Ano', 'Erro'], ['N/A', 0]];
  $velocidadesParaSelect = [];
  $velocidadesIniciaisVisiveis = [];
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Assinantes Interativo</title>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <style>
    body {
      background-color: #f5f5f5;
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    .controls {
      margin-bottom: 20px;
      padding: 15px;
      border-radius: 5px;
    }

    #velocidadesSelect {
      width: 100%;
      max-width: 200px;
      height: 400px;
      padding: 5px;
      font-size: 14px;
      background-color: #f5f5f5;
      border-radius: 8px;
    }

    .control-info {
      margin-top: 10px;
      font-size: 12px;
      color: #666;
    }

    #chart_div {
      margin: 20px auto;
      border: 1px solid #ddd;
      border-radius: 5px;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      border-radius: 5px;
      display: flex;
      flex-direction: row;
    }

    h1 {
      text-align: center;
      color: #333;
      font-size: 24px;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <h1>Dashboard de Assinantes por Velocidade</h1>

  <main class="container">
    <div class="controls">
      <label for="velocidadesSelect"><strong>Selecionar Velocidades para Exibir:</strong></label><br>
      <select id="velocidadesSelect" multiple>
      </select>
      <div class="control-info">
        - Use Ctrl+Click para selecionar múltiplas velocidades<br>
        - Apenas velocidades com 1000+ assinantes totais aparecem nas opções
      </div>
    </div>

    <div id="chart_div" style="width: 95%; max-width: 1200px; height: 600px;"></div>
  </main>


  <script type="text/javascript">
    const rawDataCompleta = <?php echo json_encode($dadosCompletosParaGrafico); ?>;
    const todasVelocidadesParaSelect = <?php echo json_encode($velocidadesParaSelect); ?>;
    const velocidadesVisiveisInicial = <?php echo json_encode($velocidadesIniciaisVisiveis); ?>;

    let dataTableCompleta;
    let chart;
    let options = {
      title: 'Número de Assinantes por Velocidade ao Longo dos Anos',
      titleTextStyle: {
        fontSize: 16,
        bold: true
      },
      hAxis: {
        title: 'Ano',
        titleTextStyle: { color: '#333', fontSize: 14 },
        textStyle: { fontSize: 12 }
      },
      vAxis: {
        title: 'Número de Assinantes',
        minValue: 0,
        titleTextStyle: { color: '#333', fontSize: 14 },
        textStyle: { fontSize: 12 }
      },
      seriesType: 'bars',
      legend: {
        position: 'top',
        maxLines: 4,
        textStyle: { fontSize: 11 }
      },
      chartArea: {
        width: '75%',
        height: '70%',
        top: 100
      },
      backgroundColor: '#fafafa'
    };

    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(initDashboard);

    function initDashboard() {
      if (!rawDataCompleta || rawDataCompleta.length < 2 || rawDataCompleta[0].length < 1) {
        document.getElementById('chart_div').innerHTML = '<div style="text-align:center; padding:50px; color:#666;">Dados insuficientes para gerar o gráfico.</div>';
        return;
      }

      dataTableCompleta = google.visualization.arrayToDataTable(rawDataCompleta);
      chart = new google.visualization.ComboChart(document.getElementById('chart_div'));

      populateSelect();
      updateChart(velocidadesVisiveisInicial);

      document.getElementById('velocidadesSelect').addEventListener('change', function () {
        updateChart();
      });
    }

    function populateSelect() {
      const selectElement = document.getElementById('velocidadesSelect');
      selectElement.innerHTML = '';

      todasVelocidadesParaSelect.forEach(vel => {
        const option = document.createElement('option');
        option.value = vel;
        option.textContent = `${vel} Mbps`;

        if (velocidadesVisiveisInicial.includes(vel)) {
          option.selected = true;
        }
        selectElement.appendChild(option);
      });
    }

    function updateChart(velocidadesParaExibir) {
      let selectedVelocidades;

      if (velocidadesParaExibir) {
        selectedVelocidades = velocidadesParaExibir;
      } else {
        selectedVelocidades = Array.from(document.getElementById('velocidadesSelect').selectedOptions)
          .map(opt => opt.value);
      }

      const viewColumns = [0];
      const headerRow = rawDataCompleta[0];

      selectedVelocidades.forEach(selectedVel => {
        const colIndex = headerRow.indexOf(selectedVel);
        if (colIndex > 0) {
          viewColumns.push(colIndex);
        }
      });

      const view = new google.visualization.DataView(dataTableCompleta);

      if (viewColumns.length <= 1) {
        chart.clearChart();
        document.getElementById('chart_div').innerHTML =
          '<div style="text-align:center; padding:50px; color:#666; font-size:16px;">' +
          'Selecione pelo menos uma velocidade para exibir o gráfico.' +
          '</div>';
        return;
      }

      view.setColumns(viewColumns);

      const updatedOptions = { ...options };
      updatedOptions.title = `Número de Assinantes por Velocidade ao Longo dos Anos (${selectedVelocidades.length} velocidade/s selecionada/s)`;

      chart.draw(view, updatedOptions);
    }
  </script>
</body>

</html>