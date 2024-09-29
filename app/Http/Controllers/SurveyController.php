<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use Phpml\Classification\KNearestNeighbors;
use Phpml\Dataset\ArrayDataset;

class SurveyController extends Controller 
{
public function indexSurvey()
{
    // Ambil semua data survei
    $surveys = Survey::all();

    // Inisialisasi array untuk menyimpan data tingkat kepuasan per kelompok umur
    $ageGroupsSatisfaction = [
        '20-35' => ['total_score' => 0, 'total_count' => 0],
        '36-45' => ['total_score' => 0, 'total_count' => 0],
        '46-60' => ['total_score' => 0, 'total_count' => 0],
    ];

    // Tentukan nama field survei yang relevan
    $surveyFields = [
        'informasi_lengkap',
        'konten_berkualitas',
        'konten_bermanfaat',
        'informasi_akurat',
        'standar_kinerja',
        'informasi_dipercaya',
        'format_menarik',
        'tampilan_jelas',
        'output_berkualitas',
        'format_mudah',
        'user_friendly',
        'nyaman_digunakan',
        'kemudahan_interaksi',
        'informasi_dibutuhkan',
        'informasi_siapsaji',
        'akses_cepat',
        'unggahan_cepat',
        'akses_aman',
        'keamanan_data',
        'data_terjamin',
        'memenuhi_kebutuhan',
        'bekerja_efisien',
        'bekerja_efektif',
        'kepuasan_keseluruhan'
    ];

    // Ambil data dan hitung kepuasan per kelompok umur
    foreach ($surveys as $survey) {
        $age = $survey->usia; // Asumsi field umur adalah 'usia'
        $ageGroup = $this->getAgeGroup($age);

        if ($ageGroup) {
            // Hitung total kepuasan_pengguna (1-5 skala)
            $kepuasanPengguna = $survey->kepuasan_pengguna;

            // Update total score dan jumlah data dalam kelompok umur
            if ($kepuasanPengguna >= 1 && $kepuasanPengguna <= 5) {
                $ageGroupsSatisfaction[$ageGroup]['total_score'] += $kepuasanPengguna;
                $ageGroupsSatisfaction[$ageGroup]['total_count']++;
            }
        }
    }

    // Hitung rata-rata kepuasan per kelompok umur
    foreach ($ageGroupsSatisfaction as $ageGroup => &$data) {
        if ($data['total_count'] > 0) {
            $data['average_satisfaction'] = $data['total_score'] / $data['total_count'];
        } else {
            $data['average_satisfaction'] = 0; // Jika tidak ada data
        }
    }

    return view('survey.indexSurvey', [
        'ageGroupsSatisfaction' => $ageGroupsSatisfaction, // Pass hasil analisis ke view
    ]);
}

// Helper function untuk menentukan kelompok umur
private function getAgeGroup($age)
{
    if ($age >= 20 && $age <= 35) {
        return '20-35';
    } elseif ($age >= 36 && $age <= 45) {
        return '36-45';
    } elseif ($age >= 46 && $age <= 60) {
        return '46-60';
    }

    return null;
}

}
