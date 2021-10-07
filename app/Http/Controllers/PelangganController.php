<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', [
            'pelanggan' => $pelanggan
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

        return redirect('/pelanggan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        return view('pelanggan.show', [
            'pelanggan' => $pelanggan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.edit', [
            'pelanggan' => $pelanggan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
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

        return redirect('/pelanggan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        //
    }
}
