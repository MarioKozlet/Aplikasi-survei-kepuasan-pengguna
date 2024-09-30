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

        <div class="row">
            <div class="col-md-12">
                <h4>Grafik Rata-rata Kepuasan Pengguna (Line Chart)</h4>
                <canvas id="lineChart"></canvas> <!-- Canvas untuk Line Chart -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data yang diterima dari server
            const ageLabels = @json($ageLabels);
            const ageData = @json($ageData);

            const surveyLabel = @json($satisfactionLabels); // Perbaiki di sini
            const surveyData = @json($satisfactionData); // Perbaiki di sini

            // Konfigurasi Bar chart (rata-rata kepuasan berdasarkan kelompok umur)
            const ctxBar = document.getElementById('satisfactionChart').getContext('2d');
            new Chart(ctxBar, {
                type: 'bar',
                data: {
                    labels: ageLabels,
                    datasets: [{
                        label: 'Rata-rata Kepuasan Pengguna',
                        data: ageData,
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
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

            // Konfigurasi Line chart untuk rata-rata kepuasan setiap kelompok umur
            const ctxLine = document.getElementById('lineChart').getContext('2d');
            new Chart(ctxLine, {
                type: 'line',
                data: {
                    labels: surveyLabel,
                    datasets: [{
                        label: 'Rata-rata Kepuasan',
                        data: surveyData,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2,
                        fill: false,
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
                            display: true
                        },
                        tooltip: {
                            enabled: true,
                            callbacks: {
                                label: function(tooltipItem) {
                                    const value = tooltipItem.raw; // Ambil nilai dari tooltipItem
                                    return 'Rata-rata Kepuasan: ' + (value !== undefined ? value
                                        .toFixed(2) : 'N/A');
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
