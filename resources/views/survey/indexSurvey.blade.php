@extends('main.app')

@section('title', 'Survei')

@section('content')

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>


    <div class="m-4">
        <h1>Hasil Analisis Survei CI & CR</h1>
        <!-- Tampilkan total responden, CI, dan CR -->
        <p>Consistency Index (CI): {{ number_format($CI, 2) }}</p>
        <p>Consistency Ratio (CR): {{ number_format($CR, 2) }}</p>
    </div>

    <!-- Chart untuk Perbandingan CI dan CR -->
    <div style="width: 45%; margin: auto; margin-top: 50px;">
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
        // Daftarkan plugin datalabels
        Chart.register(ChartDataLabels);

        var ciCrData = [
            {{ number_format($CI, 2) }},
            {{ number_format($CR, 2) }}
        ];

        // Chart untuk Perbandingan CI dan CR
        var ctxCI = document.getElementById('ciCrChart').getContext('2d');
        var ciCrChart = new Chart(ctxCI, {
            type: 'pie',
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
                            size: 16 // Ukuran tulisan lebih besar agar mudah dibaca
                        },
                        formatter: function(value, context) {
                            let total = context.dataset.data.reduce((a, b) => a + b,
                                0); // Jumlahkan semua nilai
                            let percentage = (value / total * 100).toFixed(2); // Hitung persentase
                            return percentage + '%'; // Tampilkan dalam format persentase
                        }
                    }
                }
            }
        });
    </script>
@endsection
