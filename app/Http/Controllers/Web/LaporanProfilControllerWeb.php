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

class LaporanProfilControllerWeb extends Controller
{
    public function index()
    {
        return view('laporanprofil.index'
        // ,[
        //     'users'=>$users
        // ]
        );
    }

    public function generatereport(Request $request)
    {
        // return($request->type);
        // Report::truncate();
        if($request->type == 1){
            // if(isset(Auth::user()->id)){
            //     $userid = 
            // }
            Report::where('tab20', Auth::user()->id)->where('type', 1)->delete();
            $insentifs = Insentif::all();
            if($insentifs->count()==0){
                return "Tiada Data Insentif Dijumpai";
            }else{
                foreach ($insentifs as $insentif) {
                    $user = User::where('usahawanid', $insentif->id_pengguna)->first();
                    $usahawan = Usahawan::where('id', $user->usahawanid)->first();
                    $insentif->negeri = $usahawan->U_Negeri_ID;
                    $reports = Report::where('type', 1)->get();
                    if($reports->count()==0){
                        $this->newreport(1,$insentif,$insentif->id);
                    }else{
                        $update = false;
                        foreach ($reports as $report) {
                            if ($report->tab3 == $insentif->tahun_terima_insentif && $report->tab2 == $insentif->id_jenis_insentif && $report->tab1 == $insentif->negeri) {
                                $report->tab4 = $report->tab4 + 1;
                                $report->tab5 = $report->tab5 + $insentif->nilai_insentif;
                                $report->save();
                                $update = true;
                                break;
                            }
                        }
                        if($update == false){
                            $this->newreport(1,$insentif,"1");
                        }
                    }
                }
                return "Laporan Berjaya Dijana";
            }
            
        }

        if($request->type == 2){

            $insentifs = Insentif::all();
            if($insentifs->count()==0){
                return "Tiada Data Insentif Dijumpai";
            }else{
                foreach ($insentifs as $insentif) {
                    $user = User::where('usahawanid', $insentif->id_pengguna)->first();
                    $usahawan = Usahawan::where('id', $user->usahawanid)->first();
                    $insentif->negeri = $usahawan->U_Negeri_ID;
                    $insentif->daerah = $usahawan->U_Daerah_ID;
                    // $insentif->dun = $usahawan->U_Dun_ID;
                    $reports = Report::where('type', 2)->get();
                    if($reports->count()==0){
                        $this->newreport(2,$insentif,$insentif->id);
                    }else{
                        $update = false;
                        foreach ($reports as $report) {
                            if ($report->tab3 == $insentif->tahun_terima_insentif && $report->tab2 == $insentif->id_jenis_insentif && $report->tab1 == $insentif->negeri && $report->tab8 == $insentif->daerah) {
                                $report->tab4 = $report->tab4 + 1;
                                $report->tab5 = $report->tab5 + $insentif->nilai_insentif;
                                $report->save();
                                $update = true;
                            }
                        }
                        if($update == false){
                            $this->newreport(2,$insentif,"1");
                        }
                    }
                }
                return "Laporan Berjaya Dijana";
            }
        }

        if($request->type == 3){
            $insentifs = Insentif::all();
            if($insentifs->count()==0){
                return "Tiada Data Insentif Dijumpai";
            }else{
                foreach ($insentifs as $insentif) {
                    $user = User::where('usahawanid', $insentif->id_pengguna)->first();
                    $usahawan = Usahawan::where('id', $user->usahawanid)->first();
                    $insentif->negeri = $usahawan->U_Negeri_ID;
                    $insentif->daerah = $usahawan->U_Daerah_ID;
                    $insentif->dun = $usahawan->U_Dun_ID;
                    $reports = Report::where('type', 3)->get();
                    if($reports->count()==0){
                        $this->newreport(3,$insentif,$insentif->id);
                    }else{
                        $update = false;
                        foreach ($reports as $report) {
                            if ($report->tab3 == $insentif->tahun_terima_insentif && $report->tab2 == $insentif->id_jenis_insentif && $report->tab1 == $insentif->negeri && $report->tab8 == $insentif->daerah && $report->tab9 == $insentif->dun) {
                                $report->tab4 = $report->tab4 + 1;
                                $report->tab5 = $report->tab5 + $insentif->nilai_insentif;
                                $report->save();
                                $update = true;
                                break;
                            }
                        }
                        if($update == false){
                            $this->newreport(3,$insentif,$insentif->id);
                        }
                    }
                }
                return "Laporan Berjaya Dijana";
            }
        }
        
        if($request->type == 4){
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

                        $reports = Report::where('type', 4)->get();
                    
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

                        $reports = Report::where('type', 5)->get();

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
            $insentifs = Insentif::all();
            if($insentifs->count()==0){
                return "Tiada Data Insentif Dijumpai";
            }else{
                foreach ($insentifs as $insentif) {
                    $user = User::where('usahawanid', $insentif->id_pengguna)->first();
                    $usahawan = Usahawan::where('id', $user->usahawanid)->first();
                    
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
                    $reports = Report::where('type', 6)->get();
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
                            $usahawan = Usahawan::where('id', $user->usahawanid)->first();
                            $insentif->negeri = $usahawan->U_Negeri_ID;
                            $insentif->usahawan = $user->id;

                            $reports = Report::where('type', 7)->get();
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
                                            ->where('status_lawatan', 'selesai')
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
                            $usahawan = Usahawan::where('id', $user->usahawanid)->first();
                            $insentif->negeri = $usahawan->U_Negeri_ID;
                            $insentif->daerah = $usahawan->U_Daerah_ID;
                            $insentif->usahawan = $user->id;

                            $reports = Report::where('type', 8)->get();
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
                                            ->where('status_lawatan', 'selesai')
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

        if($request->type == 11){
            $alirans = Aliran::all();
            if($alirans->count()==0){
                return "Tiada Data Insentif Dijumpai";
            }else{
                foreach ($alirans as $aliran) {
                    $aliran->bulan = date('m', strtotime($aliran->tarikh_aliran));
                    $aliran->tahun = date('y', strtotime($aliran->tarikh_aliran));
                    $reports = Report::where('type', 11)->get();
                    if($reports->count()==0){
                        $this->newreport(11,$aliran,$aliran->id);
                    }else{
                        $update = false;
                        foreach ($reports as $report) {
                            if($aliran->bulan == $report->tab1 && $aliran->tahun == $report->tab2 && $aliran->id_kategori_aliran == $report->tab4){
                                $report->tab5 = $report->tab5 ."-". $aliran->keterangan_aliran;
                                $kate_aliran = KategoriAliran::where('id', $aliran->id_kategori_aliran)->first();
                                if($kate_aliran->jenis_aliran == "tunai_masuk"){
                                    $report->tab6 = $report->tab6 + $aliran->jumlah_aliran;
                                }else if($kate_aliran->jenis_aliran == "tunai_keluar"){
                                    $report->tab7 = $report->tab7 + $aliran->jumlah_aliran;
                                }
                                $report->save();
                                $update = true;
                                break;
                            }
                        }
                        if($update == false){
                            $this->newreport(11,$aliran,$aliran->id);
                        }
                    }
                }
                return "Laporan Berjaya Dijana";
            }
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
            $report->tab8 = $request->daerah;
            $report->tab10 = $others;
            $report->save();

        }else if($type == 3){
            $report = new Report();
            $report->type = 3;
            $report->tab1 = $request->negeri;
            $report->tab2 = $request->id_jenis_insentif;
            $report->tab3 = $request->tahun_terima_insentif;
            $report->tab4 = 1;
            $report->tab5 = $request->nilai_insentif;
            $report->tab8 = $request->daerah;
            $report->tab9 = $request->dun;
            $report->tab10 = $others;
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
            $report->save();
        }else if($type == 7){
            $report = new Report();
            $report->type = 7;
            $report->tab1 = $request->negeri;
            $report->tab2 = $request->tahun_terima_insentif;
            $report->tab3 = 1;
            $lawatan = Lawatan::where('id_pengguna', $request->usahawan)
                ->where('status_lawatan', 'selesai')
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
            $report->save();
        }else if($type == 8){
            $report = new Report();
            $report->type = 8;
            $report->tab1 = $request->negeri;
            $report->tab2 = $request->daerah;
            $report->tab3 = $request->tahun_terima_insentif;
            $report->tab4 = 1;

            $lawatan = Lawatan::where('id_pengguna', $request->usahawan)
                ->where('status_lawatan', 'selesai')
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
            $report->save();
        }

        else if($type == 11){
            $check = "";
            $report = new Report();
            $report->type = 11;
            $report->tab1 = $request->bulan;
            $report->tab2 = $request->tahun;
            $report->tab3 = $request->tarikh_aliran;
            $report->tab4 = $request->id_kategori_aliran;
            $report->tab5 = "-".$request->keterangan_aliran;

            $kate_aliran = $request->id_kategori_aliran;
            $kate_aliran = KategoriAliran::where('id', $request->id_kategori_aliran)->first();
            if($kate_aliran->jenis_aliran == "tunai_masuk"){
                $report->tab6 = $request->jumlah_aliran;

            }else if($kate_aliran->jenis_aliran == "tunai_keluar"){
                $report->tab7 = $request->jumlah_aliran;
            }

            $report->tab8 = $kate_aliran->bahagian;
            $report->save();

        }
    }

}
