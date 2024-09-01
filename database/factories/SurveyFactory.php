<?php

namespace Database\Factories;

use App\Models\Survey;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PendaftaranBansos>
 */
class SurveyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker =  FakerFactory::create('id_ID');
        return [
            'name' => $faker->name(),
            'name' => $faker->name().'@gmail.com',
            'ease_of_use' => $faker->numberBetween('1', '4'),
            'interface_intuitiveness' => $faker->numberBetween('1', '4'),
            'responsiveness' => $faker->numberBetween('1', '4'),
            'feature_completeness' => $faker->numberBetween('1', '4'),
            'feature_suitability' => $faker->numberBetween('1', '4'),
            'stability' => $faker->numberBetween('1', '4'),
            'ui_design' => $faker->numberBetween('1', '4'),
            'customer_support' => $faker->numberBetween('1', '4'),
            'security_and_privacy' => $faker->numberBetween('1', '4'),
        ];
    }

}