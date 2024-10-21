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
        // $faker = FakerFactory::create('id_ID');

        // foreach (range(1, 500) as $index) {
        //     DB::table('surveys')->insert([
        //         'name' => $faker->name(),
        //         'email' => $faker->unique()->email(),
        //         'ease_of_use' => $faker->numberBetween(1, 5),
        //         'interface_intuitiveness' => $faker->numberBetween(1, 5),
        //         'responsiveness' => $faker->numberBetween(1, 5),
        //         'feature_completeness' => $faker->numberBetween(1, 5),
        //         'feature_suitability' => $faker->numberBetween(1, 5),
        //         'stability' => $faker->numberBetween(1, 5),
        //         'ui_design' => $faker->numberBetween(1, 5),
        //         'customer_support' => $faker->numberBetween(1, 5),
        //         'security_and_privacy' => $faker->numberBetween(1, 5),
        //         'age' => $faker->numberBetween(20, 60),
        //     ]);
        // }

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ]);
    }
}
