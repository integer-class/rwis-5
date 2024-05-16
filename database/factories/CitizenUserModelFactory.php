<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CitizenUserModel>
 */
class CitizenUserModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $citizen_data_id = \App\Models\CitizenDataModel::pluck('citizen_data_id')->toArray();
        return [
            'citizen_user_id' => $this->faker->unique()->randomNumber(5),
            'citizen_data_id' => $this->faker->randomElement($citizen_data_id),
            'nik' => $this->faker->unique()->randomNumber(9),
            'level' => $this->faker->randomElement(['rt', 'warga']),
            'password' => $this->faker->randomElement(['12345678', 'password'])
        ];
    }
}
