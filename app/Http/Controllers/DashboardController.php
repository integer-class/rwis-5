<?php

namespace App\Http\Controllers;

use App\Models\CitizenDataModel;
use App\Models\HealthModel;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WealthModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $citizenTotal = CitizenDataModel::count();
        $womanTotal = CitizenDataModel::where('gender', 'P')->count();
        $manTotal = CitizenDataModel::where('gender', 'L')->count();
        
        // $today = Carbon::today();

        $under18 = HealthModel::where('age', '>', 18 )->count();
        $from18to50 = HealthModel::whereBetween('age', [18, 50])->count();
        $above50 = HealthModel::where('age', '<', 50)->count();

        $bloodA = HealthModel::where('blood_type', 'A')->count();
        $bloodB = HealthModel::where('blood_type', 'B')->count();
        $bloodAB = HealthModel::where('blood_type', 'AB')->count();
        $bloodO = HealthModel::where('blood_type', 'O')->count();

        $wiraswasta = WealthModel::where('job', 'Wiraswasta')->count();
        $swasta = WealthModel::whereIn('job', ['Swasta','Buruh'])->count();
        $pelajar = WealthModel::where('job', 'Pelajar')->count();
        $negeri = WealthModel::whereIn('job', ['PNS','POLRI','TNI'])->count();

        $underSma = WealthModel::whereNotIn('education', ['SMA','Sarjana','Magister','Doktor'])->count();
        $Sma = WealthModel::where('education', 'SMA')->count();
        $S1 = WealthModel::where('education', 'Sarjana')->count();
        $S2 = WealthModel::where('education', 'Magister')->count();
        $S3 = WealthModel::where('education', 'Doktor')->count();


        return view('pages.dashboard.index', compact('citizenTotal', 'womanTotal', 'manTotal', 'under18', 'from18to50', 'above50', 'bloodA', 'bloodB', 'bloodAB', 'bloodO', 'wiraswasta', 'swasta', 'pelajar', 'negeri', 'underSma', 'Sma', 'S1','S2','S3'));
    }
}
