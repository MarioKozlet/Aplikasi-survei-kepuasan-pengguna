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

        return view('survey.indexSurvey', compact('percentageResponses'));
    }

    public function indexUmur()
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

        // Ambil data dan hitung kepuasan
        foreach ($surveys as $survey) {
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
        }

        // Hitung rata-rata kepuasan untuk setiap kelompok umur dalam bentuk persentase
        foreach ($ageGroupsSatisfaction as $ageGroup => &$group) {
            if ($group['total_count'] > 0) {
                // Hitung rata-rata kepuasan dan konversikan ke persen
                $average_satisfaction = $group['total_score'] / $group['total_count'];
                $group['average_satisfaction'] = ($average_satisfaction / 5) * 100;
            } else {
                $group['average_satisfaction'] = 0; // Atur ke 0 jika tidak ada responden
            }
        }

        // Siapkan data untuk grafik
        $ageLabels = array_keys($ageGroupsSatisfaction);
        $ageData = array_map(fn($group) => $group['average_satisfaction'], $ageGroupsSatisfaction);

        return view('survey.indexSurveyUmur', compact('ageLabels', 'ageData'));
    }


    public function indexJenisKelamin()
    {
        // Ambil semua data survei
        $surveys = Survey::all();

        // Inisialisasi array untuk menyimpan data kepuasan berdasarkan jenis kelamin
        $genderSatisfaction = [
            'L' => ['total_score' => 0, 'total_count' => 0, 'average_satisfaction' => 0],
            'P' => ['total_score' => 0, 'total_count' => 0, 'average_satisfaction' => 0],
        ];

        $satisfactionScale = [
            'STS' => 1,
            'TS' => 2,
            'N' => 3,
            'S' => 4,
            'SS' => 5,
        ];

        // Ambil data dan hitung kepuasan berdasarkan jenis kelamin
        foreach ($surveys as $survey) {
            $gender = $survey->jk; // Mengambil nilai jenis kelamin (L/P)
            $kepuasanPengguna = $survey->kepuasan_pengguna;

            if (in_array($gender, ['L', 'P'])) {
                $genderSatisfaction[$gender]['total_score'] += $kepuasanPengguna;
                $genderSatisfaction[$gender]['total_count']++;
            }
        }

        // Hitung rata-rata kepuasan untuk setiap jenis kelamin dalam bentuk persentase
        foreach ($genderSatisfaction as $gender => &$group) {
            if ($group['total_count'] > 0) {
                // Hitung rata-rata kepuasan dan konversikan ke persen
                $average_satisfaction = $group['total_score'] / $group['total_count'];
                $group['average_satisfaction'] = ($average_satisfaction / 5) * 100;
            } else {
                $group['average_satisfaction'] = 0; // Atur ke 0 jika tidak ada responden
            }
        }

        // Siapkan data untuk grafik
        $genderLabels = array_keys($genderSatisfaction);
        $genderData = array_map(fn($group) => $group['average_satisfaction'], $genderSatisfaction);

        return view('survey.indexSurveyJK', compact('genderLabels', 'genderData'));
    }

    public function indexPekerjaan()
    {
        // Ambil semua data survei
        $surveys = Survey::all();

        // Inisialisasi array untuk menyimpan data kepuasan berdasarkan jenis pekerjaan
        $jobSatisfaction = [
            'Pegawai Negeri Sipil (PNS)' => ['total_score' => 0, 'total_count' => 0, 'average_satisfaction' => 0],
            'Karyawan Swasta' => ['total_score' => 0, 'total_count' => 0, 'average_satisfaction' => 0],
            'Wirausaha' => ['total_score' => 0, 'total_count' => 0, 'average_satisfaction' => 0],
            'IRT' => ['total_score' => 0, 'total_count' => 0, 'average_satisfaction' => 0],
            'Tenaga Kesehatan' => ['total_score' => 0, 'total_count' => 0, 'average_satisfaction' => 0],
            'THL (Tenaga Lepas Harian)' => ['total_score' => 0, 'total_count' => 0, 'average_satisfaction' => 0],
        ];

        $satisfactionScale = [
            'STS' => 1,
            'TS' => 2,
            'N' => 3,
            'S' => 4,
            'SS' => 5,
        ];

        // Ambil data dan hitung kepuasan berdasarkan jenis pekerjaan
        foreach ($surveys as $survey) {
            $job = $survey->pekerjaan; // Mengambil nilai pekerjaan
            $kepuasanPengguna = $survey->kepuasan_pengguna;

            if (array_key_exists($job, $jobSatisfaction)) {
                $jobSatisfaction[$job]['total_score'] += $kepuasanPengguna;
                $jobSatisfaction[$job]['total_count']++;
            }
        }

        // Hitung rata-rata kepuasan untuk setiap jenis pekerjaan dalam bentuk persentase
        foreach ($jobSatisfaction as $job => &$group) {
            if ($group['total_count'] > 0) {
                // Hitung rata-rata kepuasan dan konversikan ke persen
                $average_satisfaction = $group['total_score'] / $group['total_count'];
                $group['average_satisfaction'] = ($average_satisfaction / 5) * 100;
            } else {
                $group['average_satisfaction'] = 0; // Atur ke 0 jika tidak ada responden
            }
        }

        // Siapkan data untuk grafik
        $jobLabels = array_keys($jobSatisfaction);
        $jobData = array_map(fn($group) => $group['average_satisfaction'], $jobSatisfaction);

        return view('survey.indexSurveyPekerjaan', compact('jobLabels', 'jobData'));
    }

    public function indexAlamat()
    {
        // Ambil semua data survei
        $surveys = Survey::all();

        // Inisialisasi array untuk menyimpan data kepuasan berdasarkan alamat
        $locationSatisfaction = [
            'Abeli' => ['total_score' => 0, 'total_count' => 0, 'average_satisfaction' => 0],
            'Baruga' => ['total_score' => 0, 'total_count' => 0, 'average_satisfaction' => 0],
            'Kadia' => ['total_score' => 0, 'total_count' => 0, 'average_satisfaction' => 0],
            'Kambu' => ['total_score' => 0, 'total_count' => 0, 'average_satisfaction' => 0],
            'Kendari Barat' => ['total_score' => 0, 'total_count' => 0, 'average_satisfaction' => 0],
            'Mandonga' => ['total_score' => 0, 'total_count' => 0, 'average_satisfaction' => 0],
            'Nambo' => ['total_score' => 0, 'total_count' => 0, 'average_satisfaction' => 0],
            'Poasia' => ['total_score' => 0, 'total_count' => 0, 'average_satisfaction' => 0],
            'Puuwatu' => ['total_score' => 0, 'total_count' => 0, 'average_satisfaction' => 0],
            'Wua-wua' => ['total_score' => 0, 'total_count' => 0, 'average_satisfaction' => 0],
        ];

        $satisfactionScale = [
            'STS' => 1,
            'TS' => 2,
            'N' => 3,
            'S' => 4,
            'SS' => 5,
        ];

        // Ambil data dan hitung kepuasan berdasarkan alamat
        foreach ($surveys as $survey) {
            $location = $survey->alamat; // Mengambil nilai alamat
            $kepuasanPengguna = $survey->kepuasan_pengguna;

            if (array_key_exists($location, $locationSatisfaction)) {
                $locationSatisfaction[$location]['total_score'] += $kepuasanPengguna;
                $locationSatisfaction[$location]['total_count']++;
            }
        }

        // Hitung rata-rata kepuasan untuk setiap alamat dalam bentuk persentase
        foreach ($locationSatisfaction as $location => &$group) {
            if ($group['total_count'] > 0) {
                // Hitung rata-rata kepuasan dan konversikan ke persen
                $average_satisfaction = $group['total_score'] / $group['total_count'];
                $group['average_satisfaction'] = ($average_satisfaction / 5) * 100;
            } else {
                $group['average_satisfaction'] = 0; // Atur ke 0 jika tidak ada responden
            }
        }

        // Siapkan data untuk grafik
        $locationLabels = array_keys($locationSatisfaction);
        $locationData = array_map(fn($group) => $group['average_satisfaction'], $locationSatisfaction);

        return view('survey.indexSurveyAlamat', compact('locationLabels', 'locationData'));
    }

    public function indexLamaPenggunaan()
    {
        // Ambil semua data survei
        $surveys = Survey::all();

        // Inisialisasi array untuk menyimpan data kepuasan berdasarkan lama penggunaan
        $usageDurationSatisfaction = [
            '1 Tahun' => ['total_score' => 0, 'total_count' => 0, 'average_satisfaction' => 0],
            '2 Tahun' => ['total_score' => 0, 'total_count' => 0, 'average_satisfaction' => 0],
            '3-4 Tahun' => ['total_score' => 0, 'total_count' => 0, 'average_satisfaction' => 0],
            '5 Tahun' => ['total_score' => 0, 'total_count' => 0, 'average_satisfaction' => 0],
        ];

        $satisfactionScale = [
            'STS' => 1,
            'TS' => 2,
            'N' => 3,
            'S' => 4,
            'SS' => 5,
        ];

        // Ambil data dan hitung kepuasan berdasarkan lama penggunaan
        foreach ($surveys as $survey) {
            $usageDuration = $survey->lama_penggunaan; // Mengambil nilai lama penggunaan
            $kepuasanPengguna = $survey->kepuasan_pengguna;

            if (array_key_exists($usageDuration, $usageDurationSatisfaction)) {
                $usageDurationSatisfaction[$usageDuration]['total_score'] += $kepuasanPengguna;
                $usageDurationSatisfaction[$usageDuration]['total_count']++;
            }
        }

        // Hitung rata-rata kepuasan untuk setiap lama penggunaan dalam bentuk persentase
        foreach ($usageDurationSatisfaction as $duration => &$group) {
            if ($group['total_count'] > 0) {
                // Hitung rata-rata kepuasan dan konversikan ke persen
                $average_satisfaction = $group['total_score'] / $group['total_count'];
                $group['average_satisfaction'] = ($average_satisfaction / 5) * 100;
            } else {
                $group['average_satisfaction'] = 0; // Atur ke 0 jika tidak ada responden
            }
        }

        // Siapkan data untuk grafik
        $durationLabels = array_keys($usageDurationSatisfaction);
        $durationData = array_map(fn($group) => $group['average_satisfaction'], $usageDurationSatisfaction);

        return view('survey.indexSurveyLamaPenggunaan', compact('durationLabels', 'durationData'));
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
