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
            @foreach ($ageGroupsData as $ageGroup => $data)
                <div class="col-md-4">
                    <h4>Kelompok Umur {{ $ageGroup }}</h4>
                    <canvas id="satisfactionChart{{ str_replace('-', '_', $ageGroup) }}"></canvas>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data yang diterima dari server
            const ageGroupsData = @json($ageGroupsData);

            // Fungsi untuk menghitung frekuensi setiap nilai kepuasan
            function countSatisfactionLevels(surveyData) {
                return surveyData; // Data sudah dalam format yang diperlukan
            }

            Object.keys(ageGroupsData).forEach(ageGroup => {
                const ctx = document.getElementById('satisfactionChart' + ageGroup.replace('-', '_'))
                    .getContext('2d');
                if (ctx) {
                    const data = countSatisfactionLevels(ageGroupsData[ageGroup]);
                    new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: ['Tidak Puas', 'Kurang Puas', 'Cukup Puas',
                                'Puas', 'Sangat Puas'
                            ],
                            datasets: [{
                                label: 'Banyak pengguna yang memilih',
                                data: data,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)'
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
                } else {
                    console.error(
                        `Canvas element with id 'satisfactionChart${ageGroup.replace('-', '_')}' not found.`
                    );
                }
            });
        });
    </script>

@endsection
