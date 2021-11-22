<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\JenisInsentif;
use App\Models\Report;
use App\Models\Negeri;

class PemantauanLawatanControllerWeb extends Controller
{
    public function index()
    {
        $ddInsentif = JenisInsentif::where('status', 'aktif')->get();
        $reports = Report::where('type', 7)->get();
        foreach ($reports as $report) {
            $negeri = Negeri::where('U_Negeri_ID', $report->tab1)->first();
            $report->negeri = $negeri->Negeri;
            $jenisinsentif = JenisInsentif::where('id_jenis_insentif', $report->tab2)->first();
            $report->jenis = $jenisinsentif->nama_insentif;
        }
        return view('pemantauanlawatan.index'
        ,[
            'ddInsentif'=>$ddInsentif,
            'reports'=>$reports,
        ]
        );
    }

}
