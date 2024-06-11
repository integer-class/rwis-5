<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::paginate(3); // Display 3 facilities per page
        return view('pages.facility.index', compact('facilities'));
    }

    public function create()
    {
        return view('pages.facility.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = $request->file('image')->store('facilities', 'public');

        Facility::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('facilities.index');
    }

    public function show($id)
    {
        $facility = Facility::findOrFail($id);
        return view('pages.facility.show', compact('facility'));
    }

    public function edit($id)
    {
        $facility = Facility::findOrFail($id);
        return view('pages.facility.edit', compact('facility'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image',
        ]);

        $facility = Facility::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old image
            Storage::delete('public/' . $facility->image);

            // Store the new image
            $imagePath = $request->file('image')->store('facilities', 'public');
            $facility->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $imagePath,
            ]);
        } else {
            $facility->update($request->only(['name', 'description']));
        }

        return redirect()->route('facilities.index');
    }

    public function destroy($id)
    {
        $facility = Facility::findOrFail($id);
        Storage::delete('public/' . $facility->image);
        $facility->delete();

        return redirect()->route('facilities.index');
    }
}
