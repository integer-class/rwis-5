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
            'asset_id' => $this->faker->randomElement($asset_id),
            'job' => $this->faker->jobTitle(),
            'education' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'Sarjana', 'Magister', 'Doktor']),
            'income' => $this->faker->randomNumber(7)
        ];
    }
}
