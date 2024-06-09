<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\CitizenDataModel;

class CitizenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\CitizenDataModel::factory(50)->create();

        CitizenDataModel::create([
            'nik' => 757575757575,
            'name' => 'admin RW',
            'family_id' => 88888888,
            'health_id' => 88888888,
            'wealth_id' => 88888888,
            'gender' => 'L',
            'maritial_status' => 'Kawin',
            'birth_date' => '1990-01-01',
            'birth_place' => 'Jakarta',
            'religion' => 'Islam',
            'address_ktp' => 'Jl. Jalan',
            'address_domisili' => 'Jl. Jalan',
            'phone_number' => '081234567890'
        ]);
    }
}
