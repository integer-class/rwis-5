<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RtController extends Controller
{
    public function index()
    {
        return view('test_login.rt');
    }
}
