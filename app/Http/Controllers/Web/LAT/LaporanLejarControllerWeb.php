<?php

namespace App\Http\Controllers\Web\LAT;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanLejarControllerWeb extends Controller
{
    public function index()
    {
        return view('laporanalirantunai.laporanlejar'
        // ,[
        //     'users'=>$users
        // ]
        );
    }

}
