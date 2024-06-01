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
        $bansosable = BansosModel::select('citizen_data.citizen_data_id', 'citizen_data.name', 'citizen_data.phone_number', 'citizen_data.address_ktp', 'bansos_data.status')
            ->join('citizen_data', 'citizen_data.citizen_data_id', '=', 'bansos_data.citizen_data_id')
            ->where('bansos_data.is_bansosable', true)->paginate(8);

        // dd($bansosable);
        return view('pages.bansos.index', compact ('bansosable'));
    }

    // calculate warga yang layak menerima bansos menggunakan mabac
    public function calculate()
    {
        $existingBansosIds = BansosModel::pluck('citizen_data_id');
        $alternatives = CitizenDataModel::select('citizen_data.citizen_data_id', 'wealth_data.income', 'wealth_data.job', 'wealth_data.education', 'health_data.disease', 'health_data.disability', 'health_data.age')
            ->join('wealth_data', 'wealth_data.wealth_id', '=', 'citizen_data.wealth_id')
            ->join('health_data', 'health_data.health_id', '=', 'citizen_data.health_id')
            ->whereNotIn('citizen_data.citizen_data_id', $existingBansosIds)
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
            $citizen = CitizenDataModel::select('citizen_data.citizen_data_id', 'citizen_data.name', 'wealth_data.income', 'wealth_data.job', 'wealth_data.education', 'health_data.disease', 'health_data.disability', 'health_data.age')
            ->join('wealth_data', 'wealth_data.wealth_id', '=', 'citizen_data.wealth_id')
            ->join('health_data', 'health_data.health_id', '=', 'citizen_data.health_id')
            ->where('citizen_data.citizen_data_id', $value['citizen_data_id'])
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
        $bansosable = BansosModel::select('citizen_data.citizen_data_id', 'citizen_data.name', 'citizen_data.phone_number', 'citizen_data.address_ktp', 'bansos_data.status')
            ->join('citizen_data', 'citizen_data.citizen_data_id', '=', 'bansos_data.citizen_data_id')
            ->where('bansos_data.is_bansosable', true)
            ->where('citizen_data.citizen_data_id', $id)
            ->first();
        // dd($bansosable);
        return view('pages.bansos.detail', compact('bansosable'));
    }

    public function confirm($id)
    {
        $bansosable = BansosModel::where('citizen_data_id', $id)->first();
        $bansosable->status = 1;
        $bansosable->save();
        // dd($bansosable);

        return redirect()->route('bansos.detail', $id);
    }

    public function submit($id)
    {
        // insert data to bansos_data
        $bansosable = new BansosModel();
        $bansosable->citizen_data_id = $id;
        $bansosable->status = 0;
        $bansosable->is_bansosable = true;
        $bansosable->save();


        return redirect()->route('bansos.index');
    }
}
