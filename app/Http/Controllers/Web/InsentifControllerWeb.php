<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InsentifControllerWeb extends Controller
{
    public function index()
    {
        return view('insentif.index'
        // ,[
        //     'users'=>$users
        // ]
        );
    }

}
