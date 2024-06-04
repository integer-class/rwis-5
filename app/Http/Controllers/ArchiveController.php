<?php

namespace App\Http\Controllers;
use App\Models\CitizenDataModel;
use App\Models\FamilyModel;
use App\Models\InformationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchiveController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $famMemberCount = CitizenDataModel::select('family_data.family_head_name', 'family_data.family_id')
            ->join('family_data', 'family_data.family_id', '=', 'citizen_data.family_id')
            ->where('family_data.is_archived', true)
            ->get()
            ->groupBy('family_id')
            ->map(function ($item) {
                return $item->count();
            });
        
        if ($keyword) {
            $families = FamilyModel::select('family_data.*')
                ->where('family_data.family_head_name', 'like', '%' . $keyword . '%')
                ->where('family_data.is_archived', true)
                ->paginate(8);
            $citizens = CitizenDataModel::select('citizen_data.*', 'family_data.family_head_name')
                ->join('family_data', 'family_data.family_id', '=', 'citizen_data.family_id')
                ->where('citizen_data.name', 'like', '%' . $keyword . '%')
                ->where('citizen_data.is_archived', true)
                ->paginate(8);
            $informations = InformationModel::select('information_data.*')
                ->where('title', 'like', '%' . $keyword . '%')
                ->where('is_archived', true)
                ->paginate(8);

            if ($families->count() == 0 && $citizens->count() == 0) {
                session()->flash('message', 'Pencarian tidak ditemukan: ' . $keyword);
                session()->flash('alert-class', 'alert-danger');
            } else {
                session()->flash('message', 'Pencarian ditemukan: ' . $keyword);
                session()->flash('alert-class', 'alert-success');
            }
        } else {
            $families = FamilyModel::select('family_data.*')
                ->where('family_data.is_archived', true)
                ->paginate(8);
            $citizens = CitizenDataModel::select('citizen_data.*', 'family_data.family_head_name')
                ->join('family_data', 'family_data.family_id', '=', 'citizen_data.family_id')
                ->where('citizen_data.is_archived', true)
                ->paginate(8);
            $informations = InformationModel::select('information_data.*')
                ->where('is_archived', true)
                ->paginate(8);
        }

        return view('pages.archive.index', compact('families', 'citizens', 'famMemberCount','informations'));
    }

    public function restoreFamily($id)
    {
        $family = FamilyModel::find($id);
        $family->is_archived = false;
        $family->save();
        $citizens = CitizenDataModel::select('citizen_data.*')
            ->where('family_id', $id)
            ->get();
        foreach ($citizens as $citizen) {
            $citizen->is_archived = false;
            $citizen->save();
        }
        return redirect()->route('archive.index');
    }

    public function restoreCitizen($id)
    {
        $citizen = CitizenDataModel::find($id);
        if ($citizen->family_id) {
            FamilyModel::find($citizen->family_id);
            $message = "Tidak dapat mengembalikan data warga karena data keluarga masih diarsipkan";
            $alert = "alert-danger";
        } else {
            $citizen->is_archived = false;
            $citizen->save();
            $message = "Data warga berhasil dikembalikan";
        }
        return redirect()->route('archive.index')->with('message', $message)->with('alert-class', $alert);
    }

    public function restoreInformation($id)
    {
        $information = InformationModel::find($id);
        $information->is_archived = false;
        $information->save();
        $message = "Data informasi berhasil dikembalikan";
        return redirect()->route('archive.index')->with('message', $message)->with('alert-class', 'alert-success');
    }

    public function deleteInformation($id)
    {
        $information = InformationModel::find($id);
        $filePath = $information->image;

        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }
        $information->delete();
        $message = "Data informasi berhasil dihapus";
        return redirect()->route('archive.index')->with('message', $message)->with('alert-class', 'alert-success');
    }
}
