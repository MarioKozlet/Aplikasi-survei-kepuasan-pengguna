<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SurveyController extends Controller
{
    public function indexSurvey()
    {
        // Ambil semua data survei
        $surveys = Survey::all();

        // Inisialisasi array untuk menyimpan data kepuasan berdasarkan kelompok umur
        $ageGroupsSatisfaction = [
            '20-35' => ['total_score' => 0, 'total_count' => 0, 'average_satisfaction' => 0],
            '36-45' => ['total_score' => 0, 'total_count' => 0, 'average_satisfaction' => 0],
            '46-60' => ['total_score' => 0, 'total_count' => 0, 'average_satisfaction' => 0],
        ];

        // Inisialisasi array untuk menyimpan data kepuasan berdasarkan setiap field
        $satisfactionGroups = [
            'kepuasan_pengguna' => ['total_score' => 0, 'total_count' => 0],
            'informasi_lengkap' => ['total_score' => 0, 'total_count' => 0],
            'konten_berkualitas' => ['total_score' => 0, 'total_count' => 0],
            'konten_bermanfaat' => ['total_score' => 0, 'total_count' => 0],
            'informasi_akurat' => ['total_score' => 0, 'total_count' => 0],
            'standar_kinerja' => ['total_score' => 0, 'total_count' => 0],
            'informasi_dipercaya' => ['total_score' => 0, 'total_count' => 0],
            'format_menarik' => ['total_score' => 0, 'total_count' => 0],
            'tampilan_jelas' => ['total_score' => 0, 'total_count' => 0],
            'output_berkualitas' => ['total_score' => 0, 'total_count' => 0],
            'format_mudah' => ['total_score' => 0, 'total_count' => 0],
            'user_friendly' => ['total_score' => 0, 'total_count' => 0],
            'nyaman_digunakan' => ['total_score' => 0, 'total_count' => 0],
            'kemudahan_interaksi' => ['total_score' => 0, 'total_count' => 0],
            'informasi_dibutuhkan' => ['total_score' => 0, 'total_count' => 0],
            'informasi_siapsaji' => ['total_score' => 0, 'total_count' => 0],
            'akses_cepat' => ['total_score' => 0, 'total_count' => 0],
            'unggahan_cepat' => ['total_score' => 0, 'total_count' => 0],
            'akses_aman' => ['total_score' => 0, 'total_count' => 0],
            'keamanan_data' => ['total_score' => 0, 'total_count' => 0],
            'data_terjamin' => ['total_score' => 0, 'total_count' => 0],
            'memenuhi_kebutuhan' => ['total_score' => 0, 'total_count' => 0],
            'bekerja_efisien' => ['total_score' => 0, 'total_count' => 0],
            'bekerja_efektif' => ['total_score' => 0, 'total_count' => 0],
            'kepuasan_keseluruhan' => ['total_score' => 0, 'total_count' => 0],
        ];

        // Peta untuk konversi dari jawaban ke nilai
        $satisfactionScale = [
            'STS' => 1,
            'TS' => 2,
            'N' => 3,
            'S' => 4,
            'SS' => 5,
        ];

        // Ambil data dan hitung kepuasan
        foreach ($surveys as $survey) {
            $ageGroup = '';
            $age = $survey->usia;
            $kepuasanPengguna = $survey->kepuasan_pengguna;

            if ($age >= 20 && $age <= 35) {
                $ageGroupsSatisfaction['20-35']['total_score'] += $kepuasanPengguna;
                $ageGroupsSatisfaction['20-35']['total_count']++;
            } elseif ($age >= 36 && $age <= 45) {
                $ageGroupsSatisfaction['36-45']['total_score'] += $kepuasanPengguna;
                $ageGroupsSatisfaction['36-45']['total_count']++;
            } elseif ($age >= 46 && $age <= 60) {
                $ageGroupsSatisfaction['46-60']['total_score'] += $kepuasanPengguna;
                $ageGroupsSatisfaction['46-60']['total_count']++;
            }

            // Update data untuk kelompok umur
            if (array_key_exists($kepuasanPengguna, $satisfactionScale)) {
                $score = $satisfactionScale[$kepuasanPengguna];
                $ageGroupsSatisfaction[$ageGroup]['total_score'] += $score;
                $ageGroupsSatisfaction[$ageGroup]['total_count']++;
            }

            // Update data untuk pengelompokan kepuasan
            foreach ($satisfactionGroups as $field => &$data) {
                if (isset($survey->$field)) {
                    $value = (int)$survey->$field; // Hapus spasi di awal dan akhir

                    // Cek apakah $value ada dalam $satisfactionScale
                    if (in_array($value, $satisfactionScale, true)) {
                        // Temukan key dari satisfactionScale yang sesuai dengan $value
                        $scoreKey = array_search($value, $satisfactionScale, true); // Cari key berdasarkan value
                        
                        if ($scoreKey !== false) {
                            $score = $satisfactionScale[$scoreKey]; // Ambil skor
                            $data['total_score'] += $score;
                            $data['total_count']++;
                        }
                    }
                }
            }
        }

        // Hitung rata-rata kepuasan berdasarkan setiap field
        foreach ($satisfactionGroups as $key => &$data) {
            if ($data['total_count'] > 0) {
                $data['average_satisfaction'] = $data['total_score'] / $data['total_count'];
            } else {
                $data['average_satisfaction'] = 0; // Jika tidak ada data
            }
        }

        foreach ($ageGroupsSatisfaction as $ageGroup => &$group) {
            if ($group['total_count'] > 0) {
                $group['average_satisfaction'] = $group['total_score'] / $group['total_count'];
            } else {
                $group['average_satisfaction'] = 0; // Atur ke 0 jika tidak ada responden
            }
        }

        // Siapkan data untuk grafik
        $ageLabels = array_keys($ageGroupsSatisfaction);
        $ageData = array_map(fn($group) => $group['average_satisfaction'], $ageGroupsSatisfaction);

        $satisfactionLabels = array_keys($satisfactionGroups);
        $satisfactionData = array_map(fn($group) => $group['average_satisfaction'], $satisfactionGroups);
        return view('survey.indexSurvey', compact('ageLabels', 'ageData', 'satisfactionLabels', 'satisfactionData'));
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
