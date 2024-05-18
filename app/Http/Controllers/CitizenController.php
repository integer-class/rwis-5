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
        if (request()->has('keyword')) {
            $citizens = CitizenDataModel::select('citizen_data.*', 'family_data.rt as rt', 'wealth_data.job as job')
                ->join('family_data', 'citizen_data.family_id', '=', 'family_data.family_id')
                ->join('wealth_data', 'citizen_data.wealth_id', '=', 'wealth_data.wealth_id')
                ->where('citizen_data.is_archived', false)
                ->where('citizen_data.name', 'like', '%' . request('keyword') . '%')
                ->paginate(5);
        } else {
            $citizens = CitizenDataModel::select('citizen_data.*', 'family_data.rt as rt', 'wealth_data.job as job')
                ->join('family_data', 'citizen_data.family_id', '=', 'family_data.family_id')
                ->join('wealth_data', 'citizen_data.wealth_id', '=', 'wealth_data.wealth_id')
                ->where('citizen_data.is_archived', false)
                ->paginate(5);
        }

        // $citizens = CitizenDataModel::select('citizen_data.*', 'family_data.rt as rt', 'wealth_data.job as job')
        //     ->join('family_data', 'citizen_data.family_id', '=', 'family_data.family_id')
        //     ->join('wealth_data', 'citizen_data.wealth_id', '=', 'wealth_data.wealth_id')
        //     ->where('citizen_data.is_archived', false)
        //     ->paginate(10);

        return view('pages.citizen.index', compact('citizens'));
    }

    public function create()
    {
        return view('pages.citizen.create');
    }

    public function store(Request $request)
    {
        $citizen = new CitizenDataModel();
        $citizen->citizen_data_id = $request->nik;
        $citizen->name = $request->name;
        $citizen->gender = $request->gender;
        $citizen->birth_date = $request->birth_date;
        $citizen->birth_place = $request->birth_place;
        $citizen->religion = $request->religion;
        $citizen->maritial_status = $request->maritial_status;
        $citizen->address_ktp = $request->address_ktp;
        $citizen->address_domisili = $request->address_current;
        $citizen->is_verified = true;
        $citizen->is_archived = false;
        $citizen->save();

        $wealth = new WealthModel();
        $wealth->job = $request->job;
        $wealth->income = $request->income;
        $wealth->education = $request->education;
        $wealth->save();

        return redirect()->route('citizen.index')->with('success', 'Data berhasil disimpan');
    }

    public function archive($id)
    {
        $citizen = CitizenDataModel::where('citizen_data_id', $id)->first();
        $citizen->is_archived = true;
        $citizen->save();

        return redirect()->route('citizen.index');
    }

    public function edit($id)
    {
        $citizen = CitizenDataModel::select('citizen_data.*', 'family_data.rt as rt', 'wealth_data.job as job')
            ->join('family_data', 'citizen_data.family_id', '=', 'family_data.family_id')
            ->join('wealth_data', 'citizen_data.wealth_id', '=', 'wealth_data.wealth_id')
            ->where('citizen_data_id', $id)
            ->first();

        return view('pages.citizen.edit', compact('citizen'));
    }
}
