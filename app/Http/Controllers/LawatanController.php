<?php

namespace App\Http\Controllers;

use App\Models\Lawatan;
use Illuminate\Http\Request;

class LawatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lawatan = Lawatan::all();
        return view('lawatan.index', [
            'lawatan' => $lawatan
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
        $lawatan = new Lawatan();

        $lawatan->id_pengguna = $request->id_pengguna;
        $lawatan->id_tindakan_lawatan = $request->id_tindakan_lawatan;
        $lawatan->jenis_lawatan = $request->jenis_lawatan;
        $lawatan->tarikh_lawatan = $request->tarikh_lawatan;
        $lawatan->masa_lawatan = $request->masa_lawatan;
        $lawatan->status_lawatan = $request->status_lawatan;
        $lawatan->gambar_lawatan = $request->gambar_lawatan;
        $lawatan->komen = $request->komen;
        $lawatan->modified_by = $request->modified_by;

        $lawatan->save();

        return redirect('/lawatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lawatan  $lawatan
     * @return \Illuminate\Http\Response
     */
    public function show(Lawatan $lawatan)
    {
        return view('lawatan.show', [
            'lawatan' => $lawatan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lawatan  $lawatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Lawatan $lawatan)
    {
        return view('lawatan.edit', [
            'lawatan' => $lawatan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lawatan  $lawatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lawatan $lawatan)
    {
        $lawatan->id_pengguna = $request->id_pengguna;
        $lawatan->id_tindakan_lawatan = $request->id_tindakan_lawatan;
        $lawatan->jenis_lawatan = $request->jenis_lawatan;
        $lawatan->tarikh_lawatan = $request->tarikh_lawatan;
        $lawatan->masa_lawatan = $request->masa_lawatan;
        $lawatan->status_lawatan = $request->status_lawatan;
        $lawatan->gambar_lawatan = $request->gambar_lawatan;
        $lawatan->komen = $request->komen;
        $lawatan->modified_by = $request->modified_by;

        $lawatan->save();

        return redirect('/lawatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lawatan  $lawatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lawatan $lawatan)
    {
        //
    }
}
