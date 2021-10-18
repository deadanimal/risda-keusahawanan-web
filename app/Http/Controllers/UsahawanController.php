<?php

namespace App\Http\Controllers;

use App\Models\Usahawan;
use Illuminate\Http\Request;

class UsahawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usahawan = Usahawan::all();
        // dd($usahawan);
        return response()->json($usahawan);
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
        $usahawan = new Usahawan();

        $usahawan->Kod_PT = $request->Kod_PT;
        $usahawan->namausahawan = $request->namausahawan;
        $usahawan->nokadpengenalan = $request->nokadpengenalan;
        $usahawan->tarikhlahir = $request->tarikhlahir;
        $usahawan->U_Jantina_ID = $request->U_Jantina_ID;
        $usahawan->U_Bangsa_ID = $request->U_Bangsa_ID;
        $usahawan->statusperkahwinan = $request->statusperkahwinan;
        $usahawan->U_Pendidikan_ID = $request->U_Pendidikan_ID;
        $usahawan->alamat1 = $request->alamat1;
        $usahawan->alamat2 = $request->alamat2;
        $usahawan->alamat3 = $request->alamat3;
        $usahawan->bandar = $request->bandar;
        $usahawan->poskod = $request->poskod;
        $usahawan->U_Negeri_ID = $request->U_Negeri_ID;
        $usahawan->U_Daerah_ID = $request->U_Daerah_ID;
        $usahawan->U_Mukim_ID = $request->U_Mukim_ID;
        $usahawan->U_Parlimen_ID = $request->U_Parlimen_ID;
        $usahawan->U_Dun_ID = $request->U_Dun_ID;
        $usahawan->U_Kampung_ID = $request->U_Kampung_ID;
        $usahawan->U_Seksyen_ID = $request->U_Seksyen_ID;
        $usahawan->id_kategori_usahawan = $request->id_kategori_usahawan;
        $usahawan->gambar_url = $request->gambar_url;
        $usahawan->notelefon = $request->notelefon;
        $usahawan->nohp = $request->nohp;
        $usahawan->email = $request->email;
        $usahawan->createdby_id = $request->createdby_id;
        $usahawan->createdby_kod_PT = $request->createdby_kod_PT;
        $usahawan->modifiedby_id = $request->modifiedby_id;
        $usahawan->modifiedby_kod_PT = $request->modifiedby_kod_PT;

        $usahawan->save();

        // return redirect("/usahawan");
        return response()->json($usahawan);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usahawan  $usahawan
     * @return \Illuminate\Http\Response
     */
    public function show(Usahawan $usahawan)
    {
        // $usahawan = Usahawan::where('usahawanid', $id)->first();

        // dd($usahawan);
        // return view('usahawan.show', [
        //     'usahawan' => $usahawan
        // ]);
        return response()->json($usahawan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usahawan  $usahawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Usahawan $usahawan)
    {
        // $usahawan = Usahawan::where('usahawanid', $id)->first();

        // dd($usahawan);
        return view('usahawan.edit', [
            'usahawan' => $usahawan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usahawan  $usahawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usahawan $usahawan)
    {

        $usahawan->Kod_PT = $request->Kod_PT;
        $usahawan->namausahawan = $request->namausahawan;
        $usahawan->nokadpengenalan = $request->nokadpengenalan;
        $usahawan->tarikhlahir = $request->tarikhlahir;
        $usahawan->U_Jantina_ID = $request->U_Jantina_ID;
        $usahawan->U_Bangsa_ID = $request->U_Bangsa_ID;
        $usahawan->statusperkahwinan = $request->statusperkahwinan;
        $usahawan->U_Pendidikan_ID = $request->U_Pendidikan_ID;
        $usahawan->alamat1 = $request->alamat1;
        $usahawan->alamat2 = $request->alamat2;
        $usahawan->alamat3 = $request->alamat3;
        $usahawan->bandar = $request->bandar;
        $usahawan->poskod = $request->poskod;
        $usahawan->U_Negeri_ID = $request->U_Negeri_ID;
        $usahawan->U_Daerah_ID = $request->U_Daerah_ID;
        $usahawan->U_Mukim_ID = $request->U_Mukim_ID;
        $usahawan->U_Parlimen_ID = $request->U_Parlimen_ID;
        $usahawan->U_Dun_ID = $request->U_Dun_ID;
        $usahawan->U_Kampung_ID = $request->U_Kampung_ID;
        $usahawan->U_Seksyen_ID = $request->U_Seksyen_ID;
        $usahawan->id_kategori_usahawan = $request->id_kategori_usahawan;
        $usahawan->gambar_url = $request->gambar_url;
        $usahawan->notelefon = $request->notelefon;
        $usahawan->nohp = $request->nohp;
        $usahawan->email = $request->email;
        $usahawan->createdby_id = $request->createdby_id;
        $usahawan->createdby_kod_PT = $request->createdby_kod_PT;
        $usahawan->modifiedby_id = $request->modifiedby_id;
        $usahawan->modifiedby_kod_PT = $request->modifiedby_kod_PT;

        $usahawan->save();

        // return redirect("/usahawan");
        return response()->json($usahawan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usahawan  $usahawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usahawan $usahawan)
    {
        //
    }
}
