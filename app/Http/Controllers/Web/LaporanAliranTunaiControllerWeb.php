<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanAliranTunaiControllerWeb extends Controller
{
    public function index()
    {
        return view('laporanalirantunai.index'
        // ,[
        //     'users'=>$users
        // ]
        );
    }

}
