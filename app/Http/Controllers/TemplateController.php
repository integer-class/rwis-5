<?php

namespace App\Http\Controllers;

use App\Models\TemplateModel;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.template.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        $temp = new TemplateModel();
        $temp->name = $request->name;
    
        if ($request->hasFile('file')) {
            $extfile = $request->file->getClientOriginalExtension();
            $size = $request->file->getSize();
            $fileName = $request->name.time().'.'.$extfile;
            $request->file->storeAs('public/template_letters', $fileName);
            $temp->path = $fileName;
            $temp->filesize = $size;
        }

        $temp->save();


        return redirect()->route('letter.index')->with('success', 'File berhasil diupload');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $template = TemplateModel::find($id);

        return view('pages.template.edit', compact('template'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        $temp = TemplateModel::where('id', $id)->first();
        $temp->name = $request->name;
    
        if ($request->hasFile('file')) {
            $extfile = $request->file->getClientOriginalExtension();
            $size = $request->file->getSize();
            $fileName = $request->name.time().'.'.$extfile;
            $request->file->storeAs('public/template_letters', $fileName);
            $temp->path = $fileName;
            $temp->filesize = $size;
        }

        $temp->save();


        return redirect()->route('letter.index')->with('success', 'File berhasil diupload');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function archive($id)
    {
        $info = TemplateModel::where('id', $id)->first();
        $info->is_archived = true;
        $info->save();

        return redirect()->route('letter.index');
    }
}
