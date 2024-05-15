<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RwController extends Controller
{
    public function index()
    {
        return view('test_login.rw');
    }
}
