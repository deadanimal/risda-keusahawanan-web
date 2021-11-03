<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisInsentif;

class JenisInsentifControllerWeb extends Controller
{
    public function index()
    {
        $jenisinsentif = JenisInsentif::All();
        return view('komponendash.jenisinsentif'
        ,[
            'jenisinsentif'=>$jenisinsentif
        ] 
        );

    }

    public function store(Request $request)
    {
        $jenisinsentif = new JenisInsentif();
        $jenisinsentif->id_jenis_insentif = $request->id_jenis_insentif;
        $jenisinsentif->nama_insentif = $request->nama_insentif;
        $jenisinsentif->status = $request->status;
        $jenisinsentif->save();

        echo '<script language="javascript">';
        echo 'alert("Jenis Insentif Berjaya Di Simpan")';
        echo '</script>';
        return redirect('/jenisinsentif');
    }

    public function update(Request $request, $id)
    {
        //dd ($id);
        $jenisinsentif = JenisInsentif::where('id', $id)->first();
        $jenisinsentif->id_jenis_insentif = $request->id_jenis_insentif;
        $jenisinsentif->nama_insentif = $request->nama_insentif;
        $jenisinsentif->status = $request->status;
        $jenisinsentif->save();

        echo '<script language="javascript">';
        echo 'alert("Jenis Insentif Berjaya Di Ubah")';
        echo '</script>';
        return redirect('/jenisinsentif');
    }

    public function destroy($id)
    {
        $jenisinsentif=JenisInsentif::find($id);
        $jenisinsentif->delete();

        echo '<script language="javascript">';
        echo 'alert("Jenis Insentif Berjaya Di Buang")';
        echo '</script>';
        return redirect('/jenisinsentif');
    }

}
