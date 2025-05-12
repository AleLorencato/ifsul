<http>

  <head>
    <?php
    require "key.php";

    require 'vendor/autoload.php';
    use Google\Cloud\Firestore\FirestoreClient;
    $configParams;

    $db = new FirestoreClient($configParams);
    $collecRef = $db->collection('Provedores');
    $docs = $collecRef
      ->orderBy('mensuracao')
      ->limit(1000)
      ->documents();

    $data_chart = [];
    $technologies = [];
    $totalYear = [];
    foreach ($docs as $doc) {
      $year = (int) substr($doc['mensuracao'], 0, 4);

      if (!isset($totalYear[$year][$doc['tecnologia']])) {
        $totalYear[$year][$doc['tecnologia']] = 0;
      }
      $totalYear[$year][$doc['tecnologia']] += $doc['qt'];

      if (!in_array($doc['tecnologia'], $technologies)) {
        $technologies[] = $doc['tecnologia'];
      }
    }

    foreach ($totalYear as $year => $techData) {
      $row = [(string) $year];
      foreach ($technologies as $tech) {
        $row[] = $techData[$tech] ?? 0;
      }
      $data_chart[] = $row;
    }

    array_unshift($data_chart, ['Ano', ...$technologies]);

    $data_chart_json = json_encode($data_chart);
    ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
      integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
  </head>

  <script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable(<?php echo $data_chart_json; ?>);
      var options = {
        title: 'Quantidade de clientes X Anos, divididos por tecnologia',
        hAxis: { title: 'Ano', titleTextStyle: { color: '#333' } },
        vAxis: { minValue: 0 }
      };

      var chart = new google.visualization.AreaChart(document.getElementById('cumulative_area'));
      chart.draw(data, options);
    }
  </script>

  <body>
    <div id="cumulative_area" style="width: 100%; height: 700px;"></div>
  </body>

  </body>
</http>