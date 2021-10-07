<?php

namespace App\Http\Controllers;

use App\Models\Jenis_Insentif;
use Illuminate\Http\Request;

class JenisInsentifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis_Insentif = Jenis_Insentif::all();
        return view('jenis_Insentif.index', [
            'jenis_Insentif' => $jenis_Insentif
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
        $jenis_Insentif = new Jenis_Insentif();

        $jenis_Insentif->nama_insentif = $request->nama_insentif ;
        $jenis_Insentif->status = $request->status ;

        $jenis_Insentif->save();

        return redirect('/jenis_insentif');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jenis_Insentif  $jenis_Insentif
     * @return \Illuminate\Http\Response
     */
    public function show(Jenis_Insentif $jenis_Insentif)
    {
        return view('jenis_Insentif.show', [
            'jenis_Insentif' => $jenis_Insentif
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jenis_Insentif  $jenis_Insentif
     * @return \Illuminate\Http\Response
     */
    public function edit(Jenis_Insentif $jenis_Insentif)
    {
        return view('jenis_Insentif.edit', [
            'jenis_Insentif' => $jenis_Insentif
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jenis_Insentif  $jenis_Insentif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jenis_Insentif $jenis_Insentif)
    {
        $jenis_Insentif->nama_insentif = $request->nama_insentif ;
        $jenis_Insentif->status = $request->status ;

        $jenis_Insentif->save();

        return redirect('/jenis_insentif');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jenis_Insentif  $jenis_Insentif
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jenis_Insentif $jenis_Insentif)
    {
        //
    }
}
