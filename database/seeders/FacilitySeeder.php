<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Facility;

class FacilitySeeder extends Seeder
{
    public function run()
    {
        Facility::create([
            'name' => 'Balai RW',
            'description' => 'Description for Balai RW',
            'image' => 'path/to/image1.jpg',
        ]);

        Facility::create([
            'name' => 'Musholla Jabbanur',
            'description' => 'Description for Musholla Jabbanur',
            'image' => 'path/to/image2.jpg',
        ]);

        Facility::create([
            'name' => 'Pos Kampling',
            'description' => 'Description for Pos Kampling',
            'image' => 'path/to/image3.jpg',
        ]);

        // Add more facilities as needed
    }
}
