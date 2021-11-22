<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

use App\Models\Insentif;
use App\Models\User;
use App\Models\Usahawan;
use App\Models\Daerah;

class DashControllerWeb extends Controller
{
    public function index()
    {
        $Insentifdatas = Insentif::All();
        foreach($Insentifdatas as $insentifdata2){
            $user = User::where('usahawanid', $insentifdata2->id_pengguna)->first();
            $usahawan = Usahawan::where('id', $user->usahawanid)->first();
            $insentifdata2->jantina = $usahawan->U_Jantina_ID;
            $daerah = Daerah::where('U_Daerah_ID', $usahawan->U_Daerah_ID)->first();
            $insentifdata2->daerah = $daerah->Daerah;
        }
        $array = [];
        $array2 = [];
        foreach($Insentifdatas as $InsentifData){
            array_push($array, $InsentifData->daerah);
            array_push($array2, $InsentifData->jantina);
        }
        $array = array_unique($array);
        $array2 = array_unique($array2);
        $insentif = [];
        $jantina = [];
        foreach($Insentifdatas as $InsentifData3){
            foreach($array as $key => $value){
                if($InsentifData3->daerah == $value){
                    if(isset($insentif[$key])){
                        $insentif[$key] = $insentif[$key] + $InsentifData3->nilai_insentif;
                    }else{
                        $insentif[$key] = $InsentifData3->nilai_insentif;
                    }
                }
            }
            foreach($array2 as $key => $value){
                if($InsentifData3->jantina == $value){
                    if(isset($jantina[$key])){
                        $jantina[$key] = $jantina[$key] + 1;
                    }else{
                        $jantina[$key] = 1;
                    }
                }
            }
        }
        
        //dd($jantina);
        return view('dash.index'
        ,[
            'daerah'=>json_encode($array,JSON_NUMERIC_CHECK),
            'insentif'=>json_encode($insentif,JSON_NUMERIC_CHECK),
            'jantina'=>json_encode($array2,JSON_NUMERIC_CHECK),
            'jantinanum'=>json_encode($jantina,JSON_NUMERIC_CHECK)
        ]
        );
    }

    function returnUniqueProperty($array,$property) {
        $tempArray = array_unique(array_column($array, $property));
        $moreUniqueArray = array_values(array_intersect_key($array, $tempArray));
        return $moreUniqueArray;
    }
}
