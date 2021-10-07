<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.index', [
            'pegawai' => $pegawai
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pegawai = new Pegawai();

        $pegawai->nokp = $request->nokp;
        $pegawai->nama=$request->nama;
        $pegawai->nopekerja=$request->nopekerja;
        $pegawai->GelaranJwtn=$request->GelaranJwtn;
        $pegawai->NamaPT=$request->NamaPT;
        $pegawai->NamaPA=$request->NamaPA;
        $pegawai->NamaUnit=$request->NamaUnit;
        $pegawai->Jawatan=$request->Jawatan;
        $pegawai->StesenBertugas=$request->StesenBertugas;
        $pegawai->email=$request->email;
        $pegawai->notel=$request->notel;
        $pegawai->mukim=$request->mukim;
        $pegawai->peranan_pegawai=$request->peranan_pegawai;

        $pegawai->save();

        return redirect('/pegawai');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        return view('pegawai.show', [
            'pegawai' => $pegawai
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit', [
            'pegawai' => $pegawai
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {

        // dd($request);
        $pegawai->nokp = $request->nokp;
        $pegawai->nama=$request->nama;
        $pegawai->nopekerja=$request->nopekerja;
        $pegawai->GelaranJwtn=$request->GelaranJwtn;
        $pegawai->NamaPT=$request->NamaPT;
        $pegawai->NamaPA=$request->NamaPA;
        $pegawai->NamaUnit=$request->NamaUnit;
        $pegawai->Jawatan=$request->Jawatan;
        $pegawai->StesenBertugas=$request->StesenBertugas;
        $pegawai->email=$request->email;
        $pegawai->notel=$request->notel;
        $pegawai->mukim=$request->mukim;
        $pegawai->peranan_pegawai=$request->peranan_pegawai;

        $pegawai->save();

        return redirect('/pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        //
    }
}
