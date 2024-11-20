<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SurveyImport;
use Illuminate\Support\Facades\Log;

class SurveyController extends Controller
{
    public function indexSurvey()
    {
        // Ambil semua data survei
        $surveys = Survey::all();

        // Definisikan skala kepuasan
        $satisfactionScaleLine = [
            5 => 'SP', // Sangat Puas
            4 => 'P',  // Puas
            3 => 'CP', // Cukup Puas
            2 => 'KP', // Kurang Puas
            1 => 'TP'  // Tidak Puas
        ];

        // Inisialisasi total respons untuk setiap kategori
        $totalResponses = [
            'SP' => 0,
            'P' => 0,
            'CP' => 0,
            'KP' => 0,
            'TP' => 0
        ];

        // Nama field yang ada di database untuk diukur
        $fields = ['kepuasan_pengguna'];

        // Hitung jumlah responden yang memilih setiap kategori
        foreach ($surveys as $survey) {
            foreach ($fields as $field) {
                $answer = $survey->$field; // Mengambil nilai jawaban (angka 1-5)

                if (isset($satisfactionScaleLine[$answer])) {
                    $responseLabel = $satisfactionScaleLine[$answer];
                    
                    // Tambahkan ke total jawaban untuk kategori yang sesuai
                    $totalResponses[$responseLabel]++;
                }
            }
        }

        // Hitung total survei yang valid
        $totalSurveyCount = count($surveys);

        // Hitung persentase untuk setiap kategori jawaban
        $percentageResponses = array_map(function ($count) use ($totalSurveyCount) {
            return ($totalSurveyCount > 0) ? round(($count / $totalSurveyCount) * 100) : 0;
        }, $totalResponses);


        // Kirim data ke view
        return view('survey.indexSurvey', compact('totalResponses', 'percentageResponses'));
    }

    public function indexUmur()
    {
        // Ambil semua data survei
        $surveys = Survey::all();

        // Inisialisasi array untuk menyimpan jumlah responden berdasarkan kelompok umur
        $respondentCount = [
            '20-35' => 0,
            '36-45' => 0,
            '46-60' => 0,
        ];

        // Ambil data dan hitung jumlah responden berdasarkan kelompok umur
        foreach ($surveys as $survey) {
            $age = $survey->usia;

            // Kategorikan responden berdasarkan usia
            if ($age >= 20 && $age <= 35) {
                $respondentCount['20-35']++;
            } elseif ($age >= 36 && $age <= 45) {
                $respondentCount['36-45']++;
            } elseif ($age >= 46 && $age <= 60) {
                $respondentCount['46-60']++;
            }
        }

        // Siapkan data untuk grafik atau tabel
        $ageLabels = array_keys($respondentCount);
        $ageData = $respondentCount;
        // dd($respondentCount);

        // Kirim data ke view
        return view('survey.indexSurveyUmur', compact('ageLabels', 'ageData', 'respondentCount'));
    }


    public function indexJenisKelamin()
    {
        // Ambil semua data survei
        $surveys = Survey::all();

        // Inisialisasi array untuk menyimpan jumlah responden berdasarkan jenis kelamin
        $respondentCount = [
            'L' => 0, // Laki-laki
            'P' => 0  // Perempuan
        ];

        // Hitung jumlah responden berdasarkan jenis kelamin
        foreach ($surveys as $survey) {
            $gender = $survey->jk; // Mengambil nilai jenis kelamin (L/P)
            // dd($gender);

            // Pastikan hanya menghitung jika jenis kelamin adalah 'L' atau 'P'
            if (in_array($gender, ['L', 'P'])) {
                $respondentCount[$gender]++;
            }
        }

        // Siapkan data untuk grafik atau tabel
        $genderLabels = array_keys($respondentCount);
        $genderData = $respondentCount;

        // Kirim data ke view
        return view('survey.indexSurveyJK', compact('genderLabels', 'genderData', 'respondentCount'));
    }


