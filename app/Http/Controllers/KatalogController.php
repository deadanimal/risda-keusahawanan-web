<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use Illuminate\Http\Request;

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
}
