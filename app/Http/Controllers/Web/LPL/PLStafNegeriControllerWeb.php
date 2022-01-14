<?php

namespace App\Http\Controllers\Web\LPL;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Negeri;
use App\Models\Report;
use App\Models\Daerah;
use App\Models\Pegawai;

class PLStafNegeriControllerWeb extends Controller
{
    public function index()
    {
        $ddNegeri = Negeri::where('status', '1')->get();
        $authuser = Auth::user();
        if(!isset($authuser)){
            return redirect('/landing');
        }
        $getYear = date("Y");
        $total = new \stdClass();
        $total->satu = 0;
        $total->dua = 0;
        $total->tiga = 0;
        $total->empat = 0;
        $reports = Report::where('type', 9)->where('tab20', $authuser->id)->where('tab2', $getYear)
        ->orderBy('tab2', 'ASC')
        ->orderBy('tab1', 'ASC')
        ->orderBy('tab3', 'ASC')
        ->get();

        foreach ($reports as $report) {
            $daerah = Daerah::select('Daerah')->where('U_Daerah_ID', $report->tab3)->first();
            $report->daerah = $daerah->Daerah;
            $pegawai = Pegawai::select('nama')->where('id', $report->tab4)->first();
            $report->pegawai = $pegawai->nama;
            $total->satu = $total->satu + $report->tab5;
            $total->dua = $total->dua + $report->tab6;
            $total->tiga = $total->tiga + $report->tab7;
            $total->empat = $total->empat + $report->tab8;
        }

        foreach ($reports as $report) {
            $report->percent = round(($report->tab5/$total->satu *100), 2);
        }

        return view('pemantauanlawatan.pantaustafnegeri'
        ,[
            'ddNegeri'=>$ddNegeri,
            'reports'=>$reports,
            'total'=>$total
        ]
        );
    }

}
