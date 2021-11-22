<?php

namespace App\Http\Controllers\Web\LAT;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenyataUntungRugiControllerWeb extends Controller
{
    public function index()
    {
        return view('laporanalirantunai.penyatauntungrugi'
        // ,[
        //     'users'=>$users
        // ]
        );
    }

}
