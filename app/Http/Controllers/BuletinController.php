<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBuletinRequest;
use App\Http\Requests\UpdateBuletinRequest;
use App\Models\Buletin;
use Illuminate\Http\Request;

class BuletinController extends Controller
{

    public function index()
    {
        $buletin = Buletin::orderBy('updated_at', 'desc')->get();
        return response()->json($buletin);
    }


    public function store(Request $request)
    {
        $buletin = new Buletin();
        $buletin->id_pegawai = $request->id_pegawai;
        $buletin->tajuk = $request->tajuk;
        $buletin->tarikh = $request->tarikh;
        $buletin->keterangan_lain = $request->keterangan_lain;
        $buletin->status = $request->status;
        $buletin->url = $request->url;
        $buletin->gambar_buletin = $request->gambar_buletin;

        $buletin->save();

        return response()->json($buletin);
    }

    public function show($id)
    {
        $buletin = Buletin::where('id_pegawai', $id)->get();
        return response()->json($buletin);
    }

    
    public function update(Request $request, Buletin $buletin)
    {
        $buletin->tajuk = $request->tajuk;
        $buletin->tarikh = $request->tarikh;
        $buletin->keterangan_lain = $request->keterangan_lain;
        $buletin->status = $request->status;
        $buletin->url = $request->url;
        $buletin->gambar_buletin = $request->gambar_buletin;

        $buletin->save();

        return response()->json($buletin);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buletin  $buletin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buletin $buletin)
    {
        //
    }

    
}
