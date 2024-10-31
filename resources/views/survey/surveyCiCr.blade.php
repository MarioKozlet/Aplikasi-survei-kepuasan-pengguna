@extends('main.app')

@section('title', 'Survei')

@section('content')

    <div class="m-4">
        <h1>Hasil Analisis Survei</h1>
        <p>Total Responden: {{ $totalRespondents }}</p>
    </div>

    <!-- Chart untuk Persentase Kepuasan Pengguna -->
    <div style="width: 50%; margin: auto; margin-top: 20px;">
        <canvas id="satisfactionChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

    <script>
        // Mengaktifkan plugin datalabels untuk Chart.js
        Chart.register(ChartDataLabels);

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
            type: 'pie',
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
                plugins: {
                    datalabels: {
                        color: '#000', // Warna teks persentase
                        formatter: (value, ctx) => {
                            let sum = ctx.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                            let percentage = (value * 100 / sum).toFixed(2) + "%";
                            return percentage;
                        },
                        font: {
                            weight: 'bold',
                            size: 14
                        },
                        anchor: 'center',
                        align: 'center'
                    }
                }
            },
            plugins: [ChartDataLabels]
        });
    </script>

@endsection
