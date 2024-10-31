<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as FakerFactory;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $faker = FakerFactory::create('id_ID');

        foreach (range(1, 500) as $index) {
            DB::table('surveys')->insert([

                'name' => $faker->name(),
                'pekerjaan' => $faker->randomElement(['Pegawai Negeri Sipil (PNS)', 'Karyawaan Swasta', 'Wirausaha', 'IRT', 'Tenaga Kesehatan', 'THL (Tenaga Lepas Harian)']),
                'alamat' => $faker->randomElement(['Abeli', 'Baruga', 'Kadia', 'Kambu', 'Kendari Barat', 'Mandonga', 'Nambo', 'Poasia', 'Puuwatu', 'Wua-wua']),
                'usia' => $faker->numberBetween(20, 60),
                'lama_penggunaan' => $faker->randomElement(['1 Tahun', '2 Tahun', '3-4 Tahun', '5 Tahun']),
                'kepuasan_pengguna' => $faker->numberBetween(1, 5),
                'informasi_lengkap' => $faker->numberBetween(1, 5),
                'konten_berkualitas' => $faker->numberBetween(1, 5),
                'konten_bermanfaat' => $faker->numberBetween(1, 5),
                'informasi_akurat' => $faker->numberBetween(1, 5),
                'standar_kinerja' => $faker->numberBetween(1, 5),
                'informasi_dipercaya' => $faker->numberBetween(1, 5),
                'format_menarik' => $faker->numberBetween(1, 5),
                'tampilan_jelas' => $faker->numberBetween(1, 5),
                'output_berkualitas' => $faker->numberBetween(1, 5),
                'format_mudah' => $faker->numberBetween(1, 5),
                'user_friendly' => $faker->numberBetween(1, 5),
                'nyaman_digunakan' => $faker->numberBetween(1, 5),
                'kemudahan_interaksi' => $faker->numberBetween(1, 5),
                'informasi_dibutuhkan' => $faker->numberBetween(1, 5),
                'informasi_siapsaji' => $faker->numberBetween(1, 5),
                'akses_cepat' => $faker->numberBetween(1, 5),
                'unggahan_cepat' => $faker->numberBetween(1, 5),
                'akses_aman' => $faker->numberBetween(1, 5),
                'keamanan_data' => $faker->numberBetween(1, 5),
                'data_terjamin' => $faker->numberBetween(1, 5),
                'memenuhi_kebutuhan' => $faker->numberBetween(1, 5),
                'bekerja_efisien' => $faker->numberBetween(1, 5),
                'bekerja_efektif' => $faker->numberBetween(1, 5),
                'kepuasan_keseluruhan' => $faker->numberBetween(1, 5),

                // 'name' => $faker->name(),
                // 'ease_of_use' => $faker->numberBetween(1, 5),
                // 'interface_intuitiveness' => $faker->numberBetween(1, 5),
                // 'responsiveness' => $faker->numberBetween(1, 5),
                // 'feature_completeness' => $faker->numberBetween(1, 5),
                // 'feature_suitability' => $faker->numberBetween(1, 5),
                // 'stability' => $faker->numberBetween(1, 5),
                // 'ui_design' => $faker->numberBetween(1, 5),
                // 'customer_support' => $faker->numberBetween(1, 5),
                // 'security_and_privacy' => $faker->numberBetween(1, 5),
                // 'age' => $faker->numberBetween(20, 60),
            ]);
        }

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ]);
    }
}
