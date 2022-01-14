<?php

namespace App\Http\Controllers\Web\LPL;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usahawan;
use App\Models\User;
use App\Models\Lawatan;
use App\Models\Negeri;
use App\Models\Syarikat;
use App\Models\Daerah;
use App\Models\Perniagaan;
use App\Models\Insentif;
use App\Models\JenisInsentif;
use App\Models\Pegawai;
use App\Models\TindakanLawatan;

class PLIndividuControllerWeb extends Controller
{
    public function index()
    {
        $usahawans = Usahawan::all();
        $result = [];
        foreach ($usahawans as $usahawan) {
            $user = User::where('usahawanid', $usahawan->usahawanid)->first();
            if($user != null){
                $negeri = Negeri::where('U_Negeri_ID', $usahawan->U_Negeri_ID)->first();
                $usahawan->negeri = $negeri->Negeri;

                $lawatan = Lawatan::where('id_pengguna', $user->id)->get();
                if($lawatan->count()==0){
                    
                }else{
                    array_push($result, $usahawan);
                }
            }
        }
        
        return view('pemantauanlawatan.pantauindividu'
        ,[
            'users'=>$result
        ]
        );
    }

    public function show($usahawanid)
    {
        $usahawan = Usahawan::where('usahawanid', $usahawanid)->first();
        $user = User::where('usahawanid', $usahawan->usahawanid)->first();
        $syarikat = Syarikat::where('usahawanid', $usahawan->usahawanid)->first();
        $usahawan->syarikat = $syarikat->namasyarikat;
        $usahawan->jenisperniagaan = $syarikat->namasyarikat;

        $daerah = Daerah::where('U_Daerah_ID', $usahawan->U_Daerah_ID)->first();
        if(isset($daerah)){
            $usahawan->daerah = $daerah->Daerah;}

        $negeri = Negeri::where('U_Negeri_ID', $usahawan->U_Negeri_ID)->first();
        if(isset($negeri)){
            $usahawan->negeri = $negeri->Negeri;}
        
        $perniagaans = Perniagaan::where('usahawanid', $usahawan->id)->first();
        if(isset($perniagaans)){
            if($perniagaans->jenisperniagaan == "A"){
                $usahawan->jenisniaga = "PENGELUARAN PRODUK MAKANAN";
            }else if($perniagaans->jenisperniagaan == "B"){
                $usahawan->jenisniaga = "PENGELUARAN PRODUK BUKAN MAKANAN";
            }else if($perniagaans->jenisperniagaan == "C"){
                $usahawan->jenisniaga = "PENGELUARAN PRODUK BUKAN PERTANIAN";
            }else if($perniagaans->jenisperniagaan == "D"){
                $usahawan->jenisniaga = "PERKHIDMATAN PEMASARAN";
            }else if($perniagaans->jenisperniagaan == "E"){
                $usahawan->jenisniaga = "PERKHIDMATAN BUKAN PEMASARAN";
            }
        }
        
        $insentif = Insentif::where('id_pengguna', $user->id)->first();
        if(isset($insentif)){
            $usahawan->tahun = $insentif->tahun_terima_insentif;
            $jenisinsentif = JenisInsentif::where('id_jenis_insentif', $insentif->id_jenis_insentif)->first();
            if(isset($jenisinsentif)){
                $usahawan->jenis_insentif = $jenisinsentif->nama_insentif;
            }
        }

        $lawatan = Lawatan::where('id_pengguna', $user->id)->first();
        if(isset($lawatan)){
            $usahawan->tarikh_lawatan = $lawatan->tarikh_lawatan;
            $usahawan->masa_lawatan = $lawatan->masa_lawatan;
            $pegawai = Pegawai::where('id', $lawatan->id_pegawai)->first();
            if(isset($pegawai)){
                $usahawan->pegawai = $pegawai->nama;
            }
            $tindakan_lawatan = TindakanLawatan::where('id', $lawatan->id_tindakan_lawatan)->first();
            if(isset($tindakan_lawatan)){
                $usahawan->tindakan = $tindakan_lawatan->nama_tindakan_lawatan;
            }
        }

        
        //dd($lawatan);
        return view('pemantauanlawatan.pantauindividudetail'
        ,[
            'usahawan'=>$usahawan
        ]
        );
    }
}
