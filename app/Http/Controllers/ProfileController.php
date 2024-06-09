<?php

namespace App\Http\Controllers;

use App\Models\CitizenDataModel;
use App\Models\WealthModel;
use App\Models\HealthModel;
use App\Models\FamilyModel;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile($id)
    {
        $citizen = CitizenDataModel::find($id);
        $family = FamilyModel::select('family_data.*')
            ->join('citizen_data', 'citizen_data.family_id', '=', 'family_data.family_id')
            ->where('citizen_data.nik', $id)
            ->first();

        $wealth = WealthModel::select('wealth_data.*')
            ->join('citizen_data', 'citizen_data.wealth_id', '=', 'wealth_data.wealth_id')
            ->where('citizen_data.nik', $id)
            ->first();

        $health = HealthModel::select('health_data.*')
            ->join('citizen_data', 'citizen_data.health_id', '=', 'health_data.health_id')
            ->where('citizen_data.nik', $id)
            ->first();
        $income = $wealth->income;

        if ($income == 1) {
            $income = 'Kurang dari Rp 1.000.000';
        } elseif ($income == 2) {
            $income = 'Rp 1.000.000 - Rp 2.000.000';
        } elseif ($income == 3) {
            $income = 'Rp 2.000.000 - Rp 3.000.000';
        } elseif ($income == 4) {
            $income = 'Rp 3.000.000 - Rp 4.000.000';
        } elseif ($income == 5) {
            $income = 'Rp 4.000.000 - Rp 5.000.000';
        } elseif ($income == 6) {
            $income = 'Lebih dari Rp 5.000.000';
        }

        return view('pages.warga.profile', compact('citizen', 'family', 'wealth', 'health', 'income'));
    }

    public function editProfile($id)
    {
        $citizen = CitizenDataModel::select('citizen_data.*')
            ->where('nik', $id)
            ->first();

        $family = null;
        if ($citizen->family_id) {
            $family = FamilyModel::select('family_data.*')
                ->join('citizen_data', 'family_data.family_id', '=', 'citizen_data.family_id')
                ->where('nik', $id)
                ->first();
        }

        $all_family = FamilyModel::select('family_data.*')
            ->where('family_data.is_archived', false)
            ->get();

        $health = HealthModel::select('health_data.*')
            ->join('citizen_data', 'health_data.health_id', '=', 'citizen_data.health_id')
            ->where('nik', $id)
            ->first();

        $wealth = WealthModel::select('wealth_data.*')
            ->join('citizen_data', 'wealth_data.wealth_id', '=', 'citizen_data.wealth_id')
            ->where('nik', $id)
            ->first();

            return view('pages.warga.edit-profile', compact('citizen', 'family', 'all_family', 'health', 'wealth'));
    }

    public function updateProfile(Request $request, $id)
    {
        $citizen = CitizenDataModel::where('nik', $id)->first();
        $citizen->nik = $request->nik;
        $citizen->family_id = $request->family_id;
        $citizen->name = $request->name;
        $citizen->gender = $request->gender;
        $citizen->phone_number = $request->phone_number;
        $citizen->birth_date = $request->birth_date;
        $citizen->birth_place = $request->birth_place;
        $citizen->religion = $request->religion;
        $citizen->maritial_status = $request->maritial_status;
        $citizen->address_ktp = $request->address_ktp;
        $citizen->address_domisili = $request->address_domisili;
        $citizen->save();

        $wealth = WealthModel::where('wealth_id', $citizen->wealth_id)->first();
        $wealth->job = $request->job;
        $wealth->income = $request->income;
        $wealth->education = $request->education;
        $wealth->save();

        $health = HealthModel::where('health_id', $citizen->health_id)->first();
        $health->age = $request->age;
        $health->blood_type = $request->blood_type;
        $health->height = $request->height;
        $health->weight = $request->weight;
        $health->disability = $request->disability;
        $health->disease = $request->disease;
        $health->save();

        return redirect()->route('warga.profile', $id)->with('success', 'Data berhasil diubah');
    }

    public function family($id)
    {
        $family_id = CitizenDataModel::select('family_id')
            ->where('nik', $id)
            ->first();
        if (!$family_id) {
            $family = null;
        } else {
            $family = FamilyModel::find($family_id->family_id);
        }
        $famMembers = CitizenDataModel::select('citizen_data.*', 'wealth_data.education', 'wealth_data.job')
            ->join('wealth_data', 'wealth_data.wealth_id', '=', 'citizen_data.wealth_id')
            ->where('citizen_data.family_id', $family_id->family_id)
            ->where('citizen_data.is_archived', false)
            ->get();

        return view('pages.warga.family', compact('family', 'famMembers'));
    }

    public function editFamily($id)
    {
        $family_id = CitizenDataModel::select('family_id')
            ->where('nik', $id)
            ->first();
        if (!$family_id) {
            $family = null;
        } else {
            $family = FamilyModel::find($family_id->family_id);
        }
        $famMembers = CitizenDataModel::select('citizen_data.*', 'wealth_data.education', 'wealth_data.job')
            ->join('wealth_data', 'wealth_data.wealth_id', '=', 'citizen_data.wealth_id')
            ->where('citizen_data.family_id', $family_id->family_id)
            ->where('citizen_data.is_archived', false)
            ->get();
        return view('pages.warga.edit-family', compact('family', 'famMembers'));
    }

    public function updateFamily(Request $request, $id)
    {
        $family = CitizenDataModel::select('family_id')
            ->where('nik', $id)
            ->first();

        $family = FamilyModel::find($family->family_id);
        $family->family_id = $request->family_id;
        $family->family_head_name = $request->family_head_name;
        $family->address = $request->address;
        $family->rt = $request->rt;
        $family->rw = $request->rw;
        $family->village = $request->village;
        $family->sub_district = $request->sub_district;
        $family->city = $request->city;
        $family->province = $request->province;
        $family->postal_code = $request->postal_code;
        $family->save();

        return redirect()->route('warga.family', $id)->with('success', 'Data keluarga berhasil diubah');
    }

    public function registerFamily(Request $request, $id)
    {
        $keyword = $request->keyword;
        $family = [];
        if ($keyword) {
            $family = FamilyModel::select('family_data.*')
                ->where('family_data.is_archived', false)
                ->where('family_data.family_id', 'like', '%' . $keyword . '%')
                ->get();
            // to array
            $family = $family->toArray();

            if (empty($family)) {
                session()->flash('status', 'Data ' . $keyword . ' tidak ditemukan');
                session()->flash('alert-class', 'alert-danger');
                return view('pages.warga.register-family', compact('family'));
            } else {
                session()->flash('status', 'Pencarian ditemukan: ' . $keyword);
                session()->flash('alert-class', 'alert-success');
                return view('pages.warga.register-family', compact('family'));
            }
        }
        return view('pages.warga.register-family', compact('family'));
    }

    public function assignFamily(Request $request, $id)
    {
        $citizen = CitizenDataModel::where('nik', $id)->first();
        $citizen->family_id = $request->family_id;
        $citizen->save();

        return redirect()->route('warga.family', $id)->with('success', 'Data keluarga berhasil diubah');
    }

    public function createFamily()
    {
        return view('pages.warga.create-family');
    }

    public function storeFamily(Request $request, $id)
    {
        $family = new FamilyModel();
        $family->family_id = $request->family_id;
        $family->family_head_name = $request->family_head_name;
        $family->address = $request->address;
        $family->rt = $request->rt;
        $family->rw = $request->rw;
        $family->village = $request->village;
        $family->sub_district = $request->sub_district;
        $family->city = $request->city;
        $family->province = $request->province;
        $family->postal_code = $request->postal_code;
        $family->save();

        $citizen = CitizenDataModel::where('nik', $id)->first();
        $citizen->family_id = $family->family_id;
        $citizen->save();

        return redirect()->route('warga.family', $id)->with('success', 'Data keluarga berhasil ditambahkan');
    }
}
