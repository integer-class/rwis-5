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

    public function authenticate(Request $request){
        // $credentials = $request->validate([
        //    'nik' => 'required',
        //    'password' => 'required'
        // ]);

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();

        //     return redirect()->intended('dashboard');
        // }

        // return back()->with('loginError', 'Login Gagal!');

        $request->validate([
            'nik' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = CitizenUserModel::where('nik', $request->nik)->first();

        if ($user && $request->password === $user->password) {
            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        } else {
            return back()->withError(['nik' => 'NIK atau password salah.']);
        }
    }

    

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        return redirect('/');
    }
    
}
