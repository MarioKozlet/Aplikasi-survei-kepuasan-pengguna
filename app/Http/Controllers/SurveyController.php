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

        $satisfactionScale = [
            'STS' => 1,
            'TS' => 2,
            'N' => 3,
            'S' => 4,
            'SS' => 5,
        ];

        $satisfactionScaleLine = [
            1 => 'SP',
            2 => 'P',
            3 => 'CP',
            4 => 'KP',
            5 => 'TP',
        ];

        // Data total untuk setiap jawaban STS, TS, N, S, SS
        $totalResponses = [
            'SP' => 0,
            'P' => 0,
            'CP' => 0,
            'KP' => 0,
            'TP' => 0,
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
        }
        // Jumlah total semua jawaban
        $totalSurveyCount = 0;

        // Nama field yang ada di database
        $fields = [
            'kepuasan_pengguna'
        ];

        // Proses data survei untuk menghitung total jawaban
        foreach ($surveys as $survey) {
            foreach ($fields as $field) {
                $answer = $survey->$field; // $answer adalah angka (1, 2, 3, 4, 5)
                if (isset($satisfactionScaleLine[$answer])) {
                    $responseLabel = $satisfactionScaleLine[$answer]; // Konversi angka menjadi STS, TS, N, S, SS
                    // Tambahkan ke total jawaban untuk kategori yang sesuai (STS, TS, N, S, SS)
                    $totalResponses[$responseLabel]++;
                    $totalSurveyCount++;
                }
            }
        }

        // Hitung persentase untuk setiap jawaban
        $percentageResponses = array_map(function ($count) use ($totalSurveyCount) {
            return ($totalSurveyCount > 0) ? ($count / $totalSurveyCount) * 100 : 0;
        }, $totalResponses);

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

        return view('survey.indexSurvey', compact('ageLabels', 'ageData', 'percentageResponses'));
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
