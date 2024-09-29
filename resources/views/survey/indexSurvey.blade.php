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
        <h3 class="m-4">Analisis Kepuasan Pengguna Berdasarkan Umur</h3>

        <div class="row">
            <div class="col-md-12">
                <h4>Rata-rata Kepuasan Pengguna Berdasarkan Kelompok Umur</h4>
                <canvas id="satisfactionChart"></canvas>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data yang diterima dari server
            const ageGroupsSatisfaction = @json($ageGroupsSatisfaction);

            // Buat dataset rata-rata kepuasan untuk setiap kelompok umur
            const labels = Object.keys(ageGroupsSatisfaction);
            const data = labels.map(ageGroup => ageGroupsSatisfaction[ageGroup].average_satisfaction);

            // Konfigurasi chart
            const ctx = document.getElementById('satisfactionChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar', // Menggunakan bar chart untuk menampilkan rata-rata kepuasan
                data: {
                    labels: labels, // Kelompok umur (20-35, 36-45, 46-60)
                    datasets: [{
                        label: 'Rata-rata Kepuasan Pengguna',
                        data: data, // Nilai rata-rata kepuasan per kelompok umur
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)', // Warna batang 1
                            'rgba(153, 102, 255, 0.2)', // Warna batang 2
                            'rgba(255, 159, 64, 0.2)' // Warna batang 3
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Rata-rata Skor Kepuasan (1-5)'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Kelompok Umur'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: true,
                            callbacks: {
                                label: function(tooltipItem) {
                                    return 'Rata-rata Kepuasan: ' + tooltipItem.raw.toFixed(2);
                                }
                            }
                        }
                    },
                    responsive: true,
                }
            });
        });
    </script>



@endsection
