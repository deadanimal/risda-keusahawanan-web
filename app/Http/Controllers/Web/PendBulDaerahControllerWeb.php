<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendBulDaerahControllerWeb extends Controller
{
    public function index()
    {
        return view('pendapatanbulanan.pendbulDaerah'
        // ,[
        //     'users'=>$users
        // ]
        );
    }

}
