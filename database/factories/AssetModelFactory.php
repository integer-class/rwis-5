<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AssetModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'asset_id' => $this->faker->unique()->randomNumber(5),
            'asset_name' => $this->faker->randomElement(['Rumah', 'Mobil', 'Motor', 'Sepeda', 'Laptop', 'Handphone', 'Emas', 'Perak', 'Tanah', 'Sapi']),
        ];
    }
}
