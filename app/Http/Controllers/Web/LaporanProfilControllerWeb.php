<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

}
