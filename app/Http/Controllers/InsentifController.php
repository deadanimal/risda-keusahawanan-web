<?php

namespace App\Http\Controllers;

use App\Models\Insentif;
use Illuminate\Http\Request;

class InsentifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insentif = Insentif::all();
        return view('insentif.index', [
            'insentif' => $insentif
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
        $insentif = new Insentif();

        $insentif->id_pengguna = $request->id_pengguna;
        $insentif->id_jenis_insentif = $request->id_jenis_insentif;
        $insentif->tahun_terima_insentif = $request->tahun_terima_insentif;
        $insentif->nilai_insentif = $request->nilai_insentif;
        $insentif->created_by = $request->created_by;
        $insentif->modified_by = $request->modified_by;

        $insentif->save();

        return redirect('/insentif');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Insentif  $insentif
     * @return \Illuminate\Http\Response
     */
    public function show(Insentif $insentif)
    {
        return view('insentif.show', [
            'insentif' => $insentif
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Insentif  $insentif
     * @return \Illuminate\Http\Response
     */
    public function edit(Insentif $insentif)
    {
        return view('insentif.edit', [
            'insentif' => $insentif
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Insentif  $insentif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insentif $insentif)
    {
        $insentif->id_pengguna = $request->id_pengguna;
        $insentif->id_jenis_insentif = $request->id_jenis_insentif;
        $insentif->tahun_terima_insentif = $request->tahun_terima_insentif;
        $insentif->nilai_insentif = $request->nilai_insentif;
        $insentif->created_by = $request->created_by;
        $insentif->modified_by = $request->modified_by;

        $insentif->save();

        return redirect('/insentif');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Insentif  $insentif
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insentif $insentif)
    {
        //
    }
}
