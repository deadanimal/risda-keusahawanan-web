<?php

namespace App\Http\Controllers\Web\LPL;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $authuser = Auth::user();
        if(!isset($authuser)){
            return redirect('/landing');
        }
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
        $authuser = Auth::user();
        if(!isset($authuser)){
            return redirect('/landing');
        }
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
        $getYear = date("Y");
        $insentif = Insentif::where('id_pengguna', $usahawan->usahawanid)->where('tahun_terima_insentif', $getYear)->first();
        if(isset($insentif)){
            $usahawan->tahun = $insentif->tahun_terima_insentif;
            $jenisinsentif = JenisInsentif::where('id_jenis_insentif', $insentif->id_jenis_insentif)->first();
            if(isset($jenisinsentif)){
                $usahawan->jenis_insentif = $jenisinsentif->nama_insentif;
            }
        }

        $lawatan = Lawatan::where('id_pengguna', $user->id)->whereYear('tarikh_lawatan', $getYear)->first();
        if(isset($lawatan)){
            $usahawan->tarikh_lawatan = $lawatan->tarikh_lawatan;
            $usahawan->masa_lawatan = $lawatan->masa_lawatan;
            $usahawan->gambar_lawatan = $lawatan->gambar_lawatan;
            $usahawan->komen = $lawatan->komen;
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

    public function pantauinddtl(Request $request)
    {
        $authuser = Auth::user();
        if(!isset($authuser)){
            return redirect('/landing');
        }

        if ($request->tahun != null){
            $getYear = $request->tahun;
        }else{
            $getYear = date("Y");
        }

        $usahawan = Usahawan::where('usahawanid', $request->usahawanid)->first();
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
        $result = "";
        $insentif = Insentif::where('id_pengguna', $usahawan->usahawanid)->where('tahun_terima_insentif', $getYear)->first();
        if(isset($insentif)){
            $usahawan->tahun = $insentif->tahun_terima_insentif;
            $jenisinsentif = JenisInsentif::where('id_jenis_insentif', $insentif->id_jenis_insentif)->first();
            if(isset($jenisinsentif)){
                $usahawan->jenis_insentif = $jenisinsentif->nama_insentif;
            }

            $lawatan = Lawatan::where('id_pengguna', $user->id)->whereYear('tarikh_lawatan', $getYear)->first();
            if(isset($lawatan)){
                $usahawan->tarikh_lawatan = $lawatan->tarikh_lawatan;
                $usahawan->masa_lawatan = $lawatan->masa_lawatan;
                $usahawan->gambar_lawatan = $lawatan->gambar_lawatan;
                $usahawan->komen = $lawatan->komen;
                $pegawai = Pegawai::where('id', $lawatan->id_pegawai)->first();
                if(isset($pegawai)){
                    $usahawan->pegawai = $pegawai->nama;
                }
                $tindakan_lawatan = TindakanLawatan::where('id', $lawatan->id_tindakan_lawatan)->first();
                if(isset($tindakan_lawatan)){
                    $usahawan->tindakan = $tindakan_lawatan->nama_tindakan_lawatan;
                }

                $result .= '
                <tr>
                <td style="display: none;" id="userid">'.$usahawan->usahawanid.'</td>
                </tr>
                <tr class="align-middle" style="text-align: left;">
                    <td class="text-nowrap" >Nama Usahawan</td>
                    <td class="text-nowrap" >: &nbsp '.$usahawan->namausahawan.'</td>
                </tr>
                <tr class="align-middle" style="text-align: left;">
                    <td class="text-nowrap" >Nama Syarikat</td>
                    <td class="text-nowrap" >: &nbsp '.$usahawan->syarikat.'</td>
                </tr>
                <tr class="align-middle" style="text-align: left;">
                    <td class="text-nowrap" >Daerah</td>
                    <td class="text-nowrap" >: &nbsp '.$usahawan->daerah.'</td>
                </tr>
                <tr class="align-middle" style="text-align: left;">
                    <td class="text-nowrap" >Negeri</td>
                    <td class="text-nowrap" >: &nbsp '.$usahawan->negeri.'</td>
                </tr>
                <tr class="align-middle" style="text-align: left;">
                    <td class="text-nowrap" >Jenis Perniagaan</td>
                    <td class="text-nowrap" >: &nbsp '.$usahawan->jenisniaga.'</td>
                </tr>
                <tr class="align-middle" style="text-align: left;">
                    <td class="text-nowrap" >Jenis Insentif</td>
                    <td class="text-nowrap" >: &nbsp '.$usahawan->jenis_insentif.'</td>
                </tr>
                <tr class="align-middle" style="text-align: left;">
                    <td class="text-nowrap" >Tahun Terima Insentif</td>
                    <td class="text-nowrap" >: &nbsp '.$usahawan->tahun.'</td>
                </tr>
                <tr class="align-middle" style="text-align: left;">
                    <td class="text-nowrap" style="padding-top: 20px;">Tarikh Lawatan</td>
                    <td class="text-nowrap" style="padding-top: 20px;">: &nbsp '.$usahawan->tarikh_lawatan.'</td>
                </tr>
                <tr class="align-middle" style="text-align: left;">
                    <td class="text-nowrap" >Masa Lawatan</td>
                    <td class="text-nowrap" >: &nbsp '.$usahawan->masa_lawatan.'</td>
                </tr>
                <tr class="align-middle" style="text-align: left;">
                    <td class="text-nowrap" >Pegawai Lawatan</td>
                    <td class="text-nowrap" >: &nbsp '.$usahawan->pegawai.'</td>
                </tr>
                <tr class="align-middle" style="text-align: left;">
                    <td class="text-nowrap" >Gambar Lawatan</td>
                    <td class="text-nowrap" style="padding-top: 20px;">:
                        <div style="margin-left:12px;margin-top:10px;display:inline-block;border: 1px solid black;"><img style="height:200px;width:200px;" src="'.$usahawan->gambar_lawatan.'"/></div>
                    </td>
                </tr>
                <tr>
                    <td class="text-nowrap" colspan="2" style="padding-top: 20px;">
                        Tindakan yang perlu dilaksanakan oleh usahawan
                    </td>
                </tr>
                <tr>
                    <td class="text-nowrap" colspan="2" style="border: 1px solid black;padding:25px 15px">
                    '.$usahawan->tindakan.'
                    </td>
                </tr>
                <tr>
                    <td class="text-nowrap" colspan="2" style="padding-top: 20px;">
                        Catatan/Komen Keseluruhan
                    </td>
                </tr>
                <tr>
                    <td class="text-nowrap" colspan="2" style="border: 1px solid black;padding:25px 15px">
                    '.$usahawan->komen.'
                    </td>
                </tr>';

                
            }else{
                $result = "Tiada data lawatan ditemui";
            }
        }else{
            $result = "Tiada data insentif ditemui";
        }

        return $result;        

        
    }
}
