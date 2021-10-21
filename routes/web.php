<?php

use App\Http\Controllers\LolController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\PegawaiControllerWeb;
use App\Http\Controllers\Web\UsahawanControllerWeb;
use App\Http\Controllers\Web\InsentifControllerWeb;
use App\Http\Controllers\Web\AuditTrailControllerWeb;
use App\Http\Controllers\Web\KomponenDashControllerWeb;
use App\Http\Controllers\Web\LandingControllerWeb;
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
Route::put('pegawaiPost', [PegawaiControllerWeb::class, 'pegawaiPost'])->name('pegawai.post');
Route::resource('/pegawai', PegawaiControllerWeb::class);

Route::resource('/usahawanWeb', UsahawanControllerWeb::class);
Route::put('usahawanPost', [UsahawanControllerWeb::class, 'usahawanPost'])->name('usahawan.post');
Route::resource('/audittrail', AuditTrailControllerWeb::class);
Route::resource('/insentif', InsentifControllerWeb::class);
//Route::put('insentifdetailPost', [InsentifControllerWeb::class, 'insentifdetailPost'])->name('insentifdetail.post');
Route::resource('/insentifdetail', InsentifControllerWeb::class);

Route::resource('/komponendash', KomponenDashControllerWeb::class);
Route::resource('/landing', LandingControllerWeb::class);
require __DIR__.'/auth.php';