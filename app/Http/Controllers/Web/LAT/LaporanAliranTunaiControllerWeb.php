<?php

namespace App\Http\Controllers\Web\LAT;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanAliranTunaiControllerWeb extends Controller
{
    public function index()
    {
        $reports1 = Report::where('type', 11)->where('tab4', 1)->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->get();
        $reports2 = Report::where('type', 11)->where('tab4', 2)->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->get();
        $reports3 = Report::where('type', 11)->where('tab4', 3)->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->get();

        return view('laporanalirantunai.index'
        ,[
            'reports1'=>$reports1,
            'reports2'=>$reports2,
            'reports3'=>$reports3
        ]
        );
    }

}
