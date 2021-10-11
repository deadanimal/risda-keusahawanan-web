<?php

namespace App\Http\Controllers;

use App\Models\Perniagaan;
use Illuminate\Http\Request;

class PerniagaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perniagaan = Perniagaan::all();
        // return view('perniagaan.index', [
        //     'perniagaan' => $perniagaan
        // ]);
        return response()->json($perniagaan);
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
        $perniagaan = new Perniagaan();

        $perniagaan->usahawanid = $request->usahawanid;;
        $perniagaan->jenisperniagaan = $request->jenisperniagaan;;
        $perniagaan->klusterperniagaan = $request->klusterperniagaan;;
        $perniagaan->subkluster = $request->subkluster;;
        $perniagaan->alamat1 = $request->alamat1;;
        $perniagaan->alamat2 = $request->alamat2;;
        $perniagaan->alamat3 = $request->alamat3;;
        $perniagaan->bandar = $request->bandar;;
        $perniagaan->poskod = $request->poskod;;
        $perniagaan->U_Negeri_ID = $request->U_Negeri_ID;;
        $perniagaan->U_Daerah_ID = $request->U_Daerah_ID;;
        $perniagaan->U_Mukim_ID = $request->U_Mukim_ID;;
        $perniagaan->U_Parlimen_ID = $request->U_Parlimen_ID;;
        $perniagaan->U_Dun_ID = $request->U_Dun_ID;;
        $perniagaan->U_Kampung_ID = $request->U_Kampung_ID;;
        $perniagaan->U_Seksyen_ID = $request->U_Seksyen_ID;;
        $perniagaan->latitud = $request->latitud;;
        $perniagaan->logitud = $request->logitud;;
        $perniagaan->facebook = $request->facebook;;
        $perniagaan->instagram = $request->instagram;;
        $perniagaan->twitter = $request->twitter;;
        $perniagaan->lamanweb = $request->lamanweb;;
        $perniagaan->dropship = $request->dropship;;
        $perniagaan->ejen = $request->ejen;;
        $perniagaan->stokis = $request->stokis;;
        $perniagaan->outlet = $request->outlet;;
        $perniagaan->domestik = $request->domestik;;
        $perniagaan->luarnegara = $request->luarnegara;;
        $perniagaan->pasaranonline = $request->pasaranonline;;
        $perniagaan->purata_jualan_bulanan = $request->purata_jualan_bulanan;;
        $perniagaan->peratus_kenaikan = $request->peratus_kenaikan;;
        $perniagaan->hasil_jualan_tahunan = $request->hasil_jualan_tahunan;;
        $perniagaan->gambar_url = $request->gambar_url;;
        $perniagaan->createdby_id = $request->createdby_id;;
        $perniagaan->createdby_kod_PT = $request->createdby_kod_PT;;
        $perniagaan->modifiedby_id = $request->modifiedby_id;;
        $perniagaan->modifiedby_kod_PT = $request->modifiedby_kod_PT;;

        $perniagaan->save();

        // return redirect('/perniagaan');
        return response()->json($perniagaan);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perniagaan  $perniagaan
     * @return \Illuminate\Http\Response
     */
    public function show(Perniagaan $perniagaan)
    {
        // return view('perniagaan.show', [
        //     'perniagaan' => $perniagaan
        // ]);
        return response()->json($perniagaan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perniagaan  $perniagaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perniagaan $perniagaan)
    {
        return view('perniagaan.edit', [
            'perniagaan' => $perniagaan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perniagaan  $perniagaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perniagaan $perniagaan)
    {
        $perniagaan->usahawanid = $request->usahawanid;;
        $perniagaan->jenisperniagaan = $request->jenisperniagaan;;
        $perniagaan->klusterperniagaan = $request->klusterperniagaan;;
        $perniagaan->subkluster = $request->subkluster;;
        $perniagaan->alamat1 = $request->alamat1;;
        $perniagaan->alamat2 = $request->alamat2;;
        $perniagaan->alamat3 = $request->alamat3;;
        $perniagaan->bandar = $request->bandar;;
        $perniagaan->poskod = $request->poskod;;
        $perniagaan->U_Negeri_ID = $request->U_Negeri_ID;;
        $perniagaan->U_Daerah_ID = $request->U_Daerah_ID;;
        $perniagaan->U_Mukim_ID = $request->U_Mukim_ID;;
        $perniagaan->U_Parlimen_ID = $request->U_Parlimen_ID;;
        $perniagaan->U_Dun_ID = $request->U_Dun_ID;;
        $perniagaan->U_Kampung_ID = $request->U_Kampung_ID;;
        $perniagaan->U_Seksyen_ID = $request->U_Seksyen_ID;;
        $perniagaan->latitud = $request->latitud;;
        $perniagaan->logitud = $request->logitud;;
        $perniagaan->facebook = $request->facebook;;
        $perniagaan->instagram = $request->instagram;;
        $perniagaan->twitter = $request->twitter;;
        $perniagaan->lamanweb = $request->lamanweb;;
        $perniagaan->dropship = $request->dropship;;
        $perniagaan->ejen = $request->ejen;;
        $perniagaan->stokis = $request->stokis;;
        $perniagaan->outlet = $request->outlet;;
        $perniagaan->domestik = $request->domestik;;
        $perniagaan->luarnegara = $request->luarnegara;;
        $perniagaan->pasaranonline = $request->pasaranonline;;
        $perniagaan->purata_jualan_bulanan = $request->purata_jualan_bulanan;;
        $perniagaan->peratus_kenaikan = $request->peratus_kenaikan;;
        $perniagaan->hasil_jualan_tahunan = $request->hasil_jualan_tahunan;;
        $perniagaan->gambar_url = $request->gambar_url;;
        $perniagaan->createdby_id = $request->createdby_id;;
        $perniagaan->createdby_kod_PT = $request->createdby_kod_PT;;
        $perniagaan->modifiedby_id = $request->modifiedby_id;;
        $perniagaan->modifiedby_kod_PT = $request->modifiedby_kod_PT;;

        $perniagaan->save();

        // return redirect('/perniagaan');
        return response()->json($perniagaan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perniagaan  $perniagaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perniagaan $perniagaan)
    {
        //
    }
}
