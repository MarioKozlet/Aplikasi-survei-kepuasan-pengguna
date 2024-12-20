@extends('main.app')

@section('title', 'Survei')

@section('content')

    <style>
        /* CSS untuk mengecilkan ukuran canvas */
        #satisfactionChart,
        #lineChart {
            max-width: 50%;
            height: auto;
        }

        /* CSS untuk menempatkan canvas ke tengah halaman */
        #chart-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>

    <div class="container">
        <h3 class="m-4">Analisis Kepuasan Pengguna</h3>
        <br>
        <div class="row">
            <div class="col-md-12">
                <h4>Grafik Tingkat Kepuasan Pengguna</h4>
                <canvas id="lineChart"></canvas> <!-- Canvas for Line Chart -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ensure ChartDataLabels is registered
            Chart.register(ChartDataLabels);

            // Render the lineChart with texts in bars
            const ctxLine = document.getElementById('lineChart').getContext('2d');
            new Chart(ctxLine, {
                type: 'bar',
                data: {
                    labels: ['Sangat Puas', 'Puas', 'Cukup Puas', 'Kurang Puas', 'Tidak Puas'],
                    datasets: [{
                        label: 'Persentase Jawaban',
                        data: [
                            {{ $percentageResponses['SP'] }},
                            {{ $percentageResponses['P'] }},
                            {{ $percentageResponses['CP'] }},
                            {{ $percentageResponses['KP'] }},
                            {{ $percentageResponses['TP'] }}
                        ],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 99, 132, 0.2)'
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            display: false
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    var label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    label += context.raw + '%';
                                    return label;
                                }
                            }
                        },
                        datalabels: {
                            display: true,
                            align: 'center',
                            anchor: 'center',
                            color: 'black',
                            font: {
                                weight: 'bold',
                                size: 12
                            },
                            formatter: function(value) {
                                return value + '%';
                            }
                        }
                    },
                    responsive: true
                }
            });
        });
    </script>

@endsection
