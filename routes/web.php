<?php

use App\Http\Controllers\BansosController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CitizenController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\RtController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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


Route::get('user', [UserController::class, 'index']);
Route::get('dashboard', [DashboardController::class, 'index']);
Route::get('information', [InformationController::class, 'index']);
Route::group(['prefix'=>'citizen'], function(){
    Route::get('/', [CitizenController::class, 'index'])->name('citizen.index');
    Route::get('create', [CitizenController::class, 'create'])->name('citizen.create');
    Route::post('store', [CitizenController::class, 'store'])->name('citizen.store');
    Route::get('edit/{id}', [CitizenController::class, 'edit'])->name('citizen.edit');
    Route::post('update/{id}', [CitizenController::class, 'update'])->name('citizen.update');
    Route::delete('archive/{id}', [CitizenController::class, 'archive'])->name('citizen.archive');
});
Route::get('bansos', [BansosController::class, 'index']);
Route::get('letter', [LetterController::class, 'index']);
Route::get('report', [ReportController::class, 'index']);
Route::get('facility', [FacilityController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {
    return view('pages.auth.login');
})->name('login');

Route::get('register', function () {
    return view('pages.auth.register');
})->name('register');

// Route::get('login', [AuthController::class, 'index'])->name('login');
// Route::get('register', [AuthController::class, 'register'])->name('register');
// Route::post('login_process', [AuthController::class, 'login_process'])->name('login_process');
// Route::post('register_process', [AuthController::class, 'register_process'])->name('register_process');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Route::group(['middleware' => ['auth']], function () {

//     Route::group(['middleware' => ['login_check:warga']], function () {
//         Route::resource('citizen', CitizenController::class);
//     });

//     Route::group(['middleware' => ['login_check:rw']], function () {
//         Route::resource('rw', RwController::class);
//     });

//     Route::group(['middleware' => ['login_check:rt']], function () {
//         Route::resource('rt', RtController::class);
//     });
// });