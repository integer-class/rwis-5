<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class healthModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'health_id' => $this->faker->unique()->randomNumber(5),
            'age' => $this->faker->randomNumber(2),
            'blood_type' => $this->faker->randomElement(['A', 'B', 'AB', 'O']),
            'weight' => $this->faker->randomNumber(2),
            'height' => $this->faker->randomNumber(3),
            'disability' => $this->faker->randomElement(['Ya', 'Tidak']),
            'disease' => $this->faker->randomElement(['Ya', 'Tidak'])
        ];
    }
}
