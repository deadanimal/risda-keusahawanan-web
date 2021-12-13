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
use App\Http\Controllers\Web\LaporanProfilControllerWeb;
use App\Http\Controllers\Web\PendapatanBulananControllerWeb;
use App\Http\Controllers\Web\PendBulDaerahControllerWeb;
use App\Http\Controllers\Web\PendBulDunControllerWeb;
use App\Http\Controllers\Web\LaporanInsentifControllerWeb;
use App\Http\Controllers\Web\InsentifJenisControllerWeb;
use App\Http\Controllers\Web\InsentifJantinaUmurControllerWeb;
use App\Http\Controllers\Web\LPL\PemantauanLawatanControllerWeb;
use App\Http\Controllers\Web\LPL\PLDaerahControllerWeb;
use App\Http\Controllers\Web\LPL\PLStafNegeriControllerWeb;
use App\Http\Controllers\Web\LPL\PLIndividuControllerWeb;
use App\Http\Controllers\Web\LAT\LaporanAliranTunaiControllerWeb;
use App\Http\Controllers\Web\LAT\LaporanLejarControllerWeb;
use App\Http\Controllers\Web\LAT\PenyataUntungRugiControllerWeb;
use App\Http\Controllers\Web\DashControllerWeb;
use App\Http\Controllers\PDFController;

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
Route::resource('/landing', LandingControllerWeb::class);

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


Route::resource('/temulawatan', TemuLawatanControllerWeb::class);

Route::resource('/laporanprofil', LaporanProfilControllerWeb::class);

Route::resource('/pendapatanbulanan', PendapatanBulananControllerWeb::class);
Route::get('export2/{tahun}/{jenis}', [PendapatanBulananControllerWeb::class, 'export2']);
Route::resource('/pendbulDaerah', PendBulDaerahControllerWeb::class);
Route::resource('/pendbulDun', PendBulDunControllerWeb::class);

Route::resource('/laporaninsentif', LaporanInsentifControllerWeb::class);
Route::resource('/insenjenis', InsentifJenisControllerWeb::class);
Route::resource('/insenjantinaumur', InsentifJantinaUmurControllerWeb::class);

Route::resource('/pemantauanlawatan', PemantauanLawatanControllerWeb::class);
Route::resource('/pantauDaerah', PLDaerahControllerWeb::class);
Route::resource('/pantaustafnegeri', PLStafNegeriControllerWeb::class);
Route::resource('/pantauindividu', PLIndividuControllerWeb::class);
Route::resource('/pantauindividudetail', PLIndividuControllerWeb::class);

Route::resource('/laporanalirantunai', LaporanAliranTunaiControllerWeb::class);
Route::resource('/laporanlejar', LaporanLejarControllerWeb::class);
Route::resource('/penyatauntungrugi', PenyataUntungRugiControllerWeb::class);

Route::resource('/dash', DashControllerWeb::class);

Route::post('generatereport', [LaporanProfilControllerWeb::class, 'generatereport'])->name('generatereport');

require __DIR__.'/auth.php';