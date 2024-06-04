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
        $nik = \App\Models\CitizenDataModel::pluck('nik')->toArray();
        $no_rt = \App\Models\FamilyModel::pluck('rt')->toArray();
        $name = \App\Models\CitizenDataModel::pluck('name')->toArray();
        return [
            'nik' => $this->faker->unique()->randomElement($nik),
            'name' => $this->faker->randomElement($name),
            'level' => $this->faker->randomElement(['rt', 'warga', 'rw']),

            'password' => $this->faker->randomElement(['12345678', 'password']),
            'no_rt' => $this->faker->randomElement($no_rt)
        ];
    }
}
