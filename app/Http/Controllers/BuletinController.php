<?php

namespace App\Http\Controllers;

use App\Models\Buletin;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;

class BuletinController extends Controller
{

    public function index()
    {
        $buletin = Buletin::orderBy('updated_at', 'desc')->get();
        return response()->json($buletin);
    }

    public function store(Request $request)
    {
        $buletin = new Buletin();
        $buletin->id_pegawai = $request->id_pegawai;
        $buletin->tajuk = $request->tajuk;
        $buletin->tarikh = $request->tarikh;
        $buletin->keterangan_lain = $request->keterangan_lain;
        $buletin->status = $request->status;
        $buletin->url = $request->url;
        $buletin->gambar_buletin = $request->gambar_buletin;

        $buletin->save();

        return response()->json($buletin);
    }

    public function show($id)
    {
        $buletin = Buletin::where('id_pegawai', $id)->get();
        return response()->json($buletin);
    }

    public function update(Request $request, Buletin $buletin)
    {

        $image = $request->gambar_url; // your base64 encoded
        $ext = explode(';base64', $image);
        $ext = explode('/', $ext[0]);
        $ext = $ext[1];
        $image = str_replace('data:image/' . $ext . ';base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = $buletin->id . '.' . $ext;
        File::put(public_path() . '/storage/images/buletin/' . $imageName, base64_decode($image));

        $buletin->tajuk = $request->tajuk;
        $buletin->tarikh = $request->tarikh;
        $buletin->keterangan_lain = $request->keterangan_lain;
        $buletin->status = $request->status;
        // $buletin->url = $request->url;
        $buletin->url = "/images/buletin/" . $imageName;
        $buletin->gambar_buletin = $request->gambar_buletin;

        $buletin->save();

        return response()->json($buletin);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buletin  $buletin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buletin $buletin)
    {
        //
    }

}
