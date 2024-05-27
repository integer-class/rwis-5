<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citizen;
use App\Models\LetterModel;
use App\Models\TemplateModel;
use Illuminate\Support\Facades\Storage;

class LetterController extends Controller
{
    public function index()
    {
        $letters = LetterModel::select('letter_data.*')->paginate(5);
        $files = TemplateModel::all();

        return view('pages.letter.index', compact('letters','files'));
        
    }

    public function create(Request $request)
    {
        return view('pages.letter.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'whatsapp_number' => 'required',
            'status' => 'required',
            'file' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        $letter = new LetterModel();
        $letter->name = $request->name;
        $letter->address = $request->address;
        $letter->whatsapp_number = $request->whatsapp_number;
        $letter->status = $request->status;

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

    public function uploadTemp(Request $request)
    {
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $path = $file->store('template_letter', 'public');
                $filesize = $file->getSize();

                TemplateModel::create([
                    'name' => $file->getClientOriginalName(),
                    'filesize' => $filesize,
                    'path' => $path,
                ]);
            }
        }

        return response()->json(['message' => 'Files uploaded successfully'], 200);
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
}
