<?php

namespace App\Http\Controllers;

use App\Models\Pekebun;
use Illuminate\Http\Request;

class PekebunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pekebun = Pekebun::all();
        return view('pekebun.index', [
            'pekebun' => $pekebun
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
        $pekebun = new Pekebun();
        
        $pekebun->usahawanid =$request->usahawanid;
        $pekebun->status_daftar_usahawan=$request->status_daftar_usahawan;
        $pekebun->Nama_PK=$request->Nama_PK;
        $pekebun->No_KP=$request->No_KP;
        $pekebun->No_Geran=$request->No_Geran;
        $pekebun->No_Lot=$request->No_Lot;
        $pekebun->U_Negeri_ID=$request->U_Negeri_ID;
        $pekebun->U_Daerah_ID=$request->U_Daerah_ID;
        $pekebun->U_Mukim_ID=$request->U_Mukim_ID;
        $pekebun->U_Parlimen_ID=$request->U_Parlimen_ID;
        $pekebun->U_Dun_ID=$request->U_Dun_ID;
        $pekebun->U_Kampung_ID=$request->U_Kampung_ID;
        $pekebun->U_Seksyen_ID=$request->U_Seksyen_ID;
        $pekebun->keluasan_hektar=$request->keluasan_hektar;
        $pekebun->jenis_tanaman_kebun=$request->jenis_tanaman_kebun;

        $pekebun->save();

        return redirect('/pekebun');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pekebun  $pekebun
     * @return \Illuminate\Http\Response
     */
    public function show(Pekebun $pekebun)
    {
        // $pekebun = Pekebun::all();
        return view('pekebun.show', [
            'pekebun' => $pekebun
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pekebun  $pekebun
     * @return \Illuminate\Http\Response
     */
    public function edit(Pekebun $pekebun)
    {
        // $pekebun = Pekebun::all();
        return view('pekebun.edit', [
            'pekebun' => $pekebun
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pekebun  $pekebun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pekebun $pekebun)
    {
        $pekebun->usahawanid =$request->usahawanid;
        $pekebun->status_daftar_usahawan=$request->status_daftar_usahawan;
        $pekebun->Nama_PK=$request->Nama_PK;
        $pekebun->No_KP=$request->No_KP;
        $pekebun->No_Geran=$request->No_Geran;
        $pekebun->No_Lot=$request->No_Lot;
        $pekebun->U_Negeri_ID=$request->U_Negeri_ID;
        $pekebun->U_Daerah_ID=$request->U_Daerah_ID;
        $pekebun->U_Mukim_ID=$request->U_Mukim_ID;
        $pekebun->U_Parlimen_ID=$request->U_Parlimen_ID;
        $pekebun->U_Dun_ID=$request->U_Dun_ID;
        $pekebun->U_Kampung_ID=$request->U_Kampung_ID;
        $pekebun->U_Seksyen_ID=$request->U_Seksyen_ID;
        $pekebun->keluasan_hektar=$request->keluasan_hektar;
        $pekebun->jenis_tanaman_kebun=$request->jenis_tanaman_kebun;

        $pekebun->save();

        return redirect('/pekebun');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pekebun  $pekebun
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pekebun $pekebun)
    {
        //
    }
}
