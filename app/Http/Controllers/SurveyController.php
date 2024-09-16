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

        // Inisialisasi array untuk menyimpan data dan target untuk algoritma
        $samples = [];
        $labels = [];
        $ageGroupsData = [
            '20-35' => [0, 0, 0, 0, 0],
            '36-45' => [0, 0, 0, 0, 0],
            '46-60' => [0, 0, 0, 0, 0],
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

        // Ambil data dan label dari survei
        foreach ($surveys as $survey) {
            $age = $survey->usia; // Asumsi field umur adalah 'usia'
            $ageGroup = $this->getAgeGroup($age);

            if ($ageGroup) {
                $sample = [];

                // Masukkan kepuasan_pengguna (1-5 skala) di awal
                $sample[] = $survey->kepuasan_pengguna;

                foreach ($surveyFields as $field) {
                    $sample[] = $survey[$field] ?? 0; // Tambahkan nilai survei ke sample
                }

                $samples[] = $sample; // Tambahkan sample ke array samples
                $labels[] = $ageGroup; // Tambahkan kelompok umur sebagai label

                // Update ageGroupsData
                foreach ($surveyFields as $index => $field) {
                    if (isset($survey[$field])) {
                        $value = $survey[$field];
                        if ($value >= 1 && $value <= 5) {
                            $ageGroupsData[$ageGroup][$value - 1]++;
                        }
                    }
                }
            }
        }

        // Buat dataset
        $dataset = new ArrayDataset($samples, $labels);

        // Inisialisasi dan train KNearestNeighbors Classifier (atau algoritma lain yang diinginkan)
        $classifier = new KNearestNeighbors();
        $classifier->train($dataset->getSamples(), $dataset->getTargets());

        // Prediksi kelompok umur untuk data survei baru (contoh)
        $newSurvey = [5, 5, 4, 4, 5, 5, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5, 4]; // 25 elemen, dengan elemen pertama sebagai kepuasan_pengguna
        $predictedAgeGroup = $classifier->predict($newSurvey);

        // Hasil prediksi
        $prediksi = [
            'survey' => $newSurvey,
            'predicted_age_group' => $predictedAgeGroup
        ];

        return view('survey.indexSurvey', [
            'prediksi' => $prediksi,
            'ageGroupsData' => $ageGroupsData, // Pass aggregated data to the view
            'samples' => $samples,
            'labels' => $labels
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
