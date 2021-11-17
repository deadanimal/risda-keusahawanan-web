<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanInsentifControllerWeb extends Controller
{
    public function index()
    {
        return view('laporaninsentif.index'
        // ,[
        //     'users'=>$users
        // ]
        );
    }

}
