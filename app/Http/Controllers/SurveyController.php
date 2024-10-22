<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;

class SurveyController extends Controller
{
    public function indexSurvey()
    {
        // 1. Klasifikasi data (pengambilan data dari tabel Survey)
        $scores = Survey::all(); 
        $scoreSurvey = Survey::pluck('score'); 

        // Total responden
        $totalRespondents = $scoreSurvey->count();

        // Hitung jumlah tiap kategori kepuasan
        $count1 = $scores->where('score', 1)->count(); // Nilai 1 - Tidak puas
        $count2 = $scores->where('score', 2)->count(); // Nilai 2 - Kurang puas
        $count3 = $scores->where('score', 3)->count(); // Nilai 3 - Netral
        $count4 = $scores->where('score', 4)->count(); // Nilai 4 - Cukup puas
        $count5 = $scores->where('score', 5)->count(); // Nilai 5 - Sangat puas

        // Hitung persentase setiap kategori
        $percent1 = $totalRespondents > 0 ? ($count1 / $totalRespondents) * 100 : 0;
        $percent2 = $totalRespondents > 0 ? ($count2 / $totalRespondents) * 100 : 0;
        $percent3 = $totalRespondents > 0 ? ($count3 / $totalRespondents) * 100 : 0;
        $percent4 = $totalRespondents > 0 ? ($count4 / $totalRespondents) * 100 : 0;
        $percent5 = $totalRespondents > 0 ? ($count5 / $totalRespondents) * 100 : 0;

        // 2. Konversi bobot ke dalam bobot AHP
        $totalScores = $count1 + $count2 + $count3 + $count4 + $count5;
        $weights = [
            'tidak_puas' => $totalScores > 0 ? $count1 / $totalScores : 0,
            'kurang_puas' => $totalScores > 0 ? $count2 / $totalScores : 0,
            'netral' => $totalScores > 0 ? $count3 / $totalScores : 0,
            'cukup_puas' => $totalScores > 0 ? $count4 / $totalScores : 0,
            'sangat_puas' => $totalScores > 0 ? $count5 / $totalScores : 0,
        ];

        // 3. Matriks perbandingan antar kriteria (contoh matriks AHP sederhana)
        $comparisonMatrix = [
            [1, 3, 0.5, 0.25, 0.2],    // Kriteria 1 vs Kriteria lainnya
            [0.33, 1, 2, 0.5, 0.33],   // Kriteria 2 vs Kriteria lainnya
            [2, 0.5, 1, 0.33, 0.25],   // Kriteria 3 vs Kriteria lainnya
            [4, 2, 3, 1, 0.5],         // Kriteria 4 vs Kriteria lainnya
            [5, 3, 4, 2, 1]            // Kriteria 5 vs Kriteria lainnya
        ];

        // 4. Perhitungan metode AHP (CI, CR, dan hasil Eigen Factor dan Prioritas)
        $CI = $this->calculateCI($comparisonMatrix);
        $CR = $this->calculateCR($CI, count($comparisonMatrix));
        $eigenvector = $this->eigenvector;  // Ambil hasil faktor prioritas
        $lambdaMax = $this->calculateLambdaMax($comparisonMatrix);  // Ambil hasil Eigen Factor (λmax)

        // Hitung faktor prioritas (Eigenvector) dan jumlah total Eigen Factor
        $eigenFactors = [];
        $totalEigenFactor = 0;
        foreach ($comparisonMatrix as $i => $row) {
            $eigenFactor = array_sum($row) / count($row);  // Hitung Eigen Factor
            $eigenFactors[$i] = $eigenFactor;
            $totalEigenFactor += $eigenFactor;
        }

        // Hitung Faktor Prioritas dari Eigen Factor
        $factorsPrioritas = array_map(function($eigenFactor) use ($totalEigenFactor) {
            return $eigenFactor / $totalEigenFactor;
        }, $eigenFactors);

        // 5. Penyusunan Hasil Penelitian
        return view('survey.indexSurvey', [
            'totalRespondents' => $totalRespondents,
            'percent1' => $percent1,
            'percent2' => $percent2,
            'percent3' => $percent3,
            'percent4' => $percent4,
            'percent5' => $percent5,
            'weights' => $weights,
            'CI' => $CI,
            'CR' => $CR,
            'comparisonMatrix' => $comparisonMatrix,
            'eigenvector' => $eigenvector,
            'lambdaMax' => $lambdaMax,
            'eigenFactors' => $eigenFactors,  // Kirim hasil Eigen Faktor ke view
            'factorsPrioritas' => $factorsPrioritas,  // Kirim hasil Faktor Prioritas ke view
        ]);

    }


    // Fungsi untuk menghitung CI (Consistency Index)
    private function calculateCI($matrix)
    {
        $lambdaMax = $this->calculateLambdaMax($matrix);
        $n = count($matrix);  // Jumlah kriteria
        return ($lambdaMax - $n) / ($n - 1);  // Rumus CI
    }

    // Fungsi untuk menghitung CR (Consistency Ratio)
    private function calculateCR($CI, $n)
    {
        $RI = ['1' => 0, '2' => 0, '3' => 0.58, '4' => 0.9, '5' => 1.12];  // RI tergantung ukuran matriks
        // dd($RI);
        return $CI / $RI[$n];
    }

    // Fungsi untuk menghitung Lambda Maksimum (λmax)
    // Fungsi untuk menghitung Lambda Maksimum (λmax) dan sekaligus menyimpan eigenvector (faktor prioritas)
    private function calculateLambdaMax($matrix)
    {
        $columnSums = array_map(function ($colIndex) use ($matrix) {
            return array_sum(array_column($matrix, $colIndex));
        }, array_keys($matrix[0]));

        // Menghitung eigenvector (faktor prioritas)
        $eigenvector = array_map(function ($row) use ($columnSums) {
            return array_sum(array_map(function ($value, $colSum) {
                return $value / $colSum;
            }, $row, $columnSums)) / count($row);
        }, $matrix);

        // Menghitung λmax (Lambda Maksimum)
        $lambdaMax = array_sum(array_map(function ($row, $eigenValue) use ($matrix) {
            return array_sum(array_map(function ($value) use ($eigenValue) {
                return $value * $eigenValue;
            }, $row));
        }, $matrix, $eigenvector)) / count($eigenvector);

        // Menyimpan eigenvector (faktor prioritas) untuk diakses di luar fungsi
        $this->eigenvector = $eigenvector;

        return $lambdaMax;
    }

}

