<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FamilyModel;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\FamilyModel::factory(50)->create();

        FamilyModel::create([
            'family_id' => '88888888',
            'family_head_name' => 'Kepala Keluarga',
            'address' => 'Jl. Kepala Keluarga No. 1',
            'rt' => '01',
            'rw' => '03',
            'village' => 'Jatimulyo',
            'sub_district' => 'Lowokwaru',
            'city' => 'Malang',
            'province' => 'Jawa Timur',
            'postal_code' => '65141'
        ]);
    }
}