    public function indexPekerjaan()
    {
        // Ambil semua data survei
        $surveys = Survey::all();

        // Inisialisasi array untuk menyimpan data jumlah responden berdasarkan jenis pekerjaan
        $jobSatisfaction = [
            'Pegawai Negeri Sipil (PNS)' => ['count' => 0, 'percentage' => 0],
            'Karyawan Swasta' => ['count' => 0, 'percentage' => 0],
            'Wirausaha' => ['count' => 0, 'percentage' => 0],
            'IRT' => ['count' => 0, 'percentage' => 0],
            'Tenaga Kesehatan' => ['count' => 0, 'percentage' => 0],
            'THL (Tenaga Lepas Harian)' => ['count' => 0, 'percentage' => 0],
        ];

        // Hitung total responden
        $totalRespondents = $surveys->count();

        // Hitung jumlah responden untuk setiap jenis pekerjaan
        foreach ($surveys as $survey) {
            $job = $survey->pekerjaan; // Mengambil nilai pekerjaan

            // Jika pekerjaan sesuai dengan yang diinisialisasi, tambahkan count
            if (array_key_exists($job, $jobSatisfaction)) {
                $jobSatisfaction[$job]['count']++;
            }
        }

        // Hitung persentase responden untuk setiap jenis pekerjaan dan bulatkan ke angka bulat
        foreach ($jobSatisfaction as $job => &$group) {
            if ($totalRespondents > 0) {
                $group['percentage'] = round(($group['count'] / $totalRespondents) * 100);
            } else {
                $group['percentage'] = 0; // Atur ke 0 jika tidak ada responden
            }
        }

        // Siapkan data untuk grafik
        $jobLabels = array_keys($jobSatisfaction);
        $jobData = array_map(fn($group) => $group['percentage'], $jobSatisfaction);

        return view('survey.indexSurveyPekerjaan', compact('jobLabels', 'jobData'));
    }

    public function indexAlamat()
    {
        // Ambil semua data survei
        $surveys = Survey::all();

        // Inisialisasi array untuk menyimpan jumlah responden berdasarkan alamat
        $respondentCount = [
            'Abeli' => 0,
            'Baruga' => 0,
            'Kadia' => 0,
            'Kambu' => 0,
            'Kendari Barat' => 0,
            'Mandonga' => 0,
            'Nambo' => 0,
            'Poasia' => 0,
            'Puuwatu' => 0,
            'Wua-wua' => 0,
        ];

        // Hitung jumlah responden berdasarkan alamat
        foreach ($surveys as $survey) {
            $location = $survey->alamat; // Mengambil nilai alamat

            // Pastikan alamat ada dalam daftar $respondentCount sebelum menghitung
            if (array_key_exists($location, $respondentCount)) {
                $respondentCount[$location]++;
            }
        }

        // Siapkan data untuk grafik atau tabel
        $locationLabels = array_keys($respondentCount);
        $locationData = $respondentCount;

        // Kirim data ke view
        return view('survey.indexSurveyAlamat', compact('locationLabels', 'locationData', 'respondentCount'));
    }

    public function indexLamaPenggunaan()
    {
        // Ambil semua data survei
        $surveys = Survey::all();

        // Inisialisasi array untuk menyimpan jumlah responden berdasarkan lama penggunaan
        $respondentCount = [
            '1 Tahun' => 0,
            '2 Tahun' => 0,
            '3-4 Tahun' => 0,
            '5 Tahun' => 0,
        ];

        // Hitung jumlah responden berdasarkan lama penggunaan
        foreach ($surveys as $survey) {
            $usageDuration = $survey->lama_penggunaan; // Mengambil nilai lama penggunaan

            // Pastikan lama penggunaan ada dalam daftar $respondentCount sebelum menghitung
            if (array_key_exists($usageDuration, $respondentCount)) {
                $respondentCount[$usageDuration]++;
            }
        }

        // Siapkan data untuk grafik atau tabel
        $durationLabels = array_keys($respondentCount);
        $durationData = $respondentCount;

        // Kirim data ke view
        return view('survey.indexSurveyLamaPenggunaan', compact('durationLabels', 'durationData', 'respondentCount'));
    }


    public function dataSurvey()
    {
        $data = Survey::simplePaginate(10);

        return view('survey.dataSurvey', compact('data'));
    }

    public function importSurvey(Request $request)
    {
        $file = $request->file('file');

        // Pastikan file diunggah sebelum menjalankan import
        if ($file) {
            Excel::import(new SurveyImport, $file);
            return redirect()->back()->with('success', 'Data berhasil diimpor!');
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan!');
        }
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
