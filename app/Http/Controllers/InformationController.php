<?php

namespace App\Http\Controllers;

use App\Models\InformationModel;
use Illuminate\Http\Request;
use Carbon\Carbon;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informations = InformationModel::all();

        return view('pages.information.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.information.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'activity' => 'required|string|max:255',
            'desc' => 'required|string',
            'date' => 'required|date',
            'time1' => 'required|date_format:H:i',
            'time2' => 'required|date_format:H:i',
            'place' => 'required|string|max:255',
            'img' => 'nullable|image|max:2048',
        ]);

        $inform = new InformationModel();
        $inform->title = $request->activity;
        $inform->desc = $request->desc;
        $inform->date = $request->date;
        $time1 = Carbon::createFromFormat('H:i', $request->time1)->format('H:i');
        $time2 = Carbon::createFromFormat('H:i', $request->time2)->format('H:i');
        $inform->time = $time1 . ' - ' . $time2;
        $inform->place = $request->place;

        if ($request->hasFile('img')) {
            $extfile = $request->img->getClientOriginalExtension();
            $fileName = 'information-' . time() . '.' . $extfile;
            $request->img->storeAs('public', $fileName);
            $inform->image = $fileName;
        }


        $inform->save();

        return redirect()->route('information.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $information = InformationModel::findOrFail($id);
    
        // Split the time data
        $timeArray = explode(' - ', $information->time);
        $time1 = $timeArray[0];
        $time2 = $timeArray[1];

        return view('pages.information.edit', compact('information', 'time1', 'time2'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'activity' => 'required|string|max:255',
            'desc' => 'required|string',
            'date' => 'required|date',
            'time1' => 'required|date_format:H:i',
            'time2' => 'required|date_format:H:i',
            'place' => 'required|string|max:255',
            'img' => 'nullable|image|max:2048',
        ]);

        $inform = InformationModel::where('id', $id)->first();
        $inform->title = $request->activity;
        $inform->desc = $request->desc;
        $inform->date = $request->date;
        $time1 = Carbon::createFromFormat('H:i', $request->time1)->format('H:i');
        $time2 = Carbon::createFromFormat('H:i', $request->time2)->format('H:i');
        $inform->time = $time1 . ' - ' . $time2;
        $inform->place = $request->place;

        if ($request->hasFile('img')) {
            $extfile = $request->img->getClientOriginalExtension();
            $fileName = 'information-' . time() . '.' . $extfile;
            $request->img->storeAs('public', $fileName);
            $inform->image = $fileName;
        }


        $inform->save();

        return redirect()->route('information.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
