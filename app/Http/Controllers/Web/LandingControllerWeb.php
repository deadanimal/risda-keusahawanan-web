<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Peranan;
use App\Models\Pegawai;
use App\Models\Mukim;
use App\Models\Usahawan;

class LandingControllerWeb extends Controller
{
    public function index()
    {
        $role="";
        $authuser = Auth::user();
        if(isset(Auth::user()->role)){
            $role = Peranan::where('peranan_id', Auth::user()->role)->first();
            $authuser->peranan = $role;
        }else{
            echo '<script language="javascript">';
            echo 'alert("Session Expired Kindly Login")';
            echo '</script>';
            return redirect('/');
        }

        $noti = 0;

        if($authuser->role != 1 && ($authuser->role != 2) && ($authuser->role != 7)){
            $authpegawai = Pegawai::where('id', $authuser->idpegawai)->first();
            $authmukim = Mukim::where('U_Mukim_ID', $authpegawai->mukim)->first();

            if($authuser->role == 1){
                $users = Usahawan::where('status_profil',0)->first();
            }else if($authuser->role == 3){
                $users = Usahawan::where('status_profil',0)->where('U_Negeri_ID',$authmukim->U_Negeri_ID)->first();
            }else if($authuser->role == 4){
                $users = Usahawan::where('status_profil',0)->where('U_Daerah_ID',$authmukim->U_Daerah_ID)->first();
            }else if($authuser->role == 7){
                $users = Usahawan::where('status_profil',0)->where('Kod_PT',$authpegawai->NamaPT)->first();
            }

            if(isset($users)){
                $noti = 1;
            }
        }else{
            $noti = 0;
        }
        
        
        return view('landing.index'
        ,[
            'authuser'=>$authuser,
            'noti'=>$noti
        ]
        );
    }

}
