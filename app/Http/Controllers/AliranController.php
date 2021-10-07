<?php

namespace App\Http\Controllers;

use App\Models\Aliran;
use Illuminate\Http\Request;

class AliranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aliran = Aliran::all();
        return view('aliran.index', [
            'aliran' => $aliran
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
        $aliran = new Aliran();

        $aliran->id_pengguna = $request->id_pengguna;
        $aliran->id_kategori_aliran = $request->id_kategori_aliran;
        $aliran->tarikh_aliran = $request->tarikh_aliran;
        $aliran->keterangan_aliran = $request->keterangan_aliran;
        $aliran->jumlah_aliran = $request->jumlah_aliran;
        $aliran->kategori_aliran = $request->kategori_aliran;
        $aliran->dokumen_lampiran = $request->dokumen_lampiran;
        $aliran->modified_by = $request->modified_by;
        $aliran->save();

        return redirect('/aliran');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aliran  $aliran
     * @return \Illuminate\Http\Response
     */
    public function show(Aliran $aliran)
    {
        return view('aliran.show', [
            'aliran' => $aliran
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aliran  $aliran
     * @return \Illuminate\Http\Response
     */
    public function edit(Aliran $aliran)
    {
        return view('aliran.edit', [
            'aliran' => $aliran
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aliran  $aliran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aliran $aliran)
    {
        $aliran->id_pengguna = $request->id_pengguna;
        $aliran->id_kategori_aliran = $request->id_kategori_aliran;
        $aliran->tarikh_aliran = $request->tarikh_aliran;
        $aliran->keterangan_aliran = $request->keterangan_aliran;
        $aliran->jumlah_aliran = $request->jumlah_aliran;
        $aliran->kategori_aliran = $request->kategori_aliran;
        $aliran->dokumen_lampiran = $request->dokumen_lampiran;
        $aliran->modified_by = $request->modified_by;
        $aliran->save();

        return redirect('/aliran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aliran  $aliran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aliran $aliran)
    {
        //
    }
}
