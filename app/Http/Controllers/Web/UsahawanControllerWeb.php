<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Usahawan;
use App\Models\PusatTanggungjawab;
use App\Models\Negeri;
use App\Models\Pegawai;
use App\Models\Mukim;
use App\Models\Daerah;
use App\Models\Parlimen;
use App\Models\Dun;
use App\Models\Kampung;
use App\Models\Seksyen;
use App\Models\KategoriUsahawan;

class UsahawanControllerWeb extends Controller
{
    public function index()
    {
        $authuser = Auth::user();
        $authpegawai = Pegawai::where('id', $authuser->idpegawai)->first();
        $authmukim = Mukim::where('U_Mukim_ID', $authpegawai->mukim)->first();
        $ddPT = PusatTanggungjawab::where('status', 1)->get();
        $ddNegeri = Negeri::where('status', 1)->get();
        $ddDaerah = Daerah::where('status', 1)->get();
        $ddMukim = Mukim::where('status', 1)->get();
        $ddParlimen = Parlimen::all();
        $ddDun = Dun::all();
        $ddKampung = Kampung::where('status', 1)->get();
        $ddSeksyen = Seksyen::where('status', 1)->get();
        $ddKateUsahawan = KategoriUsahawan::where('status_kategori_usahawan', 'aktif')->get();
        if($authuser->role == 1){
            $users = Usahawan::all();
        }else if($authuser->role == 3){
            $users = Usahawan::where('U_Negeri_ID',$authmukim->U_Negeri_ID)->get();
        }else if($authuser->role == 4){
            $users = Usahawan::where('U_Daerah_ID',$authmukim->U_Daerah_ID)->get();
        }else if($authuser->role == 7){
            $users = Usahawan::where('Kod_PT',$authpegawai->NamaPT)->get();
        }else{
            return redirect('/landing');
        }

        foreach ($users as $usahawan) {
            $status = User::where('usahawanid', $usahawan->id)->first();
            if(isset($status)){
                $usahawan->status_pengguna = $status->status_pengguna;
            }
            $negeri = Negeri::where('U_Negeri_ID', $usahawan->U_Negeri_ID)->first();
            if(isset($negeri)){
                $usahawan->negeri = $negeri->Negeri;
            }
        }


        return view('usahawanWeb.index',[
            'users'=>$users,
            'ddPT'=>$ddPT,
            'ddNegeri'=>$ddNegeri,
            'ddDaerah'=>$ddDaerah,
            'ddMukim'=>$ddMukim,
            'ddParlimen'=>$ddParlimen,
            'ddDun'=>$ddDun,
            'ddKampung'=>$ddKampung,
            'ddSeksyen'=>$ddSeksyen,
            'ddKateUsahawan'=>$ddKateUsahawan
        ]);
    }

    // public function show($id)
    // {
        // return view('usahawan.tetapanusahawan',[
        //     'id'=>$id
        // ]);
//    }

    public function update(Request $request, $id)
    {
        $user = User::where('usahawanid', $id)->first();
        $user->name = $request->namausahawan;
        $user->email = $request->email;
        $user->no_kp = $request->nokadpengenalan;
        $user->save();

        $usahawan = Usahawan::where('id', $id)->first();
        $usahawan->namausahawan = $request->namausahawan;
        $usahawan->nokadpengenalan = $request->nokadpengenalan;
        $usahawan->tarikhlahir = $request->tarikhlahir;
        $usahawan->U_Jantina_ID = $request->U_Jantina_ID;
        $usahawan->U_Bangsa_ID = $request->U_Bangsa_ID;
        $usahawan->statusperkahwinan = $request->statusperkahwinan;
        $usahawan->U_Pendidikan_ID = $request->U_Pendidikan_ID;
        $usahawan->alamat1 = $request->alamat1;
        $usahawan->bandar = $request->bandar;
        $usahawan->poskod = $request->poskod;
        $usahawan->U_Negeri_ID = $request->U_Negeri_ID;
        $usahawan->U_Daerah_ID = $request->U_Daerah_ID;
        $usahawan->U_Mukim_ID = $request->U_Mukim_ID;
        $usahawan->U_Parlimen_ID = $request->U_Parlimen_ID;
        $usahawan->U_Dun_ID = $request->U_Dun_ID;
        $usahawan->U_Kampung_ID = $request->U_Kampung_ID;
        $usahawan->U_Seksyen_ID = $request->U_Seksyen_ID;
        $usahawan->id_kategori_usahawan = $request->id_kategori_usahawan;
        // if($request->gambarusahawan()) {
        //     $path = $request->gambarusahawan('file')->store('uploads');
        //     $usahawan->gambar_url =  $path;
        // }
        $usahawan->notelefon = $request->notelefon;
        $usahawan->nohp = $request->nohp;
        $usahawan->email = $request->email;
        
        $usahawan->save();
        echo '<script language="javascript">';
        echo 'alert("Profil Usahawan Berjaya Di Kemaskini")';
        echo '</script>';
        return redirect('/usahawanWeb');
    }

    public function usahawanPost(Request $request)
    {
        if($request->type == 'status'){
            $user = User::where('usahawanid', $request->id)->first();
            $user->status_pengguna = $request->status;
            $user->save();
        } 
        if($request->type == 'kawasan'){
            //$user = User::where('usahawanid', $request->id)->first();
            $usahawan = Usahawan::where('id', $request->id)->first();
            $usahawan->Kod_PT = $request->status;
            $usahawan->save();
        }
        
    }

    public function SahUsahawanProfil(Request $request)
    {
        $usahawan = Usahawan::where('id', $request->id)->first();
        $usahawan->status_profil = 1;
        $usahawan->save();
    }

}
 