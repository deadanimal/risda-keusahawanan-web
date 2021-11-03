<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TemuLawatanControllerWeb extends Controller
{
    public function index()
    {
        return view('temulawatan.index'
        // ,[
        //     'users'=>$users
        // ]
        );
    }

}
