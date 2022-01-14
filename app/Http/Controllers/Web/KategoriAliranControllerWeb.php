<?php
 
namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriAliran;
use App\Models\AuditTrail;
use Illuminate\Support\Facades\Auth;

class KategoriAliranControllerWeb extends Controller
{
    public function index()
    {
        $authuser = Auth::user();
        if(!isset($authuser)){
            return redirect('/landing');
        }
        $kategorialiran = KategoriAliran::All();
        return view('komponendash.kategorialiran'
        ,[
            'kategorialiran'=>$kategorialiran
        ]
        );
    }

    public function store(Request $request)
    {
        $kategorialiran = new KategoriAliran();

        $kategorialiran->jenis_aliran = $request->jenis_aliran;
        $kategorialiran->bahagian = $request->jenis_aliran_dua;
        $kategorialiran->nama_kategori_aliran = $request->nama_kategori_aliran;
        $kategorialiran->status_kategori_aliran = $request->status_kategori_aliran;
        $kategorialiran->save();

        $audit = new AuditTrail();
        $authuser = Auth::user();
        $audit->idpegawai = $authuser->idpegawai;
        $audit->Type = 4;
        $audit->Desc = "Tambah data Aliran";
        $audit->Date = date("Y-m-d H:i:s");
        $audit->save();

        echo '<script language="javascript">';
        echo 'alert("Kategori Aliran Berjaya Di Simpan")';
        echo '</script>';
        return redirect('/kategorialiran');
    }

    public function update(Request $request, $id)
    {
        $kategorialiran = KategoriAliran::where('id', $id)->first();
        $kategorialiran->jenis_aliran = $request->jenis_aliran;
        $kategorialiran->nama_kategori_aliran = $request->nama_kategori_aliran;
        $kategorialiran->status_kategori_aliran = $request->status_kategori_aliran;
        $kategorialiran->save();

        $audit = new AuditTrail();
        $authuser = Auth::user();
        $audit->idpegawai = $authuser->idpegawai;
        $audit->Type = 4;
        $audit->Desc = "Ubah data Aliran";
        $audit->Date = date("Y-m-d H:i:s");
        $audit->save();

        echo '<script language="javascript">';
        echo 'alert("Kategori Aliran Berjaya Di Ubah")';
        echo '</script>';
        return redirect('/kategorialiran');
    }

    public function destroy($id)
    {
        $kategorialiran=KategoriAliran::find($id);
        $kategorialiran->delete();

        $audit = new AuditTrail();
        $authuser = Auth::user();
        $audit->idpegawai = $authuser->idpegawai;
        $audit->Type = 4;
        $audit->Desc = "Buang data Aliran";
        $audit->Date = date("Y-m-d H:i:s");
        $audit->save();

        echo '<script language="javascript">';
        echo 'alert("Kategori Aliran Berjaya Di Buang")';
        echo '</script>';
        return redirect('/kategorialiran');
    }
}
