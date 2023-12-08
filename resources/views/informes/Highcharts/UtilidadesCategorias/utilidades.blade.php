<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/css">
        #container {
            height: 400px;
        }

        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 320px;
            max-width: 800px;
            margin: 1em auto;
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
    <script src="{{ asset('src/Highcharts_Code/highcharts-more.js') }}"> </script>
    <script src="{{ asset('src/Highcharts_Code/code/modules/exporting.js') }}"> </script>
    <script src="{{ asset('src/Highcharts_Code/code/modules/export-data.js') }}"> </script>
    <script src="{{ asset('src/Highcharts_Code/code/modules/accessibility.js') }}"> </script>

    <figure class="highcharts-figure">
        <div id="container"></div>
        <p class="highcharts-description">
            Se muestra la utilidad por categoria, en caso de que alguna categoria existente no se muestre o grafique
            significa que no ha tenido ventas y por ende utilidad.
        </p>
        <br>
        <br>
        <button id="plain" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Plain</button>
        <button id="inverted" class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Inverted</button>
        <button id="polar" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Polar</button>
    </figure>

    <script type="text/javascript">
        const chart = Highcharts.chart('container', {
            title: {
                text: '<?php echo $tituloInforme ?>',
                align: 'center'
            },
            subtitle: {
                text: '<?php echo $subtitulo ?>',
                align: 'center'
            },
            colors: [
                '#4caefe',
                '#3fbdf3',
                '#35c3e8',
                '#2bc9dc',
                '#20cfe1',
                '#16d4e6',
                '#0dd9db',
                '#03dfd0',
                '#00e4c5',
                '#00e9ba',
                '#00eeaf',
                '#23e274'
            ],
            xAxis: {
                categories: [
                    <?php
                    foreach ($categorias as $categoria) {
                        echo "'{$categoria['name']}',";
                    }
                    ?>
                ]
            },
            series: [{
                type: 'column',
                name: 'Unemployed',
                borderRadius: 5,
                colorByPoint: true,
                data: [
                    <?php
                    foreach ($categorias as $categoria) {
                        echo "{$categoria['utilidadTotal']},";
                    }
                    ?>
                ],
                showInLegend: false
            }]
        });

        document.getElementById('plain').addEventListener('click', () => {
            chart.update({
                chart: {
                    inverted: false,
                    polar: false
                },
                subtitle: {
                    text: 'Chart option: Plain | Source: ' +
                        '<a href="https://www.nav.no/no/nav-og-samfunn/statistikk/arbeidssokere-og-stillinger-statistikk/helt-ledige"' +
                        'target="_blank">NAV</a>'
                }
            });
        });

        document.getElementById('inverted').addEventListener('click', () => {
            chart.update({
                chart: {
                    inverted: true,
                    polar: false
                },
                subtitle: {
                    text: 'Chart option: Inverted | Source: ' +
                        '<a href="https://www.nav.no/no/nav-og-samfunn/statistikk/arbeidssokere-og-stillinger-statistikk/helt-ledige"' +
                        'target="_blank">NAV</a>'
                }
            });
        });

        document.getElementById('polar').addEventListener('click', () => {
            chart.update({
                chart: {
                    inverted: false,
                    polar: true
                },
                subtitle: {
                    text: 'Chart option: Polar | Source: ' +
                        '<a href="https://www.nav.no/no/nav-og-samfunn/statistikk/arbeidssokere-og-stillinger-statistikk/helt-ledige"' +
                        'target="_blank">NAV</a>'
                }
            });
        });

    </script>
</body>

</html>