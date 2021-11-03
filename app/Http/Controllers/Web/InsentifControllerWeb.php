<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usahawan;
use App\Models\Insentif;
use App\Models\JenisInsentif;

class InsentifControllerWeb extends Controller
{
    public function index()
    {
        $users = Usahawan::all();
        return view('insentif.index'
        ,[
            'users'=>$users
        ]
        );
    }

    public function show($id)
    {
        $insentifs = Insentif::where('id_pengguna', $id)->get();
        $ddInsentif = JenisInsentif::where('status', 'aktif')->get();
            //where('status_insentif', 'aktif')->get();
        //dd($insentifs);
        return view('insentif.insentifdetail'
        ,[
            'insentifs'=>$insentifs,
            'id_pengguna'=>$id,
            'ddInsentif'=>$ddInsentif
        ]
        );
    }
    
    public function store(Request $request)
    {
        $userId = $request->user()->id;
        $insentif = new Insentif();

        $insentif->id_pengguna = $request->id_pengguna;
        $insentif->id_jenis_insentif = $request->id_jenis_insentif;
        $insentif->tahun_terima_insentif = $request->tahun_terima_insentif;
        $insentif->nilai_insentif = $request->nilai_insentif;
        $insentif->created_by = $userId;
        $insentif->modified_by = $userId;
        $insentif->save();

        echo '<script language="javascript">';
        echo 'alert("Insentif Berjaya Di Simpan")';
        echo '</script>';
        return redirect('/insentifdetail/'.$request->id_pengguna);
    }

    public function update(Request $request, $id)
    {
        $userId = $request->user()->id;
        $insentif = Insentif::where('id', $id)->first();

        $insentif->id_pengguna = $request->id_pengguna;
        $insentif->id_jenis_insentif = $request->id_jenis_insentif;
        $insentif->tahun_terima_insentif = $request->tahun_terima_insentif;
        $insentif->nilai_insentif = $request->nilai_insentif;
        $insentif->modified_by = $userId;
        $insentif->save();

        echo '<script language="javascript">';
        echo 'alert("Insentif Berjaya Di Ubah")';
        echo '</script>'; 
        return redirect('/insentifdetail/'.$request->id_pengguna);
    }

    public function destroy($id)
    {
        $insentif=Insentif::find($id);
        $insentif->delete();

        echo '<script language="javascript">';
        echo 'alert("Insentif Berjaya Di Buang")';
        echo '</script>';
        return redirect(url()->previous());
    }
}
