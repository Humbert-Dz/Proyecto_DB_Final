<!DOCTYPE HTML>
<html>

<head>

    <style type="text/css">
        .highcharts-figure,
        .highcharts-data-table table {
            width: 100%;
            margin: auto;
        }

        #container {
            min-height: 500px;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }
    </style>
</head>

<body>
    <script src="{{ asset('src/Highcharts_Code/highcharts.js') }}"> </script>
    <script src="{{ asset('src/Highcharts_Code/code/modules/data.js') }}"> </script>
    <script src="{{ asset('src/Highcharts_Code/code/modules/drilldown.js') }}"> </script>
    <script src="{{ asset('src/Highcharts_Code/code/modules/exporting.js') }}"> </script>
    <script src="{{ asset('src/Highcharts_Code/code/modules/export-data.js') }}"> </script>
    <script src="{{ asset('src/Highcharts_Code/code/modules/accessibility.js') }}"> </script>

    <figure class="highcharts-figure">
        <div id="container"></div>
        <p class="highcharts-description">
        </p>
    </figure>

    <script type="text/javascript">
        // Data retrieved from https://gs.statcounter.com/browser-market-share#monthly-202201-202201-bar



        // Create the chart
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                align: 'center',
                text: '<?php echo $tituloInforme ?>',
            },
            subtitle: {
                align: 'center',
                text: '<?php echo $subtitulo ?>',
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Total productos vendidos'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> en total<br/>'
            },

            series: [
                {
                    name: 'Producto',
                    colorByPoint: true,
                    data: [
                        <?php

                        foreach ($productos as $producto) {
                            echo '{';
                            echo "name: '{$producto['name']}',";
                            echo "y: {$producto['cantidad_vendidos']},";
                            echo '},';
                        }

                        ?>
                    ]
                }
            ],

        });

    </script>
</body>

</html>