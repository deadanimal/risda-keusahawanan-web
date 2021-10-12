<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\PegawaiController;
use App\Http\Controllers\Web\UsahawanController;
use App\Http\Controllers\Web\InsentifController;
use App\Http\Controllers\Web\AuditTrailController;
use App\Http\Controllers\Web\KomponenDashController;
use App\Http\Controllers\Web\LandingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing.index');
})->middleware(['auth'])->name('landing');

Route::resource('/audittrail', AuditTrailController::class);
Route::resource('/insentif', InsentifController::class);
Route::resource('/komponendash', KomponenDashController::class);
Route::resource('/usahawan', UsahawanController::class);
Route::resource('/pegawai', PegawaiController::class);
Route::resource('/landing', LandingController::class);


require __DIR__.'/auth.php';
