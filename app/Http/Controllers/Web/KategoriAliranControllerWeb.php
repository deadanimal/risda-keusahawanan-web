<?php
 
namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriAliran;

class KategoriAliranControllerWeb extends Controller
{
    public function index()
    {
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
        $kategorialiran->nama_kategori_aliran = $request->nama_kategori_aliran;
        $kategorialiran->status_kategori_aliran = $request->status_kategori_aliran;
        $kategorialiran->save();

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

        echo '<script language="javascript">';
        echo 'alert("Kategori Aliran Berjaya Di Ubah")';
        echo '</script>';
        return redirect('/kategorialiran');
    }

    public function destroy($id)
    {
        $kategorialiran=KategoriAliran::find($id);
        $kategorialiran->delete();

        echo '<script language="javascript">';
        echo 'alert("Kategori Aliran Berjaya Di Buang")';
        echo '</script>';
        return redirect('/kategorialiran');
    }
}
