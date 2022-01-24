<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Insentif;
use App\Models\Report;
use App\Models\User;
use App\Models\Usahawan;
use App\Models\Perniagaan;
use App\Models\Aliran;
use App\Models\KategoriAliran;
use App\Models\Lawatan;
use App\Models\Pegawai;
use App\Models\Mukim;
use App\Models\PusatTanggungjawab;
use App\Models\Negeri;
use App\Models\Daerah;
use App\Models\Dun;
use App\Models\Parlimen;
use App\Models\Pekebun;
use App\Models\KategoriUsahawan;
use App\Models\Syarikat;
use App\Models\JenisPerniagaan;
use App\Models\JenisInsentif;

use App\Exports\LapProf;
use Maatwebsite\Excel\Facades\Excel;

class LaporanProfilControllerWeb extends Controller
{
    public function index()
    {
        $authuser = Auth::user();
        if(isset($authuser)){
            $authpegawai = Pegawai::where('id', $authuser->idpegawai)->first();
        }else{
            return redirect('/landing');
        }
        
        $authmukim = Mukim::where('U_Mukim_ID', $authpegawai->mukim)->first();
        if($authuser->role == 1 || $authuser->role == 2){
            $users = Usahawan::all();
        }else if($authuser->role == 3 || $authuser->role == 5){
            $users = Usahawan::where('U_Negeri_ID', $authmukim->U_Negeri_ID)->get();
        }else if($authuser->role == 4 || $authuser->role == 6){
            $users = Usahawan::where('U_Daerah_ID', $authmukim->U_Daerah_ID)->get();
        }else if($authuser->role == 7){
            $users = Usahawan::where('Kod_PT', $authpegawai->NamaPT)->get();
        }else{
            return redirect('/landing');
        }

        $ddPT = PusatTanggungjawab::where('status', 1)->get();

        foreach ($users as $usahawan) {
            $negeri = Negeri::where('U_Negeri_ID', $usahawan->U_Negeri_ID)->first();
            if(isset($negeri)){
                $usahawan->negeri = $negeri->Negeri;
            }
            $PT = PusatTanggungjawab::where('Kod_PT', $usahawan->Kod_PT)->first();
            if(isset($PT)){
                $usahawan->PusatTang = $PT->keterangan;
            }

            $dateOfBirth = $usahawan->tarikhlahir;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dateOfBirth), date_create($today));
            $usahawan->umur = $diff->format('%y');

            if($usahawan->U_Jantina_ID == 1){
                $usahawan->jantina = "Lelaki";
            }else if($usahawan->U_Jantina_ID == 2){
                $usahawan->jantina = "Perempuan";
            }else{
                $usahawan->jantina = "Lain - Lain";
            }
            
            $usahawan->taraf_pendidikan = $usahawan->U_Taraf_Pendidikan_Tertinggi_ID;
            $daerah = Daerah::select('Daerah')->where('U_Daerah_ID', $usahawan->U_Daerah_ID)->first();
            $usahawan->daerah = $daerah->Daerah;
            $dun = Dun::select('Dun')->where('U_Dun_ID', $usahawan->U_Dun_ID)->first();
            $usahawan->dun = $dun->Dun;
            $parlimen = Parlimen::select('Parlimen')->where('U_Parlimen_ID', $usahawan->U_Parlimen_ID)->first();
            $usahawan->parlimen = $parlimen->Parlimen;
            $pekebun = Pekebun::where('usahawanid', $usahawan->usahawanid)->first();
            if(isset($pekebun)){
                $usahawan->PKnoTS = $pekebun->noTS;
                $usahawan->PKnoKP = $pekebun->No_KP;
            }
            $temp = KategoriUsahawan::where('id_kategori_usahawan', $usahawan->id_kategori_usahawan)->first();
            if(isset($temp1)){
                $usahawan->KateUsahawan = $temp->nama_kategori_usahawan;
            }
            $perniagaan = Perniagaan::where('usahawanid', $usahawan->usahawanid)->first();
            if(isset($perniagaan)){
                $JnsPerniagaan = JenisPerniagaan::where('kod_jenis_perniagaan', $perniagaan->jenisperniagaan)->first();
                if(isset($JnsPerniagaan)){
                    $usahawan->JenisPerniagaan = $JnsPerniagaan->nama_jenis_perniagaan;
                }
                $usahawan->KlusterPerniagaan = $perniagaan->klusterperniagaan;
                $usahawan->SubKlusterPerniagaan = $perniagaan->subkluster;
                if($perniagaan->facebook != ""){
                    $usahawan->MediumPemasaran = "Facebook ";
                }
                if($perniagaan->instagram != ""){
                    $usahawan->MediumPemasaran .= "Instagram ";
                }
                if($perniagaan->twitter != ""){
                    $usahawan->MediumPemasaran .= "Twitter ";
                }
                // $usahawan->MediumPemasaran = "Facebook, Instagram, Twitter";
                $usahawan->AlamatMediumPemasaran = "Facebook - ".$perniagaan->facebook."Instagram - " .$perniagaan->instagram."Twitter - ".$perniagaan->twitter;
                $usahawan->latitud = $perniagaan->latitud;
                $usahawan->logitud = $perniagaan->logitud;
            }
            $syarikat = Syarikat::where('usahawanid', $usahawan->usahawanid)->first();
            if(isset($syarikat)){
                $usahawan->namasyarikat = $syarikat->namasyarikat;
                if($syarikat->jenismilikanperniagaan == "JPP01"){
                    $usahawan->jenismilikan = "PEMILIKAN TUNGGAL";
                }else if($syarikat->jenismilikanperniagaan == "JPP02"){
                    $usahawan->jenismilikan = "PERKONGSIAN";
                }else if($syarikat->jenismilikanperniagaan == "JPP03"){
                    $usahawan->jenismilikan = "SYARIKAT SDN BHD";
                }else if($syarikat->jenismilikanperniagaan == "JPP04"){
                    $usahawan->jenismilikan = "PERKONGSIAN LIABILITI TERHAD";
                }
                
                $usahawan->nodaftarssm = $syarikat->nodaftarssm;
                $usahawan->alamatsyarikat = $syarikat->alamat1_ssm.",".$syarikat->alamat2_ssm.",".$syarikat->alamat3_ssm;
                $usahawan->emailsyarikat = $syarikat->email;
                $usahawan->nodaftarpersijilanhalal = $syarikat->nodaftarpersijilanhalal;
                
            }
            // dd($usahawan->usahawanid);
            $insentif = Insentif::where('id_pengguna', $usahawan->usahawanid)->orderBy('tahun_terima_insentif', 'desc')->first();
            if(isset($insentif)){
                $jenisinsentif = JenisInsentif::where('id_jenis_insentif', $insentif->id_jenis_insentif)->first();
                if(isset($jenisinsentif)){
                    $usahawan->jnsbantuansemasa = $jenisinsentif->nama_insentif;
                }
                $usahawan->kelulusanbantuansemasa = $insentif->nilai_insentif;
                $usahawan->thnbantuansemasa = $insentif->tahun_terima_insentif;
            }

