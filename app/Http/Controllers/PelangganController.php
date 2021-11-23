<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Stok;
use App\Models\Katalog;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
   
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return response()->json($pelanggan);
    }

    public function store(Request $request)
    {
        $pelanggan = new Pelanggan();

        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->alamat1 = $request->alamat1;
        $pelanggan->alamat2 = $request->alamat2;
        $pelanggan->alamat3 = $request->alamat3;
        $pelanggan->poskod = $request->poskod;
        $pelanggan->U_Negeri_ID = $request->U_Negeri_ID;
        $pelanggan->U_Daerah_ID = $request->U_Daerah_ID;
        $pelanggan->no_telefon = $request->no_telefon;
        $pelanggan->no_fax = $request->no_fax;

        $pelanggan->save();

        return response()->json($pelanggan);
    }

   
    public function show($id)
    {

        $pelanggan = Katalog::where('id_pengguna', $id)
        ->join('stoks', 'katalogs.id', 'stoks.id_katalog')
        ->join('pelanggans', 'stoks.id_pelanggan', 'pelanggans.id' )
        ->select('*')
        ->get();

        // dd($pelanggan);
        return response()->json($pelanggan);
       
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->alamat1 = $request->alamat1;
        $pelanggan->alamat2 = $request->alamat2;
        $pelanggan->alamat3 = $request->alamat3;
        $pelanggan->poskod = $request->poskod;
        $pelanggan->U_Negeri_ID = $request->U_Negeri_ID;
        $pelanggan->U_Daerah_ID = $request->U_Daerah_ID;
        $pelanggan->no_telefon = $request->no_telefon;
        $pelanggan->no_fax = $request->no_fax;

        $pelanggan->save();

        return response()->json($pelanggan);
    }

    
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();

        return response()->json($pelanggan);
    }
}
