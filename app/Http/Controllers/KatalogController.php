<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use App\Models\Notifikasi;
use App\Models\Pegawai;
use App\Models\Syarikat;
use App\Models\Usahawan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class KatalogController extends Controller
{

    public function index()
    {
        $katalog = Katalog::orderBy('updated_at', 'desc')->get();

        return response()->json($katalog);
    }

    public function katalogdashboard()
    {
        // dd('test');
        $katalog = Katalog::where('status_katalog', 'publish')
            ->orderBy('updated_at', 'desc')->take(10)->get();

        return response()->json($katalog);
    }

    public function store(Request $request)
    {
        $katalog = new Katalog();

        $katalog->id_pengguna = $request->id_pengguna;
        $katalog->nama_produk = $request->nama_produk;
        $katalog->kandungan_produk = $request->kandungan_produk;
        $katalog->harga_produk = $request->harga_produk;
        $katalog->berat_produk = $request->berat_produk;
        $katalog->keterangan_produk = $request->keterangan_produk;
        $katalog->gambar_url = $request->gambar_url;

        $katalog->baki_stok = $request->baki_stok;
        $katalog->unit_production = $request->unit_production;
        $katalog->status_katalog = $request->status_katalog;
        // $katalog->disahkan_oleh = $request->disahkan_oleh;
        $katalog->modified_by = $request->modified_by;

        $katalog->save();

        if ($request->status_katalog == 'pending') {

            $pegawais = User::where('users.id', $request->id_pengguna)
                ->join('usahawans', 'usahawans.usahawanid', 'users.usahawanid')
                ->join('pegawais', 'pegawais.NamaPT', 'usahawans.Kod_PT')
                ->select('pegawais.id as pegawai_id')
                ->get();



            foreach ($pegawais as $pegawai) {

                $user = User::where('idpegawai', $pegawai->pegawai_id)->get()->first();

                $notifikasi = new Notifikasi();
                $notifikasi->userid = $user->id;
                $notifikasi->tajuk = 'Katalog';
                $notifikasi->keterangan = 'Katalog baru telah ditambah bagi pengesahan';
                $notifikasi->modul = 'katalog';
                $notifikasi->save();
            }
        }

        return response()->json($katalog);
    }


    public function show($id)
    {

        $katalog = Katalog::where('id_pengguna', $id)
            ->orderBy('updated_at', 'desc')
            ->get();
        // dd($katalog);
        return response()->json($katalog);
    }




    public function update(Request $request, Katalog $katalog)
    {
        $katalog->id_pengguna = $request->id_pengguna;
        $katalog->nama_produk = $request->nama_produk;
        $katalog->kandungan_produk = $request->kandungan_produk;
        $katalog->harga_produk = $request->harga_produk;
        $katalog->berat_produk = $request->berat_produk;
        $katalog->keterangan_produk = $request->keterangan_produk;
        $katalog->gambar_url = $request->gambar_url;

        $katalog->baki_stok = $request->baki_stok;
        $katalog->unit_production = $request->unit_production;
        $katalog->status_katalog = $request->status_katalog;
        // $katalog->disahkan_oleh = $request->disahkan_oleh;
        $katalog->modified_by = $request->modified_by;

        $katalog->save();

        if ($request->status_katalog == 'pending') {

            $pegawais = User::where('users.id', $request->id_pengguna)
                ->join('usahawans', 'usahawans.usahawanid', 'users.usahawanid')
                ->join('pegawais', 'pegawais.NamaPT', 'usahawans.Kod_PT')
                ->select('pegawais.id as pegawai_id')
                ->get();



            foreach ($pegawais as $pegawai) {

                $user = User::where('idpegawai', $pegawai->pegawai_id)->get()->first();

                $notifikasi = new Notifikasi();
                $notifikasi->userid = $user->id;
                $notifikasi->tajuk = 'Katalog';
                $notifikasi->keterangan = 'Satu katalog telah dikemaskini bagi pengesahan';
                $notifikasi->modul = 'katalog';
                $notifikasi->save();
            }
        }

        return response()->json($katalog);
    }

    public function destroy(Katalog $katalog)
    {
        $katalog->delete();

        return response()->json($katalog);
    }

    public function showKatalogPegawai($id)
    {
        $katalog = DB::table('pegawais')->where('pegawais.id', $id)
            ->join('usahawans', 'usahawans.Kod_PT', 'pegawais.NamaPT')
            ->join('users', 'users.usahawanid', 'usahawans.usahawanid')
            ->join('katalogs', 'katalogs.id_pengguna', 'users.id')
            ->select('katalogs.id as katalog_id', 'katalogs.nama_produk', 'katalogs.gambar_url', 'katalogs.baki_stok', 'katalogs.berat_produk', 'katalogs.harga_produk', 'katalogs.keterangan_produk', 'katalogs.kandungan_produk', 'katalogs.updated_at', 'katalogs.created_at', 'katalogs.status_katalog', 'katalogs.id_pengguna',)
            ->get();
        return response()->json($katalog);
    }

    public function pengesahanPegawai($id)
    {

        $katalog = Katalog::find($id);

        $katalog->status_katalog = "publish";
        $katalog->save();

        $notifikasi = new Notifikasi();
        $notifikasi->userid = $katalog->id_pengguna;
        $notifikasi->tajuk = 'Katalog';
        $notifikasi->keterangan = 'Katalog anda telah disahkan';
        $notifikasi->modul = 'katalog';
        $notifikasi->save();


        return response()->json($katalog);
    }


    public function katalogPdf($id)
    {

        $katalog = Katalog::where("katalogs.id", $id)
            // ->join('users', 'users.id', 'katalogs.id_pengguna')
            // ->join('usahawans', 'usahawans.usahawanid', 'users.usahawanid')
            // ->join('syarikats', 'syarikats.usahawanid', 'usahawans.usahawanid')
            // ->join('perniagaans', 'perniagaans.usahawanid', 'usahawans.usahawanid')
            // ->join('negeris', 'negeris.U_Negeri_ID', 'perniagaans.U_Negeri_ID')
            // ->select(
            //     "syarikats.namasyarikat",
            //     "syarikats.notelefon",
            //     "perniagaans.alamat1",
            //     "perniagaans.alamat2",
            //     "perniagaans.alamat3",
            //     "perniagaans.poskod",
            //     "negeris.Negeri",
            //     "perniagaans.latitud",
            //     "perniagaans.logitud",

            //     "perniagaans.facebook",
            //     "perniagaans.instagram",
            //     "perniagaans.twitter",
            //     "perniagaans.lamanweb",
            //     // "perniagaans.lamanweb",

            //     "katalogs.nama_produk",
            //     "katalogs.kandungan_produk",
            //     "katalogs.harga_produk",
            //     "katalogs.berat_produk",
            //     "katalogs.keterangan_produk",
            //     "katalogs.gambar_url",
            // )
            ->get()->first();

        $user = User::where('users.id', $katalog->id_pengguna)
        ->get()->first();

        $usahawan = Usahawan::where('usahawanid', $user->usahawanid)
        ->get()->first();

        // dd($usahawan);

        $pdf = PDF::loadView('pdf.katalog', [
            'katalog' => $katalog,
            'usahawan' => $usahawan
        ])->setPaper('a4', 'landscape');

        $fname = time() . '-katalog-' . $id . '.pdf';

        \Storage::put('katalog/' . $fname, $pdf->output());

        return response()->json("katalog/" . $fname);
    }


    public function showMaklumatUsahawan($id)
    {

        $usahawan = User::where('users.id', $id)
            ->join('syarikats', 'syarikats.usahawanid', 'users.usahawanid')
            ->select('users.name', 'syarikats.namasyarikat')
            ->get()->first();

        return response()->json($usahawan);
    }
}
