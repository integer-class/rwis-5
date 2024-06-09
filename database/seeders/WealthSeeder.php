<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\WealthModel;

class WealthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\WealthModel::factory(50)->create();

        WealthModel::create([
            'wealth_id' => 88888888,
            'job' => 'PNS',
            'education' => 'Sarjana',
            'income' => '3',
        ]);
    }
}
