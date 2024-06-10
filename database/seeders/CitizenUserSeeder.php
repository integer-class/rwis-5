<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CitizenUserModel;


class CitizenUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // CitizenUserModel::create([
        //     'nik' => 757575757575,
        //     'name' => 'admin RW',
        //     'level' => 'rw',
        //     'password' => '757575757575',
        //     'no_rt' => '01',
        // ]);

        \App\Models\CitizenUserModel::factory(50)->create();
    }
    
}
