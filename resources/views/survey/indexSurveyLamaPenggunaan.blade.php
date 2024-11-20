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
        <h3 class="m-4">Analisis Kepuasan Pengguna Berdasarkan Lama Penggunaan</h3>

        <div class="row">
            <div class="col-md-12">
                <h4>Rata-rata Kepuasan Pengguna Berdasarkan Kelompok Lama Penggunaan</h4>
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

            // Data yang diterima dari server
            const durationLabels = @json($durationLabels);
            const durationData = @json($durationData);

            // Render the satisfactionChart
            const ctxBar = document.getElementById('satisfactionChart').getContext('2d');
            new Chart(ctxBar, {
                type: 'bar',
                data: {
                    labels: ['1 Tahun', '2 Tahun', '3-4 Tahun',
                        '5 Tahun'
                    ], // Sesuaikan dengan kategori lama penggunaan
                    datasets: [{
                        label: 'Rata-rata Kepuasan Pengguna Berdasarkan Lama Penggunaan',
                        data: [
                            durationData['1 Tahun'],
                            durationData['2 Tahun'],
                            durationData['3-4 Tahun'],
                            durationData['5 Tahun']
                        ],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(153, 102, 255, 0.2)'
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(153, 102, 255, 1)'
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
                                    label += context.raw +
                                        '%'; // Tambahkan '%' untuk menampilkan dalam bentuk persentase
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
                                return value + '%'; // Tambahkan '%' untuk data label
                            }
                        }
                    },
                    responsive: true
                }
            });
        });
    </script>


@endsection