            $insentif2 = Insentif::where('id_pengguna', $usahawan->usahawanid)->get();
            foreach ($insentif2 as $insentif2s) {
                $jenisinsentif = JenisInsentif::where('id_jenis_insentif', $insentif2s->id_jenis_insentif)->first();
                if(isset($jenisinsentif)){
                    $usahawan->insentifsebelumnama = $usahawan->insentifsebelumnama.",".$jenisinsentif->nama_insentif;
                }
                $usahawan->insentifsebelumjum = $usahawan->insentifsebelumjum.",".$insentif2s->nilai_insentif;
                $usahawan->insentifsebelumtahun = $usahawan->insentifsebelumtahun.",".$insentif2s->tahun_terima_insentif;
            }   
             

            $pengguna = User::where('usahawanid', $usahawan->usahawanid)->first();
            $getYear = date("Y");
            $alirans = Aliran::where('id_pengguna', $pengguna->id)->where('id_kategori_aliran',1)->whereYear('tarikh_aliran', '=', $getYear)->get();
            // dd($aliran);
            if(isset($alirans)){
                foreach ($alirans as $aliran) {
                    $aliran->bulan = date('m', strtotime($aliran->tarikh_aliran));
                    if($aliran->bulan == 1){
                        $usahawan->aliran1 = $usahawan->aliran1 + $aliran->jumlah_aliran;
                    }else if($aliran->bulan == 2){
                        $usahawan->aliran2 = $usahawan->aliran2 + $aliran->jumlah_aliran;
                    }else if($aliran->bulan == 3){
                        $usahawan->aliran3 = $usahawan->aliran3 + $aliran->jumlah_aliran;
                    }else if($aliran->bulan == 4){
                        $usahawan->aliran4 = $usahawan->aliran4 + $aliran->jumlah_aliran;
                    }else if($aliran->bulan == 5){
                        $usahawan->aliran5 = $usahawan->aliran5 + $aliran->jumlah_aliran;
                    }else if($aliran->bulan == 6){
                        $usahawan->aliran6 = $usahawan->aliran6 + $aliran->jumlah_aliran;
                    }else if($aliran->bulan == 7){
                        $usahawan->aliran7 = $usahawan->aliran7 + $aliran->jumlah_aliran;
                    }else if($aliran->bulan == 8){
                        $usahawan->aliran8 = $usahawan->aliran8 + $aliran->jumlah_aliran;
                    }else if($aliran->bulan == 9){
                        $usahawan->aliran9 = $usahawan->aliran9 + $aliran->jumlah_aliran;
                    }else if($aliran->bulan == 10){
                        $usahawan->aliran10 = $usahawan->aliran10 + $aliran->jumlah_aliran;
                    }else if($aliran->bulan == 11){
                        $usahawan->aliran11 = $usahawan->aliran11 + $aliran->jumlah_aliran;
                    }else if($aliran->bulan == 12){
                        $usahawan->aliran12 = $usahawan->aliran12 + $aliran->jumlah_aliran;
                    }
                    $usahawan->jumaliran = $usahawan->jumaliran + $aliran->jumlah_aliran;
                }
            }
            
            $usahawan->purataaliran = $usahawan->jumaliran / 12;

