<?php

namespace App\Http\Controllers;

use App\Models\CitizenUserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->level == 'citizen') {
            return redirect()->route('citizen');
        } elseif ($user->level == 'rw') {
            return redirect()->route('rw');
        } elseif ($user->level == 'rt') {
            return redirect()->route('rt');
        } else {
            return redirect()->route('login');
        }

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

        if ($user) {
            if (Hash::check($password, $user->password)) {
                Auth::login($user);

                return redirect()->route('dashboard');
            } else {
                return redirect()->route('login')->with('error', 'Password salah');
            }
        } else {
            return redirect()->route('login')->with('error', 'NIK tidak ditemukan');
        }
    }

    public function register()
    {
        return view('pages.auth.register');
    }

    public function register_process(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')->withErrors($validator)->withInput();
        }

        $nik = $request->nik;
        $password = Hash::make($request->password);

        $user = new CitizenUserModel();
        $user->nik = $nik;
        $user->password = $password;
        $user->level = 'citizen';
        $user->save();

        return redirect()->route('login')->with('success', 'Registrasi berhasil');
    }

    public function logout()
    {
        Auth::logout();

        session()->flush();

        return redirect()->route('login');
    }
}
