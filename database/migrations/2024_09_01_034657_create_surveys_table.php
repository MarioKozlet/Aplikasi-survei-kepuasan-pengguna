<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('jk')->nullable();
            $table->string('pekerjaan');
            $table->string('alamat');
            $table->string('usia');
            $table->string('lama_penggunaan'); // Menyimpan lama penggunaan aplikasi dalam bulan atau tahun
            $table->string('kepuasan_pengguna'); // Menyimpan jawaban puas atau tidak
            $table->string('informasi_lengkap'); // Aplikasi memberikan informasi yang lengkap
            $table->string('konten_berkualitas'); // Konten memiliki kualitas
            $table->string('konten_bermanfaat'); // Konten bermanfaat
            $table->string('informasi_akurat'); // Informasi akurat
            $table->string('standar_kinerja'); // Sesuai standar
            $table->string('informasi_dipercaya'); // Informasi dapat dipercaya
            $table->string('format_menarik'); // Format menarik
            $table->string('tampilan_jelas'); // Tampilan jelas
            $table->string('output_berkualitas'); // Output berkualitas
            $table->string('format_mudah'); // Format mudah
            $table->string('user_friendly'); // Mudah digunakan
            $table->string('nyaman_digunakan'); // Nyaman digunakan
            $table->string('kemudahan_interaksi'); // Kemudahan interaksi
            $table->string('informasi_dibutuhkan'); // Informasi yang dibutuhkan
            $table->string('informasi_siapsaji'); // Informasi siap untuk digunakan
            $table->string('akses_cepat'); // Akses cepat
            $table->string('unggahan_cepat'); // Pengunggahan cepat
            $table->string('akses_aman'); // Akses aman
            $table->string('keamanan_data'); // Pengaturan keamanan
            $table->string('data_terjamin'); // Data terjamin
            $table->string('memenuhi_kebutuhan'); // Memenuhi kebutuhan
            $table->string('bekerja_efisien'); // Bekerja secara efisien
            $table->string('bekerja_efektif'); // Bekerja secara efektif
            $table->string('kepuasan_keseluruhan'); // Kepuasan terhadap sistem secara keseluruhan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