            if($usahawan->purataaliran >= 2500){
                $usahawan->capaisasaran = "capai";
            }else{
                $usahawan->capaisasaran = "tidak capai";
            }
        }
        
        return view('laporanprofil.index'
        ,[
            'users'=>$users,
            'ddPT'=>$ddPT
        ]
        );
    }

    public function show($id)
    {
        $users = Usahawan::where('id', $id)->first();
        // dd($users);
        $negeri = Negeri::where('U_Negeri_ID', $users->U_Negeri_ID)->first();
        if(isset($negeri)){
            $users->negeri = $negeri->Negeri;
        }

        $PT = PusatTanggungjawab::where('Kod_PT', $users->Kod_PT)->first();
        if(isset($PT)){
            $users->PusatTang = $PT->keterangan;
        }

        $dateOfBirth = $users->tarikhlahir;
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        $users->umur = $diff->format('%y');

        if($users->U_Jantina_ID == 1){
            $users->jantina = "Lelaki";
        }else if($users->U_Jantina_ID == 2){
            $users->jantina = "Perempuan";
        }else{
            $users->jantina = "Lain - Lain";
        }
        
        $users->taraf_pendidikan = $users->U_Taraf_Pendidikan_Tertinggi_ID;
        $daerah = Daerah::select('Daerah')->where('U_Daerah_ID', $users->U_Daerah_ID)->first();
        $users->daerah = $daerah->Daerah;
        $dun = Dun::select('Dun')->where('U_Dun_ID', $users->U_Dun_ID)->first();
        $users->dun = $dun->Dun;
        $parlimen = Parlimen::select('Parlimen')->where('U_Parlimen_ID', $users->U_Parlimen_ID)->first();
        $users->parlimen = $parlimen->Parlimen;
        $pekebun = Pekebun::where('usahawanid', $users->usahawanid)->first();
        if(isset($pekebun)){
            $users->PKnoTS = $pekebun->noTS;
            $users->PKnoKP = $pekebun->No_KP;
        }
        $temp = KategoriUsahawan::where('id_kategori_usahawan', $users->id_kategori_usahawan)->first();
        if(isset($temp)){
            $users->KateUsahawan = $temp->nama_kategori_usahawan;
        }
        $perniagaan = Perniagaan::where('usahawanid', $users->usahawanid)->first();
        if(isset($perniagaan)){
            $JnsPerniagaan = JenisPerniagaan::where('kod_jenis_perniagaan', $perniagaan->jenisperniagaan)->first();
            if(isset($JnsPerniagaan)){
                $users->JenisPerniagaan = $JnsPerniagaan->nama_jenis_perniagaan;
            }
            $users->KlusterPerniagaan = $perniagaan->klusterperniagaan;
            $users->SubKlusterPerniagaan = $perniagaan->subkluster;
            if($perniagaan->facebook != ""){
                $users->MediumPemasaran = "Facebook ";
            }
            if($perniagaan->instagram != ""){
                $users->MediumPemasaran .= "Instagram ";
            }
            if($perniagaan->twitter != ""){
                $users->MediumPemasaran .= "Twitter ";
            }
            // $users->MediumPemasaran = "Facebook, Instagram, Twitter";
            $users->AlamatMediumPemasaran = "Facebook - ".$perniagaan->facebook."Instagram - " .$perniagaan->instagram."Twitter - ".$perniagaan->twitter;
            $users->latitud = $perniagaan->latitud;
            $users->logitud = $perniagaan->logitud;
        }
        $syarikat = Syarikat::where('usahawanid', $users->usahawanid)->first();
        if(isset($syarikat)){
            $users->namasyarikat = $syarikat->namasyarikat;
            if($syarikat->jenismilikanperniagaan == "JPP01"){
                $users->jenismilikan = "PEMILIKAN TUNGGAL";
            }else if($syarikat->jenismilikanperniagaan == "JPP02"){
                $users->jenismilikan = "PERKONGSIAN";
            }else if($syarikat->jenismilikanperniagaan == "JPP03"){
                $users->jenismilikan = "SYARIKAT SDN BHD";
            }else if($syarikat->jenismilikanperniagaan == "JPP04"){
                $users->jenismilikan = "PERKONGSIAN LIABILITI TERHAD";
            }
            
            $users->nodaftarssm = $syarikat->nodaftarssm;
            $users->alamatsyarikat = $syarikat->alamat1_ssm.",".$syarikat->alamat2_ssm.",".$syarikat->alamat3_ssm;
            $users->emailsyarikat = $syarikat->email;
            $users->nodaftarpersijilanhalal = $syarikat->nodaftarpersijilanhalal;
            
        }
        // dd($users->usahawanid);
        $insentif = Insentif::where('id_pengguna', $users->usahawanid)->orderBy('tahun_terima_insentif', 'desc')->first();
        if(isset($insentif)){
            $jenisinsentif = JenisInsentif::where('id_jenis_insentif', $insentif->id_jenis_insentif)->first();
            if(isset($jenisinsentif)){
                $users->jnsbantuansemasa = $jenisinsentif->nama_insentif;
            }
            $users->kelulusanbantuansemasa = $insentif->nilai_insentif;
            $users->thnbantuansemasa = $insentif->tahun_terima_insentif;
        }

        $insentif2 = Insentif::where('id_pengguna', $users->usahawanid)->get();
        foreach ($insentif2 as $insentif2s) {
            $jenisinsentif = JenisInsentif::where('id_jenis_insentif', $insentif2s->id_jenis_insentif)->first();
            if(isset($jenisinsentif)){
                $insentif2s->namainsen = $jenisinsentif->nama_insentif;
            }
        }   

        $pengguna = User::where('usahawanid', $users->usahawanid)->first();
        $getYear = date("Y");
        $alirans = Aliran::where('id_pengguna', $pengguna->id)->where('id_kategori_aliran',1)->whereYear('tarikh_aliran', '=', $getYear)->get();
        // dd($aliran);
        if(isset($alirans)){
            foreach ($alirans as $aliran) {
                $aliran->bulan = date('m', strtotime($aliran->tarikh_aliran));
                if($aliran->bulan == 1){
                    $users->aliran1 = $users->aliran1 + $aliran->jumlah_aliran;
                }else if($aliran->bulan == 2){
                    $users->aliran2 = $users->aliran2 + $aliran->jumlah_aliran;
                }else if($aliran->bulan == 3){
                    $users->aliran3 = $users->aliran3 + $aliran->jumlah_aliran;
                }else if($aliran->bulan == 4){
                    $users->aliran4 = $users->aliran4 + $aliran->jumlah_aliran;
                }else if($aliran->bulan == 5){
                    $users->aliran5 = $users->aliran5 + $aliran->jumlah_aliran;
                }else if($aliran->bulan == 6){
                    $users->aliran6 = $users->aliran6 + $aliran->jumlah_aliran;
                }else if($aliran->bulan == 7){
                    $users->aliran7 = $users->aliran7 + $aliran->jumlah_aliran;
                }else if($aliran->bulan == 8){
                    $users->aliran8 = $users->aliran8 + $aliran->jumlah_aliran;
                }else if($aliran->bulan == 9){
                    $users->aliran9 = $users->aliran9 + $aliran->jumlah_aliran;
                }else if($aliran->bulan == 10){
                    $users->aliran10 = $users->aliran10 + $aliran->jumlah_aliran;
                }else if($aliran->bulan == 11){
                    $users->aliran11 = $users->aliran11 + $aliran->jumlah_aliran;
                }else if($aliran->bulan == 12){
                    $users->aliran12 = $users->aliran12 + $aliran->jumlah_aliran;
                }
                $users->jumaliran = $users->jumaliran + $aliran->jumlah_aliran;
            }
        }
        
        $users->purataaliran = $users->jumaliran / 12;

        if($users->purataaliran >= 2500){
            $users->capaisasaran = "capai";
        }else{
            $users->capaisasaran = "tidak capai";
        }

        return view('laporanprofil.profdetail'
        ,[
            'user'=>$users,
            'insentif2'=>$insentif2
        ]
        );
    }

    public function generatereport(Request $request)
    {
        if($request->type == 1){
            Report::where('tab20', Auth::user()->id)->where('type', 1)->delete();
            $insentifs = Insentif::all();
            if($insentifs->count()==0){
                return "Tiada Data Insentif Dijumpai";
            }else{
                foreach ($insentifs as $insentif) {
                    $user = User::where('usahawanid', $insentif->id_pengguna)->first();
                    $usahawan = Usahawan::where('usahawanid', $insentif->id_pengguna)->first();
                    $insentif->negeri = $usahawan->U_Negeri_ID;
                    $reports = Report::where('tab20', Auth::user()->id)->where('type', 1)->get();
                    if($reports->count()==0){
                        // $user = User::where('usahawanid', $insentif->id_pengguna)->first();
                        $aliran = Aliran::where('id_pengguna', $user->id)
                        ->whereYear('tarikh_aliran', $insentif->tahun_terima_insentif)
                        ->sum('jumlah_aliran');
                        $insentif->aliran = $aliran;
                        $this->newreport(1,$insentif,$insentif->id);
                        
                    }else{
                        $update = false;

                        foreach ($reports as $report) {
                            if ($report->tab3 == $insentif->tahun_terima_insentif && $report->tab2 == $insentif->id_jenis_insentif && $report->tab1 == $insentif->negeri) {
                                $report->tab4 = $report->tab4 + 1;
                                $report->tab5 = $report->tab5 + $insentif->nilai_insentif;
                                // $user = User::where('usahawanid', $insentif->id_pengguna)->first();
                                $aliran = Aliran::where('id_pengguna', $user->id)
                                ->whereYear('tarikh_aliran', $insentif->tahun_terima_insentif)
                                ->sum('jumlah_aliran');
                                $report->tab6 = $report->tab6 + $aliran;
                                $report->save();
                                $update = true;
                                break;
                            }
                        }
                        if($update == false){
                            // $user = User::where('usahawanid', $insentif->id_pengguna)->first();
                            $aliran = Aliran::where('id_pengguna', $user->id)
                            ->whereYear('tarikh_aliran', $insentif->tahun_terima_insentif)
                            ->sum('jumlah_aliran');
                            $insentif->aliran = $aliran;
                            $this->newreport(1,$insentif,$insentif->id_pengguna);
                        }
                    }
                }
                return "Laporan Berjaya Dijana";
            }
            
        }

        if($request->type == 2){
            Report::where('tab20', Auth::user()->id)->where('type', 2)->delete();
            $insentifs = Insentif::all();
            if($insentifs->count()==0){
                return "Tiada Data Insentif Dijumpai";
            }else{
                foreach ($insentifs as $insentif) {
                    $user = User::where('usahawanid', $insentif->id_pengguna)->first();
                    $usahawan = Usahawan::where('usahawanid', $insentif->id_pengguna)->first();
                    $insentif->negeri = $usahawan->U_Negeri_ID;
                    $insentif->daerah = $usahawan->U_Daerah_ID;
                    // $insentif->dun = $usahawan->U_Dun_ID;
                    $reports = Report::where('tab20', Auth::user()->id)->where('type', 2)->get();
                    if($reports->count()==0){
                        // $user = User::where('usahawanid', $insentif->id_pengguna)->first();
                        $aliran = Aliran::where('id_pengguna', $user->id)
                        ->whereYear('tarikh_aliran', $insentif->tahun_terima_insentif)
                        ->sum('jumlah_aliran');
                        $insentif->aliran = $aliran;
                        $this->newreport(2,$insentif,$insentif->id);
                    }else{
                        $update = false;
                        foreach ($reports as $report) {
                            if ($report->tab3 == $insentif->tahun_terima_insentif && $report->tab2 == $insentif->id_jenis_insentif && $report->tab1 == $insentif->negeri && $report->tab8 == $insentif->daerah) {
                                $report->tab4 = $report->tab4 + 1;
                                $report->tab5 = $report->tab5 + $insentif->nilai_insentif;
                                // $user = User::where('usahawanid', $insentif->id_pengguna)->first();
                                $aliran = Aliran::where('id_pengguna', $user->id)
                                ->whereYear('tarikh_aliran', $insentif->tahun_terima_insentif)
                                ->sum('jumlah_aliran');
                                $report->tab6 = $report->tab6 + $aliran;
                                $report->save();
                                $update = true;
                            }
                        }
                        if($update == false){
                            // $user = User::where('usahawanid', $insentif->id_pengguna)->first();
                            $aliran = Aliran::where('id_pengguna', $user->id)
                            ->whereYear('tarikh_aliran', $insentif->tahun_terima_insentif)
                            ->sum('jumlah_aliran');
                            $insentif->aliran = $aliran;
                            $this->newreport(2,$insentif,"1");
                        }
                    }
                }
                return "Laporan Berjaya Dijana";
            }
        }

        if($request->type == 3){
            Report::where('tab20', Auth::user()->id)->where('type', 3)->delete();
            $insentifs = Insentif::all();
            if($insentifs->count()==0){
                return "Tiada Data Insentif Dijumpai";
            }else{
                foreach ($insentifs as $insentif) {
                    $user = User::where('usahawanid', $insentif->id_pengguna)->first();
                    $usahawan = Usahawan::where('usahawanid', $user->usahawanid)->first();
                    $insentif->negeri = $usahawan->U_Negeri_ID;
                    $insentif->daerah = $usahawan->U_Daerah_ID;
                    $insentif->dun = $usahawan->U_Dun_ID;
                    $reports = Report::where('tab20', Auth::user()->id)->where('type', 3)->get();
                    if($reports->count()==0){
                        // $user = User::where('usahawanid', $insentif->id_pengguna)->first();
                        $aliran = Aliran::where('id_pengguna', $user->id)
                        ->whereYear('tarikh_aliran', $insentif->tahun_terima_insentif)
                        ->sum('jumlah_aliran');
                        $insentif->aliran = $aliran;
                        $this->newreport(3,$insentif,$insentif->id);
                    }else{
                        $update = false;
                        foreach ($reports as $report) {
                            if ($report->tab3 == $insentif->tahun_terima_insentif && $report->tab2 == $insentif->id_jenis_insentif && $report->tab1 == $insentif->negeri && $report->tab8 == $insentif->daerah && $report->tab9 == $insentif->dun) {
                                $report->tab4 = $report->tab4 + 1;
                                $report->tab5 = $report->tab5 + $insentif->nilai_insentif;
                                // $user = User::where('usahawanid', $insentif->id_pengguna)->first();
                                $aliran = Aliran::where('id_pengguna', $user->id)
                                ->whereYear('tarikh_aliran', $insentif->tahun_terima_insentif)
                                ->sum('jumlah_aliran');
                                $report->tab6 = $report->tab6 + $aliran;
                                $report->save();
                                $update = true;
                                break;
                            }
                        }
                        if($update == false){
                            // $user = User::where('usahawanid', $insentif->id_pengguna)->first();
                            $aliran = Aliran::where('id_pengguna', $user->id)
                            ->whereYear('tarikh_aliran', $insentif->tahun_terima_insentif)
                            ->sum('jumlah_aliran');
                            $insentif->aliran = $aliran;
                            $this->newreport(3,$insentif,$insentif->id);
                        }
                    }
                }
                return "Laporan Berjaya Dijana";
            }
        }
        
        if($request->type == 4){
            Report::where('tab20', Auth::user()->id)->where('type', 4)->delete();
            $insentifs = Insentif::all();
            if($insentifs->count()==0){
                return "Tiada Data Insentif Dijumpai";
            }else{
                foreach ($insentifs as $insentif) {
                    $user = User::where('usahawanid', $insentif->id_pengguna)->first();
                    $usahawan = Usahawan::where('usahawanid', $user->id_pengguna)->first();
                    $perniagaans = Perniagaan::where('usahawanid', $user->usahawanid)->first();
                    if(isset($perniagaans)){
                        $insentif->negeri = $perniagaans->U_Negeri_ID;
                        $insentif->jenis = $perniagaans->jenisperniagaan;

                        $reports = Report::where('tab20', Auth::user()->id)->where('type', 4)->get();
                    
                        if($reports->count()==0){
                            $this->newreport(4,$insentif,$insentif->jenis);

                        }else{
                            $update = false;
                            foreach ($reports as $report) {
                                if ($report->tab3 == $insentif->tahun_terima_insentif && $report->tab2 == $insentif->id_jenis_insentif && $report->tab1 == $insentif->negeri ) {
                                    if($insentif->jenis == "A"){
                                        $report->tab4 = $report->tab4 + 1;
                                    }
                                    if($insentif->jenis == "B"){
                                        $report->tab5 = $report->tab5 + 1;
                                    }
                                    if($insentif->jenis == "C"){
                                        $report->tab6 = $report->tab6 + 1;
                                    }
                                    if($insentif->jenis == "D"){
                                        $report->tab7 = $report->tab7 + 1;
                                    }
                                    if($insentif->jenis == "E"){
                                        $report->tab8 = $report->tab8 + 1;
                                    }
                                    $report->save();
                                    $update = true;
                                    break;
                                }
                            }
                            if($update == false){
                                $this->newreport(4,$insentif,$insentif->jenis);
                            }
                        }
                    }                
                }
                return "Laporan Berjaya Dijana";
            }
        }

        if($request->type == 5){
            Report::where('tab20', Auth::user()->id)->where('type', 5)->delete();
            $insentifs = Insentif::all();
            if($insentifs->count()==0){
                return "Tiada Data Insentif Dijumpai";
            }else{
                foreach ($insentifs as $insentif) {
                    $user = User::where('usahawanid', $insentif->id_pengguna)->first();
                    $perniagaans = Perniagaan::where('usahawanid', $user->usahawanid)->first();

                    if(isset($perniagaans)){
                        $insentif->negeri = $perniagaans->U_Negeri_ID;
                        $insentif->jenis = $perniagaans->jenisperniagaan;

                        $reports = Report::where('tab20', Auth::user()->id)->where('type', 5)->get();

                        if($reports->count()==0){
                            $this->newreport(5,$insentif,$insentif->jenis);

                        }else{
                            $update = false;
                            foreach ($reports as $report) {
                                if ($report->tab3 == $insentif->tahun_terima_insentif && $report->tab2 == $insentif->id_jenis_insentif && $report->tab1 == $insentif->negeri ) {
                                    if($insentif->jenis == "A"){
                                        $report->tab4 = $report->tab4 + 1;
                                        $report->tab5 = $report->tab5 + $insentif->nilai_insentif;
                                    }
                                    if($insentif->jenis == "B"){
                                        $report->tab6 = $report->tab6 + 1;
                                        $report->tab7 = $report->tab7 + $insentif->nilai_insentif;
                                    }
                                    if($insentif->jenis == "C"){
                                        $report->tab8 = $report->tab8 + 1;
                                        $report->tab9 = $report->tab9 + $insentif->nilai_insentif;
                                    }
                                    if($insentif->jenis == "D"){
                                        $report->tab10 = $report->tab10 + 1;
                                        $report->tab11 = $report->tab11 + $insentif->nilai_insentif;
                                    }
                                    if($insentif->jenis == "E"){
                                        $report->tab12 = $report->tab12 + 1;
                                        $report->tab13 = $report->tab13 + $insentif->nilai_insentif;
                                    }
                                    $report->save();
                                    $update = true;
                                    break;
                                }
                            }
                            if($update == false){
                                $this->newreport(5,$insentif,$insentif->jenis);
                            }
                        }
                    }
                }
                return "Laporan Berjaya Dijana";
            }
        }

        if($request->type == 6){
            Report::where('tab20', Auth::user()->id)->where('type', 6)->delete();
            $insentifs = Insentif::all();
            if($insentifs->count()==0){
                return "Tiada Data Insentif Dijumpai";
            }else{
                foreach ($insentifs as $insentif) {
                    $user = User::where('usahawanid', $insentif->id_pengguna)->first();
                    $usahawan = Usahawan::where('usahawanid', $insentif->id_pengguna)->first();

                    $dateOfBirth = $usahawan->tarikhlahir;
                    $today = date("Y-m-d");
                    $diff = date_diff(date_create($dateOfBirth), date_create($today));
                    $insentif->umur = $diff->format('%y');
                    if($insentif->umur <= 20){
                        $insentif->umurgrp = 1;
                    }else if($insentif->umur >= 21 && $insentif->umur <= 30){
                        $insentif->umurgrp = 2;
                    }else if($insentif->umur >= 31 && $insentif->umur <= 40){
                        $insentif->umurgrp = 3;
                    }else if($insentif->umur >= 41 && $insentif->umur <= 50){
                        $insentif->umurgrp = 4;
                    }else if($insentif->umur >= 51 && $insentif->umur <= 60){
                        $insentif->umurgrp = 5;
                    }else if($insentif->umur >= 61 && $insentif->umur <= 70){
                        $insentif->umurgrp = 6;
                    }else if($insentif->umur >= 71){
                        $insentif->umurgrp = 7;
                    }else{
                        $insentif->umurgrp = 8;
                    }

                    $insentif->jantina = $usahawan->U_Jantina_ID;
                    $reports = Report::where('tab20', Auth::user()->id)->where('type', 6)->get();
                    if($reports->count()==0){
                        $this->newreport(6,$insentif,$insentif->id);
                    }else{
                        $update = false;
                        foreach ($reports as $report) {
                            if ($report->tab3 == $insentif->tahun_terima_insentif && $report->tab2 == $insentif->id_jenis_insentif && $report->tab8 == $insentif->umurgrp) {
                                if($insentif->jantina == 1){
                                    $report->tab4 = $report->tab4 + 1;
                                }else if($insentif->jantina == 2){
                                    $report->tab5 = $report->tab5 + 1;
                                }else{
                                    $report->tab6 = $report->tab6 + 1;
                                }
                                $report->save();
                                $update = true;
                                break;
                            }
                        }
                        if($update == false){
                            $this->newreport(6,$insentif,"1");
                        }
                    }
                }
                return "Laporan Berjaya Dijana";
            }
        }

        if($request->type == 7){
            Report::where('tab20', Auth::user()->id)->where('type', 7)->delete();
            $insentifuser = Insentif::select('id_pengguna')->distinct()->get();
            //return json_encode($insentifuser);
            if($insentifuser->count()==0){
                return "Tiada Data Insentif Dijumpai";
            }else{
                foreach ($insentifuser as $insentifusers) {
                    $insentifs = Insentif::where('id_pengguna',$insentifusers->id_pengguna)->get();
                    //return json_encode($insentifs);
                    
                    if($insentifs->count()==0){
                        return "Tiada Data Insentif Dijumpai";
                    }else{
                        foreach ($insentifs as $insentif) {
                            $user = User::where('usahawanid', $insentif->id_pengguna)->first();
                            $usahawan = Usahawan::where('usahawanid', $insentif->id_pengguna)->first();
                            $insentif->negeri = $usahawan->U_Negeri_ID;
                            $insentif->usahawan = $user->id;

                            $reports = Report::where('tab20', Auth::user()->id)->where('type', 7)->get();
                            if($reports->count()==0){
                                $this->newreport(7,$insentif,$insentif->id);
                            }else{
                                $update = false;
                                foreach ($reports as $report) {
                                    if($report->tab7 == $insentif->usahawan){
                                        if ($report->tab2 == $insentif->tahun_terima_insentif && $report->tab1 == $insentif->negeri) {
                                            $update = true;
                                        }
                                    }else{
                                        if ($report->tab2 == $insentif->tahun_terima_insentif && $report->tab1 == $insentif->negeri) {
                                            
                                            $report->tab7 = $insentif->usahawan;

                                            $lawatan = Lawatan::where('id_pengguna', $insentif->usahawan)
                                            ->where('status_lawatan', 4)
                                            ->whereYear('tarikh_lawatan', $insentif->tahun_terima_insentif)
                                            ->first();

                                            // $lawatan->tarikh_lawatan->format('m');
                                            $month = date('m');
                                            // if($report->tab7 != $insentif->usahawan){
                                                $report->tab3 = $report->tab3 + 1;
                                                if($lawatan==null){
                                                    $report->tab6 = $report->tab6 + 1;
                                                }else{
                                                    $lwtnmonth = date("m",strtotime($lawatan->tarikh_lawatan));
                                                    if($lwtnmonth == $month){
                                                        $report->tab4 = $report->tab4 + 1;
                                                    }
                                                    $report->tab5 = $report->tab5 + 1;
                                                }
                                            // } 
                                            
                                            $report->save();
                                            $update = true;
                                            break;
                                        }
                                    }
                                }
                                if($update == false){
                                    $this->newreport(7,$insentif,"1");
                                }
                            }
                        }
                        //return json_encode($insentifs);
                    }
                }
                return "Laporan Berjaya Dijana";
            }
        }

        if($request->type == 8){
            Report::where('tab20', Auth::user()->id)->where('type', 8)->delete();
            $insentifuser = Insentif::select('id_pengguna')->distinct()->get();
            //return json_encode($insentifuser);
            if($insentifuser->count()==0){
                return "Tiada Data Insentif Dijumpai";
            }else{
                foreach ($insentifuser as $insentifusers) {
                    $insentifs = Insentif::where('id_pengguna',$insentifusers->id_pengguna)->get();
                    //return json_encode($insentifs);
                    
                    if($insentifs->count()==0){
                        return "Tiada Data Insentif Dijumpai";
                    }else{
                        foreach ($insentifs as $insentif) {
                            $user = User::where('usahawanid', $insentif->id_pengguna)->first();
                            $usahawan = Usahawan::where('usahawanid', $insentif->id_pengguna)->first();
                            $insentif->negeri = $usahawan->U_Negeri_ID;
                            $insentif->daerah = $usahawan->U_Daerah_ID;
                            $insentif->usahawan = $user->id;

                            $reports = Report::where('tab20', Auth::user()->id)->where('type', 8)->get();
                            if($reports->count()==0){
                                $this->newreport(8,$insentif,$insentif->id);
                            }else{
                                $update = false;
                                foreach ($reports as $report) {
                                    if($report->tab8 == $insentif->usahawan){
                                        if ($report->tab3 == $insentif->tahun_terima_insentif && $report->tab2 == $insentif->daerah && $report->tab1 == $insentif->negeri) {
                                            $update = true;
                                        }
                                    }else{
                                        if ($report->tab3 == $insentif->tahun_terima_insentif && $report->tab2 == $insentif->daerah && $report->tab1 == $insentif->negeri) {
                                            $report->tab8 = $insentif->usahawan;

                                            $lawatan = Lawatan::where('id_pengguna', $insentif->usahawan)
                                            ->where('status_lawatan', 4)
                                            ->whereYear('tarikh_lawatan', $insentif->tahun_terima_insentif)
                                            ->first();

                                            $month = date('m');
                                            $report->tab4 = $report->tab4 + 1;
                                            if($lawatan==null){
                                                $report->tab7 = $report->tab7 + 1;
                                            }else{
                                                $lwtnmonth = date("m",strtotime($lawatan->tarikh_lawatan));
                                                if($lwtnmonth == $month){
                                                    $report->tab5 = $report->tab5 + 1;
                                                }
                                                $report->tab6 = $report->tab6 + 1;
                                            }
                                            
                                            $report->save();
                                            $update = true;
                                            break;
                                        }
                                    }
                                }
                                if($update == false){
                                    $this->newreport(8,$insentif,"1");
                                }
                            }
                        }
                    }
                }
                return "Laporan Berjaya Dijana";
            }
        }

        if($request->type == 9){
            Report::where('tab20', Auth::user()->id)->where('type', 9)->delete();
            $lawatansUniqs = Lawatan::select('id_pengguna')->distinct()->get();
            if($lawatansUniqs->count()==0){
                return "Tiada Data Insentif Dijumpai";
            }else{
                foreach ($lawatansUniqs as $lawatansUniq) {
                    $lawatan = Lawatan::where('id_pengguna',$lawatansUniq->id_pengguna)->first();
                    $user = User::where('id', $lawatan->id_pengguna)->first();
                    $usahawan = Usahawan::where('usahawanid', $user->usahawanid)->first();
                    $lawatan->negeri = $usahawan->U_Negeri_ID;
                    $lawatan->year = date("Y",strtotime($lawatan->tarikh_lawatan));
                    $lawatan->daerah = $usahawan->U_Daerah_ID;
                    $reports = Report::where('tab20', Auth::user()->id)->where('type', 9)->get();
                    if($reports->count()==0){
                        $this->newreport(9,$lawatan,$lawatan->id);
                    }else{
                        $update = false;
                        foreach ($reports as $report) {
                            if($report->tab1 == $lawatan->negeri && $report->tab2 == $lawatan->year && $report->tab3 == $lawatan->daerah && $report->tab4 == $lawatan->id_pegawai){
                                $update = true;
                                $report->tab5 = $report->tab5 + 1;
                                if($lawatan->status_lawatan != 4){
                                    $report->tab8 = $report->tab8 + 1;
                                }else{
                                    $month = date('m');
                                    $lwtnmonth = date("m",strtotime($request->tarikh_lawatan));
                                    if($lwtnmonth == $month){
                                        $report->tab6 = $report->tab6 + 1;
                                    }
                                    $report->tab7 = $report->tab7 + 1;
                                }
                                $report->save();
                            }

                        }
                        if($update == false){
                            $this->newreport(9,$lawatan,$lawatan->id);
                        }
                    }
                    
                }
            }
            return "Laporan Berjaya Dijana";
        }

        if($request->type == 11){
            Report::where('tab20', Auth::user()->id)->where('type', 11)->delete();
            $alirans = Aliran::where('id_pengguna',$request->id)->get();
            if($alirans->count()==0){
                return "Tiada Data Aliran Dijumpai";
            }else{
                $report = new Report();
                $report->type = 11;
                $report->tab1 = 1000;
                $report->tab2 = 1000;
                $report->tab8 = 2;
                $report->tab20 = Auth::user()->id;
                $report->save();
                $report = new Report();
                $report->type = 11;
                $report->tab1 = 1000;
                $report->tab2 = 1000;
                $report->tab8 = 3;
                $report->tab20 = Auth::user()->id;
                $report->save();
                foreach ($alirans as $aliran) {
                    $aliran->newdate = date("d-m-Y", strtotime($aliran->tarikh_aliran));
                    $aliran->bulan = date('m', strtotime($aliran->tarikh_aliran));
                    $aliran->tahun = date('Y', strtotime($aliran->tarikh_aliran));
                    $reports = Report::where('tab20', Auth::user()->id)->where('type', 11)->get();
                    if($reports->count()==0){
                        $this->newreport(11,$aliran,$aliran->id);
                    }else{
                        $this->newreport(11,$aliran,$aliran->id);
                    }
                }
                return "Laporan Berjaya Dijana";
            }
        }

        if($request->type == 12){
            Report::where('tab20', Auth::user()->id)->where('type', 12)->delete();
            $alirans = Aliran::where('id_pengguna',$request->id)->get();
            if($alirans->count()==0){
                return "Tiada Data Aliran Dijumpai";
            }else{
                foreach ($alirans as $aliran) {
                    $aliran->bulan = date('m', strtotime($aliran->tarikh_aliran));
                    $aliran->tahun = date('Y', strtotime($aliran->tarikh_aliran));
                    $reports = Report::where('tab20', Auth::user()->id)->where('type', 12)->get();
                    if($reports->count()==0){
                        $this->newreport(12,$aliran,$aliran->id);
                    }else{
                        $this->newreport(12,$aliran,$aliran->id);
                    }
                }
                return "Laporan Berjaya Dijana";
            }
        }

        if($request->type == 13){
            Report::where('tab20', Auth::user()->id)->where('type', 13)->delete();
            $alirans = Aliran::all();
            if($alirans->count()==0){
                return "Tiada Data Aliran Dijumpai";
            }else{
                foreach ($alirans as $aliran) {
                    $aliran->bulan = date('m', strtotime($aliran->tarikh_aliran));
                    $aliran->tahun = date('Y', strtotime($aliran->tarikh_aliran));
                    $reports = Report::where('tab20', Auth::user()->id)->where('type', 13)->get();
                    if($aliran->id_kategori_aliran == 1 || ($aliran->id_kategori_aliran == 2) || ($aliran->id_kategori_aliran == 11)){
                        $aliran->jeniskatealiran = 1;
                    }else if($aliran->id_kategori_aliran == 3 || ($aliran->id_kategori_aliran == 4) || ($aliran->id_kategori_aliran == 9) || ($aliran->id_kategori_aliran == 10) || ($aliran->id_kategori_aliran == 12)){
                        $aliran->jeniskatealiran = 2;
                    }else if($aliran->id_kategori_aliran == 13 || ($aliran->id_kategori_aliran == 14) || ($aliran->id_kategori_aliran == 15) || ($aliran->id_kategori_aliran == 16) || ($aliran->id_kategori_aliran == 17) || ($aliran->id_kategori_aliran == 18) || ($aliran->id_kategori_aliran == 19) || ($aliran->id_kategori_aliran == 20) || ($aliran->id_kategori_aliran == 21) || ($aliran->id_kategori_aliran == 22) || ($aliran->id_kategori_aliran == 23) || ($aliran->id_kategori_aliran == 24) || ($aliran->id_kategori_aliran == 25) || ($aliran->id_kategori_aliran == 26)){
                        $aliran->jeniskatealiran = 3;
                    }else if($aliran->id_kategori_aliran == 5 || ($aliran->id_kategori_aliran == 6) || ($aliran->id_kategori_aliran == 7) || ($aliran->id_kategori_aliran == 8)){
                        $aliran->jeniskatealiran = 4;
                    }

                    if($reports->count()==0){
                        $this->newreport(13,$aliran,$aliran->id);
                    }else{
                        $update = false;
                        foreach ($reports as $report) {
                            if($aliran->jeniskatealiran == $report->tab3 && ($aliran->tahun == $report->tab1) && ($aliran->bulan == $report->tab2)){
                                $update = true;
                                if($aliran->jeniskatealiran == 1){
                                    if($aliran->id_kategori_aliran == 11){
                                        $report->tab4 = $report->tab4 - $aliran->jumlah_aliran;
                                        $report->save();
                                    }else{
                                        $report->tab4 = $report->tab4 + $aliran->jumlah_aliran;
                                        $report->save();
                                    }

                                }else if($aliran->jeniskatealiran == 2){
                                    if($aliran->id_kategori_aliran == 3 || ($aliran->id_kategori_aliran == 4)){
                                        $report->tab4 = $report->tab4 + $aliran->jumlah_aliran;
                                        $report->save();
                                    }else{
                                        $report->tab4 = $report->tab4 - $aliran->jumlah_aliran;
                                        $report->save();
                                    }

                                }else if($aliran->jeniskatealiran == 3){
                                    $report->tab4 = $report->tab4 + $aliran->jumlah_aliran;
                                    $report->save();

                                }else if($aliran->jeniskatealiran == 4){
                                    $report->tab4 = $report->tab4 + $aliran->jumlah_aliran;
                                    $report->save();
                                }
                            }
                        }
                        if($update == false){
                            $this->newreport(13,$aliran,"1");
                        }
                    }
                }
            }
            return "Laporan Berjaya Dijana";
        }

        if($request->type == 14){
            Report::where('tab20', Auth::user()->id)->where('type', 14)->delete();
            $alirans = Aliran::where('id_pengguna',$request->id)->get();
            if($alirans->count()==0){
                return "Tiada Data Aliran Dijumpai";
            }else{
                foreach ($alirans as $aliran) {
                    $aliran->bulan = date('m', strtotime($aliran->tarikh_aliran));
                    $aliran->tahun = date('Y', strtotime($aliran->tarikh_aliran));
                    
                    $reports = Report::where('tab20', Auth::user()->id)->where('type', 14)->get();
                    if($reports->count()==0){
                        $this->newreport(14,$aliran,$aliran->id);
                    }else{
                        $update = false;
                        foreach ($reports as $report) {
                            if($aliran->bulan == $report->tab1 && ($aliran->tahun == $report->tab2) && ($aliran->id_kategori_aliran == $report->tab3)){
                                $update = true;
                                $report->tab5 = $report->tab5 + $aliran->jumlah_aliran;
                                $report->save();
                            }
                        }
                        if($update == false){
                            $this->newreport(14,$aliran,"1");
                        }
                    }
                }
            }
            return "Laporan Berjaya Dijana";
        }
    }

    public function newreport($type, $request, $others)
    {
        if($type == 1){
            $report = new Report();
            $report->type = 1;
            $report->tab1 = $request->negeri;
            $report->tab2 = $request->id_jenis_insentif;
            $report->tab3 = $request->tahun_terima_insentif;
            $report->tab4 = 1;
            $report->tab5 = $request->nilai_insentif;
            $report->tab6 = $request->aliran;
            $report->tab10 = $others;
            $report->tab20 = Auth::user()->id;
            $report->save();

        }else if($type == 2){
            $report = new Report();
            $report->type = 2;
            $report->tab1 = $request->negeri;
            $report->tab2 = $request->id_jenis_insentif;
            $report->tab3 = $request->tahun_terima_insentif;
            $report->tab4 = 1;
            $report->tab5 = $request->nilai_insentif;
            $report->tab6 = $request->aliran;
            $report->tab8 = $request->daerah;
            $report->tab10 = $others;
            $report->tab20 = Auth::user()->id;
            $report->save();

        }else if($type == 3){
            $report = new Report();
            $report->type = 3;
            $report->tab1 = $request->negeri;
            $report->tab2 = $request->id_jenis_insentif;
            $report->tab3 = $request->tahun_terima_insentif;
            $report->tab4 = 1;
            $report->tab5 = $request->nilai_insentif;
            $report->tab6 = $request->aliran;
            $report->tab8 = $request->daerah;
            $report->tab9 = $request->dun;
            $report->tab10 = $others;
            $report->tab20 = Auth::user()->id;
            $report->save();

        }else if($type == 4){
            $report = new Report();
            $report->type = 4;
            $report->tab1 = $request->negeri;
            $report->tab2 = $request->id_jenis_insentif;
            $report->tab3 = $request->tahun_terima_insentif;
            if($others == "A"){
                $report->tab4 = 1;
            }
            if($others == "B"){
                $report->tab5 = 1;
            }
            if($others == "C"){
                $report->tab6 = 1;
            }
            if($others == "D"){
                $report->tab7 = 1;
            }
            if($others == "E"){
                $report->tab8 = 1;
            }
            $report->tab10 = $others;
            $report->tab20 = Auth::user()->id;
            $report->save();

        }else if($type == 5){
            $report = new Report();
            $report->type = 5;
            $report->tab1 = $request->negeri;
            $report->tab2 = $request->id_jenis_insentif;
            $report->tab3 = $request->tahun_terima_insentif;
            if($others == "A"){
                $report->tab4 = 1;
                $report->tab5 = $request->nilai_insentif;
            }
            if($others == "B"){
                $report->tab6 = 1;
                $report->tab7 = $request->nilai_insentif;
            }
            if($others == "C"){
                $report->tab8 = 1;
                $report->tab9 = $request->nilai_insentif; 
            }
            if($others == "D"){
                $report->tab10 = 1;
                $report->tab11 = $request->nilai_insentif;
            }
            if($others == "E"){
                $report->tab12 = 1;
                $report->tab13 = $request->nilai_insentif;
            }
            $report->tab20 = Auth::user()->id;
            $report->save();
        }else if($type == 6){
            $report = new Report();
            $report->type = 6;
            if($request->umur <= 20){
                $umur = "Bawah 20";
                $umurgrp = 1;
            }else if($request->umur >= 21 && $request->umur <= 30){
                $umur = "21-30";
                $umurgrp = 2;
            }else if($request->umur >= 31 && $request->umur <= 40){
                $umur = "31-40";
                $umurgrp = 3;
            }else if($request->umur >= 41 && $request->umur <= 50){
                $umur = "41-50";
                $umurgrp = 4;
            }else if($request->umur >= 51 && $request->umur <= 60){
                $umur = "51-60";
                $umurgrp = 5;
            }else if($request->umur >= 61 && $request->umur <= 70){
                $umur = "61-70";
                $umurgrp = 6;
            }else if($request->umur >= 71){
                $umur = "71 ke atas";
                $umurgrp = 7;
            }else{
                $umur = "Tidak diketahui umur*";
                $umurgrp = 8;
            }
            $report->tab1 = $umur;
            $report->tab2 = $request->id_jenis_insentif;
            $report->tab3 = $request->tahun_terima_insentif;
            
            if($request->jantina == 1){
                $report->tab4 = 1;
                $report->tab5 = 0;
                $report->tab6 = 0;
            }else if($request->jantina == 2){
                $report->tab4 = 0;
                $report->tab5 = 1;
                $report->tab6 = 0;
            }else{
                $report->tab4 = 0;
                $report->tab5 = 0;
                $report->tab6 = 1;
            }
            $report->tab7 = $request->umur;
            $report->tab8 = $umurgrp;
            $report->tab20 = Auth::user()->id;
            $report->save();
        }else if($type == 7){
            $report = new Report();
            $report->type = 7;
            $report->tab1 = $request->negeri;
            $report->tab2 = $request->tahun_terima_insentif;
            $report->tab3 = 1;
            $lawatan = Lawatan::where('id_pengguna', $request->usahawan)
                ->where('status_lawatan', 4)
                ->whereYear('tarikh_lawatan', $request->tahun_terima_insentif)
                ->first();

                $month = date('m');
                if($lawatan==null){
                    $report->tab6 = 1;
                }else{
                    $lwtnmonth = date("m",strtotime($lawatan->tarikh_lawatan));
                    if($lwtnmonth == $month){
                        $report->tab4 = 1;
                    }
                    $report->tab5 = 1;
                }
            $report->tab7 = $request->usahawan;
            $report->tab20 = Auth::user()->id;
            $report->save();
        }else if($type == 8){
            $report = new Report();
            $report->type = 8;
            $report->tab1 = $request->negeri;
            $report->tab2 = $request->daerah;
            $report->tab3 = $request->tahun_terima_insentif;
            $report->tab4 = 1;

            $lawatan = Lawatan::where('id_pengguna', $request->usahawan)
                ->where('status_lawatan', 4)
                ->whereYear('tarikh_lawatan', $request->tahun_terima_insentif)
                ->first();

                $month = date('m');
                if($lawatan==null){
                    $report->tab7 = 1;
                }else{
                    $lwtnmonth = date("m",strtotime($lawatan->tarikh_lawatan));
                    if($lwtnmonth == $month){
                        $report->tab5 = 1;
                    }
                    $report->tab6 = 1;
                }
            $report->tab8 = $request->usahawan;
            $report->tab20 = Auth::user()->id;
            $report->save();
        }else if($type == 9){
            $report = new Report();
            $report->type = 9;
            $report->tab1 = $request->negeri;
            $report->tab2 = $request->year;
            $report->tab3 = $request->daerah;
            $report->tab4 = $request->id_pegawai;
            $report->tab5 = 1;
            if($request->status_lawatan != 4){
                $report->tab8 = 1;
            }else{
                $month = date('m');
                $lwtnmonth = date("m",strtotime($request->tarikh_lawatan));
                if($lwtnmonth == $month){
                    $report->tab6 = 1;
                }
                $report->tab7 = 1;
            }
            $report->tab20 = Auth::user()->id;
            $report->save();
        }else if($type == 11){
            $report = new Report();
            $report->type = 11;
            $report->tab1 = $request->bulan;
            $report->tab2 = $request->tahun;
            $report->tab3 = $request->newdate;
            $report->tab4 = $request->id_kategori_aliran;
            $report->tab5 = $request->keterangan_aliran;

            // $kate_aliran = $request->id_kategori_aliran;
            $kate_aliran = KategoriAliran::where('id', $request->id_kategori_aliran)->first();
            if($kate_aliran->jenis_aliran == "tunai_masuk"){
                $report->tab6 = $request->jumlah_aliran;

            }else if($kate_aliran->jenis_aliran == "tunai_keluar"){
                $report->tab7 = $request->jumlah_aliran;
            }

            $report->tab8 = $kate_aliran->bahagian;
            $report->tab20 = Auth::user()->id;
            $report->save();

        }else if($type == 12){
            $report = new Report();
            $report->type = 12;
            $report->tab1 = $request->bulan;
            $report->tab2 = $request->tahun;
            $report->tab3 = $request->id_kategori_aliran;
            
            $kate_aliran = KategoriAliran::where('id', $request->id_kategori_aliran)->first();
            if($kate_aliran->jenis_aliran == "tunai_masuk"){
                $report->tab4 = 2;

            }else if($kate_aliran->jenis_aliran == "tunai_keluar"){
                $report->tab4 = 1;

            }
            $report->tab5 = $request->tarikh_aliran;
            $report->tab6 = $kate_aliran->nama_kategori_aliran;
            $report->tab7 = $request->jumlah_aliran;
            $report->tab20 = Auth::user()->id;
            $report->save();

            $report = new Report();
            $report->type = 12;
            $report->tab1 = $request->bulan;
            $report->tab2 = $request->tahun;
            $report->tab3 = 0;
            if($kate_aliran->jenis_aliran == "tunai_masuk"){
                $report->tab4 = 2;
            }else if($kate_aliran->jenis_aliran == "tunai_keluar"){
                $report->tab4 = 1;
            }
            $report->tab5 = $request->tarikh_aliran;
            $report->tab6 = $kate_aliran->nama_kategori_aliran;
            $report->tab7 = $request->jumlah_aliran;
            $report->tab20 = Auth::user()->id;
            $report->save();


        }else if($type == 13){
            $report = new Report();
            $report->type = 13;
            $report->tab1 = $request->tahun;
            $report->tab2 = $request->bulan;
            $report->tab3 = $request->jeniskatealiran;
            $report->tab4 = $request->jumlah_aliran;
            $report->tab20 = Auth::user()->id;
            $report->save();

        }else if($type == 14){
            $report = new Report();
            $report->type = 14;
            $report->tab1 = $request->bulan;
            $report->tab2 = $request->tahun;
            $report->tab3 = $request->id_kategori_aliran;
            $report->tab4 = $request->nama_kategori_aliran;
            $report->tab5 = $request->jumlah_aliran;
            $report->tab20 = Auth::user()->id;
            $report->save();
        }
    }

    public function ExcelLapProfil()
    {
        return Excel::download(new LapProf(), 'LaporanProfil.xlsx');
    }
}
