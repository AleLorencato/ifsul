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
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 20px;
      min-height: 100vh;
    }

    h1 {
      text-align: center;
      color: #fff;
      font-size: 28px;
      margin-bottom: 30px;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
      font-weight: 300;
    }

    .container {
      max-width: 1400px;
      margin: 0 auto;
      background: rgba(255, 255, 255, 0.95);
      border-radius: 15px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(10px);
      display: flex;
      flex-direction: row;
      overflow: hidden;
    }

    .controls {
      background: linear-gradient(145deg, #f0f2f7, #e8ebf0);
      padding: 25px;
      border-radius: 15px 0 0 15px;
      min-width: 250px;
      box-shadow: inset 2px 2px 5px rgba(0, 0, 0, 0.1);
    }

    .controls label {
      display: block;
      margin-bottom: 15px;
      font-weight: 600;
      color: #4a5568;
      font-size: 14px;
    }

    #velocidadesSelect {
      width: 100%;
      height: 400px;
      padding: 10px;
      font-size: 13px;
      background: #fff;
      border: 2px solid #e2e8f0;
      border-radius: 10px;
      box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.06);
      transition: border-color 0.3s ease;
    }

    #velocidadesSelect:focus {
      outline: none;
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    #velocidadesSelect option {
      padding: 8px;
      margin: 2px 0;
      border-radius: 5px;
    }

    #velocidadesSelect option:selected {
      background: linear-gradient(135deg, #667eea, #764ba2);
      color: white;
    }

    .control-info {
      margin-top: 15px;
      font-size: 11px;
      color: #718096;
      line-height: 1.4;
      padding: 10px;
      background: rgba(255, 255, 255, 0.7);
      border-radius: 8px;
      border-left: 4px solid #667eea;
    }

    .chart-container {
      flex: 1;
      padding: 25px;
      background: #fff;
      border-radius: 0 15px 15px 0;
    }

    #chart_div {
      width: 100%;
      height: 600px;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      background: #fff;
    }

    .no-data-message {
      text-align: center;
      padding: 50px;
      color: #718096;
      font-size: 16px;
      background: linear-gradient(135deg, #f7fafc, #edf2f7);
      border-radius: 10px;
      border: 2px dashed #cbd5e0;
    }

    @media (max-width: 768px) {
      .container {
        flex-direction: column;
      }

      .controls {
        border-radius: 15px 15px 0 0;
        min-width: auto;
      }

      .chart-container {
        border-radius: 0 0 15px 15px;
      }

      #velocidadesSelect {
        height: 200px;
      }
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
          '<div class="no-data-message"> Selecione pelo menos uma velocidade para exibir o gráfico</div>';
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