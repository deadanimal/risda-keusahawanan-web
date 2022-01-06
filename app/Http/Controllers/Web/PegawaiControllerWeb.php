<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pegawai;
use App\Models\Peranan;
use App\Models\User;
use App\Models\Mukim;
use App\Models\Negeri;
use App\Models\Daerah;
use App\Models\AuditTrail;

class PegawaiControllerWeb extends Controller
{
    public function index()
    {
        $authuser = Auth::user();
        $authpegawai = Pegawai::where('id', $authuser->idpegawai)->first();
        $authmukim = Mukim::where('U_Mukim_ID', $authpegawai->mukim)->first();
        if($authuser->role == 1){
            $pegawai = Pegawai::All();
            $ddPeranan = Peranan::All();
            $ddMukim = Mukim::where('status', 1)->orderBy('Mukim', 'ASC')->get();
        }else if($authuser->role == 3){
            $pegawai = Pegawai::join('mukims', 'pegawais.mukim', '=', 'mukims.U_Mukim_ID')->select('pegawais.*')->where('mukims.U_Negeri_ID',$authmukim->U_Negeri_ID)->get()->unique();
            $ddPeranan = Peranan::where('peranan_id', '>=', '3')->get();
            $ddMukim = Mukim::where('status', 1)->where('U_Negeri_ID', $authmukim->U_Negeri_ID)->orderBy('Mukim', 'ASC')->get();
        }else if($authuser->role == 4){
            $pegawai = Pegawai::join('mukims', 'pegawais.mukim', '=', 'mukims.U_Mukim_ID')->select('pegawais.*')->where('mukims.U_Daerah_ID',$authmukim->U_Daerah_ID)->get()->unique();
            $ddPeranan = Peranan::where('peranan_id', '>=', '4')->get();
            $ddMukim = Mukim::where('status', 1)->where('U_Daerah_ID', $authmukim->U_Daerah_ID)->orderBy('Mukim', 'ASC')->get();
        }else{
            return redirect('/landing');
        }
        
        foreach ($pegawai as $pegawai_L) {
            if($pegawai_L->id != null){
                $status = User::where('idpegawai', $pegawai_L->id)->first();
                //$temp = 
                if(isset($status->status_pengguna) == true){
                    $pegawai_L->status_pengguna = $status->status_pengguna;
                }
                $mukim = Mukim::where('U_Mukim_ID', $pegawai_L->mukim)->first();
                if(isset($mukim->U_Negeri_ID)){
                    $negeri = Negeri::where('U_Negeri_ID', $mukim->U_Negeri_ID)->first();
                    if(isset($negeri->Negeri)){
                        $pegawai_L->negerinama = $negeri->Negeri;
                    }
                    $daerah = Daerah::where('U_Daerah_ID', $mukim->U_Daerah_ID)->first();
                    if(isset($daerah)){
                        $pegawai_L->daerahnama = $daerah->Daerah;
                    }
                }
                
            }
        }
        // dd($pegawai);
        return view('pegawai.index'
        ,[
            'pegawai'=>$pegawai,
            'ddPeranan'=>$ddPeranan,
            'ddMukim'=>$ddMukim
        ]
        );
    }

    public function pegawaiPost(Request $request)
    {
        //dd($request->status);
        $user = User::where('idpegawai', $request->id)->first();
        $user->status_pengguna = $request->status;
        $user->role = $request->peranan;
        $user->save();

        $pegawai = Pegawai::where('id', $request->id)->first();
        $pegawai->peranan_pegawai = $request->peranan;
        $pegawai->mukim = $request->mukim;
        $pegawai->save();

        $audit = new AuditTrail();
        $authuser = Auth::user();
        $audit->idpegawai = $authuser->idpegawai;
        $audit->Type = 1;
        $audit->Desc = "Kemakini data untuk ".$pegawai->nama."";
        $audit->Date = date("Y-m-d H:i:s");
        $audit->save();

        return '/pegawai';
    }

    public function show(Request $request)
    {
        $mukim = new \stdClass();
        $mukim->negeri = "";
        $mukim->daerah = "";

        //$pegawai = Pegawai::where('id', $request->id)->first();
        $mukim = Mukim::where('U_Mukim_ID', $request->value)->first();
        //return $mukim->U_Negeri_ID;
        if(isset($mukim->U_Negeri_ID)){
            $negeri = Negeri::where('U_Negeri_ID', $mukim->U_Negeri_ID)->first();
            if(isset($negeri->Negeri)){
                $mukim->negeri = $negeri->Negeri;
            }
        }
        if(isset($mukim->U_Daerah_ID)){
            $daerah = Daerah::where('U_Daerah_ID', $mukim->U_Daerah_ID)->first();
            if(isset($daerah->Daerah)){
                $mukim->daerah = $daerah->Daerah;
            }
        }

        return $mukim;
    }

}
