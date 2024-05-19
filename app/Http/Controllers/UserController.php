<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $citizens = DB::table('citizen_data')
        ->when($request->keyword, function ($query) use ($request) {
            $query->where('nama', 'like', "%{$request->keyword}%")
                ->orWhere('status_domisili', 'like', "%{$request->keyword}%")
                ->orWhere('status_pernikahan', 'like', "%{$request->keyword}%")
                ->orWhere('jenis_kelamin', 'like', "%{$request->keyword}%")
                ->orWhere('agama', 'like', "%{$request->keyword}%")
                ->orWhere('pekerjaan', 'like', "%{$request->keyword}%");
        })
        ->paginate(5);
        return view('pages.user.index', compact('citizens'));
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->input('password'));
        User::create($data);
        return redirect()->route('user.index');
    }

    public function show($id)
    {
        return view('pages.dashboard');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $user = User::findOrFail($id);

        if ($request->input('password')) {
            $data['password'] = Hash::make($request->input('password'));
        } else {
            unset($data['password']);
        }
        $user->update($data);
        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index');
    }
}
