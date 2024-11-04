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
        <h3 class="m-4">Analisis Kepuasan Pengguna Berdasarkan Pekerjaan</h3>

        <div class="row">
            <div class="col-md-12">
                <h4>Rata-rata Kepuasan Pengguna Berdasarkan Kelompok Pekerjaan</h4>
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
            const jobData = @json($jobData);

            // Log untuk memastikan data terisi
            console.log(jobData);

            // Render the satisfactionChart
            const ctxBar = document.getElementById('satisfactionChart').getContext('2d');
            new Chart(ctxBar, {
                type: 'bar',
                data: {
                    labels: ['Pegawai Negeri Sipil (PNS)', 'Karyawaan Swasta', 'Wirausaha', 'IRT',
                        'Tenaga Kesehatan', 'THL (Tenaga Lepas Harian)'
                    ],
                    datasets: [{
                        label: 'Rata-rata Kepuasan Pengguna Berdasarkan Pekerjaan',
                        data: [
                            jobData['Pegawai Negeri Sipil (PNS)'] || 0,
                            jobData['Karyawaan Swasta'] || 0,
                            jobData['Wirausaha'] || 0,
                            jobData['IRT'] || 0,
                            jobData['Tenaga Kesehatan'] || 0,
                            jobData['THL (Tenaga Lepas Harian)'] || 0
                        ],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(201, 203, 207, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
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
                                    label += (context.raw || 0).toFixed(2) +
                                    '%'; // Pastikan nilai ada atau beri nilai default 0
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
                                return (value || 0).toFixed(2) +
                                '%'; // Pastikan nilai ada atau beri nilai default 0
                            }
                        }
                    },
                    responsive: true
                }
            });
        });
    </script>



@endsection
