<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriUsahawan;
use App\Models\AuditTrail;
use Illuminate\Support\Facades\Auth;

class KategoriUsahawanControllerWeb extends Controller
{
    public function index()
    {
        $kategoriusahawan = KategoriUsahawan::All();
        return view('komponendash.kategoriusahawan'
        ,[
            'kategoriusahawan'=>$kategoriusahawan
        ]
        );
    }

    public function store(Request $request)
    {
        $kategoriusahawan = new KategoriUsahawan();
        $kategoriusahawan->id_kategori_usahawan = $request->id_kategori_usahawan;
        $kategoriusahawan->nama_kategori_usahawan = $request->nama_kategori_usahawan;
        $kategoriusahawan->jualan_usahawan_min = $request->jualan_usahawan_min;
        $kategoriusahawan->jualan_usahawan_max = $request->jualan_usahawan_max;
        $kategoriusahawan->status_kategori_usahawan = $request->status_kategori_usahawan;
        $kategoriusahawan->save();

        $audit = new AuditTrail();
        $authuser = Auth::user();
        $audit->idpegawai = $authuser->idpegawai;
        $audit->Type = 4;
        $audit->Desc = "Tambah data Kategori Usahawan";
        $audit->Date = date("Y-m-d H:i:s");
        $audit->save();

        echo '<script language="javascript">';
        echo 'alert("Kategori Usahawan Berjaya Di Simpan")';
        echo '</script>';
        return redirect('/kategoriusahawan');
    }

    public function update(Request $request, $id)
    {
        $kategoriusahawan = KategoriUsahawan::where('id', $id)->first();
        $kategoriusahawan->id_kategori_usahawan = $request->id_kategori_usahawan;
        $kategoriusahawan->nama_kategori_usahawan = $request->nama_kategori_usahawan;
        $kategoriusahawan->jualan_usahawan_min = $request->jualan_usahawan_min;
        $kategoriusahawan->jualan_usahawan_max = $request->jualan_usahawan_max;
        $kategoriusahawan->status_kategori_usahawan = $request->status_kategori_usahawan;
        $kategoriusahawan->save();

        $audit = new AuditTrail();
        $authuser = Auth::user();
        $audit->idpegawai = $authuser->idpegawai;
        $audit->Type = 4;
        $audit->Desc = "Ubah data Kategori Usahawan";
        $audit->Date = date("Y-m-d H:i:s");
        $audit->save();

        echo '<script language="javascript">';
        echo 'alert("Kategori Usahawan Berjaya Di Ubah")';
        echo '</script>';
        return redirect('/kategoriusahawan');
    }

    public function destroy($id)
    {
        $kategoriusahawan=KategoriUsahawan::find($id);
        $kategoriusahawan->delete();

        $audit = new AuditTrail();
        $authuser = Auth::user();
        $audit->idpegawai = $authuser->idpegawai;
        $audit->Type = 4;
        $audit->Desc = "Buang data Kategori Usahawan";
        $audit->Date = date("Y-m-d H:i:s");
        $audit->save();

        echo '<script language="javascript">';
        echo 'alert("Kategori Usahawan Berjaya Di Buang")';
        echo '</script>';
        return redirect('/kategoriusahawan');
    }

}
