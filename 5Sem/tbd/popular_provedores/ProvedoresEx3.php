<http>

    <head>
        <?php
        require "key.php";

        require 'vendor/autoload.php';
        use Google\Cloud\Firestore\FirestoreClient;

        $db = new FirestoreClient($configParams);
        $collecRef = $db->collection('Provedores');
        $data_prov = $collecRef
            ->select(['mensuracao', 'qt'])
            ->orderBy('mensuracao')
            ->limit(500)
            ->documents();

        $data_chart = [];
        foreach ($data_prov as $reg_prov) {
            $mensuracao = $reg_prov['mensuracao'];
            $qt_clientes = $reg_prov['qt'];
            if (!isset($data_chart[$mensuracao])) {
                $data_chart[$mensuracao] = 0;
            }
            $data_chart[$mensuracao] += $qt_clientes;
        }
        ?>
        <script>
            var arrProvedores = [];
            arrProvedores.push(['Ano', 'Assinantes']);
            <?php
            foreach ($data_chart as $mensuracao => $qt_clientes) {
                echo 'arrProvedores.push(["' . $mensuracao . '", ' . $qt_clientes . ']);' . PHP_EOL;
            }
            ?>
        </script>
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
            var data = google.visualization.arrayToDataTable(arrProvedores);
            var options = {
                title: 'Número de Assinantes ao Longo dos Anos',
                hAxis: { title: 'Ano', titleTextStyle: { color: '#333' } },
                vAxis: { title: 'Número de Assinantes', minValue: 0 },
                curveType: 'function',
                legend: { position: 'bottom' }
            };
            var chart = new google.visualization.LineChart(document.getElementById('linechart'));
            chart.draw(data, options);
        }
    </script>

    <body>
        <div id="linechart" style="width: 100%; height: 500px;"></div>
    </body>

    </body>
</http>