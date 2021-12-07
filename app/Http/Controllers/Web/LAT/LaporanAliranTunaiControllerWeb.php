<?php

namespace App\Http\Controllers\Web\LAT;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\KategoriAliran;

class LaporanAliranTunaiControllerWeb extends Controller
{
    public function index()
    {
        $reports = Report::where('type', 11)
        ->orderBy('tab8', 'ASC')
        ->orderBy('tab2', 'ASC')
        ->orderBy('tab1', 'ASC')
        ->get();

        foreach ($reports as $report) {
            $kate_aliran = KategoriAliran::where('id', $report->tab4)->first();
            $report->nama_jenis = $kate_aliran->nama_kategori_aliran;   
        }

        return view('laporanalirantunai.index'
        ,[
            'reports'=>$reports
        ]
        );
    }

}
