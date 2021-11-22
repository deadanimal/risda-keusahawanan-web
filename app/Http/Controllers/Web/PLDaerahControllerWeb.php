<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\JenisInsentif;
use App\Models\Report;
use App\Models\Negeri;
use App\Models\Daerah;

class PLDaerahControllerWeb extends Controller
{
    public function index()
    {
        $ddInsentif = JenisInsentif::where('status', 'aktif')->get();
        $reports = Report::where('type', 8)
        ->orderBy('tab4', 'ASC')
        ->orderBy('tab3', 'ASC')
        ->orderBy('tab1', 'ASC')
        ->orderBy('tab2', 'ASC')
        ->get();

        foreach ($reports as $report) {
            $negeri = Negeri::where('U_Negeri_ID', $report->tab1)->first();
            if(isset($negeri)){
                $report->negeri = $negeri->Negeri;
            }
            $jenisinsentif = JenisInsentif::where('id_jenis_insentif', $report->tab3)->first();
            if(isset($jenisinsentif)){
                $report->jenis = $jenisinsentif->nama_insentif;
            }
            $daerah = Daerah::where('U_Daerah_ID', $report->tab2)->first();
            if(isset($daerah)){
                $report->daerah = $daerah->Daerah;
            }
        }

        return view('pemantauanlawatan.pantauDaerah'
        ,[
            'ddInsentif'=>$ddInsentif,
            'reports'=>$reports
        ]
        );
    }

}
