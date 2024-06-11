<?php
namespace App\Http\Controllers;

use App\Models\CitizenDataModel;
use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->level == 'rt' || Auth::user()->level == 'rw'){
            $reports = Report::paginate(10);
            return view('pages.report.index', compact('reports'));
        } elseif (Auth::user()->level == 'warga') {
            $reports = Report::where('nik', Auth::user()->nik)->paginate(10);
            return view('pages.report.index', compact('reports'));
        }
    }

    public function create()
    {
        return view('pages.report.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_laporan' => 'required',
            'tanggal' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $nik = Auth::user()->nik;
        $name = Auth::user()->name;
        $alamat = CitizenDataModel::select('citizen_data.address_domisili')
        ->join('citizen_user_data', 'citizen_user_data.nik', '=', 'citizen_data.nik')
        ->where('citizen_data.nik', $nik)
        ->first()
        ->address_domisili;

        if ($request->hasFile('image')) {
            $extfile = $request->image->getClientOriginalExtension();
            $fileName = 'report-' . time() . '.' . $extfile;
            $request->image->storeAs('public', $fileName);
            $imagePath = $fileName;
        } else {
            $imagePath = null;
        }

        $report = new Report();
        $report->nik = $nik;
        $report->nama = $name;
        $report->alamat = $alamat;
        $report->judul_laporan = $request->judul_laporan;
        $report->tanggal = now()->format('Y-m-d');
        $report->image = $imagePath;
        $report->status = 'Menunggu Verifikasi';
        $report->save();

        // Report::create([
        //     'nik' => $nik,
        //     'nama' => $name,
        //     'alamat' => $alamat,
        //     'judul_laporan' => $request->judul_laporan,
        //     'tanggal' => $request->tanggal,
        //     'image' => $imagePath,
        //     'status' => null,
        // ]);

        return redirect()->route('report.index')->with('success', 'Report created successfully.');
    }

    public function show($id)
    {
        $report = Report::findOrFail($id);
        return view('pages.report.show', compact('report'));
    }

    public function edit($id)
    {
        $report = Report::findOrFail($id);
        return view('pages.report.edit', compact('report'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'judul_laporan' => 'required',
            'tanggal' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $report = Report::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($report->image) {
                Storage::disk('public')->delete($report->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = $report->image;
        }

        $report->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'judul_laporan' => $request->judul_laporan,
            'tanggal' => $request->tanggal,
            'image' => $imagePath,
            'status' => $request->status,
        ]);

        return redirect()->route('report.index')->with('success', 'Report updated successfully.');
    }

    public function accept($id)
    {
        $report = Report::findOrFail($id);
        $report->status = 'Diterima';
        $report->save();
        return redirect()->route('report.index')->with('success', 'Report accepted successfully.');
    }

    public function reject($id)
    {
        $report = Report::findOrFail($id);
        $report->status = 'Ditolak';
        $report->save();
        return redirect()->route('report.index')->with('success', 'Report rejected successfully.');
    }

    public function archive($id)
    {
        $report = Report::findOrFail($id);
        $report->status = 'archived';
        $report->save();
        return redirect()->route('report.index')->with('success', 'Report archived successfully.');
    }

    public function changeStatus(Request $request, $id, $status)
    {
        $report = Report::findOrFail($id);
        $report->status = $status;
        $report->save();
        return redirect()->route('report.index')->with('success', 'Status laporan berhasil diperbarui.');
    }
}
