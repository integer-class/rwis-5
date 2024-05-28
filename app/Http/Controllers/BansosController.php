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
        return view('pages.bansos.index', compact('bansosable'));
    }

    // calculate warga yang layak menerima bansos menggunakan mabac
    public function calculate()
    {
        $alternatives = CitizenDataModel::select('citizen_data.citizen_data_id', 'wealth_data.income', 'wealth_data.job', 'wealth_data.education', 'health_data.disease', 'health_data.disability', 'health_data.age')
            ->join('wealth_data', 'wealth_data.wealth_id', '=', 'citizen_data.wealth_id')
            ->join('health_data', 'health_data.health_id', '=', 'citizen_data.health_id')
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
        dd($result);
        return view('pages.bansos.index', compact('result'));
    }
}
