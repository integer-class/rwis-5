<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $reports = Report::all(); 
        return view('pages.report.index', compact('reports'));
    }

    public function create()
    {
        return view('pages.report.create');
    }

    // ReportController.php

    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'alamat' => 'required',
        'judul_laporan' => 'required',
        'tanggal' => 'required|date',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
    } else {
        $imagePath = null;
    }

    Report::create([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'judul_laporan' => $request->judul_laporan,
        'tanggal' => $request->tanggal,
        'image' => $imagePath,
        'status' => 'Masuk',
    ]);

    return redirect()->route('report.index')->with('success', 'Report created successfully.');
}

    public function edit($id)
{
    $report = Report::findOrFail($id);
    return view('pages.report.edit', compact('report'));
}


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'image' => 'nullable|image|max:2048'
        ]);

        $report = Report::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($report->image) {
                Storage::disk('public')->delete($report->image);
            }
            $imagePath = $request->file('image')->store('reports', 'public');
            $report->image = $imagePath;
        }

        $report->update($request->only(['nama', 'alamat', 'tanggal']));

        return redirect()->route('report.index')->with('success', 'Report updated successfully');
    }

    public function show(Report $report)
    {
        return view('pages.report.show', compact('report'));
    }

    public function reject($id)
    {
        $report = Report::findOrFail($id);
        $report->status = 'rejected';
        $report->save();

        return redirect()->route('report.index')->with('success', 'Report rejected successfully');
    }

    public function accept($id)
    {
        $report = Report::findOrFail($id);
        $report->status = 'accepted';
        $report->save();

        return redirect()->route('report.index')->with('success', 'Report accepted successfully');
    }

    public function archive($id)
    {
        $report = Report::findOrFail($id);
        $report->status = 'archived';
        $report->save();

        return redirect()->route('report.index')->with('success', 'Report archived successfully');
    }

    public function archivedReports()
    {
        $archivedReports = Report::where('status', 'archived')->get();
        return view('report.archive', compact('archivedReports'));
    }

    public function changeStatus($id, $status)
    {
        $report = Report::findOrFail($id);
        $report->status = $status;
        $report->save();

        return redirect()->route('report.index')->with('success', 'Status laporan berhasil diubah.');
    }

    
}
