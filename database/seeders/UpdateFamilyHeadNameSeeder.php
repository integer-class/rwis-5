<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CitizenDataModel;
use App\Models\FamilyModel;
class UpdateFamilyHeadNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $families = FamilyModel::select('family_data.*')
            ->where('family_data.is_archived', false)
            ->get();
        foreach ($families as $family) {
            $familyHead = CitizenDataModel::select('citizen_data.*')
                ->where('family_id', $family->family_id)
                ->where('is_archived', false)
                ->first();
            if ($familyHead) {
                $family->family_head_name = $familyHead->name;
                $family->save();
            }
        }
    }
}
