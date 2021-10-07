<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use Illuminate\Http\Request;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stok = Stok::all();
        return view('stok.index', [
            'stok' => $stok
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
        $stok = new Stok();

        $stok->id_katalog = $request->id_katalog;
        $stok->id_pelanggan = $request->id_pelanggan;
        $stok->stok_dijual = $request->stok_dijual;
        $stok->modified_by = $request->modified_by;

        $stok->save();

        return redirect('/stok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function show(Stok $stok)
    {
        return view('stok.show', [
            'stok' => $stok
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function edit(Stok $stok)
    {
        return view('stok.edit', [
            'stok' => $stok
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stok $stok)
    {
        $stok->id_katalog = $request->id_katalog;
        $stok->id_pelanggan = $request->id_pelanggan;
        $stok->stok_dijual = $request->stok_dijual;
        $stok->modified_by = $request->modified_by;

        $stok->save();

        return redirect('/stok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stok $stok)
    {
        //
    }
}
