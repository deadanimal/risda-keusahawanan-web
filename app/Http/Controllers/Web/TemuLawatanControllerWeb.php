<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Lawatan;
use App\Models\User;
use App\Models\Usahawan;
use App\Models\Pegawai;

class TemuLawatanControllerWeb extends Controller
{
    public function index()
    {
        $lawatans = Lawatan::orderBy('tarikh_lawatan', 'ASC')->orderBy('status_lawatan', 'ASC')->get();
        foreach($lawatans as $lawatan){
            $user = User::where('id', $lawatan->id_pengguna)->first();
            $usahawan = Usahawan::where('id', $user->usahawanid)->first();
            $pegawai = Pegawai::where('id', $lawatan->id_pegawai)->first();
            
            if($lawatan->status_lawatan == 1){
                $lawatan->nama_status = "Menunggu Persetujuan Usahawan";
            
            }else if($lawatan->status_lawatan == 2){
                $lawatan->nama_status = "Menunggu Persetujuan Pegawai";

            }else if($lawatan->status_lawatan == 3){
                $lawatan->nama_status = "Disahkan";

            }else if($lawatan->status_lawatan == 4){
                $lawatan->nama_status = "Selesai";

            }

            $lawatan->nama_usahawan = $usahawan->namausahawan;
            if(isset($pegawai)){
                $lawatan->nama_pegawai = $pegawai->nama;
            }
        }
        return view('temulawatan.index'
        ,[
            'lawatans'=>$lawatans
        ]
        );
    }


}
