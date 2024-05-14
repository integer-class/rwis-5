<?php

use App\Http\Controllers\BansosController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('pages.dashboard.index');
    })->name('home');

    Route::resource('user', UserController::class);
    Route::resource('dashboard', DashboardController::class);
    Route::resource('information', InformationController::class);
    Route::resource('bansos', BansosController::class);
    Route::resource('letter', LetterController::class);
    Route::resource('report', ReportController::class);
    Route::resource('facility', FacilityController::class);
});

Route::get('/', function () {
    return view('welcome');
});