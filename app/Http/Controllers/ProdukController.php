<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::all();
        return view('produk.index', [
            'produk' => $produk
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
        $produk = new Produk();

        $produk->perniagaanid= $request->perniagaanid;
        $produk->jenamaproduk= $request->jenamaproduk;
        $produk->unitmatrik= $request->unitmatrik;
        $produk->kapasitimaksimum= $request->kapasitimaksimum;
        $produk->kapasitisemasa= $request->kapasitisemasa;
        $produk->hargaperunit= $request->hargaperunit;
        $produk->modified_by= $request->modified_by;

        $produk->save();

        return redirect('/produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        return view('produk.show', [
            'produk' => $produk
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return view('produk.edit', [
            'produk' => $produk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $produk->perniagaanid= $request->perniagaanid;
        $produk->jenamaproduk= $request->jenamaproduk;
        $produk->unitmatrik= $request->unitmatrik;
        $produk->kapasitimaksimum= $request->kapasitimaksimum;
        $produk->kapasitisemasa= $request->kapasitisemasa;
        $produk->hargaperunit= $request->hargaperunit;
        $produk->modified_by= $request->modified_by;

        $produk->save();

        return redirect('/produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
