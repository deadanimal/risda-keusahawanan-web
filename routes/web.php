<?php

use App\Http\Controllers\LolController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\PegawaiControllerWeb;
use App\Http\Controllers\Web\UsahawanControllerWeb;
use App\Http\Controllers\Web\InsentifControllerWeb;
use App\Http\Controllers\Web\AuditTrailControllerWeb;
use App\Http\Controllers\Web\KomponenDashControllerWeb;
use App\Http\Controllers\Web\LandingControllerWeb;
use App\Http\Controllers\Web\KategoriAliranControllerWeb;
use App\Http\Controllers\Web\TindakanLawatanControllerWeb;
use App\Http\Controllers\Web\JenisInsentifControllerWeb;
use App\Http\Controllers\Web\KategoriUsahawanControllerWeb;
use App\Http\Controllers\Web\TemuLawatanControllerWeb;
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

Route::resource('/insentif', InsentifControllerWeb::class);
Route::resource('/insentifdetail', InsentifControllerWeb::class);

Route::resource('/komponendash', KomponenDashControllerWeb::class);
Route::resource('/kategorialiran', KategoriAliranControllerWeb::class);
Route::resource('/tindakanlawatan', TindakanLawatanControllerWeb::class);
Route::put('tindakanlawatanPost', [TindakanLawatanControllerWeb::class, 'tindakanlawatanPost'])->name('tindakanlawatan.post');

Route::resource('/jenisinsentif', JenisInsentifControllerWeb::class);
Route::resource('/kategoriusahawan', KategoriUsahawanControllerWeb::class);

Route::resource('/audittrail', AuditTrailControllerWeb::class);
Route::resource('/landing', LandingControllerWeb::class);

Route::resource('/temulawatan', TemuLawatanControllerWeb::class);
require __DIR__.'/auth.php';