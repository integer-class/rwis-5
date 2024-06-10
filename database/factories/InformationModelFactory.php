<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InformationModel>
 */
class InformationModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->randomElement(['Tahlil','PKK','Senam Pagi','Kerja Bakti','Taziah']),
            'desc' => 'anu',
            'date' => $this->faker->date(),
            'time' => $this->faker->randomElement(['09:00 - 10:00','10:00 - 11:00','11:00 - 12:00','13:00 - 14:00','14:00 - 15:00','15:00 - 16:00','16:00 - 17:00','17:00 - 18:00']),
            'place' => $this->faker->randomElement(['Rumah pak Amir','Rumah pak Rusdi','Rumah bu Aminah','Rumah mas Fuad']),
            'image' => 'village.png',
            'is_archived' => false,
        ];
    }
}
