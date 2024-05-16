<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FamilyModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'family_id'=> $this->faker->unique()->randomNumber(9),
            'family_head_name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'rt' => $this->faker->numberBetween(1, 10),
            'rw' => $this->faker->randomNumber(3),
            'village' => $this->faker->city(),
            'sub_district' => $this->faker->city(),
            'city' => $this->faker->city(),
            'province' => $this->faker->city(),
            'postal_code' => $this->faker->randomNumber(5)
        ];
    }
}
