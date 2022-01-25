<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

use App\Models\Insentif;
use App\Models\User;
use App\Models\Usahawan;
use App\Models\Pegawai;
use App\Models\Daerah;
use App\Models\Perniagaan;
use App\Models\KategoriUsahawan;
use App\Models\Mukim;
use App\Models\JenisInsentif;
use App\Models\Negeri;
use App\Models\Pekebun;

class DashControllerWeb extends Controller
{
    public function index()
    {
        $authuser = Auth::user();
        if(!isset($authuser)){
            return redirect('/');
        }
        if(isset($authuser->idpegawai)){
            $pegawai = Pegawai::where('id', $authuser->idpegawai)->first();
        }
        if(isset($pegawai->mukim)){
            $Mukim = Mukim::where('U_Mukim_ID', $pegawai->mukim)->first();
        }
        
        $getjenisinsentif="";
        $gettahun = date("Y");
        $getNegeri="";
        $Insentifdatas = Insentif::where('tahun_terima_insentif', $gettahun)->get();
       
        $array = [];
        $array2 = [];
        $array3 = [];
        $array4 = [];
        $array5 = [];
        $array6 = [];
        foreach($Insentifdatas as $insentifdata2){
            $update = true;
            $user = User::where('usahawanid', $insentifdata2->id_pengguna)->first();
            if(isset($user)){
                if($user->usahawanid != null){
                    $usahawan = Usahawan::where('usahawanid', $user->usahawanid)->first();
                    if(isset($usahawan)){
                        if($authuser->role == 3){
                            if(isset($Mukim)){
                                if($usahawan->U_Negeri_ID != $Mukim->U_Negeri_ID){
                                    $update = false;
                                }else{

                                }
                            }
                        }
                        if($authuser->role == 4){
                            if(isset($Mukim) && isset($usahawan)){
                                if($usahawan->U_Daerah_ID != $Mukim->U_Daerah_ID){
                                    $update = false;
                                }else{

                                }
                            }
                        }
                        if($authuser->role == 7){
                            if(isset($Mukim)){
                                if($usahawan->Kod_PT != $pegawai->NamaPT){
                                    $update = false;
                                }else{

                                }
                            }
                        }
                        
                        $insentifdata2->jantina = $usahawan->U_Jantina_ID;

                        $daerah = Daerah::where('U_Daerah_ID', $usahawan->U_Daerah_ID)->first();
                        if(isset($daerah)){
                            $insentifdata2->daerah = $daerah->Daerah;
                        }

                        $perniagaans = Perniagaan::where('usahawanid', $usahawan->usahawanid)->first();
                        if(isset($perniagaans)){
                            $insentifdata2->jnsperniagaan = $perniagaans->jenisperniagaan;
                        }

                        // $pekebun = Pekebun::where('usahawanid', $usahawan->usahawanid)->first();
                        // if(isset($pekebun)){
                            $insentifdata2->status_daftar_usahawan = $usahawan->status_daftar_usahawan;
                        // }

                        $KateUsahawan = KategoriUsahawan::where('id_kategori_usahawan', $usahawan->id_kategori_usahawan)->first();
                        if(isset($KateUsahawan)){
                            $insentifdata2->kateusahawan = $KateUsahawan->nama_kategori_usahawan;
                        }
                        
                        $dateOfBirth = $usahawan->tarikhlahir;
                        $today = date("Y-m-d");
                        $diff = date_diff(date_create($dateOfBirth), date_create($today));
                        $umur = $diff->format('%y');

                        if($umur <= 20){
                            $insentifdata2->umurgrp = 1;
                        }else if($umur >= 21 && $umur <= 30){
                            $insentifdata2->umurgrp = 2;
                        }else if($umur >= 31 && $umur <= 40){
                            $insentifdata2->umurgrp = 3;
                        }else if($umur >= 41 && $umur <= 50){
                            $insentifdata2->umurgrp = 4;
                        }else if($umur >= 51 && $umur <= 60){
                            $insentifdata2->umurgrp = 5;
                        }else if($umur >= 61 && $umur <= 70){
                            $insentifdata2->umurgrp = 6;
                        }else if($umur >= 71){
                            $insentifdata2->umurgrp = 7;
                        }else{
                            $insentifdata2->umurgrp = 8;
                        }
                    }
                }
            }
            
            if($update == true){
                if(isset($insentifdata2->daerah)){
                    array_push($array, $insentifdata2->daerah);
                }
                if(isset($insentifdata2->jantina)){
                    array_push($array2, $insentifdata2->jantina);
                }   
                if(isset($insentifdata2->jnsperniagaan)){
                    array_push($array3, $insentifdata2->jnsperniagaan);
                }
                if(isset($insentifdata2->status_daftar_usahawan)){
                    array_push($array4, $insentifdata2->status_daftar_usahawan);
                }
                if(isset($insentifdata2->kateusahawan)){
                    array_push($array5, $insentifdata2->kateusahawan);
                }
                if(isset($insentifdata2->umurgrp)){
                    array_push($array6, $insentifdata2->umurgrp);
                }
            }

        }

        $array = array_unique($array);
        $array2 = array_unique($array2);
        $array3 = array_unique($array3);
        $array4 = array_unique($array4);
        $array5 = array_unique($array5);
        $array6 = array_unique($array6);
        $insentif = [];
        $countinsentif = [];
        $jantina = [];
        $jnsperniagaan = [];
        $statdafusah = [];
        $kateusahawan = [];
        $umurgrp = [];
        $total1 = 0;
        $total2 = 0;
        $total3 = 0;
        foreach($Insentifdatas as $InsentifData3){
            $update = true;
            $user = User::where('usahawanid', $InsentifData3->id_pengguna)->first();
            if(isset($user)){
                if($user->usahawanid != null){
                    $usahawan = Usahawan::where('usahawanid', $user->usahawanid)->first();
                    if($authuser->role == 3){
                        if(isset($Mukim)){
                            if($usahawan->U_Negeri_ID != $Mukim->U_Negeri_ID){
                                $update = false;
                            }else{

                            }
                        }
                    }
                    if($authuser->role == 4){
                        if(isset($Mukim) && isset($usahawan)){
                            if($usahawan->U_Daerah_ID != $Mukim->U_Daerah_ID){
                                $update = false;
                            }else{

                            }
                        }
                    }
                    if($authuser->role == 7){
                        if(isset($pegawai)){
                            if($usahawan->Kod_PT != $pegawai->NamaPT){
                                $update = false;
                            }else{

                            }
                        }
                    }
                }
            }
            if($update == true){
                foreach($array as $key => $value){
                    if($InsentifData3->daerah == $value){
                        if(isset($insentif[$key])){
                            $insentif[$key] = $insentif[$key] + $InsentifData3->nilai_insentif;
                            $countinsentif[$key] = $countinsentif[$key] + 1;
                        }else{
                            $insentif[$key] = $InsentifData3->nilai_insentif;
                            $countinsentif[$key] = 1;
                        }
                    }
                }
                foreach($array2 as $key => $value){
                    if($InsentifData3->jantina == $value){
                        if(isset($jantina[$key])){
                            $jantina[$key] = $jantina[$key] + 1;
                            $total1 = $total1 + 1 ;
                        }else{
                            $jantina[$key] = 1;
                            $total1 = $total1 + 1 ;
                        }
                    }
                }
                foreach($array3 as $key => $value){
                    if($InsentifData3->jnsperniagaan == $value){
                        if(isset($jnsperniagaan[$key])){
                            $jnsperniagaan[$key] = $jnsperniagaan[$key] + 1;
                            $total2 = $total2 + 1 ;
                        }else{
                            $jnsperniagaan[$key] = 1;
                            $total2 = $total2 + 1 ;
                        }
                    }
                }
                foreach($array4 as $key => $value){
                    if($InsentifData3->status_daftar_usahawan == $value){
                        if(isset($statdafusah[$key])){
                            $statdafusah[$key] = $statdafusah[$key] + 1;
                        }else{
                            $statdafusah[$key] = 1;
                        }
                    }
                }
                foreach($array5 as $key => $value){
                    if($InsentifData3->kateusahawan == $value){
                        if(isset($kateusahawan[$key])){
                            $kateusahawan[$key] = $kateusahawan[$key] + 1;
                            $total3 = $total3 + 1 ;
                        }else{
                            $kateusahawan[$key] = 1;
                            $total3 = $total3 + 1 ;
                        }
                    }
                }
                foreach($array6 as $key => $value){
                    if($InsentifData3->umurgrp == $value){
                        if(isset($umurgrp[$key])){
                            $umurgrp[$key] = $umurgrp[$key] + 1;
                            // $total3 = $total3 + 1 ;
                        }else{
                            $umurgrp[$key] = 1;
                            // $total3 = $total3 + 1 ;
                        }
                    }
                }
            }
            
        }
        
        $ddInsentif = JenisInsentif::where('status', 'aktif')->get();
        $ddNegeri = Negeri::all();
        //  dd($array4);
        return view('dash.index'
        ,[
            'daerah'=>json_encode($array,JSON_NUMERIC_CHECK),
            'insentif'=>json_encode($insentif,JSON_NUMERIC_CHECK),
            'countinsentif'=>json_encode($countinsentif,JSON_NUMERIC_CHECK),
            'jantina'=>json_encode($array2,JSON_NUMERIC_CHECK),
            'jantinanum'=>json_encode($jantina,JSON_NUMERIC_CHECK),
            'jantinas'=>$array2,
            'jantinanums'=>$jantina,
            'total1'=>$total1,
            'jnsperniagaan'=>json_encode($array3,JSON_NUMERIC_CHECK),
            'jnsperniagaannum'=>json_encode($jnsperniagaan,JSON_NUMERIC_CHECK),

            'statdafusah'=>json_encode($array4,JSON_NUMERIC_CHECK),
            'statdafusahnum'=>json_encode($statdafusah,JSON_NUMERIC_CHECK),
            'statdafusahs'=>$array4,
            'statdafusahnums'=>$statdafusah,
            'total2'=>$total2,

            'kateusahawan'=>json_encode($array5,JSON_NUMERIC_CHECK),
            'kateusahawannum'=>json_encode($kateusahawan,JSON_NUMERIC_CHECK),
            'kateusahawans'=>$array5,
            'kateusahawannums'=>$kateusahawan,
            'total3'=>$total3,

            'umurgrp'=>json_encode($array6,JSON_NUMERIC_CHECK),
            'umurgrpnum'=>json_encode($umurgrp,JSON_NUMERIC_CHECK),

            'ddInsentif'=>$ddInsentif,
            'ddNegeri'=>$ddNegeri,

            'gettahun'=>$gettahun,
            'getjenisinsentif'=>$getjenisinsentif,
            'getNegeri'=>$getNegeri
        ]
        );
    }

