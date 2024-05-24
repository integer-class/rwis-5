<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class WealthModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $asset_id = \App\Models\AssetModel::pluck('asset_id')->toArray();

        return [
            'wealth_id' => $this->faker->unique()->randomNumber(5),
            'job' => $this->faker->randomElement(['Pelajar', 'PNS', 'TNI', 'POLRI', 'Swasta', 'Wiraswasta', 'Petani', 'Nelayan', 'Buruh', 'Lainnya']),
            'education' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'Diploma', 'Sarjana', 'Magister', 'Doktor']),
            'income' => $this->faker->randomElement(['1', '2', '3', '4', '5', '6'])
        ];
    }
}
