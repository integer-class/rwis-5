<?php

namespace App\Http\Controllers;

use App\Models\FamilyModel;
use App\Models\CitizenDataModel;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function index(Request $request)
    {
        $Keyword = $request->keyword;
        $famMemberCount = CitizenDataModel::select('family_data.family_head_name', 'family_data.family_id')
            ->join('family_data', 'family_data.family_id', '=', 'citizen_data.family_id')
            ->where('family_data.is_archived', false)
            ->where('citizen_data.is_archived', false)
            ->get()
            ->groupBy('family_id')
            ->map(function ($item) {
                return $item->count();
            });
        if ($Keyword) {
            $families = FamilyModel::select('family_data.*')
                ->where('family_data.family_head_name', 'like', '%' . $Keyword . '%')
                ->where('family_data.is_archived', false)
                ->paginate(8);
            if ($families->count() == 0) {
                session()->flash('message', 'Pencarian tidak ditemukan: ' . $Keyword);
                session()->flash('alert-class', 'alert-danger');
            } else {
                session()->flash('message', 'Pencarian ditemukan: ' . $Keyword);
                session()->flash('alert-class', 'alert-success');
            }
        } else {
            $families = FamilyModel::select('family_data.*')
                ->where('family_data.is_archived', false)
                ->paginate(8);
        }
        return view('pages.family.index', compact('families', 'famMemberCount'));
    }

    public function archive($id)
    {
        $family = FamilyModel::find($id);
        $family->is_archived = true;
        $family->save();
        $citizens = CitizenDataModel::select('citizen_data.*')
            ->where('family_id', $id)
            ->get();
        foreach ($citizens as $citizen) {
            $citizen->is_archived = true;
            $citizen->save();
        }
        return redirect()->route('family.index');
    }

    public function detail($id)
    {
        $family = FamilyModel::find($id);
        $famMembers = CitizenDataModel::select('citizen_data.*', 'wealth_data.education', 'wealth_data.job')
            ->join('wealth_data', 'wealth_data.wealth_id', '=', 'citizen_data.wealth_id')
            ->where('citizen_data.family_id', $id)
            ->where('citizen_data.is_archived', false)
            ->get();
        return view('pages.family.detail', compact('family', 'famMembers'));
    }

    public function create()
    {
        $citizens = CitizenDataModel::select('citizen_data.*')
            ->where('citizen_data.is_archived', false)
            ->paginate(5);
        return view('pages.family.create', compact('citizens'));
    }

    public function store(Request $request)
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

        $familyId = $family->family_id;
        foreach ($request->citizens as $citizenId) {
            $citizen = CitizenDataModel::find($citizenId);
            $citizen->family_id = $familyId;
            $citizen->save();
        }
        return redirect()->route('family.index');
    }

    public function edit($id)
    {
        $family = FamilyModel::find($id);
        $famMembers = CitizenDataModel::select('citizen_data.*', 'wealth_data.education', 'wealth_data.job')
            ->join('wealth_data', 'wealth_data.wealth_id', '=', 'citizen_data.wealth_id')
            ->where('citizen_data.is_archived', false)->paginate(5);
        return view('pages.family.edit', compact('family', 'famMembers'));
    }

    public function update(Request $request, $id)
    {
        $family = FamilyModel::find($id);
        $family->family_id = $request->family_id;
        $family->family_head_name = $request->head_name;
        $family->address = $request->address;
        $family->rt = $request->rt;
        $family->rw = $request->rw;
        $family->village = $request->village;
        $family->sub_district = $request->sub_district;
        $family->city = $request->city;
        $family->province = $request->province;
        $family->postal_code = $request->postal_code;
        $family->save();

        $familyId = $family->family_id;

        // cari citizen yang sebelumnya anggota keluarga
        $citizen = CitizenDataModel::select('citizen_data.*')
            ->where('family_id', $familyId)
            ->get();
        // hapus family_id dari citizen yang sebelumnya anggota keluarga
        foreach ($citizen as $c) {
            $c->family_id = null;
            $c->save();
        }
        // tambahkan family_id baru ke citizen yang dipilih
        if ($request->citizens) {
            foreach ($request->citizens as $citizenId) {
                $citizen = CitizenDataModel::find($citizenId);
                $citizen->family_id = $familyId;
                $citizen->save();
            }
        }

        return redirect()->route('family.detail', $id);
    }
}
