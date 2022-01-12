<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usahawan;
use App\Models\Insentif;
use App\Models\JenisInsentif;
use App\Models\Report;
use App\Models\Pegawai;
use App\Models\Mukim;
use App\Models\AuditTrail;

class InsentifControllerWeb extends Controller
{
    public function index()
    {
        $authuser = Auth::user();
        $authpegawai = Pegawai::where('id', $authuser->idpegawai)->first();
        $authmukim = Mukim::where('U_Mukim_ID', $authpegawai->mukim)->first();
        if($authuser->role == 1){
            $users = Usahawan::all();
        }else if($authuser->role == 3){
            $users = Usahawan::where('U_Negeri_ID',$authmukim->U_Negeri_ID)->get();
        }else if($authuser->role == 4){
            $users = Usahawan::where('U_Daerah_ID',$authmukim->U_Daerah_ID)->get();
        }else if($authuser->role == 5){
            $users = Usahawan::where('U_Negeri_ID',$authmukim->U_Negeri_ID)->get();
        }else if($authuser->role == 6){
            $users = Usahawan::where('U_Daerah_ID',$authmukim->U_Daerah_ID)->get();
        }else{
            return redirect('/landing');
        }
        
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
        $usahawan = Usahawan::where('usahawanid', $id)->first();
        return view('insentif.insentifdetail'
        ,[
            'insentifs'=>$insentifs,
            'id_pengguna'=>$usahawan->usahawanid,
            'ddInsentif'=>$ddInsentif,
            'negeri'=>$usahawan->U_Negeri_ID,
            'daerah'=>$usahawan->U_Daerah_ID,
            'dun'=>$usahawan->U_Dun_ID
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
        $insentif->negeri = $request->negeri;
        $insentif->save();
        
        $usahawan = Usahawan::where('usahawanid', $request->id_pengguna)->first();

        $audit = new AuditTrail();
        $authuser = Auth::user();
        $audit->idpegawai = $authuser->idpegawai;
        $audit->Type = 3;
        $audit->Desc = "Tambah data insentif untuk ".$usahawan->namausahawan."";
        $audit->Date = date("Y-m-d H:i:s");
        $audit->save();

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
        $insentif->negeri = $request->negeri;
        $insentif->save();

        $usahawan = Usahawan::where('usahawanid', $request->id_pengguna)->first();

        $audit = new AuditTrail();
        $authuser = Auth::user();
        $audit->idpegawai = $authuser->idpegawai;
        $audit->Type = 3;
        $audit->Desc = "Tambah data insentif untuk ".$usahawan->namausahawan."";
        $audit->Date = date("Y-m-d H:i:s");
        $audit->save();

        echo '<script language="javascript">';
        echo 'alert("Insentif Berjaya Di Ubah")';
        echo '</script>'; 
        return redirect('/insentifdetail/'.$request->id_pengguna);
    }

    public function destroy($id)
    {
        $insentif=Insentif::find($id);
        $insentif->delete();
        
        $usahawan = Usahawan::where('usahawanid', $insentif->id_pengguna)->first();

        $audit = new AuditTrail();
        $authuser = Auth::user();
        $audit->idpegawai = $authuser->idpegawai;
        $audit->Type = 3;
        $audit->Desc = "Buang data insentif untuk ".$usahawan->namausahawan."";
        $audit->Date = date("Y-m-d H:i:s");
        $audit->save();

        echo '<script language="javascript">';
        echo 'alert("Insentif Berjaya Di Buang")';
        echo '</script>';
        return redirect(url()->previous());
    }
}
