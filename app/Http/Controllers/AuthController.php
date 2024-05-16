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

        if ($user->level == 'warga') {
            return redirect()->intended('citizen');
        } elseif ($user->level == 'rw') {
            return redirect()->intended('rw');
        } elseif ($user->level == 'rt') {
            return redirect()->intended('rt');
        }

        return view('pages.auth.login');
    }

    public function login_process(Request $request)
    {

        $request->validate([
            'nik' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('nik', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();
 

            if ($user->level == 'warga') {
                return redirect()->intended('citizen');
            } elseif ($user->level == 'rw') {
                return redirect()->intended('rw');
            } elseif ($user->level == 'rt') {
                return redirect()->intended('rt');
            }

            return redirect('login')
                ->withInput()
                ->withErrors([
                    'login' => 'Pastikan data yang anda masukkan benar'
                ]);
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
        $user->level = 'warga';
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
