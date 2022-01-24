<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Usahawan;
use App\Models\AuditTrail;
use App\Models\Pegawai;

class AuditTrailControllerWeb extends Controller
{
    public function index()
    {
        $authuser = Auth::user();
        if(!isset($authuser)){
            return redirect('/landing');
        }
        $Audits = AuditTrail::orderBy('Date', 'DESC')->get();
        foreach ($Audits as $Audit) {
            $Audit->user = $Audit->idpegawai;
            if($Audit->Type == 1){
                $Audit->jenis = "Tetapan Pegawai";
            }else if($Audit->Type == 2){
                $Audit->jenis = "Tetapan Usahawan";
            }else if($Audit->Type == 3){
                $Audit->jenis = "Insentif";
            }else if($Audit->Type == 4){
                $Audit->jenis = "Tetapan Komponen";
            }
            $pegawai = Pegawai::where('id', $Audit->idpegawai)->first();
            $Audit->pegawai = $pegawai->nama;
        }
        
        // foreach ($users as $usahawan) {
        //     $user = new User();
        //     $user->name = $usahawan->namausahawan;
        //     $user->email = $usahawan->email;
        //     $user->password = '$2y$10$VVZ2AGrw1UyJzJqC.JwIveLgQxw75IPtnlC3oXIpzc0AKUkDU/aOK';
        //     $user->usahawanid = $usahawan->id;
        //     $user->status_pengguna = 1;
        //     $user->no_kp = $usahawan->nokadpengenalan;
        //     $user->role = 1;
        //     $user->type = 2;
        //     $user->profile_status = 0;
        //     $user->save();
        // }
        return view('audittrail.index'
        ,[
            'Audits'=>$Audits
        ]
        );
    }

}
