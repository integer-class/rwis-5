<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CitizenDataModel;
use App\Models\WealthModel;
use App\Models\HealthModel;
use App\Models\FamilyModel;

class CitizenController extends Controller
{
    public function index()
    {
        $citizens = CitizenDataModel::select('citizen_data.*', 'family_data.rt as rt', 'wealth_data.job as job')
            ->join('family_data', 'citizen_data.family_id', '=', 'family_data.family_id')
            ->join('wealth_data', 'citizen_data.wealth_id', '=', 'wealth_data.wealth_id')
            ->paginate(10);

        return view('pages.citizen.index', compact('citizens'));
    }

    public function create()
    {
        return view('pages.citizen.create');
    }
}
