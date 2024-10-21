@extends('main.app')

@section('title', 'Survei')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <h1>Hasil Analisis Survei</h1>

    <!-- Tampilkan total responden, CI, dan CR -->
    <p>Total Responden: {{ $totalRespondents }}</p>
    <p>Consistency Index (CI): {{ number_format($CI, 2) }}</p>
    <p>Consistency Ratio (CR): {{ number_format($CR, 2) }}</p>

    <!-- Chart untuk Persentase Kepuasan Pengguna -->
    <div style="width: 50%; margin: auto;">
        <canvas id="satisfactionChart"></canvas>
    </div>

    <!-- Chart untuk Perbandingan CI dan CR -->
    <div style="width: 50%; margin: auto; margin-top: 50px;">
        <canvas id="ciCrChart"></canvas>
    </div>

    <!-- Chart untuk Perbandingan CI, CR, dan Persentase Kepuasan -->
    {{-- <div style="width: 50%; margin: auto; margin-top: 50px;">
        <canvas id="comparisonChart"></canvas>
    </div> --}}

    <script>
        // Data persentase untuk setiap kategori kepuasan pengguna
        var percentData = [
            {{ $percent1 }},
            {{ $percent2 }},
            {{ $percent3 }},
            {{ $percent4 }},
            {{ $percent5 }}
        ];

        // Chart untuk Persentase Kepuasan Pengguna
        var ctx = document.getElementById('satisfactionChart').getContext('2d');
        var satisfactionChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Tidak Puas', 'Kurang Puas', 'Netral', 'Cukup Puas', 'Sangat Puas'],
                datasets: [{
                    label: 'Persentase Kepuasan Pengguna (%)',
                    data: percentData,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 205, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100 // Skala maksimum 100% untuk persentase
                    }
                }
            }
        });

        // Data CI dan CR untuk perbandingan
        var ciCrData = [
            {{ number_format($CI, 2) }},
            {{ number_format($CR, 2) }}
        ];

        // Chart untuk Perbandingan CI dan CR
        var ctxCI = document.getElementById('ciCrChart').getContext('2d');
        var ciCrChart = new Chart(ctxCI, {
            type: 'bar',
            data: {
                labels: ['Consistency Index (CI)', 'Consistency Ratio (CR)'],
                datasets: [{
                    label: 'Nilai CI dan CR',
                    data: ciCrData,
                    backgroundColor: [
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 1 // Skala maksimum 1 karena nilai CI dan CR biasanya di bawah 1
                    }
                }
            }
        });

        // Chart untuk Perbandingan CI, CR, dan Persentase Kepuasan
        var comparisonData = [
            {{ number_format($CI, 2) }}, // CI
            {{ number_format($CR, 2) }}, // CR
            {{ $percent1 }},
            {{ $percent2 }},
            {{ $percent3 }},
            {{ $percent4 }},
            {{ $percent5 }}
        ];

        var comparisonLabels = [
            'CI',
            'CR',
            'Tidak Puas',
            'Kurang Puas',
            'Netral',
            'Cukup Puas',
            'Sangat Puas'
        ];

        var ctxComparison = document.getElementById('comparisonChart').getContext('2d');
        var comparisonChart = new Chart(ctxComparison, {
            type: 'bar',
            data: {
                labels: comparisonLabels,
                datasets: [{
                    label: 'Perbandingan CI, CR, dan Persentase Kepuasan (%)',
                    data: comparisonData,
                    backgroundColor: [
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 205, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100 // Karena persentase bisa mencapai 100%, CI dan CR tetap di bawah 1
                    }
                }
            }
        });
    </script>


@endsection
