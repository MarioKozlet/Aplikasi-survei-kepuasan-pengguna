@extends('main.app')

@section('title', 'Survei')

@section('content')

    <style>
        /* CSS untuk mengecilkan ukuran canvas */
        #satisfactionChart {
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
        <h3 class="my-4">Application Usage Satisfaction Levels</h3>
    </div>
    <div id="chart-container">
        <canvas id="satisfactionChart"></canvas>
    </div>

    <!-- Load Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('satisfactionChart').getContext('2d');
            console.log('Satisfaction Levels:', [
                {{ $satisfactionLevels[1] ?? 0 }},
                {{ $satisfactionLevels[2] ?? 0 }},
                {{ $satisfactionLevels[3] ?? 0 }},
                {{ $satisfactionLevels[4] ?? 0 }},
                {{ $satisfactionLevels[5] ?? 0 }}
            ]);

            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Tidak Puas (1)', 'Kurang Puas (2)', 'Cukup Puas (3)', 'Puas (4)',
                        'Sangat Puas (5)'
                    ],
                    datasets: [{
                        label: 'Banyak pengguna yang memilih',
                        data: [
                            {{ $satisfactionLevels[1] ?? 0 }},
                            {{ $satisfactionLevels[2] ?? 0 }},
                            {{ $satisfactionLevels[3] ?? 0 }},
                            {{ $satisfactionLevels[4] ?? 0 }},
                            {{ $satisfactionLevels[5] ?? 0 }}
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)' // Tambahkan warna untuk level 5
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)' // Tambahkan warna border untuk level 5
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            enabled: true,
                        }
                    }
                }
            });
        });
    </script>


@endsection
