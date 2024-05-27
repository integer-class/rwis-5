<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BansosModelFactory extends Factory
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
            'citizen_data_id' => $this->faker->randomElement($citizen_data_id),
            'is_bansosable' => $this->faker->boolean(),
            'status' => $this->faker->boolean(),
        ];
    }
}
