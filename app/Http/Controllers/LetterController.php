<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citizen;
use App\Models\CitizenDataModel;
use App\Models\LetterModel;
use App\Models\TemplateModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LetterController extends Controller
{
    public function index()
    {
        $letters = LetterModel::select('letter_data.*')
            ->where('is_archived', false)->paginate(5);
        $templates = TemplateModel::select('letter_temp.*')
            ->where('is_archived', false)->paginate(3);

        return view('pages.letter.index', compact('letters','templates'));
        
    }

    public function create()
    {
        return view('pages.letter.create');
    }

    public function store(Request $request)
    {
        $nik = Auth::user()->nik;
        $name = Auth::user()->name;
        $alamat = CitizenDataModel::select('citizen_data.address_domisili')
        ->join('citizen_user_data', 'citizen_user_data.nik', '=', 'citizen_data.nik')
        ->where('citizen_data.nik', $nik)
        ->first()
        ->address_domisili;

        $wa = CitizenDataModel::select('citizen_data.phone_number')
        ->join('citizen_user_data', 'citizen_user_data.nik', '=', 'citizen_data.nik')
        ->where('citizen_data.nik', $nik)
        ->first()
        ->phone_number;

        $request->validate([
            'file' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        $letter = new LetterModel();
        $letter->name = $name;
        $letter->address = $alamat;
        $letter->whatsapp_number = $wa;
        $letter->status = 'Belum Verifikasi';

        if ($request->hasFile('file')) {
            $nameSender = $request->name;
            $waSender = $request->whatsapp_number;
            $extfile = $request->file->getClientOriginalExtension();
            $fileName = $nameSender.'_'.$waSender.'_'.time().'.'.$extfile;
            $request->file->storeAs('public/letters', $fileName);
            $letter->file_path = $fileName;
        }

        $letter->save();


        return redirect()->route('letter.index')->with('success', 'File berhasil diupload');
    }

    public function edit($id){

        $letter = LetterModel::find($id);

        return view('pages.letter.edit', compact('letter'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'whatsapp_number' => 'required',
            'status' => 'required',
            'file' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        $letter = LetterModel::where('id', $id)->first();
        $letter->name = $request->name;
        $letter->address = $request->address;
        $letter->whatsapp_number = $request->whatsapp_number;
        $letter->status = $request->status;

        $letter->is_archived = false;

        if ($request->hasFile('file')) {
            $nameSender = $request->name;
            $waSender = $request->whatsapp_number;
            $extfile = $request->file->getClientOriginalExtension();
            $fileName = $nameSender.'_'.$waSender.'_'.time().'.'.$extfile;
            $request->file->storeAs('public/letters', $fileName);
            $letter->file_path = $fileName;
        }


        $letter->save();


        return redirect()->route('letter.index')->with('success', 'File berhasil diupdate');

    }    

    public function archive($id)
    {
        $info = LetterModel::where('id', $id)->first();
        $info->is_archived = true;
        $info->save();

        return redirect()->route('letter.index');
    }
}
