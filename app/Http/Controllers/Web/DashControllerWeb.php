<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

use App\Models\Insentif;
use App\Models\User;
use App\Models\Usahawan;
use App\Models\Daerah;
use App\Models\Perniagaan;
use App\Models\KategoriUsahawan;

class DashControllerWeb extends Controller
{
    public function index()
    {
        $Insentifdatas = Insentif::All();
        $array = [];
        $array2 = [];
        $array3 = [];
        $array4 = [];
        $array5 = [];
        foreach($Insentifdatas as $insentifdata2){
            $user = User::where('usahawanid', $insentifdata2->id_pengguna)->first();
            $usahawan = Usahawan::where('id', $user->usahawanid)->first();
            $insentifdata2->jantina = $usahawan->U_Jantina_ID;
            $daerah = Daerah::where('U_Daerah_ID', $usahawan->U_Daerah_ID)->first();
            $insentifdata2->daerah = $daerah->Daerah;
            $perniagaans = Perniagaan::where('usahawanid', $user->usahawanid)->first();
            $insentifdata2->jnsperniagaan = $perniagaans->jenisperniagaan;
            $insentifdata2->status_daftar_usahawan = $usahawan->status_daftar_usahawan;
            $KateUsahawan = KategoriUsahawan::where('id_kategori_usahawan', $usahawan->id_kategori_usahawan)->first();
            $insentifdata2->kateusahawan = $KateUsahawan->nama_kategori_usahawan;

            array_push($array, $insentifdata2->daerah);
            array_push($array2, $insentifdata2->jantina);
            array_push($array3, $insentifdata2->jnsperniagaan);
            array_push($array4, $insentifdata2->status_daftar_usahawan);
            array_push($array5, $insentifdata2->kateusahawan);
        }

        $array = array_unique($array);
        $array2 = array_unique($array2);
        $array3 = array_unique($array3);
        $array4 = array_unique($array4);
        $array5 = array_unique($array5);
        $insentif = [];
        $countinsentif = [];
        $jantina = [];
        $jnsperniagaan = [];
        $statdafusah = [];
        $kateusahawan = [];
        $total1 = 0;
        $total2 = 0;
        $total3 = 0;
        foreach($Insentifdatas as $InsentifData3){
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
        }
        
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
        ]
        );
    }
}
