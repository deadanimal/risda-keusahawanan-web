<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\JenisInsentif;
use App\Models\Report;

class PemantauanLawatanControllerWeb extends Controller
{
    public function index()
    {
        $ddInsentif = JenisInsentif::where('status', 'aktif')->get();
        $reports = Report::where('type', 7)->get();
        return view('pemantauanlawatan.index'
        ,[
            'ddInsentif'=>$ddInsentif,
            'reports'=>$reports,
        ]
        );
    }

}
