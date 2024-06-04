<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CitizenDataModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $family_id = \App\Models\FamilyModel::pluck('family_id')->toArray();
        $health_id = \App\Models\HealthModel::pluck('health_id')->toArray();
        $wealth_id = \App\Models\WealthModel::pluck('wealth_id')->toArray();

        return [
            'nik' => $this->faker->unique()->randomNumber(9),
            'family_id' => $this->faker->randomElement($family_id),
            'health_id' => $this->faker->randomElement($health_id),
            'wealth_id' => $this->faker->randomElement($wealth_id),
            'name' => $this->faker->name(),
            'gender' => $this->faker->randomElement(['L', 'P']),
            'maritial_status' => $this->faker->randomElement(['Belum kawin', 'Kawin', 'Cerai hidup', 'Cerai mati']),
            'birth_place' => $this->faker->city(),
            'birth_date' => $this->faker->date(),
            'religion' =>$this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu']),
            'address_ktp' => $this->faker->address(),
            'address_domisili' => $this->faker->address(),
            'phone_number' => $this->faker->phoneNumber(),
        ];
    }
}
