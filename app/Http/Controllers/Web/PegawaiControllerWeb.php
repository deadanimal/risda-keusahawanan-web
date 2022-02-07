<?php

namespace App\Http\Controllers\Web;
// ini_set('max_execution_time', 180);
// error_reporting(0);
ini_set('memory_limit', '-1');
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
        if(!isset($authuser)){
            return redirect('/landing');
        }
        $authpegawai = Pegawai::where('id', $authuser->idpegawai)->first();
        // $authmukim = $authpegawai->Negeri;
        if($authuser->role == 1){
            $pegawai = Pegawai::all();
            // all();
            // take(100)->get();
            $ddPeranan = Peranan::All();
            $ddMukim = Mukim::select('U_Mukim_ID','Mukim')->where('status', 1)->orderBy('Mukim', 'ASC')->get();
        }else if($authuser->role == 3 || $authuser->role == 5){
            $pegawai = Pegawai::join('mukims', 'pegawais.mukim', '=', 'mukims.U_Mukim_ID')->select('pegawais.*')->where('mukims.U_Negeri_ID',$authpegawai->Mukim->U_Negeri_ID)->get()->unique();
            $ddPeranan = Peranan::where('peranan_id', '>=', '3')->get();
            $ddMukim = Mukim::where('status', 1)->where('U_Negeri_ID', $authpegawai->Mukim->U_Negeri_ID)->orderBy('Mukim', 'ASC')->get();
        }else if($authuser->role == 4 || $authuser->role == 6){
            $pegawai = Pegawai::join('mukims', 'pegawais.mukim', '=', 'mukims.U_Mukim_ID')->select('pegawais.*')->where('mukims.U_Daerah_ID',$authpegawai->Mukim->U_Daerah_ID)->get()->unique();
            $ddPeranan = Peranan::where('peranan_id', '>=', '4')->get();
            $ddMukim = Mukim::where('status', 1)->where('U_Daerah_ID', $authpegawai->Mukim->U_Daerah_ID)->orderBy('Mukim', 'ASC')->get();
        }else{
            return redirect('/landing');
        }

        // foreach ($pegawai as $pegawai_d){
        //     $muk = Mukim::select('Mukim')->where('U_Mukim_ID',$pegawai_d->mukim)->first();
        //     if(isset($muk)){
        //         $pegawai_d->Mukimname = $muk->Mukim;
        //     }
        // }
            // dd($pegawai);
        return view('pegawaiWeb.index'
        ,[
            'pegawai'=>$pegawai,
            'ddPeranan'=>$ddPeranan,
            'ddMukim'=>$ddMukim
        ]
        );
    }

    public function pegawaiPost(Request $request)
    {
        // dd($request);
        $user = User::where('idpegawai', $request->id)->first();
        $user->status_pengguna = $request->status;
        $user->role = $request->peranan;
        $user->save();

        $pegawai = Pegawai::where('id', $request->id)->first();
        $pegawai->peranan_pegawai = $request->peranan;
        // $pegawai->mukim = $request->mukim;
        $pegawai->save();

        $audit = new AuditTrail();
        $authuser = Auth::user();
        $audit->idpegawai = $authuser->idpegawai;
        $audit->Type = 1;
        $audit->Desc = "Kemakini data untuk ".$pegawai->nama."";
        $audit->Date = date("Y-m-d H:i:s");
        $audit->save();

        return '/pegawaiWeb';
    }

    public function show(Request $request)
    {
        $mukim = new \stdClass();
        $mukim->negeri = "";
        $mukim->daerah = "";

        $pegawai = Pegawai::where('id', $request->id)->first();
        $pegawai->mukim = $request->value;
        $pegawai->save();

        $mukim = Mukim::where('U_Mukim_ID', $request->value)->first();
        return $mukim;
    }

    public function pegawaiPost2()
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->request('GET', 'https://www4.risda.gov.my/fire/getallstaff/', [
            'auth' => ['99891c082ecccfe91d99a59845095f9c47c4d14e', 'f9d00dae5c6d6d549c306bae6e88222eb2f84307']
        ]);
        $response = $request->getBody()->getContents();
        $vals = json_decode($response);
        foreach ($vals as $val){
            $pegawai = Pegawai::where('nokp', $val->nokp)->first();
            // $user = User::where('no_kp', $val->nokp)->first();
            if(!isset($pegawai)){
                $newpegawai = new Pegawai();
                $newpegawai->nama = $val->nama;
                $newpegawai->nokp = $val->nokp;
                $newpegawai->nopekerja = $val->nopekerja;
                $newpegawai->GelaranJwtn = $val->GelaranJwtn;
                $newpegawai->NamaPT = $val->Kod_PT;
                $newpegawai->NamaPA = $val->NamaPA;
                $newpegawai->NamaUnit = $val->NamaUnit;
                $newpegawai->Jawatan = $val->Jawatan;
                $newpegawai->StesenBertugas = $val->StesenBertugas;
                $newpegawai->email = $val->email;
                $newpegawai->notel = $val->notel;
                $newpegawai->mukim = "";
                $newpegawai->peranan_pegawai = "";

                $newpegawai->save();

                $newuser = new User();
                $newuser->name = $val->nama;
                $newuser->email = $val->email;
                $newuser->password = '$2y$10$HWYZbKricDxuacRL/cpBoOSiZo7F3nQafsQkjXN2Q9fxy9ghPZFm.';
                $newuser->idpegawai = $newpegawai->id;
                $newuser->status_pengguna = 0;
                $newuser->no_kp = $val->nokp;
                $newuser->role = 0;
                $newuser->type = 1;
                $newuser->profile_status = 0;
                $newuser->save();
            }
        }
        return true;
    }
}
