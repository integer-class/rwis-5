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
        // map dahulu nik nya
        $nik = \App\Models\CitizenDataModel::pluck('nik')->unique()->toArray();
        $no_rt = \App\Models\FamilyModel::pluck('rt')->toArray();
        $name = \App\Models\CitizenDataModel::pluck('name')->toArray();

        // buatkan data untuk setiap nik nya
        return [
            'nik' => $this->faker->unique()->randomElement($nik),
            'name' => $this->faker->randomElement($name),
            'level' => $this->faker->randomElement(['rt', 'warga']),

            'password' => $this->faker->randomElement(['12345678', 'password']),
            'no_rt' => $this->faker->randomElement($no_rt)
        ];
    }
}
