<?php

namespace App\Http\Controllers;
use App\Models\FamilyModel; 
use App\Models\CitizenDataModel;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function index(Request $request) {
        $Keyword = $request->keyword;
        $famMemberCount = CitizenDataModel::select('family_data.family_head_name', 'family_data.family_id')
            ->join('family_data', 'family_data.family_id', '=', 'citizen_data.family_id')
            ->where('family_data.is_archived', false)
            ->get()
            ->groupBy('family_id')
            ->map(function($item) {
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
}
