<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PemantauanLawatanControllerWeb extends Controller
{
    public function index()
    {
        return view('pemantauanlawatan.index'
        // ,[
        //     'users'=>$users
        // ]
        );
    }

}