    public function show(Request $request)
    {
        $authuser = Auth::user();
        if(isset($authuser->idpegawai)){
            $pegawai = Pegawai::where('id', $authuser->idpegawai)->first();
        }
        if(isset($pegawai->mukim)){
            $Mukim = Mukim::where('U_Mukim_ID', $pegawai->mukim)->first();
        }
        
        $Insentifdatas = Insentif::select("*");
        if($request->tahun != null){
            $gettahun = $request->tahun;
            $Insentifdatas = $Insentifdatas->where('tahun_terima_insentif', $gettahun);
        }else{
            $gettahun = date("Y");
            $Insentifdatas = $Insentifdatas->where('tahun_terima_insentif', $gettahun);
        }
        $getjenisinsentif="";
        if($request->id_jenis_insentif != null){
            $getjenisinsentif = $request->id_jenis_insentif;
            $Insentifdatas = $Insentifdatas->where('id_jenis_insentif', $getjenisinsentif);
        }
        $getNegeri="";
        if($request->negeri != null){
            $getNegeri = $request->negeri;
            $Insentifdatas = $Insentifdatas->where('negeri', $getNegeri);
        }

        $Insentifdatas = $Insentifdatas->get();

        $array = [];
        $array2 = [];
        $array3 = [];
        $array4 = [];
        $array5 = [];
        $array6 = [];
        foreach($Insentifdatas as $insentifdata2){
            $update = true;
            $user = User::where('usahawanid', $insentifdata2->id_pengguna)->first();
            if(isset($user)){
                if($user->usahawanid != null){
                    $usahawan = Usahawan::where('usahawanid', $user->usahawanid)->first();
                    if(isset($usahawan)){
                        if($authuser->role == 3){
                            if(isset($Mukim)){
                                if($usahawan->U_Negeri_ID != $Mukim->U_Negeri_ID){
                                    $update = false;
                                }else{

                                }
                            }
                        }
                        if($authuser->role == 4){
                            if(isset($Mukim) && isset($usahawan)){
                                if($usahawan->U_Daerah_ID != $Mukim->U_Daerah_ID){
                                    $update = false;
                                }else{

                                }
                            }
                        }
                        if($authuser->role == 7){
                            if(isset($Mukim)){
                                if($usahawan->Kod_PT != $pegawai->NamaPT){
                                    $update = false;
                                }else{

                                }
                            }
                        }
                        
                        $insentifdata2->jantina = $usahawan->U_Jantina_ID;

                        $daerah = Daerah::where('U_Daerah_ID', $usahawan->U_Daerah_ID)->first();
                        if(isset($daerah)){
                            $insentifdata2->daerah = $daerah->Daerah;
                        }

                        $perniagaans = Perniagaan::where('usahawanid', $usahawan->usahawanid)->first();
                        if(isset($perniagaans)){
                            $insentifdata2->jnsperniagaan = $perniagaans->jenisperniagaan;
                        }
                        // $pekebun = Pekebun::where('usahawanid', $usahawan->usahawanid)->first();
                        // if(isset($pekebun)){
                            $insentifdata2->status_daftar_usahawan = $usahawan->status_daftar_usahawan;
                        // }

                        $KateUsahawan = KategoriUsahawan::where('id_kategori_usahawan', $usahawan->id_kategori_usahawan)->first();
                        if(isset($KateUsahawan)){
                            $insentifdata2->kateusahawan = $KateUsahawan->nama_kategori_usahawan;
                        }
                        
                        $dateOfBirth = $usahawan->tarikhlahir;
                        $today = date("Y-m-d");
                        $diff = date_diff(date_create($dateOfBirth), date_create($today));
                        $umur = $diff->format('%y');

                        if($umur <= 20){
                            $insentifdata2->umurgrp = 1;
                        }else if($umur >= 21 && $umur <= 30){
                            $insentifdata2->umurgrp = 2;
                        }else if($umur >= 31 && $umur <= 40){
                            $insentifdata2->umurgrp = 3;
                        }else if($umur >= 41 && $umur <= 50){
                            $insentifdata2->umurgrp = 4;
                        }else if($umur >= 51 && $umur <= 60){
                            $insentifdata2->umurgrp = 5;
                        }else if($umur >= 61 && $umur <= 70){
                            $insentifdata2->umurgrp = 6;
                        }else if($umur >= 71){
                            $insentifdata2->umurgrp = 7;
                        }else{
                            $insentifdata2->umurgrp = 8;
                        }
                    }
                }
            }

            if($update == true){
                if(isset($insentifdata2->daerah)){
                    array_push($array, $insentifdata2->daerah);
                }
                if(isset($insentifdata2->jantina)){
                    array_push($array2, $insentifdata2->jantina);
                }   
                if(isset($insentifdata2->jnsperniagaan)){
                    array_push($array3, $insentifdata2->jnsperniagaan);
                }
                if(isset($insentifdata2->status_daftar_usahawan)){
                    array_push($array4, $insentifdata2->status_daftar_usahawan);
                }
                if(isset($insentifdata2->kateusahawan)){
                    array_push($array5, $insentifdata2->kateusahawan);
                }
                if(isset($insentifdata2->umurgrp)){
                    array_push($array6, $insentifdata2->umurgrp);
                }
            }

        }

        $array = array_unique($array);
        $array2 = array_unique($array2);
        $array3 = array_unique($array3);
        $array4 = array_unique($array4);
        $array5 = array_unique($array5);
        $array6 = array_unique($array6);
        $insentif = [];
        $countinsentif = [];
        $jantina = [];
        $jnsperniagaan = [];
        $statdafusah = [];
        $kateusahawan = [];
        $umurgrp = [];
        $total1 = 0;
        $total2 = 0;
        $total3 = 0;
        foreach($Insentifdatas as $InsentifData3){
            $update = true;
            $user = User::where('usahawanid', $InsentifData3->id_pengguna)->first();
            if(isset($user)){
                if($user->usahawanid != null){
                    $usahawan = Usahawan::where('usahawanid', $user->usahawanid)->first();
                    if($authuser->role == 3){
                        if(isset($Mukim)){
                            if($usahawan->U_Negeri_ID != $Mukim->U_Negeri_ID){
                                $update = false;
                            }else{

                            }
                        }
                    }
                    if($authuser->role == 4){
                        if(isset($Mukim) && isset($usahawan)){
                            if($usahawan->U_Daerah_ID != $Mukim->U_Daerah_ID){
                                $update = false;
                            }else{

                            }
                        }
                    }
                    if($authuser->role == 7){
                        if(isset($pegawai)){
                            if($usahawan->Kod_PT != $pegawai->NamaPT){
                                $update = false;
                            }else{

                            }
                        }
                    }
                }
            }
            if($update == true){
                foreach($array as $key => $value){
                    if($InsentifData3->daerah == $value){
                        if(isset($insentif[$key])){
                            $insentif[$key] = $insentif[$key] + $InsentifData3->nilai_insentif;
                            $countinsentif[$key] = $countinsentif[$key] + 1;
                        }else{
                            $insentif[$key] = $InsentifData3->nilai_insentif;
                            $countinsentif[$key] = 1;
                        }
                    }
                }
                foreach($array2 as $key => $value){
                    if($InsentifData3->jantina == $value){
                        if(isset($jantina[$key])){
                            $jantina[$key] = $jantina[$key] + 1;
                            $total1 = $total1 + 1 ;
                        }else{
                            $jantina[$key] = 1;
                            $total1 = $total1 + 1 ;
                        }
                    }
                }
                foreach($array3 as $key => $value){
                    if($InsentifData3->jnsperniagaan == $value){
                        if(isset($jnsperniagaan[$key])){
                            $jnsperniagaan[$key] = $jnsperniagaan[$key] + 1;
                            $total2 = $total2 + 1 ;
                        }else{
                            $jnsperniagaan[$key] = 1;
                            $total2 = $total2 + 1 ;
                        }
                    }
                }
                foreach($array4 as $key => $value){
                    if($InsentifData3->status_daftar_usahawan == $value){
                        if(isset($statdafusah[$key])){
                            $statdafusah[$key] = $statdafusah[$key] + 1;
                        }else{
                            $statdafusah[$key] = 1;
                        }
                    }
                }
                foreach($array5 as $key => $value){
                    if($InsentifData3->kateusahawan == $value){
                        if(isset($kateusahawan[$key])){
                            $kateusahawan[$key] = $kateusahawan[$key] + 1;
                            $total3 = $total3 + 1 ;
                        }else{
                            $kateusahawan[$key] = 1;
                            $total3 = $total3 + 1 ;
                        }
                    }
                }
                foreach($array6 as $key => $value){
                    if($InsentifData3->umurgrp == $value){
                        if(isset($umurgrp[$key])){
                            $umurgrp[$key] = $umurgrp[$key] + 1;
                            // $total3 = $total3 + 1 ;
                        }else{
                            $umurgrp[$key] = 1;
                            // $total3 = $total3 + 1 ;
                        }
                    }
                }
            }
            
        }
        $ddInsentif = JenisInsentif::where('status', 'aktif')->get();
        $ddNegeri = Negeri::all();

        //  dd($array4);
        return view('dash.index'
        ,[
            'daerah'=>json_encode($array,JSON_NUMERIC_CHECK),
            'insentif'=>json_encode($insentif,JSON_NUMERIC_CHECK),
            'countinsentif'=>json_encode($countinsentif,JSON_NUMERIC_CHECK),
            'jantina'=>json_encode($array2,JSON_NUMERIC_CHECK),
            'jantinanum'=>json_encode($jantina,JSON_NUMERIC_CHECK),
            'jantinas'=>$array2,
            'jantinanums'=>$jantina,
            'total1'=>$total1,
            'jnsperniagaan'=>json_encode($array3,JSON_NUMERIC_CHECK),
            'jnsperniagaannum'=>json_encode($jnsperniagaan,JSON_NUMERIC_CHECK),

            'statdafusah'=>json_encode($array4,JSON_NUMERIC_CHECK),
            'statdafusahnum'=>json_encode($statdafusah,JSON_NUMERIC_CHECK),
            'statdafusahs'=>$array4,
            'statdafusahnums'=>$statdafusah,
            'total2'=>$total2,

            'kateusahawan'=>json_encode($array5,JSON_NUMERIC_CHECK),
            'kateusahawannum'=>json_encode($kateusahawan,JSON_NUMERIC_CHECK),
            'kateusahawans'=>$array5,
            'kateusahawannums'=>$kateusahawan,
            'total3'=>$total3,

            'umurgrp'=>json_encode($array6,JSON_NUMERIC_CHECK),
            'umurgrpnum'=>json_encode($umurgrp,JSON_NUMERIC_CHECK),

            'ddInsentif'=>$ddInsentif,
            'ddNegeri'=>$ddNegeri,

            'gettahun'=>$gettahun,
            'getjenisinsentif'=>$getjenisinsentif,
            'getNegeri'=>$getNegeri
        ]
        );
    }
}
