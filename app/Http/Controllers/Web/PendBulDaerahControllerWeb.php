<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\JenisInsentif;

class PendBulDaerahControllerWeb extends Controller
{
    public function index()
    {
        $ddInsentif = JenisInsentif::where('status', 'aktif')->get();
        return view('pendapatanbulanan.pendbulDaerah'
        ,[
            'ddInsentif'=>$ddInsentif
        ]
        );
    }

}
