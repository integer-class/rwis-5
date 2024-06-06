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

        return view('pages.warga.profile', compact('citizen', 'family', 'wealth', 'health'));
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

            session()->flash('status', 'Data ditemukan');
            session()->flash('alert-class', 'alert-success');
            return view('pages.warga.register-family', compact('family'));
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
