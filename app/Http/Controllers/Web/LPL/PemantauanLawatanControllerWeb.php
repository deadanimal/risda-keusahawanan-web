<?php

namespace App\Http\Controllers\Web\LPL;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\JenisInsentif;
use App\Models\Report;
use App\Models\Negeri;

class PemantauanLawatanControllerWeb extends Controller
{
    public function index()
    {
        $total = new \stdClass();
        $total->satu = 0;
        $total->dua = 0;
        $total->tiga = 0;
        $total->empat = 0;
        
        $reports = Report::where('type', 7)
        ->orderBy('tab1', 'ASC')
        ->orderBy('tab2', 'ASC')
        ->get();

        foreach ($reports as $report) {
            $negeri = Negeri::where('U_Negeri_ID', $report->tab1)->first();
            $report->negeri = $negeri->Negeri;
            $total->satu = $total->satu + $report->tab3;
            $total->dua = $total->dua + $report->tab4;
            $total->tiga = $total->tiga + $report->tab5;
        }
        foreach ($reports as $report) {
            $report->percent = round(($report->tab3/$total->satu *100), 2);
        }

        return view('pemantauanlawatan.index'
        ,[
            // 'ddInsentif'=>$ddInsentif,
            'reports'=>$reports,
            'total'=>$total
        ]
        );
    }

}
