<?php

namespace App\Imports;

use App\Models\Survey;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SurveyImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Survey([
            'name' => $row['nama'],
            'jk' => $this->convertResponseJK($row['jenis_kelamin']),
            'pekerjaan' => $row['pekerjaan'],
            'alamat' => $row['alamat'],
            'usia' => $row['usia'],
            'lama_penggunaan' => $row['lama_penggunaan'],
            'kepuasan_pengguna' => $this->convertResponseKepuasan($row['2_apakah_anda_merasa_puas_saat_menggunakan_aplikasi_sentuh_tanahku']),
            'informasi_lengkap' => $this->convertResponse($row['1_aplikasi_sentuh_tanahku_memberikan_informasi_yang_lengkap']),
            'konten_berkualitas' => $this->convertResponse($row['2_aplikasi_sentuh_tanahku_memiliki_content_isi_yang_berkualitas']),
            'konten_bermanfaat' => $this->convertResponse($row['3_aplikasi_sentuh_tanahku_menyediakan_content_isi_yang_bermanfaat']),
            'informasi_akurat' => $this->convertResponse($row['4_aplikasi_sentuh_tanahku_menyediakan_informasi_yang_akurat']),
            'standar_kinerja' => $this->convertResponse($row['5_aplikasi_sentuh_tanahku_bekerja_sesuai_dengan_standar_yang_ditentukan']),
            'informasi_dipercaya' => $this->convertResponse($row['6_aplikasi_sentuh_tanahku_menghasilkan_informasi_yang_dapat_dipercaya']),
            'format_menarik' => $this->convertResponse($row['7_aplikasi_sentuh_tanahku_memiliki_format_yang_menarik']),
            'tampilan_jelas' => $this->convertResponse($row['8_aplikasi_sentuh_tanahku_memiliki_tampilan_sistem_yang_jelas']),
            'output_berkualitas' => $this->convertResponse($row['9_fitur_fitur_aplikasi_sentuh_tanahku_memiliki_output_dengan_kualitas_yang_baik']),
            'format_mudah' => $this->convertResponse($row['10_fitur_fitur_aplikasi_sentuh_tanahku_memiliki_format_yang_mudah_digunakan']),
            'user_friendly' => $this->convertResponse($row['11_aplikasi_sentuh_tanahku_bersifat_user_friendly_mudah_digunakan']),
            'nyaman_digunakan' => $this->convertResponse($row['12_aplikasi_sentuh_tanahku_nyaman_digunakan']),
            'kemudahan_interaksi' => $this->convertResponse($row['13_fitur_fitur_aplikasi_sentuh_tanahku_memberikan_kemudahan_beriteraksi_dengan_penggunanya']),
            'informasi_dibutuhkan' => $this->convertResponse($row['14_aplikasi_sentuh_tanahku_memberikan_informasi_yang_saya_butuhkan_secara_tepat_waktu']),
            'informasi_siapsaji' => $this->convertResponse($row['15_aplikasi_sentuh_tanahku_menyediakan_informasi_yang_sudah_siap_untuk_digunakan_dalam_waktu_tertentu']),
            'akses_cepat' => $this->convertResponse($row['16_aplikasi_sentuh_tanahku_dapat_diakses_secara_cepat']),
            'unggahan_cepat' => $this->convertResponse($row['17_aplikasi_sentuh_tanahku_dapat_bekerja_dengan_cepat_saat_diberikan_perintah_hingga_menghasilkan_informasi']),
            'akses_aman' => $this->convertResponse($row['19_saya_dapat_mengakses_aplikasi_sentuh_tanahku_secara_aman']),
            'keamanan_data' => $this->convertResponse($row['20_aplikasi_sentuh_tanahku_memiliki_pengaturan_keamanan']),
            'data_terjamin' => $this->convertResponse($row['21_data_yang_ada_pada_aplikasi_sentuh_tanahku_dapat_terjamin_kerahasiannya']),
            'memenuhi_kebutuhan' => $this->convertResponse($row['22_aplikasi_sentuh_tanahku_sudah_dapat_memenuhi_kebutuhan_pengguna']),
            'bekerja_efisien' => $this->convertResponse($row['23_aplikasi_sentuh_tanahku_sudah_bekerja_secara_efisien']),
            'bekerja_efektif' => $this->convertResponse($row['24_aplikasi_sentuh_tanahku_sudah_efektif_dalam_penggunaannya']),
            'kepuasan_keseluruhan' => $this->convertResponse($row['25_saya_merasa_puas_dengan_cara_kerja_aplikasi_sentuh_tanahku_secara_meyeluruh']),
        ]);
    }

    /**
     * Fungsi konversi untuk mengubah teks jawaban menjadi nilai numerik.
     *
     * @param string $response
     * @return int|null
     */
    private function convertResponse($response)
    {
        // Hapus spasi ekstra di sekitar teks
        $response = trim($response);
        
        // Konversi teks ke nilai numerik
        switch ($response) {
            case 'Sangat Tidak Setuju':
                return 1;
            case 'Tidak Setuju':
                return 2;
            case 'Netral':
                return 3;
            case 'Setuju':
                return 4;
            case 'Sangat Setuju':
                return 5;
            default:
                return null; // Nilai null jika tidak cocok dengan opsi yang diharapkan
        }
    }

    /**
     * Fungsi konversi untuk mengubah teks jawaban menjadi nilai numerik.
     *
     * @param string $response
     * @return int|null
     */
    private function convertResponseKepuasan($response)
    {
        // Hapus spasi ekstra di sekitar teks
        $response = trim($response);
        
        // Konversi teks ke nilai numerik
        switch ($response) {
            case 'Tidak Puas':
                return 1;
            case 'Kurang Puas':
                return 2;
            case 'Cukup Puas':
                return 3;
            case 'Puas':
                return 4;
            case 'Sangat Puas':
                return 5;
            default:
                return null; // Nilai null jika tidak cocok dengan opsi yang diharapkan
        }
    }

    /**
     * Fungsi konversi untuk mengubah value jenis kelamin.
     *
     * @param string $response
     * @return int|null
     */
    private function convertResponseJK($response)
    {
        // Hapus spasi ekstra di sekitar teks
        $response = strtolower($response);
        
        // Konversi teks ke nilai numerik
        switch ($response) {
            case 'laki-laki':
                return 'L';
            case 'perempuan':
                return 'P';
            default:
                return null; // Nilai null jika tidak cocok dengan opsi yang diharapkan
        }
    }
}
