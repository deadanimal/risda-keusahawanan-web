<?php

namespace App\Http\Controllers;

use App\Models\Syarikat;
use Illuminate\Http\Request;

class SyarikatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $syarikat = Syarikat::all();
        // return view('syarikat.index', [
        //     'syarikat' => $syarikat
        // ]);
        return response()->json($syarikat);
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
        // dd($request);
        $syarikat = new Syarikat();

        $syarikat->usahawanid = $request->usahawanid;
        $syarikat->namasyarikat = $request->namasyarikat;
        $syarikat->jenismilikanperniagaan = $request->jenismilikanperniagaan;
        $syarikat->nodaftarssm = $request->nodaftarssm;
        $syarikat->nodaftarpbt = $request->nodaftarpbt;
        $syarikat->nodaftarpersijilanhalal = $request->nodaftarpersijilanhalal;
        $syarikat->nodaftarmesti = $request->nodaftarmesti;
        $syarikat->tahunmulaoperasi = $request->tahunmulaoperasi;
        $syarikat->bilanganpekerja = $request->bilanganpekerja;
        $syarikat->alamat1_ssm = $request->alamat1_ssm;
        $syarikat->alamat2_ssm = $request->alamat2_ssm;
        $syarikat->alamat3_ssm = $request->alamat3_ssm;
        $syarikat->tarikh_mula_mof = $request->tarikh_mula_mof;
        $syarikat->tarikh_tamat_mof = $request->tarikh_tamat_mof;
        $syarikat->status_bumiputera = $request->status_bumiputera;
        $syarikat->tarikh_daftar_ssm = $request->tarikh_daftar_ssm;
        $syarikat->notelefon = $request->notelefon;
        $syarikat->no_hp = $request->no_hp;
        $syarikat->email = $request->email;
        $syarikat->logo_syarikat = $request->logo_syarikat;
        $syarikat->prefix_id = $request->prefix_id;
        $syarikat->createdby_id = $request->createdby_id;
        $syarikat->createdby_kod_PT = $request->createdby_kod_PT;
        $syarikat->modifiedby_id = $request->modifiedby_id;
        $syarikat->modifiedby_kod_PT = $request->modifiedby_kod_PT;

        $syarikat->save();

        // return redirect('/syarikat');
        return response()->json($syarikat);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Syarikat  $syarikat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('syarikat.show', [
        //     'syarikat' => $syarikat
        // ]);
        $syarikat = Syarikat::where('usahawanid', $id)->get()->first();
        return response()->json($syarikat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Syarikat  $syarikat
     * @return \Illuminate\Http\Response
     */
    public function edit(Syarikat $syarikat)
    {
        return view('syarikat.edit', [
            'syarikat' => $syarikat
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Syarikat  $syarikat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $syarikat = Syarikat::where('usahawanid', $id)->get()->first();
        // $syarikat->usahawanid = $request->usahawanid;
        $syarikat->namasyarikat = $request->namasyarikat;
        $syarikat->jenismilikanperniagaan = $request->jenismilikanperniagaan;
        $syarikat->nodaftarssm = $request->nodaftarssm;
        $syarikat->nodaftarpbt = $request->nodaftarpbt;
        $syarikat->nodaftarpersijilanhalal = $request->nodaftarpersijilanhalal;
        $syarikat->nodaftarmesti = $request->nodaftarmesti;
        $syarikat->tahunmulaoperasi = $request->tahunmulaoperasi;
        $syarikat->bilanganpekerja = $request->bilanganpekerja;
        $syarikat->alamat1_ssm = $request->alamat1_ssm;
        $syarikat->alamat2_ssm = $request->alamat2_ssm;
        $syarikat->alamat3_ssm = $request->alamat3_ssm;
        $syarikat->tarikh_mula_mof = $request->tarikh_mula_mof;
        $syarikat->tarikh_tamat_mof = $request->tarikh_tamat_mof;
        $syarikat->status_bumiputera = $request->status_bumiputera;
        $syarikat->tarikh_daftar_ssm = $request->tarikh_daftar_ssm;
        $syarikat->notelefon = $request->notelefon;
        $syarikat->no_hp = $request->no_hp;
        $syarikat->email = $request->email;
        // $syarikat->logo_syarikat = $request->logo_syarikat;
        $syarikat->prefix_id = $request->prefix_id;
        // $syarikat->createdby_id = $request->createdby_id;
        // $syarikat->createdby_kod_PT = $request->createdby_kod_PT;
        // $syarikat->modifiedby_id = $request->modifiedby_id;
        // $syarikat->modifiedby_kod_PT = $request->modifiedby_kod_PT;

        $syarikat->save();

        return response()->json($syarikat);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Syarikat  $syarikat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Syarikat $syarikat)
    {
        //
    }
}
