<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TindakanLawatan;

class TindakanLawatanControllerWeb extends Controller
{
    public function index()
    {
        $tindakanlawatan = TindakanLawatan::All();
        return view('komponendash.tindakanlawatan'
        ,[
            'tindakanlawatan'=>$tindakanlawatan
        ]
        );
    }

    public function store(Request $request)
    {
        $tindakanlawatan = new TindakanLawatan();
        $tindakanlawatan->nama_tindakan_lawatan = $request->nama_tindakan_lawatan;
        $tindakanlawatan->status_tindakan_lawatan = $request->status_tindakan_lawatan;
        $tindakanlawatan->save();

        echo '<script language="javascript">';
        echo 'alert("Kategori Aliran Berjaya Di Simpan")';
        echo '</script>';
        return redirect('/tindakanlawatan');
    }

    public function update(Request $request, $id)
    {
        //dd ($id);
        $tindakanlawatan = TindakanLawatan::where('id', $id)->first();
        $tindakanlawatan->nama_tindakan_lawatan = $request->nama_tindakan_lawatan;
        $tindakanlawatan->status_tindakan_lawatan = $request->status_tindakan_lawatan;
        $tindakanlawatan->save();

        echo '<script language="javascript">';
        echo 'alert("Tindakan Lawatan Berjaya Di Ubah")';
        echo '</script>';
        return redirect('/tindakanlawatan');
    }

    public function destroy($id)
    {
        $tindakanlawatan=TindakanLawatan::find($id);
        $tindakanlawatan->delete();

        echo '<script language="javascript">';
        echo 'alert("Tindakan Lawatan Berjaya Di Buang")';
        echo '</script>';
        return redirect('/tindakanlawatan');
    }

}
