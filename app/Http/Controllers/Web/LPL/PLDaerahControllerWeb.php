<?php

namespace App\Http\Controllers\Web\LPL;
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
        $total = new \stdClass();
        $total->satu = 0;
        $total->dua = 0;
        $total->tiga = 0;
        $total->empat = 0;

        $reports = Report::where('type', 8)
        ->orderBy('tab3', 'ASC')
        ->orderBy('tab1', 'ASC')
        ->orderBy('tab2', 'ASC')
        ->get();

        foreach ($reports as $report) {
            $negeri = Negeri::where('U_Negeri_ID', $report->tab1)->first();
            if(isset($negeri)){
                $report->negeri = $negeri->Negeri;
            }
            $daerah = Daerah::where('U_Daerah_ID', $report->tab2)->first();
            if(isset($daerah)){
                $report->daerah = $daerah->Daerah;
            }
            $total->satu = $total->satu + $report->tab4;
            $total->dua = $total->dua + $report->tab5;
            $total->tiga = $total->tiga + $report->tab6;
            $total->empat = $total->empat + $report->tab7;
        }

        foreach ($reports as $report) {
            $report->percent = round(($report->tab4/$total->satu *100), 2);
        }

        return view('pemantauanlawatan.pantauDaerah'
        ,[
            'reports'=>$reports,
            'total'=>$total
        ]
        );
    }

}
