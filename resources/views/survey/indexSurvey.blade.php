@extends('main.app')

@section('title', 'Survei')

@section('content')
    <style>
        #ciCrChart {
            max-width: 600px;
            /* Atur lebar maksimal sesuai kebutuhan */
            max-height: 600px;
            /* Atur tinggi maksimal sesuai kebutuhan */
            margin: 0 auto;
            /* Center the chart */
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="m-4">
        <h1>Hasil Analisis Survei</h1>
        <!-- Tampilkan total responden, CI, dan CR -->
        <p>Total Responden: {{ $totalRespondents }}</p>
        <p>Consistency Index (CI): {{ number_format($CI, 2) }}</p>
        <p>Consistency Ratio (CR): {{ number_format($CR, 2) }}</p>
    </div>

    <!-- Chart untuk Persentase Kepuasan Pengguna -->
    <div style="width: 50%; margin: auto; margin-top: 20px;">
        <canvas id="satisfactionChart"></canvas>
    </div>

    <!-- Chart untuk Perbandingan CI dan CR -->
    <div style="width: 50%; margin: auto; margin-top: 50px;">
        <canvas id="ciCrChart"></canvas>
    </div>

    <!-- Tampilkan Matriks Perbandingan Kriteria (AHP) dengan Eigen Factor dan Faktor Prioritas -->
    <div class="m-4">
        <h2>Matriks Perbandingan Kriteria (AHP) dengan Eigen Factor dan Faktor Prioritas</h2>
        <table class="table table-bordered table-light shadow-sm mt-3">
            <thead class="table-light">
                <tr>
                    <th>Kriteria</th>
                    <th>Tidak Puas</th>
                    <th>Kurang Puas</th>
                    <th>Netral</th>
                    <th>Cukup Puas</th>
                    <th>Sangat Puas</th>
                    <th>Eigen Factor</th>
                    <th>Faktor Prioritas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comparisonMatrix as $i => $row)
                    <tr>
                        <th>
                            @if ($i == 0)
                                Tidak Puas
                            @elseif($i == 1)
                                Kurang Puas
                            @elseif($i == 2)
                                Netral
                            @elseif($i == 3)
                                Cukup Puas
                            @elseif($i == 4)
                                Sangat Puas
                            @endif
                        </th>
                        @foreach ($row as $value)
                            <td>{{ number_format($value, 3) }}</td>
                        @endforeach
                        <!-- Menambahkan hasil Eigen Factor dan Faktor Prioritas pada tabel -->
                        <td>{{ number_format($eigenFactors[$i], 3) }}</td>
                        <td>{{ number_format($factorsPrioritas[$i], 3) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Tampilkan hasil Eigen Factor (λmax) -->
        <h3>Hasil Eigen Factor (λmax): {{ number_format($lambdaMax, 4) }}</h3>
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
            type: 'pie', // Ubah dari 'bar' menjadi 'pie'
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
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                var label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += context.raw.toFixed(2);
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
                            return value.toFixed(2);
                        }
                    }
                }
            }
        });
    </script>
@endsection
