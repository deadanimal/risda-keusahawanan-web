<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KatalogController extends Controller
{
    
    public function index()
    {
        $katalog = Katalog::all();

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
        
        return response()->json($katalog);
    }

    
    public function show($id)
    {
        
        $katalog = Katalog::where('id_pengguna',$id)->get();
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
        ->join('users', 'users.usahawanid', 'usahawans.usahawanid' )
        ->join('katalogs', 'katalogs.id_pengguna', 'users.id' )
        ->select('katalogs.id as katalog_id', 'katalogs.nama_produk', 'katalogs.gambar_url', 'katalogs.baki_stok', 'katalogs.berat_produk', 'katalogs.harga_produk', 'katalogs.keterangan_produk', 'katalogs.kandungan_produk', 'katalogs.updated_at', 'katalogs.created_at', 'katalogs.status_katalog', )
        ->get();
        return response()->json($katalog);
    }

    public function pengesahanPegawai($id){

        $katalog = Katalog::find($id);

        $katalog->status_katalog = "publish";
        $katalog->save();

        return response()->json($katalog);

    }
}
