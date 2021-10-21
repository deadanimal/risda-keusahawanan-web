<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Peranan;
use App\Models\User;

class PegawaiControllerWeb extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::All();
        $ddPeranan = Peranan::All();
        foreach ($pegawai as $pegawai_L) {
            if($pegawai_L->id != null){
                $status = User::where('idpegawai', $pegawai_L->id)->first();
                $temp = isset($status->status_pengguna) ? count($status->status_pengguna) : 0;
                //$temp = $status['status_pengguna'];
                $temp = $status->status_pengguna;
                $pegawai_L->status_pengguna = $temp;
            }
        }
        //$status = User::select('profil_status')->where('idpegawai', $pegawai->id)->first();
        //$ddPeranan = Peranan::select('peranan_id', 'kod_peranan')->get();
        //dd($pegawai);
        return view('pegawai.index'
        ,[
            'pegawai'=>$pegawai,
            'ddPeranan'=>$ddPeranan
        ]
        );
    }

    public function pegawaiPost(Request $request)
    {
        //dd($request->status);
        $user = User::where('idpegawai', $request->id)->first();
        $user->status_pengguna = $request->status;
        $user->save();

        $pegawai = Pegawai::where('id', $request->id)->first();
        $pegawai->peranan_pegawai = $request->peranan;
        $pegawai->save();
        header('Location: pegawai.index');
        //return redirect('/pegawai');
    }

}
