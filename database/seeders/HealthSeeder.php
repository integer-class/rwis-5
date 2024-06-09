<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\HealthModel;

class healthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\HealthModel::factory(50)->create();

        HealthModel::create([
            'health_id' => 88888888,
            'age' => 50,
            'height' => '170',
            'weight' => '70',
            'blood_type' => 'A',
            'disease' => 'Tidak',
            'disability' => 'Tidak'
        ]);
    }
}
