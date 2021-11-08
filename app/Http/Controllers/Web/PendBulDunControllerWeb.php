<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendBulDunControllerWeb extends Controller
{
    public function index()
    {
        return view('pendapatanbulanan.pendbulDun'
        // ,[
        //     'users'=>$users
        // ]
        );
    }

}
