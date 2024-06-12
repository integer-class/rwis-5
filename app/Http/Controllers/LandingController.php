<?php

namespace App\Http\Controllers;

use App\Models\FamilyModel;
use App\Models\HealthModel;
use App\Models\CitizenDataModel;
use App\Models\InformationModel;
use App\Models\Report;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $top3information = InformationModel::where('is_archived', 0)
        ->orderBy('created_at', 'desc')->limit(3)->get();

        $citizenCount = CitizenDataModel::count();
        $rtCount = FamilyModel::select('rt')->distinct()->count();
        $familyCount = FamilyModel::count();
        $adultCount = HealthModel::where('age', '>', 15)->count();
        $childCount = HealthModel::where('age', '<', 15)->count();

        $top3report = Report::orderBy('created_at', 'desc')->limit(3)->get();

        return view('welcome', compact('top3information', 'citizenCount', 'rtCount', 'familyCount', 'adultCount', 'childCount', 'top3report'));
    }
}
