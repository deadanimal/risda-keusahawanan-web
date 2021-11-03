<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendapatanBulananControllerWeb extends Controller
{
    public function index()
    {
        return view('pendapatanbulanan.index'
        // ,[
        //     'users'=>$users
        // ]
        );
    }

}
