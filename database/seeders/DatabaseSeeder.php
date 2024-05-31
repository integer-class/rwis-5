<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\HealthModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            AssetSeeder::class,
            WealthSeeder::class,
            HealthSeeder::class,
            FamilySeeder::class,
            CitizenSeeder::class,
            CitizenUserSeeder::class,
            BansosSeeder::class,
            FacilitySeeder::class
        ]);
    }
}
