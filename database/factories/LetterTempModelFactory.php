<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TemplateModel>
 */
class LetterTempModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Template Surat',
            'filesize' => '2 MB',
            'path' => 'temp1.pdf',
            'is_archived' => false,
        ];
    }
}
