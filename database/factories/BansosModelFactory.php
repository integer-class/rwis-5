<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BansosModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return DB::transaction(function () {
            // Get all citizen_data_id from CitizenDataModel
            $allCitizenDataIds = \App\Models\CitizenDataModel::pluck('citizen_data_id')->toArray();
    
            // Get all citizen_data_id that have been used in BansosModel
            $usedCitizenDataIds = \App\Models\BansosModel::pluck('citizen_data_id')->toArray();
    
            // Get the citizen_data_ids that have not been used yet
            $unusedCitizenDataIds = array_diff($allCitizenDataIds, $usedCitizenDataIds);
    
            // If there are no unused citizen_data_ids, throw an exception
            if (empty($unusedCitizenDataIds)) {
                throw new \Exception('All citizen_data_ids have been used');
            }
    
            // Pick a random unused citizen_data_id and remove it from the array
            $key = array_rand($unusedCitizenDataIds);
            $citizen_data_id = $unusedCitizenDataIds[$key];
            unset($unusedCitizenDataIds[$key]);
    
            return [
                'citizen_data_id' => $citizen_data_id,
                'is_bansosable' => $this->faker->boolean(),
                'status' => $this->faker->boolean(),
            ];
        });
    }
}   

