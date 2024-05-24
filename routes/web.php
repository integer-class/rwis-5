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
use App\Http\Controllers\FamilyController;

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

Route::get('user', [UserController::class, 'index'])->name('user')->middleware('auth');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('information', [InformationController::class, 'index'])->name('information')->middleware('auth');
Route::group(['prefix'=>'citizen'], function(){
    Route::get('/', [CitizenController::class, 'index'])->name('citizen.index');
    Route::get('create', [CitizenController::class, 'create'])->name('citizen.create');
    Route::get('detail/{id}', [CitizenController::class, 'detail'])->name('citizen.detail');
    Route::post('store', [CitizenController::class, 'store'])->name('citizen.store');
    Route::get('edit/{id}', [CitizenController::class, 'edit'])->name('citizen.edit');
    Route::post('update/{id}', [CitizenController::class, 'update'])->name('citizen.update');
    Route::delete('archive/{id}', [CitizenController::class, 'archive'])->name('citizen.archive');
}) ->name('citizen')->middleware('auth');
Route::group(['prefix'=>'family'], function(){
    Route::get('/', [FamilyController::class, 'index'])->name('family.index');
    Route::get('create', [FamilyController::class, 'create'])->name('family.create');
    Route::get('detail/{id}', [FamilyController::class, 'detail'])->name('family.detail');
    Route::post('store', [FamilyController::class, 'store'])->name('family.store');
    Route::get('edit/{id}', [FamilyController::class, 'edit'])->name('family.edit');
    Route::post('update/{id}', [FamilyController::class, 'update'])->name('family.update');
    Route::delete('archive/{id}', [FamilyController::class, 'archive'])->name('family.archive');
}) ->name('family')->middleware('auth');
Route::get('bansos', [BansosController::class, 'index'])->name('bansos')->middleware('auth');
Route::get('letter', [LetterController::class, 'index'])->name('letter')->middleware('auth');
Route::get('report', [ReportController::class, 'index'])->name('report')->middleware('auth');
Route::get('facility', [FacilityController::class, 'index'])->name('facility')->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('login_process', [AuthController::class, 'login_process'])->name('login_process');
Route::post('register_process', [AuthController::class, 'register_process'])->name('register_process');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
