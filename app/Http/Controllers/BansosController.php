<?php

namespace App\Http\Controllers;
use App\Models\BansosModel;
use App\Models\CitizenDataModel;
use App\Services\MabacService;
use Illuminate\Http\Request;

class BansosController extends Controller
{   
    protected $mabacService;

    public function __construct(MabacService $mabacService)
    {
        $this->mabacService = $mabacService;
    }

    public function index()
    {
        $bansosable = BansosModel::select('citizen_data.nik', 'citizen_data.name', 'citizen_data.phone_number', 'citizen_data.address_ktp', 'bansos_data.status')
            ->join('citizen_data', 'citizen_data.nik', '=', 'bansos_data.nik')
            ->where('bansos_data.is_bansosable', true)->paginate(8);

        // dd($bansosable);
        return view('pages.bansos.index', compact ('bansosable'));
    }

    // calculate warga yang layak menerima bansos menggunakan mabac
    public function calculate()
    {
        $existingBansosIds = BansosModel::pluck('nik');
        $alternatives = CitizenDataModel::select('citizen_data.nik', 'wealth_data.income', 'wealth_data.job', 'wealth_data.education', 'health_data.disease', 'health_data.disability', 'health_data.age')
            ->join('wealth_data', 'wealth_data.wealth_id', '=', 'citizen_data.wealth_id')
            ->join('health_data', 'health_data.health_id', '=', 'citizen_data.health_id')
            ->whereNotIn('citizen_data.nik', $existingBansosIds)
            ->get();


        $criterias_weight = [
            'income' => 0.3,
            'job' => 0.2,
            'education' => 0.05,
            'disease' => 0.15,
            'disability' => 0.15,
            'age' => 0.15
        ];

        $result = $this->mabacService->calculate($alternatives, $criterias_weight);
        $result = $result->map(function ($value) {
            $citizen = CitizenDataModel::select('citizen_data.nik', 'citizen_data.name', 'wealth_data.income', 'wealth_data.job', 'wealth_data.education', 'health_data.disease', 'health_data.disability', 'health_data.age')
            ->join('wealth_data', 'wealth_data.wealth_id', '=', 'citizen_data.wealth_id')
            ->join('health_data', 'health_data.health_id', '=', 'citizen_data.health_id')
            ->where('citizen_data.nik', $value['nik'])
            ->first();
            $value['name'] = $citizen->name;
            // income, job, education, disease, disability, age
            $value['income'] = $citizen->income;
            $value['job'] = $citizen->job;
            $value['education'] = $citizen->education;
            $value['disease'] = $citizen->disease;
            $value['disability'] = $citizen->disability;
            $value['age'] = $citizen->age;
            return $value;
        });

        return view('pages.bansos.result', compact('result'));
    }

    public function detail($id)
    {
        $bansosable = BansosModel::select('citizen_data.nik', 'citizen_data.name', 'citizen_data.phone_number', 'citizen_data.address_ktp', 'bansos_data.status')
            ->join('citizen_data', 'citizen_data.nik', '=', 'bansos_data.nik')
            ->where('bansos_data.is_bansosable', true)
            ->where('citizen_data.nik', $id)
            ->first();
        // dd($bansosable);
        return view('pages.bansos.detail', compact('bansosable'));
    }

    public function confirm($id)
    {
        $bansosable = BansosModel::where('nik', $id)->first();
        $bansosable->status = 1;
        $bansosable->save();
        // dd($bansosable);

        return redirect()->route('bansos.detail', $id);
    }

    public function submit($id)
    {
        // insert data to bansos_data
        $bansosable = new BansosModel();
        $bansosable->nik = $id;
        $bansosable->status = 0;
        $bansosable->is_bansosable = true;
        $bansosable->save();


        return redirect()->route('bansos.index');
    }
}
