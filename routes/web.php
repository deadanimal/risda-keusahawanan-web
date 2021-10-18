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

use App\Http\Controllers\UsahawanController;
use App\Http\Controllers\SyarikatController;


Route::get('/', function () {
    return view('landing.index');
})->middleware(['auth'])->name('landing');

Route::resource('/pegawai', PegawaiControllerWeb::class);
Route::put('pegawaiPost', [PegawaiControllerWeb::class, 'pegawaiPost'])->name('pegawai.post');

Route::resource('/usahawan', UsahawanControllerWeb::class);


Route::resource('/audittrail', AuditTrailControllerWeb::class);
Route::resource('/insentif', InsentifControllerWeb::class);
Route::resource('/komponendash', KomponenDashControllerWeb::class);




Route::resource('/landing', LandingControllerWeb::class);
require __DIR__.'/auth.php';

Route::resource('/usahawan', UsahawanController::class);
Route::resource('/syarikat', SyarikatController::class);

Route::resource('/lol', LolController::class);