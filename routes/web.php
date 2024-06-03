<?php

use App\Http\Controllers\BansosController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CitizenController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\RtController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\TemplateController;

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

Route::group(['prefix'=>'information'], function(){
    Route::get('/', [InformationController::class, 'index'])->name('information.index')->middleware('auth');
    Route::get('create', [InformationController::class, 'create'])->name('information.create')->middleware('auth');
    Route::get('detail/{id}', [InformationController::class, 'detail'])->name('information.detail')->middleware('auth');
    Route::post('store', [InformationController::class, 'store'])->name('information.store')->middleware('auth');
    Route::get('edit/{id}', [InformationController::class, 'edit'])->name('information.edit')->middleware('auth');
    Route::post('update/{id}', [InformationController::class, 'update'])->name('information.update')->middleware('auth');
    Route::delete('archive/{id}', [InformationController::class, 'archive'])->name('information.archive')->middleware('auth');
}) ->name('information');

Route::group(['prefix'=>'citizen'], function(){
    Route::get('/', [CitizenController::class, 'index'])->name('citizen.index')->middleware('auth');
    Route::get('create', [CitizenController::class, 'create'])->name('citizen.create')->middleware('auth');
    Route::get('detail/{id}', [CitizenController::class, 'detail'])->name('citizen.detail')->middleware('auth');
    Route::post('store', [CitizenController::class, 'store'])->name('citizen.store')->middleware('auth');
    Route::get('edit/{id}', [CitizenController::class, 'edit'])->name('citizen.edit')->middleware('auth');
    Route::post('update/{id}', [CitizenController::class, 'update'])->name('citizen.update')->middleware('auth');
    Route::delete('archive/{id}', [CitizenController::class, 'archive'])->name('citizen.archive')->middleware('auth');
}) ->name('citizen');

Route::group(['prefix'=>'family'], function(){
    Route::get('/', [FamilyController::class, 'index'])->name('family.index')->middleware('auth');
    Route::get('create', [FamilyController::class, 'create'])->name('family.create')->middleware('auth');
    Route::get('detail/{id}', [FamilyController::class, 'detail'])->name('family.detail')->middleware('auth');
    Route::post('store', [FamilyController::class, 'store'])->name('family.store')->middleware('auth');
    Route::get('edit/{id}', [FamilyController::class, 'edit'])->name('family.edit')->middleware('auth');
    Route::post('update/{id}', [FamilyController::class, 'update'])->name('family.update')->middleware('auth');
    Route::delete('archive/{id}', [FamilyController::class, 'archive'])->name('family.archive')->middleware('auth');
}) ->name('family');

Route::group(['prefix'=>'archive'], function(){
    Route::get('/', [ArchiveController::class, 'index'])->name('archive.index')->middleware('auth');
    Route::delete('restoreFamily/{id}', [ArchiveController::class, 'restoreFamily'])->name('archive.restoreFamily')->middleware('auth');
    Route::delete('restoreCitizen/{id}', [ArchiveController::class, 'restoreCitizen'])->name('archive.restoreCitizen')->middleware('auth');
}) ->name('archive');

Route::group(['prefix'=>'bansos'], function(){
    Route::get('/', [BansosController::class, 'index'])->name('bansos.index')->middleware('auth');
    Route::get('calculate', [BansosController::class, 'calculate'])->name('bansos.calculate')->middleware('auth');
    Route::get('result', [BansosController::class, 'result'])->name('bansos.result')->middleware('auth');
    Route::get('detail/{id}', [BansosController::class, 'detail'])->name('bansos.detail')->middleware('auth');
    Route::post('confirm/{id}', [BansosController::class, 'confirm'])->name('bansos.confirm')->middleware('auth');
    Route::get('submit/{id}', [BansosController::class, 'submit'])->name('bansos.submit')->middleware('auth');
}) ->name('bansos');

Route::group(['prefix'=>'letter'], function(){
    Route::get('/', [LetterController::class, 'index'])->name('letter.index')->middleware('auth');
    Route::get('create', [LetterController::class, 'create'])->name('letter.create')->middleware('auth');
    Route::post('store', [LetterController::class, 'store'])->name('letter.store')->middleware('auth');
    Route::get('edit/{id}', [LetterController::class, 'edit'])->name('letter.edit')->middleware('auth');
    Route::post('update/{id}', [LetterController::class, 'update'])->name('letter.update')->middleware('auth');
    Route::delete('archive/{id}', [LetterController::class, 'archive'])->name('letter.archive')->middleware('auth');
}) ->name('letter');

Route::group(['prefix'=>'template'], function(){
    Route::get('create', [TemplateController::class, 'create'])->name('template.create')->middleware('auth');
    Route::post('store', [TemplateController::class, 'store'])->name('template.store')->middleware('auth');
    Route::get('edit/{id}', [TemplateController::class, 'edit'])->name('template.edit')->middleware('auth');
    Route::post('update/{id}', [TemplateController::class, 'update'])->name('template.update')->middleware('auth');
    Route::delete('archive/{id}', [TemplateController::class, 'archive'])->name('template.archive')->middleware('auth');
}) ->name('letter');


Route::get('report', [ReportController::class, 'index'])->name('report')->middleware('auth');
Route::get('facility', [FacilityController::class, 'index'])->name('facility')->middleware('auth');
Route::resource('facilities', FacilityController::class);

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [LandingController::class, 'index']);

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login_process');

// Route::get('login', [AuthController::class, 'index'])->name('login');
// Route::get('register', [AuthController::class, 'register'])->name('register');
// Route::post('login_process', [AuthController::class, 'login_process'])->name('login_process');
// Route::post('register_process', [AuthController::class, 'register_process'])->name('register_process');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('report', [ReportController::class, 'index'])->name('report.index');
    Route::get('report/create', [ReportController::class, 'create'])->name('report.create');
    Route::post('report', [ReportController::class, 'store'])->name('report.store');
    Route::put('report/{id}', [ReportController::class, 'update'])->name('report.update');
    Route::put('report/{id}/status/{status}', [ReportController::class, 'changeStatus'])->name('report.changeStatus');
    Route::get('report/{id}', [ReportController::class, 'show'])->name('report.show');
    Route::put('report/{id}/accept', [ReportController::class, 'accept'])->name('report.accept');
    Route::put('report/{id}/reject', [ReportController::class, 'reject'])->name('report.reject');
    Route::put('report/{id}/archive', [ReportController::class, 'archive'])->name('report.archive');
});
