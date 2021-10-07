<?php

namespace App\Http\Controllers;

use App\Models\Kategori_Aliran;
use Illuminate\Http\Request;

class KategoriAliranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori_Aliran = Kategori_Aliran::all();
        return view('aliran.index', [
            'kategori_Aliran' => $kategori_Aliran
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
        $kategori_Aliran = new Kategori_Aliran();

        $kategori_Aliran->jenis_aliran = $request->jenis_aliran;
        $kategori_Aliran->nama_kategori_aliran = $request->nama_kategori_aliran;
        $kategori_Aliran->status_kategori_aliran = $request->status_kategori_aliran;

        $kategori_Aliran->save();

        return redirect('/kategori_aliran');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori_Aliran  $kategori_Aliran
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori_Aliran $kategori_Aliran)
    {
        return view('aliran.show', [
            'kategori_Aliran' => $kategori_Aliran
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori_Aliran  $kategori_Aliran
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori_Aliran $kategori_Aliran)
    {
        return view('aliran.edit', [
            'kategori_Aliran' => $kategori_Aliran
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori_Aliran  $kategori_Aliran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori_Aliran $kategori_Aliran)
    {
        $kategori_Aliran->jenis_aliran = $request->jenis_aliran;
        $kategori_Aliran->nama_kategori_aliran = $request->nama_kategori_aliran;
        $kategori_Aliran->status_kategori_aliran = $request->status_kategori_aliran;

        $kategori_Aliran->save();

        return redirect('/kategori_aliran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori_Aliran  $kategori_Aliran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori_Aliran $kategori_Aliran)
    {
        //
    }
}
