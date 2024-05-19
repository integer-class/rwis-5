<?php

namespace App\Http\Controllers;

use App\Models\CitizenDataModel;
use App\Models\CitizenUserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function index()
    {
        return view('pages.auth.login');
    }

    public function login_process(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required',
            'password' => 'required'
        ]);
        
        if ($validator->fails()) {
            return redirect()->route('login')->withErrors($validator)->withInput();
        }

        $nik = $request->nik;
        $password = $request->password;

        $user = CitizenUserModel::where('nik', $nik)->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'NIK tidak ditemukan');
        }

        if (!Hash::check($password, $user->password)) {
            return redirect()->route('login')->with('error', 'Password salah');
        }

        Auth::login($user);
        return redirect()->route('citizen.index')->with('success', 'Login berhasil');
    }

    public function register()
    {
        return view('pages.auth.register');
    }

    public function register_process(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required',
            'password' => 'required',
            'name' => 'required'

        ]);

        if ($validator->fails()) {
            return redirect()->route('register')->withErrors($validator)->withInput();
        }

        $nik = $request->nik;
        $password = Hash::make($request->password);

        $user = new CitizenUserModel();
        $user->nik = $nik;
        $user->citizen_data_id = $nik;
        $user->password = $password;
        $user->level = 'warga';
        $user->save();

        $citizenData = new CitizenDataModel();
        $citizenData->citizen_data_id = $nik;
        $citizenData->name = $request->name;
        $citizenData->save();

        return redirect()->route('login')->with('success', 'Registrasi berhasil');
    }

    public function logout()
    {
        Auth::logout();

        session()->flush();

        return redirect()->route('login');
    }
}
