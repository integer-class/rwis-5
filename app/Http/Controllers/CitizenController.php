<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CitizenDataModel;
use App\Models\CitizenUserModel;
use App\Models\WealthModel;
use App\Models\HealthModel;
use App\Models\FamilyModel;

class CitizenController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        if ($keyword) {
            $citizens = CitizenDataModel::select('citizen_data.*')
                ->where('citizen_data.name', 'like', '%' . $keyword . '%')
                ->where('citizen_data.is_archived', false)
                ->paginate(8);

            if ($citizens->count() == 0) {
                session()->flash('message', 'Pencarian tidak ditemukan: ' . $keyword);
                session()->flash('alert-class', 'alert-danger');
            } else {
                session()->flash('message', 'Pencarian ditemukan: ' . $keyword);
                session()->flash('alert-class', 'alert-success');
            }
            return view('pages.citizen.index', compact('citizens'));
        } else {
            $citizens = CitizenDataModel::select('citizen_data.*')
                ->where('citizen_data.is_archived', false)
                ->paginate(8);

            return view('pages.citizen.index', compact('citizens'));
        }
    }


    public function create()
    {
        return view('pages.citizen.create');
    }

    public function store(Request $request)
    {
        $wealth = new WealthModel();
        $wealth->job = $request->job;
        $wealth->income = $request->income;
        $wealth->education = $request->education;
        $wealth->save();

        $health = new HealthModel();
        $health->save();

        $family = new FamilyModel();
        $family->save();

        $citizen = new CitizenDataModel();
        $citizen->citizen_data_id = $request->nik;
        $citizen->wealth_id = $wealth->wealth_id;
        $citizen->health_id = $health->health_id;
        $citizen->family_id = $family->family_id;
        $citizen->name = $request->name;
        $citizen->gender = $request->gender;
        $citizen->phone_number = $request->phone_number;
        $citizen->birth_date = $request->birth_date;
        $citizen->birth_place = $request->birth_place;
        $citizen->religion = $request->religion;
        $citizen->maritial_status = $request->maritial_status;
        $citizen->address_ktp = $request->address_ktp;
        $citizen->address_domisili = $request->address_current;
        $citizen->is_verified = true;
        $citizen->is_archived = false;
        $citizen->save();

        $user = new CitizenUserModel();
        $user->nik = $request->nik;
        $user->citizen_data_id = $request->nik;
        $user->password = $request->password;
        $user->level = 'warga';

        return redirect()->route('citizen.index')->with('success', 'Data berhasil disimpan');
    }

    public function detail($id)
    {
        $citizen = CitizenDataModel::select('citizen_data.*')
            ->where('citizen_data_id', $id)
            ->first();
        $family = FamilyModel::select('family_data.*')
            ->join('citizen_data', 'family_data.family_id', '=', 'citizen_data.family_id')
            ->where('citizen_data_id', $id)
            ->first();
        $health = HealthModel::select('health_data.*')
            ->join('citizen_data', 'health_data.health_id', '=', 'citizen_data.health_id')
            ->where('citizen_data_id', $id)
            ->first();
        $wealth = WealthModel::select('wealth_data.*')
            ->join('citizen_data', 'wealth_data.wealth_id', '=', 'citizen_data.wealth_id')
            ->where('citizen_data_id', $id)
            ->first();

        return view('pages.citizen.detail', compact('citizen', 'family', 'health', 'wealth'));
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
