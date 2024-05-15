<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CitizenController extends Controller
{
    public function index()
    {
        return view('test_login.citizen');
    }
}
