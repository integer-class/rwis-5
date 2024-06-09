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
            'age' => $this->faker->numberBetween(0, 100),
            'blood_type' => $this->faker->randomElement(['A', 'B', 'AB', 'O']),
            'weight' => $this->faker->numberBetween(0, 100),
            'height' => $this->generate_heigth($this->faker),
            'disability' => $this->faker->randomElement(['Ya', 'Tidak']),
            'disease' => $this->faker->randomElement(['Ya', 'Tidak'])
        ];
    }

    private function generate_heigth($faker)
    {
        // sesuaikan dengan umur
        $age = $this->faker->numberBetween(0, 100);
        if ($age < 5) {
            return $this->faker->numberBetween(50, 100);
        } elseif ($age < 10) {
            return $this->faker->numberBetween(100, 150);
        } elseif ($age < 15) {
            return $this->faker->numberBetween(150, 170);
        } elseif ($age < 20) {
            return $this->faker->numberBetween(160, 180);
        } 
    }
}
