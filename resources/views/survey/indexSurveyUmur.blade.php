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
        <h3 class="m-4">Analisis Kepuasan Pengguna Berdasarkan Umur</h3>

        <div class="row">
            <div class="col-md-12">
                <h4>Rata-rata Kepuasan Pengguna Berdasarkan Kelompok Umur</h4>
                <canvas id="satisfactionChart"></canvas>
            </div>
        </div>
        <br>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ensure ChartDataLabels is registered
            Chart.register(ChartDataLabels);

            const ageData = @json($ageData);

            // Render the satisfactionChart
            const ctxBar = document.getElementById('satisfactionChart').getContext('2d');
            new Chart(ctxBar, { // Ubah dari ctxLine ke ctxBar
                type: 'bar',
                data: {
                    labels: ['20-35', '36-45', '46-60'],
                    datasets: [{
                        label: 'Rata-rata Kepuasan Pengguna Berdasarkan Umur',
                        data: [
                            ageData['20-35'],
                            ageData['36-45'],
                            ageData['46-60'],
                        ],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true, // Tampilkan skala mulai dari 0
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
                                    label += context.raw.toFixed(
                                        2) + '%'; // Hapus '%' jika data bukan persentase
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
                                return value.toFixed(2) + '%'; // Hapus ' % ' jika tidak relevan
                            }
                        }
                    },
                    responsive: true
                }
            });
        });
    </script>

@endsection
